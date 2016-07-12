<?php
require 'logininfo.php';
if(loggedin()):
   {die(header('Location:index.php'));}
endif;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Fancy world</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
  <style>
 select {
    color:black;
    width:30%;
    border-radius:3px;
        }
  .errmsg{
  border-radius:10px 20px;padding:10px;box-shadow:2px 3px 5px yellow;width:75%;border:1px solid red;color:black;margin:auto;height:50px;
  text-align:center;font:italic 20px georgia;
         }
  </style>
  </head>
<body>

<br>
   <div class="container" style="background-color:rgb(49, 191, 179);width:80%; color:white;border-radius:48px;padding:30px;box-shadow:5px 7px 11px rgb(86,196, 92);font-family:georgia;">
    <p style="font:bold 20px georgia; text-align:center;">Login</p>
    <form method="post" class="form-horizontal" role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
     <div class="form-group" id="cl4">
      <label class="col-sm-2 control-label" for="md">Email:</label>
       <div class="col-sm-12">
        <input type="email" name="email" class="form-control" maxlength="45" id="email1" placeholder="Enter email" required="required">
        <span id="sp4"></span>
        <span id="sp9"></span>
      </div>
     </div>
     <div class="form-group" id="cl5">
      <label class="col-sm-2 control-label" for="md">Password:</label>
       <div class="col-sm-12">
        <input type="password" name="pwd" maxlength="25" class="form-control" autocomplete="off" placeholder="Enter password" required="required">
        <span id="sp5"></span>
        <span id="sp10"></span>
      </div>
     </div>
     <div class="checkbox">
      <label><input type="checkbox"> Remember me</label><br><br>
       <button type="button" class="btn btn-xs" name="submit" style="background-color: rgb(19, 92, 85);color: white;padding: 15px 20px;
       text-decoration: none; border-radius:22px 10px;box-shadow:1px 5px 22px rgb(86, 196, 92);"><i id="loadent"></i> Log in</button>
     </div>
    </form>
   </div><br>
   <div id="message"></div>

 <script type="text/javascript">
$(document).ready(function()
{

$("input[name=email]").keyup(function(event)
    {
        var ip4 = $(this).val();
      if($.trim(ip4).length < 5|| $.trim(ip4).length >45 )
      {
        event.preventDefault();
       $("#cl4").addClass("form-group has-error has-feedback");
       $("span#sp4").addClass("glyphicon glyphicon-remove form-control-feedback");
       $("span#sp9").text("Characters lengths are allowed between 5 and 45!").css("color","red").css("font-size","16px").show();
       }
      else if(!(/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/gm.test(ip4)))
      {
         event.preventDefault();
       $("#cl4").addClass("form-group has-error has-feedback");
       $("span#sp4").addClass("glyphicon glyphicon-remove form-control-feedback");
       $("span#sp9").text("Invalid email!").css("color","red").css("font-size","16px").show();
       }
      else
      {
         event.preventDefault();
        $("#cl4").removeClass("form-group has-error has-feedback");
        $("span#sp4").removeClass("glyphicon glyphicon-remove form-control-feedback");
        $("#cl4").addClass("form-group has-success has-feedback");
        $("span#sp4").addClass("glyphicon glyphicon-ok form-control-feedback");
        $("span#sp9").hide();
        }
    });
    $("input[name=pwd]").keyup(function(event)
    {
        var ip5 = $(this).val();
      if($.trim(ip5).length < 5|| $.trim(ip5).length >25 )
      {
        event.preventDefault();
        $("#cl5").addClass("form-group has-error has-feedback");
        $("span#sp5").addClass("glyphicon glyphicon-remove form-control-feedback");
        $("span#sp10").text("Characters lengths are allowed between 5 and 25!").css("color","red").css("font-size","16px").show();
        }
      else if(!(/[a-z]+/gm.test(ip5))||!(/[A-Z]+/gm.test(ip5))||!(/[0-9]+/gm.test(ip5)))
      {
         event.preventDefault();
       $("#cl5").addClass("form-group has-error has-feedback");
       $("span#sp5").addClass("glyphicon glyphicon-remove form-control-feedback");
       $("span#sp10").text("Atleast one Lowercase,one Uppercase and one Number is required!").css("color","red").css("font-size","16px").show();
       }
      else
      {
         event.preventDefault();
        $("#cl5").removeClass("form-group has-error has-feedback");
        $("span#sp5").removeClass("glyphicon glyphicon-remove form-control-feedback");
        $("#cl5").addClass("form-group has-success has-feedback");
        $("span#sp5").addClass("glyphicon glyphicon-ok form-control-feedback");
        $("span#sp10").hide();
        }
    });
    
$("input[name=email]").blur(function(event)
    {
        var ip4 = $(this).val();
      if($.trim(ip4).length < 5|| $.trim(ip4).length >45 )
      {
        event.preventDefault();
       $("#cl4").addClass("form-group has-error has-feedback");
       $("span#sp4").addClass("glyphicon glyphicon-remove form-control-feedback");
       $("span#sp9").text("Characters lengths are allowed between 5 and 45!").css("color","red").css("font-size","16px").show();
       }
      else if(!(/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/gm.test(ip4)))
      {
         event.preventDefault();
       $("#cl4").addClass("form-group has-error has-feedback");
       $("span#sp4").addClass("glyphicon glyphicon-remove form-control-feedback");
       $("span#sp9").text("Invalid email!").css("color","red").css("font-size","16px").show();
       }
      else
      {
         event.preventDefault();
        $("#cl4").removeClass("form-group has-error has-feedback");
        $("span#sp4").removeClass("glyphicon glyphicon-remove form-control-feedback");
        $("#cl4").addClass("form-group has-success has-feedback");
        $("span#sp4").addClass("glyphicon glyphicon-ok form-control-feedback");
        $("span#sp9").hide();
        }
    });
    $("input[name=pwd]").blur(function(event)
    {
        var ip5 = $(this).val();
      if($.trim(ip5).length < 5|| $.trim(ip5).length >25 )
      {
        event.preventDefault();
        $("#cl5").addClass("form-group has-error has-feedback");
        $("span#sp5").addClass("glyphicon glyphicon-remove form-control-feedback");
        $("span#sp10").text("Characters lengths are allowed between 5 and 25!").css("color","red").css("font-size","16px").show();
        }
      else if(!(/[a-z]+/gm.test(ip5))||!(/[A-Z]+/gm.test(ip5))||!(/[0-9]+/gm.test(ip5)))
      {
         event.preventDefault();
       $("#cl5").addClass("form-group has-error has-feedback");
       $("span#sp5").addClass("glyphicon glyphicon-remove form-control-feedback");
       $("span#sp10").text("Atleast one Lowercase,one Uppercase and one Number is required!").css("color","red").css("font-size","16px").show();
       }
      else                                                                                       
      {
         event.preventDefault();
        $("#cl5").removeClass("form-group has-error has-feedback");
        $("span#sp5").removeClass("glyphicon glyphicon-remove form-control-feedback");
        $("#cl5").addClass("form-group has-success has-feedback");
        $("span#sp5").addClass("glyphicon glyphicon-ok form-control-feedback");
        $("span#sp10").hide();
        }
    });

    $("button[name=submit]").click(function(event)
    {
      var sp4 = $("input[name=email]").val();
      var sp5 = $("input[name=pwd]").val();
      if($.trim(sp4).length < 5|| $.trim(sp4).length >45 )
      {
        event.preventDefault();
       $("#cl4").addClass("form-group has-error has-feedback");
       $("span#sp4").addClass("glyphicon glyphicon-remove form-control-feedback");
       $("span#sp9").text("Characters lengths are allowed between 5 and 45!").css("color","red").css("font-size","16px").show();
       }
      else if(!(/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/gm.test(sp4)))
      {
         event.preventDefault();
       $("#cl4").addClass("form-group has-error has-feedback");
       $("span#sp4").addClass("glyphicon glyphicon-remove form-control-feedback");
       $("span#sp9").text("Invalid email!").css("color","red").css("font-size","16px").show();
      }
      if($.trim(sp5).length < 5|| $.trim(sp5).length >25 )
      {
        event.preventDefault();
        $("#cl5").addClass("form-group has-error has-feedback");
        $("span#sp5").addClass("glyphicon glyphicon-remove form-control-feedback");
        $("span#sp10").text("Characters lengths are allowed between 5 and 25!").css("color","red").css("font-size","16px").show();
        }
      else if(!(/[a-z]+/gm.test(sp5))||!(/[A-Z]+/gm.test(sp5))||!(/[0-9]+/gm.test(sp5)))
      {
         event.preventDefault();
       $("#cl5").addClass("form-group has-error has-feedback");
       $("span#sp5").addClass("glyphicon glyphicon-remove form-control-feedback");
       $("span#sp10").text("Atleast one Lowercase,one Uppercase and one Number is required!").css("color","red").css("font-size","16px").show();
       }
       if($.trim(sp4).length >= 5 && $.trim(sp4).length <= 45 && (/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/gm.test(sp4))=== true && $.trim(sp5).length >= 5 && $.trim(sp5).length <= 25 && (/[a-z]+/gm.test(sp5)) === true && (/[A-Z]+/gm.test(sp5))===true && (/[0-9]+/gm.test(sp5))===true )
      {
        $(this).prop("disabled", true);
        $("i#loadent").addClass("fa fa-refresh fa-spin fa-lg");
        var xmlhttp;
    if(window.XMLHttpRequest)
     {
       xmlhttp=new XMLHttpRequest();//for mordern browsers
     }
    else
     {
       xmlhttp =new ActiveXObject ('Microsoft.XMLHTTP');//for old browsers
     }
     xmlhttp.onreadystatechange = function()//checking for a state change
     {
       if(xmlhttp.readyState==4 && xmlhttp.status == 200)//weather file is empty or not
        {
          if(xmlhttp.responseText==="l321@")
          {
            window.location.replace("index.php");
            event.preventDefault();
          }
          else
          {
          $("div#message").text(xmlhttp.responseText).addClass("errmsg");
          $("i#loadent").removeClass("fa fa-refresh fa-spin fa-lg");
          $("button[name=submit]").prop("disabled", false);
           event.preventDefault();
          }
        }
     };
     xmlhttp.open('POST','login.php',true);
     xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
     xmlhttp.send('submit=submit&email='+sp4+'&pwd='+sp5);
     }
    });
    
});
</script>
</body>
</html>