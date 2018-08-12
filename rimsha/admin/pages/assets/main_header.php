<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>University</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<style>
	td,th{
		text-transform:capitalize;
		text-align:center;
	}
	</style>


</head>

<body>


<nav class="navbar navbar-default">
  <div class="container-fluid">
<ul class="nav navbar-nav">
		<li ><a href="index.php">Welcome : <?php echo $data['name'];?></a></li>
		<li ><a href="../../index.php" class="btn btn-default">Home</a></li>
	</ul>        
   
<ul class="nav navbar-nav  navbar-right">
		
		<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Log-out</a></li>
	 	
	</ul>     

  </div>
</nav>
  
<div class="container">
<div class="btn-group btn-group-justified">
  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#ModelName" aria-hidden="true">Add New Program</a>
  <a href="index.php" class="btn btn-primary">Programs</a>
  <a href="enroll.php" class="btn btn-primary">Enroll Students</a>
  <a href="meritlist.php" class="btn btn-primary">List</a>
  <a href="selected_students.php" class="btn btn-primary">Selected Students</a>
  <a href="notifications.php" class="btn btn-primary">Notification <span class="badge">
  <?php
  $notQuery= $class->fetchdata("SELECT * FROM `notification` WHERE `toNot`='$user_id'");
  echo $notQuery->rowCount();
  ?></span></a>
</div>
<br>