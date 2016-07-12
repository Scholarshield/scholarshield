<!DOCTYPE html>
<html lang="en">
<head>
  <title>Search</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>

      <input id="schlid" size="16" placeholder="schoolid" type="text">
       <p> Search by Name</p>
       <form class="form-inline" role="form">
        <div class="form-group dropdown">
          <label for="focusedInput"></label>
          <input class="form-control dropdown-toggle childsrch" data-toggle="dropdown" size="60" placeholder="Search with name" type="text">
           <ul class="dropdown-menu">
            <li style="text-align:center;"><i class="loadsrh"></i></li>
            <li class="srchrslts"></li>
           </ul>
        </div>
       </form>
      <p> Search by Classandsection</p>
       <form class="form-inline" role="form">
        <div class="form-group dropdown">
          <label for="focusedInput"></label>
          <input class="form-control dropdown-toggle" name="classname" data-toggle="dropdown" size="60" placeholder="Enter Class" type="text">
          <input class="form-control" name="secname" size="10" placeholder="Enter section" type="text">
           <ul class="dropdown-menu">
            <li style="text-align:center;"><i class="loadsrh1"></i></li>
            <li class="srchrslts1"></li>
           </ul>
        </div>
       </form>
       <p> Search by Busid</p>
       <form class="form-inline" role="form">
        <div class="form-group dropdown">
          <label for="focusedInput"></label>
          <input class="form-control dropdown-toggle bussrch" data-toggle="dropdown" size="60" placeholder="Search with Busid" type="text">
           <ul class="dropdown-menu">
            <li style="text-align:center;"><i class="loadsrh2"></i></li>
            <li class="srchrslts2"></li>
           </ul>
        </div>
       </form>

<script type="text/javascript" src="javascript.js"></script>

</body> 
</html>