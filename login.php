<?php
require 'logininfo.php';
if(loggedin()):
{
  die(header("Location:index.php"));
}
else:
{
  if($_SERVER["REQUEST_METHOD"] == "POST"):
  {
    function test_input($data)
    {
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlentities($data);
     $data = htmlspecialchars($data);
     return $data;
    }
    if(!empty($_POST["submit"])&&isset($_POST["submit"])&&!empty($_POST["email"])&&isset($_POST["email"])&&!empty($_POST['pwd'])&&isset($_POST['pwd'])):
    {
      $password=htmlentities(htmlspecialchars($_POST['pwd']));
      $id = test_input($_POST["email"]);
      if (!filter_var($id, FILTER_VALIDATE_EMAIL))
       {die("Invalid Email");}
      else
       {
         $password_new=sha1($password);
         try
          {
            require 'connect.php';
            $query = $conn->prepare("SELECT COUNT(*) FROM `school_login` WHERE USERNAME = :username AND PASSWORD = :password");
            $query->bindParam(':username', $id, PDO::PARAM_STR);
            $query->bindParam(':password', $password_new, PDO::PARAM_STR);
            $query->execute();
            $rows = $query->fetchColumn();
          }
          catch(PDOException $g)
          {
            echo "Error: in login user" . $g->getMessage();
          }
          $conn = null;

           if($rows==1)
            {
              $_SESSION['jr76$*5@#h^fg@&@65']=$id;
              die("l321@");
            }
           else
            {
              die('No user found!!');
            }
        }
    }
    else:
    {
      die("All feilds are required");
    }
    endif;
  }
   else:
  {
   die(header("Location:scholarshield.php"));
  }
  endif;
}
endif;
?>

