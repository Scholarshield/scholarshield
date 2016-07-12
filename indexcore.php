<!DOCTYPE html>
<html>
<head>

<script
src="http://maps.googleapis.com/maps/api/js">
</script>

<script>
var infowindow = new google.maps.InfoWindow(),bustype="getschoolbus",routetype = "busroute",showstop = "null",markerx, i,removemarkers = [],singimei="null";

$("#overall-phisicmem").click(function()
{
  event.preventDefault();
  $("#panel-default").hide(500);
  $("#panel-tblbasic").show();
  bustype = "getcmpschoolbus";
  showstop = "showstoppage";
  singimei="null";
  routetype = "cmpbusroute";
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
          $("#cmprtdet").html(xmlhttp.responseText);
        }
     };
     xmlhttp.open('POST','details.php',true);
     xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
     xmlhttp.send('getschoolbus='+bustype);

});


function convertLat(lati)
{
var latinew=lati.split("");
var lat1=latinew[0];
var lat2=latinew[1];
var latL=lat1+''+lat2;
var latR=latinew[2]+''+latinew[3]+''+latinew[4]+''+latinew[5]+''+latinew[6]+''+latinew[7]+''+latinew[8];
var latRR=latR/60;
var lati1=+latL + +latRR;
return lati1;
}

function convertLong(longi){
var longi=longi.slice(1);
var longinew=longi.split("");
var longL=longinew[0]+longinew[1];
var longR=longinew[2]+longinew[3]+longinew[4]+longinew[5]+longinew[6]+longinew[7]+longinew[8];
var longiRR=longR/60;
var longi=+longL + +longiRR;
return longi;
}

function showcompletedroute(path,event)
{
   busimei = path.className.split(" ")[4];
   startbt = path.value.split(" ")[0];
   stopbt = path.value.split(" ")[1];
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
          busrouteres = JSON.parse(xmlhttp.responseText);
        }
     };
     xmlhttp.open('POST','details.php',true);
     xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
     xmlhttp.send('busroute='+routetype+'&imei='+busimei+'&starttime='+startbt+'&stoptime='+stopbt);
     initialize();
     $("#myMapModal").modal({backdrop: 'static', keyboard: false});
};

function init() {
    var map1;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap'
    };
$("#overall-diskspace").click(function()
{
   event.preventDefault();
   $("#panel-default").show();
   $("#panel-tblbasic").hide();
   showstop = "showstoppage";
   bustype = "getactschoolbus";
   routetype = "actbusroute";
   singimei="null";
   refreshloc();
   refreshloc1();
});

$("#overall-bandwidth").click(function()
{  
   event.preventDefault();
   $("#panel-tblbasic").hide();
   $("#panel-default").show();
   showstop = "null";
   bustype = "getschoolbus";
   routetype = "busroute";
   singimei="null";
   refreshloc();
   refreshloc1();
});
    // Display a map on the page
    map1 = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
    map1.setTilt(45);
var iconact = 'http://maps.google.com/mapfiles/ms/icons/green-dot.png';
function refreshloc()
{
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
          var response = JSON.parse(xmlhttp.responseText);
          loadmap(response);       
        }
     };
     xmlhttp.open('POST','details.php',true);
     xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
     xmlhttp.send('getschoolbus='+bustype+'&singbsimei='+singimei);

function loadmap(locations)
{
  for (i = 0; i < locations.length; i++) {

        if(locations[i].TRIP_CHECK==1)
        {
           markerx = new google.maps.Marker({
           position: new google.maps.LatLng(convertLat(locations[i].LATITUDE),convertLong(locations[i].LONGITUDE)),
           map: map1,
           icon: iconact
           });
        }
        else
        {
           markerx = new google.maps.Marker({
           position: new google.maps.LatLng(convertLat(locations[i].LATITUDE),convertLong(locations[i].LONGITUDE)),
           map: map1
           });
        }
    removemarkers.push(markerx);
    $("ul#changeMapRegion").append('<li><a href="#" class="showsingle '+locations[i].IMEI+'">'+locations[i].BUS_NUMBER+'</a></li>');

    $(".showsingle").click(function()
    {
      event.preventDefault();
      bustype = "getsingleschoolbus";
      singimei = this.className.split(" ")[1];
      refreshloc();
      refreshloc1();
    });

    google.maps.event.addListener(markerx, 'click', (function (markerx, i){

        return function () {
            busimei = locations[i].IMEI;
            routeid = locations[i].ROUTE_ID;
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
          busrouteres = JSON.parse(xmlhttp.responseText);
        }
     };
     xmlhttp.open('POST','details.php',true);
     xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
     xmlhttp.send('busroute='+routetype+'&imei='+busimei);

             initialize();
            $("#myMapModal").modal({backdrop: 'static', keyboard: false});
        }
    })(markerx, i));

    google.maps.event.addListener(markerx, 'mouseover', (function (markerx, i) {

        return function () {
            infowindow.setContent('Driver Name:'+locations[i].DRIVER_NAME+'<br>Driver Number:'+locations[i].DRIVER_NUMBER+'<br>Bus Number:'+locations[i].BUS_NUMBER);
            infowindow.open(map1, markerx);
        }
    })(markerx, i));
  }
 }
  for (var j = 0; j < removemarkers.length; j++) {
    removemarkers[j].setMap(null);
   $("ul#changeMapRegion").html('');
 }
  removemarkers = [];
}

function refreshloc1()
{
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
          var response1 = JSON.parse(xmlhttp.responseText);
          loadmap1(response1);
        }
     };
     xmlhttp.open('POST','details.php',true);
     xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
     xmlhttp.send('getschoolbus='+bustype+'&singbsimei='+singimei);

function loadmap1(locations1)
{
  for (i = 0; i < locations1.length; i++) {

        bounds.extend(new google.maps.LatLng(convertLat(locations1[i].LATITUDE),convertLong(locations1[i].LONGITUDE)));
        map1.fitBounds(bounds);

  }
  bounds = new google.maps.LatLngBounds();
 }
}
refreshloc1();
refreshloc();
var maprefresh = setInterval(refreshloc,30000);
var maprefresh1 = setInterval(refreshloc1,180000);
}
google.maps.event.addDomListener(window, 'load', init);

var map;

var delstoppoint= [],markstop,points = [],markerend,markerend1,deletepoints = [],deletepoints1 = [];
function initialize() {

map = new google.maps.Map(document.getElementById('busmap'), {
    zoom: 13,
    center: new google.maps.LatLng(convertLat(busrouteres[Math.round(busrouteres.length-1)].LATITUDE),convertLong(busrouteres[Math.round(busrouteres.length-1)].LONGITUDE)),
    mapTypeId: google.maps.MapTypeId.ROADMAP
});
refroute();
loadstop();
function loadstop()
{
    if(showstop === "showstoppage")
     {
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
          stoppageres = JSON.parse(xmlhttp.responseText);
          loadstoppoints(stoppageres);
        }
     };
     xmlhttp.open('POST','details.php',true);
     xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
     xmlhttp.send('routeid='+routeid);
     }
     else
     {
       showstop = "null";
     }


  function loadstoppoints(stoplocation)
  {
    for (var s = 0; s < stoplocation.length; s++) {

           markstop = new google.maps.Marker({
           position: new google.maps.LatLng(stoplocation[s].LATITUDE,stoplocation[s].LONGITUDE),
           map: map,
           icon: 'stopball.png'
           });
    delstoppoint.push(markstop);
    google.maps.event.addListener(markstop, 'click', (function (markstop, s) {

        return function () {
            infowindow.setContent('Stop Name: '+stoplocation[s].STOPPAGE_NAME);
            infowindow.open(map, markstop);
        }
    })(markstop, s));

    }
  }
}

function refroute()
{
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
          busrouteres = JSON.parse(xmlhttp.responseText);
        }
     };
     xmlhttp.open('POST','details.php',true);
     xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
     if(routetype=='cmpbusroute')
     {
      xmlhttp.send('busroute='+routetype+'&imei='+busimei+'&starttime='+startbt+'&stoptime='+stopbt);
     }
     else
     {
       xmlhttp.send('busroute='+routetype+'&imei='+busimei);
     }

  for(var k=0;k<busrouteres.length;k++)
   {
     points.push(new google.maps.LatLng(convertLat(busrouteres[k].LATITUDE),convertLong(busrouteres[k].LONGITUDE)));
   }
   for (var i = 0; i < deletepoints.length; i++) {
    deletepoints[i].setMap(null);
    deletepoints1[i].setMap(null);
 }
  deletepoints = [];
  deletepoints1 = [];
   for(var l=0;l<1;l++)
   {
    markerend = new google.maps.Marker({
        position: new google.maps.LatLng(convertLat(busrouteres[busrouteres.length-1].LATITUDE),convertLong(busrouteres[busrouteres.length-1].LONGITUDE)),
        map: map,
        icon:'newbusicon.png'
    });
    markerend1 = new google.maps.Marker({
        position: new google.maps.LatLng(convertLat(busrouteres[0].LATITUDE),convertLong(busrouteres[0].LONGITUDE)),
        map: map
    });
    deletepoints.push(markerend);
    deletepoints1.push(markerend1);
    }
  var flightPath=new google.maps.Polyline({
  path:points,
  strokeColor:"#0000FF",
  strokeOpacity:0.8,
  strokeWeight:4
  });
flightPath.setMap(map);
points = [];


$(".resetpath").click(function()
{
  flightPath.setMap(null);
  busrouteres = null;
  busimei = null;
  for (var n = 0; n < delstoppoint.length; n++) {
    delstoppoint[n].setMap(null);
 }
  delstoppoint = [];
});

}
var routerefresh = setInterval(refroute,30000);
}

google.maps.event.addDomListener(window, "resize", resizingMap());

$('#myMapModal').on('show.bs.modal', function() {
   //Must wait until the render of the modal appear, thats why we use the resizeMap and NOT resizingMap!! ;-)
   resizeMap();
})

function resizeMap() {
   if(typeof map =="undefined") return;
   setTimeout( function(){resizingMap();} , 400);
}

function resizingMap() {
   if(typeof map =="undefined") return;
   var center = map.getCenter();
   google.maps.event.trigger(map, "resize");
   map.setCenter(center);
}

</script>

</head>

<body>
</body>
</html>