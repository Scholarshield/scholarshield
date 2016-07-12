<?php
//error_reporting(0);
require 'logininfo.php';
if(loggedin()):
{
  function test_input($data)
  {
   $data = stripslashes($data);
   $data = htmlentities($data);
   $data = htmlspecialchars($data);
   $data = ucwords(strtolower($data));
   return $data;
  };
  try
  {
    require 'connect.php';
    $user=$_SESSION['jr76$*5@#h^fg@&@65'];
    $query = $conn->prepare("SELECT `SCHOOLBRANCH_ID`,`group` FROM `school_login` WHERE `username` = :username LIMIT 1");
    $query->bindParam(':username', $user, PDO::PARAM_STR);
    $query->execute();
    $gotresult=$query->fetchAll();
  }
  catch(PDOException $q)
  {
    echo "Error:" . $q->getMessage();
  }
   $conn = null;
   foreach ($gotresult as $values)
   {
     $schoolid = $values['SCHOOLBRANCH_ID'];
     $role = $values['group'];
   }
 try
 {
    require 'connect.php';
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->beginTransaction();
    $stats = $conn->prepare("SELECT link.`route_id`,link.`route_name` FROM `link` JOIN `child` ON child.ROUTE_ID = link.ROUTE_ID JOIN `path` on  link.`route_id` = path.`route_id` and path.`SCHOOLBRANCH_ID`=:schoolid GROUP BY path.ROUTE_ID");
    $stats->bindParam(':schoolid', $schoolid, PDO::PARAM_STR);
    $stats->execute();
    $busrslt=$stats->fetchAll();
    $albus = $conn->prepare("SELECT COUNT(*) FROM `school_buses` WHERE SCHOOLBRANCH_ID = :schoolid");
    $albus->bindParam(':schoolid', $schoolid, PDO::PARAM_STR);
    $albus->execute();
    $albusrslt=$albus->fetchcolumn();
    $actbus = $conn->prepare("SELECT COUNT(*) FROM `school_buses` join `link` on school_buses.BUS_ID = link.BUS_ID and link.TRIP_CHECK = 1 and school_buses.SCHOOLBRANCH_ID =:schoolid GROUP BY link.BUS_ID");
    $actbus->bindParam(':schoolid', $schoolid, PDO::PARAM_STR);
    $actbus->execute();
    $actbusrslt=$actbus->fetchAll();
    $cmprt = $conn->prepare('SELECT link.STOP_ROUTE_TIME,link.START_ROUTE_TIME,link.ROUTE_ID as `route_type`, school_buses.DRIVER_NAME,school_buses.DRIVER_NUMBER,link.ROUTE_NAME,level3_column_wise_data.IMEI from level3_column_wise_data join bus on level3_column_wise_data.IMEI = bus.IMEI JOIN school_buses ON bus.BUS_ID = school_buses.BUS_ID AND schoolbranch_id = :schoolid JOIN `link` ON bus.BUS_ID = link.BUS_ID WHERE level3_column_wise_data.ID in (SELECT MAX(level3_column_wise_data.ID) FROM level3_column_wise_data GROUP BY level3_column_wise_data.IMEI) AND level3_column_wise_data.TIMINGS >= link.STOP_ROUTE_TIME');
    $cmprt->bindParam(':schoolid', $schoolid, PDO::PARAM_STR);
    $cmprt->execute();
    $cmprtres = $cmprt->fetchAll();
    $routedet = $conn->prepare("SELECT link.ROUTE_ID,link.ROUTE_NAME,link.START_ROUTE_TIME,link.STOP_ROUTE_TIME,bus.BUS_NUMBER FROM school_buses JOIN bus ON school_buses.BUS_ID = bus.BUS_ID AND school_buses.SCHOOLBRANCH_ID = :schoolid JOIN link ON link.BUS_ID = bus.BUS_ID JOIN  get_route_id ON link.ROUTE_ID = get_route_id.MORNING_ROUTE_ID");
    $routedet->bindParam(':schoolid', $schoolid, PDO::PARAM_STR);
    $routedet->execute();
    $routedetres=$routedet->fetchAll();
    $routedeteve = $conn->prepare("SELECT link.ROUTE_ID,link.ROUTE_NAME,link.START_ROUTE_TIME,link.STOP_ROUTE_TIME,bus.BUS_NUMBER FROM school_buses JOIN bus ON school_buses.BUS_ID = bus.BUS_ID AND school_buses.SCHOOLBRANCH_ID = :schoolid JOIN link ON link.BUS_ID = bus.BUS_ID JOIN get_route_id ON link.ROUTE_ID = get_route_id.EVENING_ROUTE_ID");
    $routedeteve->bindParam(':schoolid', $schoolid, PDO::PARAM_STR);
    $routedeteve->execute();
    $routedetreseve=$routedeteve->fetchAll();
    $conn->commit();
 }
 catch(PDOException $n)
  {
    $conn->rollback();
    echo "Error:" . $n->getMessage();
  }
  $conn = null;
  if($albusrslt>0)
  {
      $actpercent = (count($actbusrslt)/$albusrslt)*100;
  }
  else
  {
    $actpercent = 0;
  }
if($_SERVER["REQUEST_METHOD"] == "GET"):
  {
   if(isset($_GET['chkdet'])&& !empty($_GET['chkdet'])):
     {
       $routeid=test_input($_GET['chkdet']);
        try
         {
           require 'connect.php';
           $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           $chld = $conn->prepare('Select child.C_ID,child.CHILD_NAME,child.CLASS,child.SECTION,child.STOPPAGE_ID,parent.PARENT_NAME,parent.SMS_NUMBER,stoppage.STOPPAGE_NAME from child join parent_of on child.C_ID=parent_of.C_ID AND child.SCHOOLBRANCH_ID=:schoolid AND child.route_id=:routeid join parent on parent_of.P_ID=parent.PHONE_NUMBER JOIN `stoppage` on child.STOPPAGE_ID = stoppage.`STOPPAGE_ID` ORDER BY child.CHILD_NAME');
           $chld->bindParam(':schoolid', $schoolid, PDO::PARAM_STR);
           $chld->bindParam(':routeid', $routeid, PDO::PARAM_STR);
           $chld->execute();
           $childres = $chld->fetchAll();
         }
        catch(PDOException $h)
        {
          echo "Error:" . $h->getMessage();
        }
        $conn = null;
     }
    endif;
  }
 elseif($_SERVER["REQUEST_METHOD"] == "POST"):
 {
   if(isset($_POST['chid']) && !empty($_POST['chid']) && isset($_POST['chname']) && !empty($_POST['chname']) && isset($_POST['chcls']) && !empty($_POST['chcls']) && isset($_POST['chsec']) && !empty($_POST['chsec']) && isset($_POST['chstp']) && !empty($_POST['chstp']) && isset($_POST['chpar']) && !empty($_POST['chpar']) && isset($_POST['chnumb']) && !empty($_POST['chnumb'])):
    {
       $chid=test_input($_POST['chid']);
       $chname=test_input($_POST['chname']);
       $chcls=test_input($_POST['chcls']);
       $chsec=test_input($_POST['chsec']);
       $chstp=test_input($_POST['chstp']);
       $chpar=test_input($_POST['chpar']);
       $chnumb=test_input($_POST['chnumb']);
        try
         {
           require 'connect.php';
           $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           $conn->beginTransaction();
           $selstp = $conn->prepare("SELECT `STOPPAGE_ID` FROM `stoppage` WHERE `STOPPAGE_NAME` = :stop LIMIT 1");
           $selstp->bindParam(':stop', $chstp);
           $selstp->execute();
           $stopres = $selstp->fetchColumn();

           $sql = $conn->prepare("UPDATE `child` SET CHILD_NAME=:name,CLASS=:class,SECTION=:section,STOPPAGE_ID=:stopsel WHERE C_ID=:id LIMIT 1");
           $sql->bindParam(':id', $chid);
           $sql->bindParam(':name', $chname);
           $sql->bindParam(':class', $chcls);
           $sql->bindParam(':section', $chsec);
           $sql->bindParam(':stopsel', $stopres);
           $sql->execute();

           $yql = $conn->prepare("UPDATE `parent` SET SMS_NUMBER=:phone,PARENT_NAME=:name WHERE PHONE_NUMBER = (SELECT `P_ID` FROM `parent_of` WHERE C_ID=:id LIMIT 1)");
           $yql->bindParam(':id', $chid);
           $yql->bindParam(':phone', $chnumb);
           $yql->bindParam(':name', $chpar);
           $yql->execute();

           $conn->commit();
           echo 'true';
         }
        catch(PDOException $h)
        {
          $conn->rollback();
          echo "Error:" . $h->getMessage();
        }
        $conn = null;
    }
   elseif(isset($_POST['delete']) && !empty($_POST['delete'])):
   {
     $delrow=test_input($_POST['delete']);
       try
         {
           require 'connect.php';
           $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           $conn->beginTransaction();

           $r3ql = $conn->prepare("SELECT `P_ID` FROM `parent_of` WHERE C_ID=:id LIMIT 1");
           $r3ql->bindParam(':id', $delrow);
           $r3ql->execute();
           $chkpid=$r3ql->fetchcolumn();

           $r4ql = $conn->prepare("SELECT COUNT(*) FROM `parent_of` WHERE P_ID=:Pid LIMIT 1");
           $r4ql->bindParam(':Pid', $chkpid);
           $r4ql->execute();
           $countpid=$r4ql->fetchcolumn();

           if($countpid==1):
           {
             $r1ql = $conn->prepare("DELETE FROM `parent` WHERE PHONE_NUMBER = (SELECT `P_ID` FROM `parent_of` WHERE C_ID=:id LIMIT 1)");
             $r1ql->bindParam(':id', $delrow);
             $r1ql->execute();
           }
           endif;

           $rql = $conn->prepare("DELETE FROM `child` WHERE C_ID=:id LIMIT 1");
           $rql->bindParam(':id', $delrow);
           $rql->execute();

           $r2ql = $conn->prepare("DELETE FROM `parent_of` WHERE C_ID=:id LIMIT 1");
           $r2ql->bindParam(':id', $delrow);
           $r2ql->execute();

           $conn->commit();
           echo 'delete';
         }
        catch(PDOException $h)
        {
          $conn->rollback();
          echo "Error:" . $h->getMessage();
        }
        $conn = null;
   }
   elseif(isset($_POST['download']) && !empty($_POST['download'])):
   {
     $download=test_input($_POST['download']);
     $output='';
       try
         {
           require 'connect.php';
           $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           $down = $conn->prepare('Select child.C_ID,child.CHILD_NAME,child.CLASS,child.SECTION,child.STOPPAGE_ID,parent.PARENT_NAME,parent.SMS_NUMBER,stoppage.STOPPAGE_NAME from child join parent_of on child.C_ID=parent_of.C_ID AND child.SCHOOLBRANCH_ID=:schoolid AND child.route_id=:routeid join parent on parent_of.P_ID=parent.PHONE_NUMBER JOIN `stoppage` on child.STOPPAGE_ID = stoppage.`STOPPAGE_ID` ORDER BY child.CHILD_NAME');
           $down->bindParam(':schoolid', $schoolid, PDO::PARAM_STR);
           $down->bindParam(':routeid', $download, PDO::PARAM_STR);
           $down->execute();
           $downres = $down->fetchAll();
         }
        catch(PDOException $h)
        {
          echo "Error:" . $h->getMessage();
        }
        $conn = null;

        $output.=  '<table>
                  <tr>
                    <th>NAME</th>
                    <th>CLASS</th>
                    <th>SECTION</th>
                    <th>STOPPAGE_NAME</th>
                    <th>PARENT_NAME</th>
                    <th>PHONE_NUMBER</th>
                  </tr>';

        foreach($downres as $values)
         {
         $output.= '<tr>
                 <td>'.$values["CHILD_NAME"].'</td>
                 <td>'.$values["CLASS"].'</td>
                 <td>'.$values["SECTION"].'</td>
                 <td>'.$values["STOPPAGE_NAME"].'</td>
                 <td>'.$values["PARENT_NAME"].'</td>
                 <td>'.$values["SMS_NUMBER"].'</td>
                 </tr>';
         }
           $output.='</table>';
           header("Content-type: application/vnd-ms-excel");
           header("Content-Disposition: attachment; filename=codelution-export.xls");
           echo $output;
    }
   elseif(isset($_POST['getschoolbus'])&& !empty($_POST['getschoolbus'])):
     {
        $bustype= test_input($_POST['getschoolbus']);
        try
         {
           require 'connect.php';
           if($bustype==='Getschoolbus')
           {
              $map = $conn->prepare('SELECT bus.BUS_NUMBER,school_buses.DRIVER_NAME,school_buses.DRIVER_NUMBER,link.TRIP_CHECK,level3_column_wise_data.IMEI,level3_column_wise_data.LATITUDE,level3_column_wise_data.LONGITUDE
                                   from level3_column_wise_data join bus on level3_column_wise_data.IMEI = bus.IMEI JOIN school_buses ON bus.BUS_ID = school_buses.BUS_ID  AND school_buses.schoolbranch_id = :schoolid JOIN `link` ON bus.BUS_ID = link.BUS_ID WHERE level3_column_wise_data.ID in (SELECT MAX(level3_column_wise_data.ID) FROM level3_column_wise_data GROUP BY level3_column_wise_data.IMEI)');

              $map->bindParam(':schoolid', $schoolid, PDO::PARAM_STR);
              $map->execute();
              $mapres = $map->fetchAll();
              echo json_encode($mapres);
           }
           elseif($bustype==='Getactschoolbus')
           {
              $map = $conn->prepare('SELECT bus.BUS_NUMBER,school_buses.DRIVER_NAME,school_buses.DRIVER_NUMBER,link.TRIP_CHECK,link.ROUTE_ID,level4_trip_data.IMEI,level4_trip_data.LATITUDE,level4_trip_data.LONGITUDE from level4_trip_data join bus on level4_trip_data.IMEI = bus.IMEI JOIN school_buses ON bus.BUS_ID = school_buses.BUS_ID AND school_buses.schoolbranch_id = :schoolid JOIN `link` ON bus.BUS_ID = link.BUS_ID WHERE level4_trip_data.ID in (SELECT MAX(level4_trip_data.ID) FROM level4_trip_data GROUP BY level4_trip_data.IMEI) and link.TRIP_CHECK = 1');

              $map->bindParam(':schoolid', $schoolid, PDO::PARAM_STR);
              $map->execute();
              $mapres = $map->fetchAll();
              echo json_encode($mapres);
           }
           elseif($bustype==='Getcmpschoolbus')
           {
              $map = $conn->prepare('SELECT link.STOP_ROUTE_TIME,link.START_ROUTE_TIME,link.ROUTE_ID as `route_type`, school_buses.DRIVER_NAME,school_buses.DRIVER_NUMBER,link.ROUTE_NAME,level3_column_wise_data.IMEI from level3_column_wise_data join bus on level3_column_wise_data.IMEI = bus.IMEI JOIN school_buses ON bus.BUS_ID = school_buses.BUS_ID AND schoolbranch_id = :schoolid JOIN `link` ON bus.BUS_ID = link.BUS_ID WHERE level3_column_wise_data.ID in (SELECT MAX(level3_column_wise_data.ID) FROM level3_column_wise_data GROUP BY level3_column_wise_data.IMEI) AND level3_column_wise_data.TIMINGS >= link.STOP_ROUTE_TIME');

              $map->bindParam(':schoolid', $schoolid, PDO::PARAM_STR);
              $map->execute();
              $mapres = $map->fetchAll();
              $i=1;
                                      foreach ($mapres as $values)
                                       {
                                       echo'<tr>
                                             <td>'.$i++.'</td>
                                             <td><button type="button" onclick="showcompletedroute(this,event)" value="'.$values['START_ROUTE_TIME'].' '.$values['STOP_ROUTE_TIME'].' '.$values['route_type'].'" data-toggle="tooltip" data-placement="bottom" title="Show Completed Path!" class="maproute btn btn-primary btn-md '.$values['IMEI'].'">'
                                              .$values['ROUTE_NAME'].'</button></td>
                                             <td>'.((str_split($values['route_type'],1)[0]=="m")?"Morning":"Evening").'</td>
                                             <td>
                                              '.$values['DRIVER_NAME'].'
                                             </td>
                                             <td>
                                             '.$values['DRIVER_NUMBER'].'
                                             </td>
                                            </tr>';
                                       }
           }
           elseif($bustype==='Getsingleschoolbus')
           {
              $singlebusimei= test_input($_POST['singbsimei']);
              $map = $conn->prepare('SELECT bus.BUS_NUMBER,school_buses.DRIVER_NAME,school_buses.DRIVER_NUMBER,link.TRIP_CHECK,link.ROUTE_ID,level3_column_wise_data.IMEI,level3_column_wise_data.LATITUDE,level3_column_wise_data.LONGITUDE
                                   from level3_column_wise_data join bus on level3_column_wise_data.IMEI = bus.IMEI JOIN school_buses ON bus.BUS_ID = school_buses.BUS_ID  AND school_buses.schoolbranch_id = :schoolid JOIN `link` ON bus.BUS_ID = link.BUS_ID WHERE level3_column_wise_data.ID in (SELECT MAX(level3_column_wise_data.ID) FROM level3_column_wise_data WHERE level3_column_wise_data.IMEI = :singbsimei)');

              $map->bindParam(':schoolid', $schoolid, PDO::PARAM_STR);
              $map->bindParam(':singbsimei', $singlebusimei, PDO::PARAM_STR);
              $map->execute();
              $mapres = $map->fetchAll();
              echo json_encode($mapres);
           }
           else
           {
             die();
           }
         }
        catch(PDOException $h)
        {
          echo "Error:" . $h->getMessage();
        }
        $conn = null;
     }
    elseif(isset($_POST['busroute'])&& !empty($_POST['busroute']) && isset($_POST['imei'])&& !empty($_POST['imei'])):
     {
       $routetype = test_input($_POST['busroute']);
       $imei = test_input($_POST['imei']);
        try
         {
           require 'connect.php';
           if($routetype==='Busroute')
           {
           $routebs = $conn->prepare('SELECT `LATITUDE`,`LONGITUDE` FROM `level3_column_wise_data` WHERE `IMEI`= :imei');
           $routebs->bindParam(':imei', $imei, PDO::PARAM_STR);
           $routebs->execute();
           $busrouteres = $routebs->fetchAll();
           }
           elseif($routetype==='Actbusroute')
           {
           $routebs = $conn->prepare('SELECT `LATITUDE`,`LONGITUDE` FROM `level4_trip_data` WHERE `IMEI`= :imei');
           $routebs->bindParam(':imei', $imei, PDO::PARAM_STR);
           $routebs->execute();
           $busrouteres = $routebs->fetchAll();
           }
           elseif($routetype==='Cmpbusroute')
           {
             $routebs = $conn->prepare("SELECT `LATITUDE`,`LONGITUDE` FROM `level3_column_wise_data` WHERE `IMEI`= :imei AND `TIMINGS` BETWEEN :start AND :stop");
             $routebs->bindParam(':start',$_POST['starttime'], PDO::PARAM_STR);
             $routebs->bindParam(':stop',$_POST['stoptime'], PDO::PARAM_STR);
             $routebs->bindParam(':imei', $imei, PDO::PARAM_STR);
             $routebs->execute();
             $busrouteres = $routebs->fetchAll();
           }
           else
           {
             die();
           }
         }
        catch(PDOException $h)
        {
          echo "Error:" . $h->getMessage();
        }
        $conn = null;
        echo json_encode($busrouteres);
     }
     elseif(isset($_POST['routeid'])&& !empty($_POST['routeid'])):
     {
       $stoppageroute = test_input($_POST['routeid']);
        try
         {
           require 'connect.php';

           $stopchk = $conn->prepare('SELECT stoppage.STOPPAGE_NAME,stoppage.`LATITUDE`,stoppage.`LONGITUDE` FROM path JOIN stoppage on path.STOPPAGE_ID = stoppage.STOPPAGE_ID AND path.ROUTE_ID = :routeid');
           $stopchk->bindParam(':routeid', $stoppageroute, PDO::PARAM_STR);
           $stopchk->execute();
           $stopres = $stopchk->fetchAll();
         }
        catch(PDOException $h)
        {
          echo "Error:" . $h->getMessage();
        }
        $conn = null;
        echo json_encode($stopres);
     }
   else:
    {
      die();
    }
  endif;
 }
 endif;
}
else:
{
  die(header("Location:scholarshield.php"));
}
endif;
?>