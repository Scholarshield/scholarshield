<?php
  function test_input($data)
  {
   $data = trim($data);
   $data = stripslashes($data);
   $data = strip_tags($data);
   $data = htmlentities($data);
   $data = htmlspecialchars($data);
   return $data;
  };
  if($_SERVER["REQUEST_METHOD"] == "POST"):
  {
    if(isset($_POST['childsrch'])):
    {
      if(!empty($_POST['childsrch']) && isset($_POST['sclid']) && !empty($_POST['sclid']))
      {
      $keyword = test_input($_POST['childsrch']);
      $schoolid = test_input($_POST['sclid']);
      if (preg_match("/^[a-zA-Z ]*$/",$keyword))
      {
      try
      {
        require 'connect.php';
        $sth = $conn->prepare('SELECT `ID`,`NAME`,`CLASS`,`SECTION`,`STOPPAGE_ID`,`BUS_ID` FROM `child` WHERE `NAME` LIKE :keyword AND SCHOOLBRANCH_ID = :schoolid ORDER BY `NAME`');
        $keyword = $keyword."%";
        $sth->bindParam(':keyword', $keyword, PDO::PARAM_STR);
        $sth->bindParam(':schoolid', $schoolid, PDO::PARAM_STR); //$schoolid is the id the of schoollogged in
        $sth->execute();
        $result = $sth->fetchAll();
      }
      catch(PDOException $f)
      {
        echo "Connection failed: " . $f->getMessage();
      }
      $conn=null;

      if(count($result)>0)
      {
       foreach ($result as $values)
        {
          echo 'Id = '.$values['ID'].' Name = '.$values['NAME'].' Class = '.$values['CLASS'].' Section = '.$values['SECTION'].' Stoppage Id = '.$values['STOPPAGE_ID'].' Busid = '.$values['BUS_ID'].'<br>';
        }
      }
      else
      {
        echo 'No student found <br> What you are looking for anyway?';
      }
    }
    else
     {die("Oops!No student found");}
    }
    else
     {die("Type something to see results");}
   }
   elseif(isset($_POST['classsrch'])):
   {
     if(!empty($_POST['classsrch']) && isset($_POST['clsname']) && !empty($_POST['clsname']) && isset($_POST['secname']) && !empty($_POST['secname']) && isset($_POST['sclid']) && !empty($_POST['sclid']))
     {
       $class = test_input($_POST['clsname']);
       $section = test_input($_POST['secname']);
       $schoolid = test_input($_POST['sclid']);
       try
       {
        require 'connect.php';
        $sth = $conn->prepare('SELECT `ID`,`NAME`,`STOPPAGE_ID`,`BUS_ID` FROM `child` WHERE `CLASS` = :cls AND `SECTION`= :sectn AND SCHOOLBRANCH_ID = :schoolid ORDER BY `NAME`');

        $sth->bindParam(':cls', $class, PDO::PARAM_STR);
        $sth->bindParam(':sectn', $section, PDO::PARAM_STR);
        $sth->bindParam(':schoolid', $schoolid, PDO::PARAM_STR); //$schoolid is the id the of schoollogged in
        $sth->execute();
        $result = $sth->fetchAll();
       }
      catch(PDOException $f)
      {
        echo "Connection failed: " . $f->getMessage();
      }
      $conn=null;

      if(count($result)>0)
      {
       foreach ($result as $values)
        {
          echo 'Id = '.$values['ID'].' Name =  '.$values['NAME'].' Stoppage = '.$values['STOPPAGE_ID'].' Busid = '.$values['BUS_ID'].'<br>';
        }
      }
      else
      {
        echo 'No student found <br> What you are looking for anyway?';
      }
    }
    else
     {
       echo "OOps!! No students found!";
     }
   }
  elseif(isset($_POST['bussrch'])):
   {
     if(!empty($_POST['bussrch']) && isset($_POST['busid']) && !empty($_POST['busid']) && isset($_POST['sclid']) && !empty($_POST['sclid']))
     {
       $bus = test_input($_POST['busid']);
       $schoolid = test_input($_POST['sclid']);
       try
       {
        require 'connect.php';
        $sth = $conn->prepare('SELECT `ID`,`NAME`,`CLASS`,`SECTION`,`STOPPAGE_ID` FROM `child` WHERE `BUS_ID` = :busid AND SCHOOLBRANCH_ID = :schoolid ORDER BY `NAME`');

        $sth->bindParam(':busid', $bus, PDO::PARAM_STR);
        $sth->bindParam(':schoolid', $schoolid, PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->fetchAll();
       }
      catch(PDOException $f)
      {
        echo "Connection failed: " . $f->getMessage();
      }
      $conn=null;

      if(count($result)>0)
      {
       foreach ($result as $values)
        {
          echo 'Id = '.$values['ID'].' Name = '.$values['NAME'].' Stoppageid  = '.$values['STOPPAGE_ID'].' Class = '.$values['CLASS'].' Section = '.$values['SECTION'].'<br>';
        }
      }
      else
      {
        echo 'No student found <br> What you are looking for anyway?'.$bus.' '.$schoolid;
      }
    }
    else
     {
       echo "OOps!! No students found!";
     }
   }
   else:
    {
      die();
    }
   endif;
  }
 endif;
?>