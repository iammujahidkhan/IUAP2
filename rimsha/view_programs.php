<?php
session_start();
if(!empty($_SESSION['id']))
{
$user_id = $_SESSION['id'];	
}


include "config.php";
$p_id = $_GET['id'];
if(isset($_GET['id']))
{

$pName=$class->fetchdata("SELECT * FROM `programs` where id = '$p_id'");
$NameD=$pName->fetch(PDO::FETCH_ASSOC);

if(!empty($_SESSION['id']))
{
$EligibilityD=$class->fetchdata("SELECT * FROM `admin_e_criteria` WHERE `p_id` = '$p_id'");
$pEligibility=$EligibilityD->fetch(PDO::FETCH_ASSOC);

$AdmissionD=$class->fetchdata("SELECT * FROM `student_e_detail` WHERE `user_id` = '$user_id'");
$student_e_detail=$AdmissionD->fetch(PDO::FETCH_ASSOC);
}

$JoinQuery = $class->fetchdata("SELECT programs.*, admin_about.*, admin_p_detail.*, admin_e_criteria.*, admin_a_schedule.*, admin_criteria_list.*, admin_late_admission.* FROM programs left join admin_about ON programs.id = admin_about.p_id left join admin_p_detail ON programs.id = admin_p_detail.p_id left join admin_e_criteria ON programs.id = admin_e_criteria.p_id left join admin_a_schedule ON programs.id = admin_a_schedule.p_id left join admin_criteria_list ON programs.id = admin_criteria_list.p_id left join admin_late_admission ON programs.id = admin_late_admission.p_id where programs.id = '$p_id'");
$JoinResult=$JoinQuery->fetch(PDO::FETCH_ASSOC);

							
}
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>View Full Course</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="superadmin/assets/css/normalize.css">
    <link rel="stylesheet" href="superadmin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="superadmin/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="superadmin/assets/css/themify-icons.css">
    <link rel="stylesheet" href="superadmin/assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="superadmin/assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="superadmin/assets/scss/style.css">
    <link href="superadminassets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

<style>
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 80%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

/* The Close Button */
.close {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.modal-header {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
}
</style>
</head>
<body>


      

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

       <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a href="index.php"><i class="fa fa fa-tasks"></i> Home</a>
                   
                </div>

           </div>

        </header><!-- /header -->
		
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Full Program Details</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
						
                            <li>
							<?php
							if(empty($_SESSION['id']))
							{
							?>
							<button id="myBtn" onClick="applied();" class="btn btn-info"> Apply for Program</button>
							<?php
							}else{
							if (new DateTime() >= new DateTime($JoinResult['admission_date'])) {
							# current time is greater than 2010-05-15 16:00:00 and thus in the past
							?>
							
							<div class="col-md-6">
							<button  class="btn btn-danger"> Admission Closed</button>
							</div>
							
							<?php 
							}else
							{
							$student_e_detail_q=$class->fetchdata("SELECT * FROM `student_e_detail` where user_id = '$_SESSION[id]'");
							if($student_e_detail_q->rowCount()==0)
							{?>
						<button onClick="checkData();" class="btn btn-info"> Apply for Program</button>
							<?php
							}else{
							
							$pName=$class->fetchdata("SELECT * FROM `course_enrolled` where p_id = '$p_id' and user_id = '$_SESSION[id]'");
							$NameD=$pName->fetch(PDO::FETCH_ASSOC);
							if($JoinResult['user_id']==$_SESSION['id'])
							{
								
							}else{
							if($pName->rowCount()>0)
							{
							?>
						    <a href="applying.php?cancel=cancel&id=<?php echo $p_id;?>&user_id=<?php echo $_SESSION['id'];?>" class="btn btn-danger"> Cancel Apply for Program</a>
							<?php
							}else{
									//echo $student_e_detail['degree']."<br>";
									//echo $pEligibility['program']."<br>";
									 $required_Ssc = str_replace("%","",$pEligibility['matric_marks']);
									 $requiredFa = str_replace("%","",$pEligibility['inter_marks'])."<br>";
									
									 $student_e_detail['fa_max_marks']."<br>";
									 $student_e_detail['fa_obtained']."<br>";	
									 $fscMarks = ceil($student_e_detail['fa_obtained']*100/$student_e_detail['fa_max_marks']);
									//echo $student_e_detail['ssc_obtained']."<br>";
									//echo $student_e_detail['ssc_max_marks']."<br>";
									 $sscMarks = ceil($student_e_detail['ssc_obtained']*100/$student_e_detail['ssc_max_marks']);
							if($sscMarks>=$required_Ssc and $fscMarks>= $requiredFa)
										{
											
									?>
						    <a href="applying.php?id=<?php echo $p_id;?>&user_id=<?php echo $_SESSION['id'];?>" class="btn btn-info"> Apply for Program</a>
							<?php		
										}else{
								?>
						    <a href="#" class="btn btn-info"> Can't Apply for Program</a>
							<?php
								}
							}
							}
							}
							}
							}
							?>
							</li>
                            
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Programs Details</strong>
                        </div>
                        <div class="card-body">
						 <h5>Course Name : <?php echo $JoinResult['title'];?></h5>
						 <hr>
						 <h5>Offer By : <?php echo $JoinResult['uni_name'];?></h5>
						 <hr>
						 <h5>Department : <?php echo $JoinResult['uni_dept'];?></h5>
						 <hr>
						 <h5>Campus : <?php echo $JoinResult['uni_campus'];?></h5>
						 <hr>
						 <div class="row">
						 <div class="col-sm-6">
						 <h5>Maximum Duration : <?php echo $JoinResult['max_duration'];?></h5>
						 </div>
						 <div class="col-sm-6">
						 <h5>Min/imum Duration : <?php echo $JoinResult['min_duration'];?></h5>						 
						 </div>
						</div>
						<hr>
						 <div class="row">
						 <div class="col-sm-6">
						<h5>Total no of Courses : <?php echo $JoinResult['t_courses'];?></h5>
						 </div>
						 <div class="col-sm-6">
							<h5>Total Credit Hours : <?php echo $JoinResult['t_hours'];?></h5>					 
						 </div>
						</div>
						<hr>
						<br>
						 <a target="_blank" href="images/<?php echo $JoinResult['img'];?>" class="btn btn-info btn-outline-link">Complete Info : <?php echo $JoinResult['img'];?></a>
                    </div>
					</div>
                </div>
				
				 <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Eligibility Criteria</strong>
                        </div>
                        <div class="card-body">
						 <h5>Degree  : <?php echo $JoinResult['program'];
						 if($JoinResult['program']=="BA/BSC/BCOM/BBA")
						 {
						 ?>
						 </h5>
						 <hr>
						 <h5>Matric Marks : <?php echo $JoinResult['matric_marks'];?></h5>
						 <hr>
						 <h5>Inter Marks : <?php echo $JoinResult['inter_marks'];?></h5>
						 <?php
						 }else if($JoinResult['program']=="BS/MSC")
						 {
						 ?>
						 <hr>
						 <h5>Matric Marks : <?php echo $JoinResult['matric_marks'];?></h5>
						 <hr>
						 <h5>Inter Marks : <?php echo $JoinResult['inter_marks'];?></h5>
						 <hr>
						 <h5>Bachlor Marks : <?php echo $JoinResult['bachlor_marks'];?></h5>
						 <?php
						 }else if($JoinResult['program']=="MS/MPHILL")
						 {
						 ?>
						 <hr>
						 <h5>Matric Marks : <?php echo $JoinResult['matric_marks'];?></h5>
						 <hr>
						 <h5>Inter Marks : <?php echo $JoinResult['inter_marks'];?></h5>
						 <hr>
						 <h5>Bachlor Marks : <?php echo $JoinResult['bachlor_marks'];?></h5>
						 <hr>
						 <h5>Master Marks : <?php echo $JoinResult['master_marks'];?></h5>
						 <?php
						 }else if($JoinResult['program']=="PHD")
						 {?>
					     <hr>
						 <h5>Matric Marks : <?php echo $JoinResult['matric_marks'];?></h5>
						 <hr>
						 <h5>Inter Marks : <?php echo $JoinResult['inter_marks'];?></h5>
						 <hr>
						 <h5>Bachlor Marks : <?php echo $JoinResult['bachlor_marks'];?></h5>
						 <hr>
						 <h5>Master Marks : <?php echo $JoinResult['master_marks'];?></h5>
						 <hr>
						 <h5>MPhil Marks : <?php echo $JoinResult['mphil_marks'];?></h5>
						 <?php
						 }
						  if($JoinResult['type']=="enteryTest")
						  {
						 ?>
						 <hr>
						  <h5>Entery Test Required With Given Below requirements</h5>
						  <hr>
						 <div class="row">
						 <div class="col-sm-4">
						 <h5>SAT : <?php echo $JoinResult['sat'];?></h5>
						 </div>
						 <div class="col-sm-4">
						 <h5>HEC : <?php echo $JoinResult['hec'];?></h5>						 
						 </div>
						  <div class="col-sm-4">
						 <h5>NAT : <?php echo $JoinResult['nat'];?></h5>						 
						 </div>
						</div>
						<hr>
						<?php
						  }
						  ?>
						
						
						 <div class="row">
						 <div class="col-sm-6">
					<h5>Total no of Courses : <?php echo $JoinResult['t_courses'];?></h5>
						 </div>
						 <div class="col-sm-6">
					<h5>Total Credit Hours : <?php echo $JoinResult['t_hours'];?></h5>				 
						 </div>
						</div>
						<br>
						<hr>
						<div hidden>
						<h3>AGGREGATE FORMULA</h3>
						<hr> 
						 <?php
						 if($JoinResult['program']=="BA/BSC/BCOM/BBA")
						 {
						?>
						<div class="row">
						 <div class="col-sm-6">
					<h5>Matric/O-level : <?php echo $JoinResult['af_matric'];?></h5>
						 </div>
						 <div class="col-sm-6">
					<h5>Inter/Fsc/A-level/DAE/DCOM/ICOM/ICS/FA : <?php echo $JoinResult['af_inter'];?></h5>				 
						 </div>
						 </div>
						 <?php
						 }else if($JoinResult['program']=="BS/MSC")
						 {
						?>
						<div class="row">
						 <div class="col-sm-4">
					<h5>Matric/O-level : <?php echo $JoinResult['af_matric'];?></h5>
						 </div>
						 <div class="col-sm-4">
					<h5>Inter/Fsc/A-level/DAE/DCOM/ICOM/ICS/FA : <?php echo $JoinResult['af_inter'];?></h5>				 
						 </div>
						  <div class="col-sm-4">
					<h5>BA/BSC/BCOM/BBA : <?php echo $JoinResult['af_bachlor'];?></h5>				 
						 </div>
						 </div>
						 <?php
						 }else if($JoinResult['program']=="MS/MPHILL")
						 {
						?>
						<div class="row">
						 <div class="col-sm-3">
					<h5>Matric/O-level : <?php echo $JoinResult['af_matric'];?></h5>
						 </div>
						 <div class="col-sm-3">
					<h5>Inter/Fsc/A-level/DAE/DCOM/ICOM/ICS/FA : <?php echo $JoinResult['af_inter'];?></h5>				 
						 </div>
						  <div class="col-sm-3">
					<h5>BA/BSC/BCOM/BBA : <?php echo $JoinResult['af_bachlor'];?></h5>				 
						 </div>
						  <div class="col-sm-3">
					<h5>BS/MSC : <?php echo $JoinResult['af_master'];?></h5>				 
						 </div>
						 </div>
						 <?php
						 }else if($JoinResult['program']=="PHD")
						 {
						 ?>
						 
					<h5>Matric/O-level : <?php echo $JoinResult['af_matric'];?></h5>
						<hr>
					<h5>Inter/Fsc/A-level/DAE/DCOM/ICOM/ICS/FA : <?php echo $JoinResult['af_inter'];?></h5>				 
						<hr>
					<h5>BA/BSC/BCOM/BBA : <?php echo $JoinResult['af_bachlor'];?></h5>				 
						 <hr>
					<h5>BS/MSC : <?php echo $JoinResult['af_master'];?></h5>				 
						 <hr>
					<h5>MS/MPHILL : <?php echo $JoinResult['af_mphil'];?></h5>				 
						 <hr>
						 <?php
						 }
						 ?>
						</div>
						</div>
					</div>
                </div>
				
				 <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Admission Schedule</strong>
                        </div>
                        <div class="card-body">
						 <h5>Admission Date : <?php echo $JoinResult['admission_date'];?></h5>
						 <hr>
						 <h5>Test Date : <?php echo $JoinResult['test_date'];?></h5>
						 <hr>
						 <h5>Test Venue : <?php echo $JoinResult['test_venue'];?></h5>
						 <hr>
						 <h5>Test Time : <?php echo $JoinResult['test_time'];?></h5>
						 <hr>
						 <h5>Merit Date : <?php echo $JoinResult['merit_date'];?></h5>
						 <hr>
						
					
						<br>
			 </div>
					</div>
                </div>
				
				 <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Merit list criteria</strong>
                        </div>
                        <div class="card-body">
						 <h5>Total Seats : <?php echo $JoinResult['t_seats'];?></h5>
						 <hr>
						 <?php
						 if($JoinResult['quota']=="Quota System")
						 {
						 ?>
						 <h1><?php echo $JoinResult['quota']; ?></h1>
						 <hr>
						  <div class="row">
						 <div class="col-sm-6">
						 <h5>Punjab Seats : <?php echo $JoinResult['punjab'];?></h5>
						 </div>
						 <div class="col-sm-6">
						 <h5>Sindh Seats : <?php echo $JoinResult['sindh'];?></h5>						 
						 </div>
						 </div>
						 <?php
						 }else{
						 ?>
						  <h5><?php echo $JoinResult['quota'];?></h5>	
						 <?php
						 }?>
						
						<hr>
						 </div>
					</div>
                </div>
				
				 <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Fee Structure</strong>
                        </div>
                        <div class="card-body">
						 <h5>Course Name : <?php echo $JoinResult['title'];?></h5>
						 <hr>
						 <h5>Offer By : <?php echo $JoinResult['uni_name'];?></h5>
						 <hr>
						 </div>
					</div>
                </div>
				
				 <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">LATE ADMISSION POLICY</strong>
                        </div>
                        <div class="card-body">
						 <h5> "<?php echo $JoinResult['late_title'];?>"</h5>
						 <hr>
						   </div>
					</div>
                </div>
				
				
				</div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/lib/data-table/datatables-init.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        } );
    </script>


<!-- The Modal -->
<!-- modal -->
	<div class="modal about-modal " id="myModal" tabindex="-1">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header"> 
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
				</div> 
				<div class="modal-body">
					<div class="agileits-w3layouts-info">
						<p>If you want to apply for these program you Need to Sign In <h1><a href="students/pages/login.php">LogIn Here</a></h1></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //modal -->

<!-- Modal -->
  

<script>
function checkData()
{
alert("Please Fill Your Education Data then try again")
}

function applied()
{
<?php 
if(empty($_SESSION['id']))
{
?>
//alert('Need Sign In');
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
    modal.style.display = "block";

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
<?php 
}
?>
}
</script>
<?php
if(isset($_GET['message']))
{
	echo "<script>alert('$_GET[message]');</script>";
}
?>

</body>
</html>
