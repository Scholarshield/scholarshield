 

 $("input.childsrch").keyup(function(event)
    {
      event.preventDefault();
      var ps = $(this).val();
      var sclid = $("#schlid").val();
      if(/^[a-zA-Z ]*$/gm.test(ps))
      {
        $("i.loadsrh").addClass("fa fa-refresh fa-spin fa-lg");
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
          $("i.loadsrh").removeClass("fa fa-refresh fa-spin fa-lg");
          $("li.srchrslts").html(xmlhttp.responseText);
        }
     };
     xmlhttp.open('POST','search.php',true);
     xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
     xmlhttp.send('childsrch='+ps+'&sclid='+sclid);
     }
     else
     {
       $("li.srchrslts").text('Oops!are you trying right words?');
     }
    });
    
 $("input[name=secname]").keyup(function(event)
    {
      event.preventDefault();
      var clssrch = $("input[name=classname]").val();
      var secsrch = $("input[name=secname]").val();
      var sclid = $("#schlid").val();
      if(/^[a-z0-9A-Z ]*$/gm.test(clssrch) && /^[a-z0-9A-Z ]*$/gm.test(secsrch))
      {
        $("i.loadsrh1").addClass("fa fa-refresh fa-spin fa-lg");
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
          $("i.loadsrh1").removeClass("fa fa-refresh fa-spin fa-lg");
          $("li.srchrslts1").html(xmlhttp.responseText);
        }
     };
     xmlhttp.open('POST','search.php',true);
     xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
     xmlhttp.send('classsrch=classsrch&clsname='+clssrch+'&secname='+secsrch+'&sclid='+sclid);
     }
     else
     {
       $("li.srchrslts1").text('Oops!are you trying right words?');
     }
    });

 $("input.bussrch").keyup(function(event)
    {
      event.preventDefault();
      var busscrch = $(this).val();
      var sclid = $("#schlid").val();
      if(/^[a-z0-9A-Z ]*$/gm.test(busscrch))
      {
        $("i.loadsrh2").addClass("fa fa-refresh fa-spin fa-lg");
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
          $("i.loadsrh2").removeClass("fa fa-refresh fa-spin fa-lg");
          $("li.srchrslts2").html(xmlhttp.responseText);
        }
     };
     xmlhttp.open('POST','search.php',true);
     xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
     xmlhttp.send('bussrch=bussrch&busid='+busscrch+'&sclid='+sclid);
     }
     else
     {
       $("li.srchrslts2").text('Oops!are you trying right words?');
     }
    });
