<?php
session_start();
include "../../config.php";
if(empty($_SESSION['id']))
		{
			 ?>
			 <script> window.location.href="login.php";</script>
			 <?php 
		}else{
			$user_id = $_SESSION['id'];
		}
$query= $class->fetchdata(" select * from users where id='$user_id'");
$data=$query->fetch(PDO::FETCH_ASSOC);
if($data['role']=="admin")
{
?>
<script> window.location.href="logout.php";</script>
<?php 	
}
$checkD=$class->fetchdata("SELECT * FROM `notification` WHERE toNot = '$user_id'");
?>		

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

	   <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<style>

fieldset.scheduler-border {
    border: 1px groove #ddd !important;
    padding: 0 1.4em 1.4em 1.4em !important;
    margin: 0 0 1.5em 0 !important;
    -webkit-box-shadow:  0px 0px 0px 0px #000;
            box-shadow:  0px 0px 0px 0px #000;
}

    legend.scheduler-border {
        font-size: 1.2em !important;
        font-weight: bold !important;
        text-align: left !important;
        width:auto;
        padding:0 10px;
        border-bottom:none;
    }
</style>

</head>

<body>

    <div id="wrapper">
 
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Hi ! <span style="text-transform:capitalize;"><?php echo $data['name'];?></span></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
<?php
echo $checkD->rowCount()." New ";
?>
 <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                       <?php
					     while($notData=$checkD->fetch(PDO::FETCH_ASSOC))
						   {
					   ?>					   
							<li>
                            <a href="notifications.php">
                                <div>
                                    
                                    <span class="pull-right text-muted">
                                        <em hidden><?php echo $notData['title'];?></em>
                                    </span>
                                </div>
                                <div><?php echo $notData['title'];?></div>
                            </a>
                        </li>
						<?php
						   }
						   ?>
                        <li class="divider"></li>
                      
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
               
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="index.php"><i class="fa fa-check-square-o fa-fw"></i> All Applied Programs</a>
                        </li>
                        <li><a href="account_settings.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
			   <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="hidden sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                         <li>
                            <a href="../../index.php"><i class="fa fa-page fa-fw"></i>Go To Main Page</a>
                        </li>
						<li>
                            <a href="instruction.php"><i class="fa fa-info fa-fw"></i> Instructions</a>
                        </li>
						 
                        <li>
                            <a href="personal_details.php"><i class="fa fa-user fa-fw"></i> Personal Details</a>
                        </li>
                        <li>
                            <a href="address_details.php"><i class="fa fa-map-marker fa-fw"></i> Address Details</a>
                        </li>
                      
                        <li>
                            <a href="educational_details.php"><i class="fa fa-star fa-fw"></i> Education Details</a>
                           
                        </li>
                        
						 <li>
                            <a href="upload_documents.php"><i class="	fa fa-file-word-o"></i> Document Upload</a>
                        </li>
						
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>