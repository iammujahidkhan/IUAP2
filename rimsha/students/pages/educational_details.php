<?php
require_once "header.php";
$programD=$class->fetchdata("SELECT * FROM student_e_detail where user_id='$user_id'");
$Details=$programD->fetch(PDO::FETCH_ASSOC);
if($Details['degree']=="Inter/Fsc/A-level")
{
?>
<style>
#ms,#bs,#ba{
	display:none;
}
</style>
<?php	
}else if($Details['degree']=="BS/MSC")
{
?>
<style>
#ms,#ba{
	display:none;
}
</style>
<?php	
}else if($Details['degree']=="BA/BSC/BCOM/BBA")
{
?>
<style>
#ms,#bs{
	display:none;
}
</style>
<?php	
}
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Educational Details</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
               <div class="panel panel-primary">
				<div class="panel-heading">Enter Your Educational Details</div>
				<div class="panel-body">
<?php

if(isset($_POST['done']))
{
$degree= $_POST['degree'];
$MS_passing_year= $_POST['MS_passing_year'];
$MS_board= $_POST['MS_board'];
$MS_subject= $_POST['MS_subject'];
$MS_max_marks= $_POST['MS_max_marks'];
$MS_obtain_marks= $_POST['MS_obtain_marks'];


$BS_passing_year= $_POST['BS_passing_year'];
$BS_board= $_POST['BS_board'];
$BS_subject= $_POST['BS_subject'];
$BS_max_marks= $_POST['BS_max_marks'];
$BS_obtain_marks= $_POST['BS_obtain_marks'];

$BA_passing_year= $_POST['BA_passing_year'];
$BA_board= $_POST['BA_board'];
$BA_subject= $_POST['BA_subject'];
$BA_max_marks= $_POST['BA_max_marks'];
$BA_obtain_marks= $_POST['BA_obtain_marks'];

$Inter_passing_year= $_POST['Inter_passing_year'];
$Inter_board= $_POST['Inter_board'];
$Inter_subject= $_POST['Inter_subject'];
$Inter_max_marks= $_POST['Inter_max_marks'];
$Inter_obtain_marks= $_POST['Inter_obtain_marks'];

$Matric_passing_year= $_POST['Matric_passing_year'];
$Matric_board= $_POST['Matric_board'];
$Matric_subject= $_POST['Matric_subjects'];
$Matric_max_marks= $_POST['Matric_max_marks'];
$Matric_obtain_marks= $_POST['Matric_obtain_marks'];
		
$query=$class->insert("INSERT INTO `student_e_detail`(`user_id`, `degree`, `ms_pass_year`, `bs_pass_year`, `ba_pass_year`, `fa_pass_year`, `ssc_pass_year`, `ms_uni_board`, `bs_uni_board`, `ba_uni_board`, `fa_uni_board`, `ssc_uni_board`, `ms_sub`, `bs_sub`, `ba_sub`, `fa_sub`, `ssc_sub`, `ms_max_marks`, `bs_max_marks`, `ba_max_marks`, `fa_max_marks`, `ssc_max_marks`, `ms_obtained`, `bs_obtained`, `ba_obtained`, `fa_obtained`, `ssc_obtained`) VALUES('$user_id','$degree','$MS_passing_year','$BS_passing_year','$BA_passing_year','$Inter_passing_year','$Matric_passing_year','$MS_board','$BS_board','$BA_board','$Inter_board','$Matric_board','$MS_subject','$BS_subject','$BA_subject','$Inter_subject','$Matric_subject','$MS_max_marks','$BS_max_marks','$BA_max_marks','$Inter_max_marks','$Matric_max_marks','$MS_obtain_marks','$BS_obtain_marks','$BA_obtain_marks','$Inter_obtain_marks','$Matric_obtain_marks')");
			if($query){
			//$class->redirect("program_details.php?pId=1");
			?>
			<script> window.location.href="upload_documents.php";</script>
			<?php
			}
			else{
				echo "Error";
				}
	
}
if(isset($_POST['update']))
{
$degree= $_POST['degree'];
$MS_passing_year= $_POST['MS_passing_year'];
$MS_board= $_POST['MS_board'];
$MS_subject= $_POST['MS_subject'];
$MS_max_marks= $_POST['MS_max_marks'];
$MS_obtain_marks= $_POST['MS_obtain_marks'];


$BS_passing_year= $_POST['BS_passing_year'];
$BS_board= $_POST['BS_board'];
$BS_subject= $_POST['BS_subject'];
$BS_max_marks= $_POST['BS_max_marks'];
$BS_obtain_marks= $_POST['BS_obtain_marks'];

$BA_passing_year= $_POST['BA_passing_year'];
$BA_board= $_POST['BA_board'];
$BA_subject= $_POST['BA_subject'];
$BA_max_marks= $_POST['BA_max_marks'];
$BA_obtain_marks= $_POST['BA_obtain_marks'];

$Inter_passing_year= $_POST['Inter_passing_year'];
$Inter_board= $_POST['Inter_board'];
$Inter_subject= $_POST['Inter_subject'];
$Inter_max_marks= $_POST['Inter_max_marks'];
$Inter_obtain_marks= $_POST['Inter_obtain_marks'];

$Matric_passing_year= $_POST['Matric_passing_year'];
$Matric_board= $_POST['Matric_board'];
$Matric_subject= $_POST['Matric_subjects'];
$Matric_max_marks= $_POST['Matric_max_marks'];
$Matric_obtain_marks= $_POST['Matric_obtain_marks'];
		
$query=$class->insert("UPDATE `student_e_detail` SET 
`degree`='$degree', `ms_pass_year`='$MS_passing_year', `bs_pass_year`='$BS_passing_year', `ba_pass_year` = '$BA_passing_year', `fa_pass_year` = '$Inter_passing_year', `ssc_pass_year`='$Matric_passing_year', `ms_uni_board`='$MS_board', `bs_uni_board`='$BS_board', `ba_uni_board`='$BA_board', `fa_uni_board`='$Inter_board', `ssc_uni_board`='$Matric_board', `ms_sub`='$MS_subject', `bs_sub`='$BS_subject', `ba_sub`='$BA_subject', `fa_sub`='$Inter_subject', `ssc_sub`='$Matric_subject', `ms_max_marks`='$MS_max_marks', `bs_max_marks`='$BS_max_marks', `ba_max_marks`='$BA_max_marks', `fa_max_marks`='$Inter_max_marks', `ssc_max_marks`='$Matric_max_marks', `ms_obtained`='$MS_obtain_marks', `bs_obtained`='$BS_obtain_marks', `ba_obtained`='$BA_obtain_marks', `fa_obtained` = '$Inter_obtain_marks', `ssc_obtained`='$Matric_obtain_marks' where user_id = '$user_id'");


			if($query){
			//$class->redirect("program_details.php?pId=1");
			?>
			<script> window.location.href="upload_documents.php";</script>
			<?php
			}
			else{
				echo "Error";
				}	
}
?>				
<form class="form-horizontal" method="post">  
  <div class="form-group">
    <label class="control-label col-sm-2" for="email"><span class="star">*</span>Latest Degree:</label>
    <div class="col-sm-4">
    <select class="form-control" id="mySelect" name="degree" required onchange="valueselect();">
    <option value="">Select Degree</option>
	<option value="MS/MPHILL" <?php if($Details['degree']=='MS/MPHILL'){ echo 'selected';}?>>MS/MPHILL</option>
	<option value="BS/MSC" <?php if($Details['degree']=='BS/MSC'){ echo 'selected';}?>>BS/MSC</option>
    <option value="BA/BSC/BCOM/BBA" <?php if($Details['degree']=='BA/BSC/BCOM/BBA'){ echo 'selected';}?>>BA/BSC/BCOM/BBA</option>
	<option value="Inter/Fsc/A-level" <?php if($Details['degree']=='Inter/Fsc/A-level'){ echo 'selected';}?>>Inter/Fsc/A-level</option>
  </select>
    </div>
  </div>
  
 
	<fieldset class="scheduler-border" id="ms" >
    <legend class="scheduler-border">MS/MPHILL</legend>
   <div class="form-group">
    <label class="control-label col-sm-2" for="email"><span class="star">*</span>Year of Passsing:</label>
    <div class="col-sm-4">
  <select class="form-control" name="MS_passing_year" >
  <option value="">---</option>
  <option value="2010" <?php if($Details['ms_pass_year']=='2010'){ echo 'selected';}?>>2010</option>
  <option value="2011" <?php if($Details['ms_pass_year']=='2011'){ echo 'selected';}?>>2011</option>
  <option value="2012" <?php if($Details['ms_pass_year']=='2012'){ echo 'selected';}?>>2012</option>
  <option value="2013" <?php if($Details['ms_pass_year']=='2013'){ echo 'selected';}?>>2013</option>
  <option value="2014" <?php if($Details['ms_pass_year']=='2014'){ echo 'selected';}?>>2014</option>
  <option value="2015" <?php if($Details['ms_pass_year']=='2015'){ echo 'selected';}?>>2015</option>
  <option value="2016" <?php if($Details['ms_pass_year']=='2016'){ echo 'selected';}?>>2016</option>
  <option value="2017" <?php if($Details['ms_pass_year']=='2017'){ echo 'selected';}?>>2017</option>
  <option value="2018" <?php if($Details['ms_pass_year']=='2018'){ echo 'selected';}?>>2018</option>
  
  </select>

    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="email"><span class="star">*</span>University:</label>
    <div class="col-sm-4">
    <input type="text" class="form-control" value="<?php echo $Details['ms_uni_board'];?>"  name="MS_board"  >
    </div>
	
  </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="email"><span class="star">*</span>Subjects:</label>
    <div class="col-sm-4">
    <input type="text" class="form-control" value="<?php echo $Details['ms_sub'];?>"  name="MS_subject"  >
    </div>
	</div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="email"><span class="star">*</span>Max Marks:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" value="<?php echo $Details['ms_max_marks'];?>"  name="MS_max_marks"  >
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="email"><span class="star">*</span>Obtained Marks:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" value="<?php echo $Details['ms_obtained'];?>"  name="MS_obtain_marks"  >
    </div>
  </div>
 

</fieldset>

	<fieldset class="scheduler-border" id="bs" >
    <legend class="scheduler-border">BS/MSC</legend>
   <div class="form-group">
    <label class="control-label col-sm-2" for="email"><span class="star">*</span>Year of Passsing:</label>
    <div class="col-sm-4">
  <select class="form-control" name="BS_passing_year" >
  <option value="">---</option>
  <option value="2010" <?php if($Details['bs_pass_year']=='2010'){ echo 'selected';}?>>2010</option>
  <option value="2011" <?php if($Details['bs_pass_year']=='2011'){ echo 'selected';}?>>2011</option>
  <option value="2012" <?php if($Details['bs_pass_year']=='2012'){ echo 'selected';}?>>2012</option>
  <option value="2013" <?php if($Details['bs_pass_year']=='2013'){ echo 'selected';}?>>2013</option>
  <option value="2014" <?php if($Details['bs_pass_year']=='2014'){ echo 'selected';}?>>2014</option>
  <option value="2015" <?php if($Details['bs_pass_year']=='2015'){ echo 'selected';}?>>2015</option>
  <option value="2016" <?php if($Details['bs_pass_year']=='2016'){ echo 'selected';}?>>2016</option>
  <option value="2017" <?php if($Details['bs_pass_year']=='2017'){ echo 'selected';}?>>2017</option>
  <option value="2018" <?php if($Details['bs_pass_year']=='2018'){ echo 'selected';}?>>2018</option>
  
  </select>

    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="email"><span class="star">*</span>University:</label>
    <div class="col-sm-4">
    <input type="text" class="form-control" value="<?php echo $Details['bs_uni_board'];?>"  name="BS_board"  >
    </div>
	
  </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="email"><span class="star">*</span>Subjects:</label>
    <div class="col-sm-4">
    <input type="text" class="form-control" value="<?php echo $Details['bs_sub'];?>"  name="BS_subject"  >
    </div>
	</div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="email"><span class="star">*</span>Max Marks:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" value="<?php echo $Details['bs_max_marks'];?>"  name="BS_max_marks"  >
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="email"><span class="star">*</span>Obtained Marks:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" value="<?php echo $Details['bs_obtained'];?>"  name="BS_obtain_marks"  >
    </div>
  </div>
 

</fieldset>

	<fieldset class="scheduler-border" id="ba" >
    <legend class="scheduler-border">BA/BSC/BCOM/BBA</legend>
   <div class="form-group">
    <label class="control-label col-sm-2" for="email"><span class="star">*</span>Year of Passsing:</label>
    <div class="col-sm-4">
  <select class="form-control" name="BA_passing_year" >
  <option value="">---</option>
  <option value="2010" <?php if($Details['ba_pass_year']=='2010'){ echo 'selected';}?>>2010</option>
  <option value="2011" <?php if($Details['ba_pass_year']=='2011'){ echo 'selected';}?>>2011</option>
  <option value="2012" <?php if($Details['ba_pass_year']=='2012'){ echo 'selected';}?>>2012</option>
  <option value="2013" <?php if($Details['ba_pass_year']=='2013'){ echo 'selected';}?>>2013</option>
  <option value="2014" <?php if($Details['ba_pass_year']=='2014'){ echo 'selected';}?>>2014</option>
  <option value="2015" <?php if($Details['ba_pass_year']=='2015'){ echo 'selected';}?>>2015</option>
  <option value="2016" <?php if($Details['ba_pass_year']=='2016'){ echo 'selected';}?>>2016</option>
  <option value="2017" <?php if($Details['ba_pass_year']=='2017'){ echo 'selected';}?>>2017</option>
  <option value="2018" <?php if($Details['ba_pass_year']=='2018'){ echo 'selected';}?>>2018</option>
  
  </select>

    </div>
	</div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="email"><span class="star">*</span>University:</label>
    <div class="col-sm-4">
    <input type="text" class="form-control" value="<?php echo $Details['ba_uni_board'];?>"  name="BA_board"  >
    </div>
	
	</div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="email"><span class="star">*</span>Subjects:</label>
    <div class="col-sm-4">
    <input type="text" class="form-control" value="<?php echo $Details['ba_sub'];?>"  name="BA_subject"  >
    </div>
	</div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="email"><span class="star">*</span>Max Marks:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" value="<?php echo $Details['ba_max_marks'];?>"  name="BA_max_marks"  >
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="email"><span class="star">*</span>Obtained Marks:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" value="<?php echo $Details['ba_obtained'];?>"  name="BA_obtain_marks"  >
    </div>
  </div>
 

</fieldset>

  <fieldset class="scheduler-border" id="fsc" >
  <legend class="scheduler-border">Inter/Fsc/A-level/</legend>
  <div class="form-group">
  <label class="control-label col-sm-2" for="email"><span class="star">*</span>Year of Passsing:</label>
  <div class="col-sm-4">
  <select class="form-control" name="Inter_passing_year" required>
  <option value="">---</option>
  <option value="2010" <?php if($Details['fa_pass_year']=='2010'){ echo 'selected';}?>>2010</option>
  <option value="2011" <?php if($Details['fa_pass_year']=='2011'){ echo 'selected';}?>>2011</option>
  <option value="2012" <?php if($Details['fa_pass_year']=='2012'){ echo 'selected';}?>>2012</option>
  <option value="2013" <?php if($Details['fa_pass_year']=='2013'){ echo 'selected';}?>>2013</option>
  <option value="2014" <?php if($Details['fa_pass_year']=='2014'){ echo 'selected';}?>>2014</option>
  <option value="2015" <?php if($Details['fa_pass_year']=='2015'){ echo 'selected';}?>>2015</option>
  <option value="2016" <?php if($Details['fa_pass_year']=='2016'){ echo 'selected';}?>>2016</option>
  <option value="2017" <?php if($Details['fa_pass_year']=='2017'){ echo 'selected';}?>>2017</option>
  <option value="2018" <?php if($Details['fa_pass_year']=='2018'){ echo 'selected';}?>>2018</option>
  </select>
  </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="email"><span class="star">*</span>Board:</label>
    <div class="col-sm-4">
    <select class="form-control" name="Inter_board" required>
    <option value="">---</option>
<option value="Faisalabad" <?php if($Details['fa_uni_board']=='Faisalabad'){ echo 'selected';}?>>Faisalabad</option>
<option value="Bahawalpur" <?php if($Details['fa_uni_board']=='Bahawalpur'){ echo 'selected';}?>>Bahawalpur</option>
<option value="Gujranwala" <?php if($Details['fa_uni_board']=='Gujranwala'){ echo 'selected';}?>>Gujranwala</option>
<option value="Lahore" <?php if($Details['fa_uni_board']=='Lahore'){ echo 'selected';}?>>Lahore</option>
<option value="Multan" <?php if($Details['fa_uni_board']=='Multan'){ echo 'selected';}?>>Multan</option>
<option value="Rawalpindi" <?php if($Details['fa_uni_board']=='Rawalpindi'){ echo 'selected';}?>>Rawalpindi</option>
<option value="Sahiwal" <?php if($Details['fa_uni_board']=='Sahiwal'){ echo 'selected';}?>>Sahiwal</option>
<option value="Sargodha" <?php if($Details['fa_uni_board']=='Sargodha'){ echo 'selected';}?>>Sargodha</option>
<option value="Dera Ghazi Khan" <?php if($Details['fa_uni_board']=='Dera Ghazi Khan'){ echo 'selected';}?>>Dera Ghazi Khan</option>
<option value="Karachi" <?php if($Details['fa_uni_board']=='Karachi'){ echo 'selected';}?>>Karachi</option>
<option value="Sukkur" <?php if($Details['fa_uni_board']=='Sukkur'){ echo 'selected';}?>>Sukkur</option>
<option value="Hyderabad" <?php if($Details['fa_uni_board']=='Hyderabad'){ echo 'selected';}?>>Hyderabad</option>
<option value="Larkana" <?php if($Details['fa_uni_board']=='Larkana'){ echo 'selected';}?>>Larkana</option>
<option value="Mirpur Khas" <?php if($Details['fa_uni_board']=='Mirpur Khas'){ echo 'selected';}?>>Mirpur Khas</option>
<option value="Abbottabad" <?php if($Details['fa_uni_board']=='Abbottabad'){ echo 'selected';}?>>Abbottabad</option>
<option value="Bannu" <?php if($Details['fa_uni_board']=='Bannu'){ echo 'selected';}?>>Bannu</option>
<option value="Malakand" <?php if($Details['fa_uni_board']=='Malakand'){ echo 'selected';}?>>Malakand</option>
<option value="Peshawar" <?php if($Details['fa_uni_board']=='Peshawar'){ echo 'selected';}?>>Peshawar</option>
<option value="Kohat" <?php if($Details['fa_uni_board']=='Kohat'){ echo 'selected';}?>>Kohat</option>
<option value="Mardan" <?php if($Details['fa_uni_board']=='Mardan'){ echo 'selected';}?>>Mardan</option>
<option value="Swat" <?php if($Details['fa_uni_board']=='Swat'){ echo 'selected';}?>>Swat</option>
<option value="Dera Ismail Khan" <?php if($Details['fa_uni_board']=='Dera Ismail Khan'){ echo 'selected';}?>>Dera Ismail Khan</option>
<option value="Quetta" <?php if($Details['fa_uni_board']=='Quetta'){ echo 'selected';}?>>Quetta</option>
<option value="Turbat" <?php if($Details['fa_uni_board']=='Turbat'){ echo 'selected';}?>>Turbat</option>
<option value="Zhob" <?php if($Details['fa_uni_board']=='Zhob'){ echo 'selected';}?>>Zhob</option>
	</select>
    </div>
	
  </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="email"><span class="star">*</span>Subjects:</label>
    <div class="col-sm-4">
    <input type="text" class="form-control" value="<?php echo $Details['fa_sub'];?>"  name="Inter_subject" required >
    </div>
	</div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="email"><span class="star">*</span>Max Marks:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" value="<?php echo $Details['fa_max_marks'];?>"  name="Inter_max_marks" required >
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="email"><span class="star">*</span>Obtained Marks:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" value="<?php echo $Details['fa_obtained'];?>"  name="Inter_obtain_marks" required >
    </div>
  </div>
 

</fieldset>

	<fieldset class="scheduler-border" id="ssc" >
    <legend class="scheduler-border">Matric/O-level</legend>
   <div class="form-group">
    <label class="control-label col-sm-2" for="email"><span class="star">*</span>Year of Passsing:</label>
    <div class="col-sm-4">
  <select class="form-control" name="Matric_passing_year" required>
  <option value="">---</option>
  <option value="2010" <?php if($Details['ssc_pass_year']=='2010'){ echo 'selected';}?>>2010</option>
  <option value="2011" <?php if($Details['ssc_pass_year']=='2011'){ echo 'selected';}?>>2011</option>
  <option value="2012" <?php if($Details['ssc_pass_year']=='2012'){ echo 'selected';}?>>2012</option>
  <option value="2013" <?php if($Details['ssc_pass_year']=='2013'){ echo 'selected';}?>>2013</option>
  <option value="2014" <?php if($Details['ssc_pass_year']=='2014'){ echo 'selected';}?>>2014</option>
  <option value="2015" <?php if($Details['ssc_pass_year']=='2015'){ echo 'selected';}?>>2015</option>
  <option value="2016" <?php if($Details['ssc_pass_year']=='2016'){ echo 'selected';}?>>2016</option>
  <option value="2017" <?php if($Details['ssc_pass_year']=='2017'){ echo 'selected';}?>>2017</option>
  <option value="2018" <?php if($Details['ssc_pass_year']=='2018'){ echo 'selected';}?>>2018</option>
  
  </select>

    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="email"><span class="star">*</span>Board:</label>
    <div class="col-sm-4">
    <select class="form-control" name="Matric_board" required>
    <option value="">---</option>
   <option value="Faisalabad" <?php if($Details['ssc_uni_board']=='Faisalabad'){ echo 'selected';}?>>Faisalabad</option>
<option value="Bahawalpur" <?php if($Details['ssc_uni_board']=='Bahawalpur'){ echo 'selected';}?>>Bahawalpur</option>
<option value="Gujranwala" <?php if($Details['ssc_uni_board']=='Gujranwala'){ echo 'selected';}?>>Gujranwala</option>
<option value="Lahore" <?php if($Details['ssc_uni_board']=='Lahore'){ echo 'selected';}?>>Lahore</option>
<option value="Multan" <?php if($Details['ssc_uni_board']=='Multan'){ echo 'selected';}?>>Multan</option>
<option value="Rawalpindi" <?php if($Details['ssc_uni_board']=='Rawalpindi'){ echo 'selected';}?>>Rawalpindi</option>
<option value="Sahiwal" <?php if($Details['ssc_uni_board']=='Sahiwal'){ echo 'selected';}?>>Sahiwal</option>
<option value="Sargodha" <?php if($Details['ssc_uni_board']=='Sargodha'){ echo 'selected';}?>>Sargodha</option>
<option value="Dera Ghazi Khan" <?php if($Details['ssc_uni_board']=='Dera Ghazi Khan'){ echo 'selected';}?>>Dera Ghazi Khan</option>
<option value="Karachi" <?php if($Details['ssc_uni_board']=='Karachi'){ echo 'selected';}?>>Karachi</option>
<option value="Sukkur" <?php if($Details['ssc_uni_board']=='Sukkur'){ echo 'selected';}?>>Sukkur</option>
<option value="Hyderabad" <?php if($Details['ssc_uni_board']=='Hyderabad'){ echo 'selected';}?>>Hyderabad</option>
<option value="Larkana" <?php if($Details['ssc_uni_board']=='Larkana'){ echo 'selected';}?>>Larkana</option>
<option value="Mirpur Khas" <?php if($Details['ssc_uni_board']=='Mirpur Khas'){ echo 'selected';}?>>Mirpur Khas</option>
<option value="Abbottabad" <?php if($Details['ssc_uni_board']=='Abbottabad'){ echo 'selected';}?>>Abbottabad</option>
<option value="Bannu" <?php if($Details['ssc_uni_board']=='Bannu'){ echo 'selected';}?>>Bannu</option>
<option value="Malakand" <?php if($Details['ssc_uni_board']=='Malakand'){ echo 'selected';}?>>Malakand</option>
<option value="Peshawar" <?php if($Details['ssc_uni_board']=='Peshawar'){ echo 'selected';}?>>Peshawar</option>
<option value="Kohat" <?php if($Details['ssc_uni_board']=='Kohat'){ echo 'selected';}?>>Kohat</option>
<option value="Mardan" <?php if($Details['ssc_uni_board']=='Mardan'){ echo 'selected';}?>>Mardan</option>
<option value="Swat" <?php if($Details['ssc_uni_board']=='Swat'){ echo 'selected';}?>>Swat</option>
<option value="Dera Ismail Khan" <?php if($Details['ssc_uni_board']=='Dera Ismail Khan'){ echo 'selected';}?>>Dera Ismail Khan</option>
<option value="Quetta" <?php if($Details['ssc_uni_board']=='Quetta'){ echo 'selected';}?>>Quetta</option>
<option value="Turbat" <?php if($Details['ssc_uni_board']=='Turbat'){ echo 'selected';}?>>Turbat</option>
<option value="Zhob" <?php if($Details['ssc_uni_board']=='Zhob'){ echo 'selected';}?>>Zhob</option>
	</select>
    </div>
	
  </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="email"><span class="star">*</span>Subjects:</label>
    <div class="col-sm-4">
    <input type="text" class="form-control" value="<?php echo $Details['ssc_sub'];?>"  name="Matric_subjects" required >
    </div>
	</div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="email"><span class="star">*</span>Max Marks:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" value="<?php echo $Details['ssc_max_marks'];?>"  name="Matric_max_marks" required >
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="email"><span class="star">*</span>Obtained Marks:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" value="<?php echo $Details['ssc_obtained'];?>"  name="Matric_obtain_marks" required >
    </div>
  </div>
 

</fieldset>

	
 <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
	<?php
	if($programD->rowCount()>0)
	{
	?>
      <button type="submit" class="col-sm-2 btn btn-success" name="update">Update | Next</button>
	  <?php
	}else{
	?>
	 <button type="submit" class="col-sm-2 btn btn-primary" name="done">Save | Next</button>
	<?php
	}
	?>
    </div>
  </div>
</form>
				
				</div>
				</div> 
                </div>
               </div>
			 
            </div>
<script>
function valueselect()
{
	  
	  var x = document.getElementById("mySelect").value;
	  var ms = document.getElementById("ms");
	  var bs = document.getElementById("bs");
	  var ba = document.getElementById("ba");
	  var fsc = document.getElementById("fsc");
	  var ssc = document.getElementById("ssc");	 

	if(x=="MS/MPHILL")																					
	{
		ms.style.display = "block";
		bs.style.display = "block";
		ba.style.display = "block";
		fsc.style.display = "block";
		ssc.style.display = "block";
	}
	if(x=="BS/MSC")
	{
		ms.style.display = "none";
		bs.style.display = "block";
		ba.style.display = "block";
		fsc.style.display = "block";
		ssc.style.display = "block";	
	}
	if(x=="BA/BSC/BCOM/BBA")
	{
		ms.style.display = "none";
		bs.style.display = "none";
		ba.style.display = "block";
		fsc.style.display = "block";
		ssc.style.display = "block";	
	}
	if(x=="Inter/Fsc/A-level")
	{
		ms.style.display = "none";
		bs.style.display = "none";
		ba.style.display = "none";
		fsc.style.display = "block";
		ssc.style.display = "block";	
	}
	
	
}
</script>          
<?php
require_once "footer.php";
?>