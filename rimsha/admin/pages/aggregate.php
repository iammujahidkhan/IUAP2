<?php
require_once "assets/header.php";
require_once "assets/sidebar.php";
$programD=$class->fetchdata("SELECT * FROM `admin_e_criteria` where p_id='$p_id' and user_id='$user_id'");



if(isset($_POST['update']))
{

$af_matric= $_POST['af_matric'];
$af_inter= $_POST['af_inter'];
$af_bachlor= $_POST['af_bachlor'];
$af_master= $_POST['af_master'];
$af_mphil= $_POST['af_mphil'];
$ahq = $_POST['ahq'];
$aet = $_POST['aet'];
$ait = $_POST['ait'];

		
$query=$class->insert("UPDATE `admin_e_criteria` SET `af_matric` = '$af_matric', `af_inter` = '$af_inter', `af_bachlor` = '$af_bachlor', `af_master` = '$af_master', `af_mphil` = '$af_mphil' , `ahq` = '$ahq' , `aet`='$aet' , `ait` = '$ait' where `p_id` = '$p_id' and `user_id`='$user_id'");
			
			if($query){
			//$class->redirect("program_details.php?pId=1");
			?>
			 <script> window.location.href="admission_schedule.php?pId=<?php echo $p_id ;?>";</script>
			<?php
			}
			else{
				echo "Error";
			}
}
if($programD->rowCount()==0)
{
?>
<script> window.location.href="eligibility_criteria.php?pId=<?php echo $p_id ;?>";</script>
<?php
}else{
$Details=$programD->fetch(PDO::FETCH_ASSOC);
if($Details['program']=="BA/BSC/BCOM/BBA")
{?>
<style>
#Amphill,#Amsc,#Absc{
	display:none;
}
</style>
<?php
}else if($Details['program']=="BS/MSC")
{?>
<style>
#Amphill,#Amsc{
	display:none;
}
</style>
<?php
}else if($Details['program']=="MS/MPHILL")
{?>
<style>
#Amphill{
	display:none;
}
</style>
<?php
}
?>
<div id="page-wrapper">
<div class="row">
<div class="col-lg-12">
<h1 class="page-header">Aggregate Formula</h1>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="panel panel-primary">
<div class="panel-heading">Making Aggregate Formula For Degree :<?php echo $Details['program'];?></div>
<div class="panel-body">
<form  class="form-horizontal" action="#" method="post">  
<div class="row form-group">
   <div class="form-group" id="Assc" class="ssc">
    <label class="control-label col-sm-5" for="email"><span class="star">*</span>Matric/O-level Weightage:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" value="<?php echo $Details['af_matric'];?>" id="af_matric"  name="af_matric"  placeholder="">
    </div>
	<a href="#" onclick="hideFun('Assc');"><span class="fa fa-times-circle-o"></span></a>	
  </div>
   <div class="form-group" id="Ahssc" class="hssc">
    <label class="control-label col-sm-5" for="email"><span class="star">*</span>Inter/Fsc/FA Weightage:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" value="<?php echo $Details['af_inter'];?>" id="af_inter" name="af_inter"  placeholder="">
    </div>
	<a href="#" onclick="hideFun('Ahssc');"><span class="fa fa-times-circle-o"></span></a>
  </div>
  
   <div class="form-group" id="Absc" class="bsc">
    <label class="control-label col-sm-5" for="email"><span class="star">*</span>BA/BSC/BCOM/BBA Weightage:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" value="<?php echo $Details['af_bachlor'];?>" id="af_bachlor"  name="af_bachlor"  placeholder="">
    </div>
	<a href="#" onclick="hideFun('Absc');"><span class="fa fa-times-circle-o"></span></a>
  </div>
  <div class="form-group" id="Amsc" class="msc">
    <label class="control-label col-sm-5" for="email"><span class="star">*</span>BS/MSC Weightage:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" value="<?php echo $Details['af_master'];?>" id="af_master" name="af_master"  placeholder="">
    </div>
	<a href="#" onclick="hideFun('Amsc');"><span class="fa fa-times-circle-o"></span></a>
  </div>
   <div class="form-group" id="Amphill" class="mphill">
    <label class="control-label col-sm-5" for="email"><span class="star">*</span>MPHILL/MS Weightage:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" value="<?php echo $Details['af_mphil'];?>" id="af_mphil" name="af_mphil"  placeholder="">
    </div>
	<a href="#" onclick="hideFun('Amphill');"><span class="fa fa-times-circle-o"></span></a>
  </div>
  <div class="form-group" id="Ahq" class="mphill">
    <label class="control-label col-sm-5" for="email"><span class="star">*</span>Hafiz e Quran Weightage:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" value="<?php echo $Details['ahq'];?>" id="ahq" name="ahq"  placeholder="">
    </div>
	<a href="#" onclick="hideFun('Ahq');"><span class="fa fa-times-circle-o"></span></a>
  </div>
   <div class="form-group" id="Aet" class="mphill">
    <label class="control-label col-sm-5" for="email"><span class="star">*</span>Entry Test Weightage:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" value="<?php echo $Details['aet'];?>" id="aet" name="aet"  placeholder="">
    </div>
	<a href="#" onclick="hideFun('Aet');"><span class="fa fa-times-circle-o"></span></a>
  </div>
   <div class="form-group" id="Ait" class="mphill">
    <label class="control-label col-sm-5" for="email"><span class="star">*</span>Interview Weightage:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" value="<?php echo $Details['ait'];?>" id="ait" name="ait"  placeholder="">
    </div>
	<a href="#" onclick="hideFun('Ait');"><span class="fa fa-times-circle-o"></span></a>
  </div>		  
<div class="form-group" style="margin-top:150px;"> 
<div class="col-sm-offset-2 col-sm-10">
<input type="submit" class="col-sm-2 btn btn-primary" name="update" value="Update"/>
</div>
</div>
</form>
</div>
</div>
</div> 
</div>
</div>
<script>
function hideFun(myval)
{
	if(myval=='Assc')
	{
	document.getElementById("af_matric").value = "";
	document.getElementById(myval).style.display = "none";
	}else if(myval=='Ahssc')
	{
	document.getElementById("af_inter").value = "";
	document.getElementById(myval).style.display = "none";
	}else if(myval=='Absc')
	{
	document.getElementById("af_bachlor").value = "";
	document.getElementById(myval).style.display = "none";
	}else if(myval=='Amsc')
	{
	document.getElementById("af_master").value = "";
	document.getElementById(myval).style.display = "none";
	}else if(myval=='Amphill')
	{
	document.getElementById("af_mphil").value = "";
	document.getElementById(myval).style.display = "none";
	}else if(myval=='Ahq')
	{
	document.getElementById("ahq").value = "";
	document.getElementById(myval).style.display = "none";
	}else if(myval=='Aet')
	{
	document.getElementById("aet").value = "";
	document.getElementById(myval).style.display = "none";
	}
	else if(myval=='Ait')
	{
	document.getElementById("ait").value = "";
	document.getElementById(myval).style.display = "none";
	}
}
</script> 
<?php
}
require_once "assets/footer.php";
?>