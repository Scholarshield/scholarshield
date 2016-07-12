<?php
//error_reporting(0);
session_start();
function loggedin()
{
if(isset($_SESSION['jr76$*5@#h^fg@&@65'])&&!empty($_SESSION['jr76$*5@#h^fg@&@65'])) // This is the session variable which is stored during login you can replace with the one you used
 return true;
else
return false;
}
?>