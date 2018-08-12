<?php
include "../config.php";
if(isset($_GET['id']))
{
$p_id = $_GET['id'];

$pName=$class->fetchdata("SELECT * FROM `programs` where id = '$p_id'");
$NameD=$pName->fetch(PDO::FETCH_ASSOC);

$aboutD=$class->fetchdata("SELECT * FROM `admin_about` WHERE `p_id` = '$p_id'");
$pAbout=$aboutD->fetch(PDO::FETCH_ASSOC);


$programD=$class->fetchdata("SELECT * FROM `admin_p_detail` WHERE `p_id` = '$p_id'");
$pDetails=$programD->fetch(PDO::FETCH_ASSOC);

$EligibilityD=$class->fetchdata("SELECT * FROM `admin_e_criteria` WHERE `p_id` = '$p_id'");
$pEligibility=$EligibilityD->fetch(PDO::FETCH_ASSOC);

$AdmissionD=$class->fetchdata("SELECT * FROM `admin_a_schedule` WHERE `p_id` = '$p_id'");
$pAdmission=$AdmissionD->fetch(PDO::FETCH_ASSOC);

$MeritD=$class->fetchdata("SELECT * FROM `admin_criteria_list` WHERE `p_id` = '$p_id'");
$pMerit =$MeritD->fetch(PDO::FETCH_ASSOC);

$LATED=$class->fetchdata("SELECT * FROM `admin_late_admission` WHERE `p_id` = '$p_id'");
$pLATE=$LATED->fetch(PDO::FETCH_ASSOC);


$JoinQuery = $class->fetchdata("SELECT programs.*, admin_about.*, admin_p_detail.*, admin_e_criteria.*, admin_a_schedule.*, admin_criteria_list.*, admin_late_admission.* FROM programs left join admin_about ON programs.id = admin_about.p_id left join admin_p_detail ON programs.id = admin_p_detail.p_id left join admin_e_criteria ON programs.id = admin_e_criteria.p_id left join admin_a_schedule ON programs.id = admin_a_schedule.p_id left join admin_criteria_list ON programs.id = admin_criteria_list.p_id left join admin_late_admission ON programs.id = admin_late_admission.p_id where programs.id = '$p_id'");
$JoinResult=$JoinQuery->fetch(PDO::FETCH_ASSOC);
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Super Admin</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

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
                            <li><a href="#">Details</a></li>
                            <li class="active">Full Program Details</li>
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
						 <a href="../admin/images/<?php echo $JoinResult['img'];?>" class="btn btn-info btn-outline-link">Complete Info : <?php echo $JoinResult['img'];?></a>
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


</body>
</html>
<?php
}
?>