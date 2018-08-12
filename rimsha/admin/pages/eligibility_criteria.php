<?php
require_once "assets/header.php";
require_once "assets/sidebar.php";

$programD=$class->fetchdata("SELECT * FROM `admin_e_criteria` where p_id='$p_id' and user_id='$user_id'");
$Details=$programD->fetch(PDO::FETCH_ASSOC);
if($Details['program']=="PHD")
{
?>
<style>
#bsc,#msc,#mphill,#Absc,#Amsc,#Amphill{
	display:block;
}
</style>
<?php
}else if($Details['program']=="MS/MPHILL")																					
	{
?>
<style>

#mphill,#Amsc,#Amphill{
	display:none;
}
</style>
<?php
	}else if($Details['program']=="BS/MSC")																					
	{
?>
<style>
#msc,#mphill,#Amsc,#Amphill{
	display:none;
}
</style>
<?php
	}else 	if($Details['program']=="BA/BSC/BCOM/BBA")																					
	{
?>
<style>
#bsc,#msc,#mphill,#Absc,#Amsc,#Amphill{
	display:none;
}
</style>
<?php
	}
?>



<script>
	
   function Test(myval) {
	   
	  var test = document.getElementById("test");
	  var x = document.getElementById("test");
	
	  
    if(myval=="openMerit")
	{
	  document.getElementById("test").style.display = "none";
	}
	if(myval=="enteryTest")
	{
	  document.getElementById("test").style.display = "block";
	  
	if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "block";
    }	  
	}
}
function valueselect()
{
      //window.location.href = "eligibility_criteria.php?degree="+myval;
	  //document.getElementsByClassName("circles")
	  
	  var x = document.getElementById("mySelect").value;
	  var ssc = document.getElementById("ssc");
	  var hssc = document.getElementById("hssc");
	  var bsc = document.getElementById("bsc");
	  var msc = document.getElementById("msc");
	  var mphill = document.getElementById("mphill");
	
	  //document.getElementById("myP").style.display = "none";
    //document.getElementById("mphill").innerHTML = "You selected: " + x;
	if(x=="PHD")
	{
		//alert("ok");
		bsc.style.display = "block";
		msc.style.display = "block";
		mphill.style.display = "block";
		
	}
	
	if(x=="MS/MPHILL")																					
	{
		
		bsc.style.display = "block";
		msc.style.display = "block";
		mphill.style.display = "none";
	}
	
	if(x=="BS/MSC")
	{
	    
		
		mphill.style.display = "none";
		msc.style.display = "none";
	}
	if(x=="BS/MSC")
	{
		
	    bsc.style.display = "block";
	    mphill.style.display = "none";
		msc.style.display = "none";
	}
	if(x=="BA/BSC/BCOM/BBA")
	{
		
		bsc.style.display = "none";
		msc.style.display = "none";
		mphill.style.display = "none";
	}

}
</script>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Eligibility Criteria</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
               <div class="panel panel-primary">
				<div class="panel-heading">Enter Your Eligibility Criteria</div>
				<div class="panel-body">
				
<?php
if(isset($_POST['done']))
{
	
$program= $_POST['program'];
$matric_marks= $_POST['matric_marks'];
$inter_marks= $_POST['inter_marks'];
$bachlor_marks= $_POST['bachlor_marks'];
$master_marks = $_POST['master_marks'];
$mphil_marks= $_POST['mphil_marks'];
$merit= $_POST['merit'];

$sat= $_POST['sat'];
$hec= $_POST['hec'];
$nat= $_POST['nat'];
$nts= $_POST['nts'];
		
$query=$class->insert("INSERT INTO `admin_e_criteria` (`p_id`, `user_id`, `program`, `matric_marks`, `inter_marks`, `bachlor_marks`, `master_marks`, `mphil_marks`,`type`, `sat`, `hec`, `nat` ,`nts`) VALUES ('$p_id','$user_id','$program','$matric_marks','$inter_marks','$bachlor_marks','$master_marks','$mphil_marks','$merit','$sat','$hec','$nat','$nts')");
			if($query){
			//$class->redirect("program_details.php?pId=1");
			?>
			 <script> window.location.href="aggregate.php?pId=<?php echo $p_id ;?>";</script>
			<?php
			}
			else{
				echo "Error";
			}
	
}
if(isset($_POST['update']))
{
$program= $_POST['program'];
$matric_marks= $_POST['matric_marks'];
$inter_marks= $_POST['inter_marks'];
$bachlor_marks= $_POST['bachlor_marks'];
$master_marks = $_POST['master_marks'];
$mphil_marks= $_POST['mphil_marks'];
$merit= $_POST['merit'];

$sat= $_POST['sat'];
$hec= $_POST['hec'];
$nat= $_POST['nat'];
$nts= $_POST['nts'];

		
$query=$class->insert("UPDATE `admin_e_criteria` SET `program` = '$program' ,`matric_marks`='$matric_marks', `inter_marks`='$inter_marks', `bachlor_marks` = '$bachlor_marks', `master_marks` = '$master_marks', `mphil_marks` = '$mphil_marks',`type` = '$merit', `sat` = '$sat', `hec` = '$hec', `nat` = '$nat'  , `nts` = '$nts' where `p_id` = '$p_id' and `user_id`='$user_id'");
			
			if($query){
			//$class->redirect("program_details.php?pId=1");
			?>
			 <script> window.location.href="aggregate.php?pId=<?php echo $p_id ;?>";</script>
			<?php
			}
			else{
				echo "Error";
			}
}
?>
<form  class="form-horizontal" action="#" method="post">  
   <div class="form-group">
	<div class="row">
     <label class="control-label col-sm-5" for="email"><span class="star">*</span>Select Degree Program:</label>
    <div class="col-md-4">
  <select class="form-control" id="mySelect" name="program" required onchange="valueselect();">
	<?php
	if($Details['program']=="PHD")
	{?>
	<option value="PHD" selected>PHD</option>
	<option value="MS/MPHILL">MS/MPHILL</option>
	<option value="BS/MSC">BS/MSC</option>
    <option value="BA/BSC/BCOM/BBA">BA/BSC/BCOM/BBA</option>
	<?php		
	}else if($Details['program']=="MS/MPHILL")
		
	{
	?>
	
	
	<option value="PHD" <?php $sel;?>>PHD</option>
	<option value="MS/MPHILL" selected>MS/MPHILL</option>
	<option value="BS/MSC">BS/MSC</option>
    <option value="BA/BSC/BCOM/BBA">BA/BSC/BCOM/BBA</option>
	<?php
	}else if($Details['program']=="BS/MSC")
	{
	?>
	<option value="PHD" <?php $sel;?>>PHD</option>
	<option value="MS/MPHILL">MS/MPHILL</option>
	<option value="BS/MSC" selected>BS/MSC</option>
	<option value="BA/BSC/BCOM/BBA">BA/BSC/BCOM/BBA</option>
	<?php
	}else if($Details['program']=="BA/BSC/BCOM/BBA")
	{
	?>
	<option value="PHD" <?php $sel;?>>PHD</option>
	<option value="MS/MPHILL">MS/MPHILL</option>
	<option value="BS/MSC">BS/MSC</option>
	<option value="BA/BSC/BCOM/BBA" selected>BA/BSC/BCOM/BBA</option>
	<?php
	}else{
	?>
	<option value="PHD" <?php $sel;?>>PHD</option>
	<option value="MS/MPHILL">MS/MPHILL</option>
	<option value="BS/MSC">BS/MSC</option>
    <option value="BA/BSC/BCOM/BBA">BA/BSC/BCOM/BBA</option>
	<?php
	}
	?>
  </select>
  </div>
  </div>
	
	
	</div>
    <div class="form-group" id="ssc" class="ssc">
    <label class="control-label col-sm-5" for="email"><span class="star">*</span>Minimum Marks of Matric/O-level in %:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" value="<?php echo $Details['matric_marks'];?>" name="matric_marks" required placeholder="">
    </div>
  </div>
   <div class="form-group" id="hssc" class="hssc">
    <label class="control-label col-sm-5" for="email"><span class="star">*</span>Minimum Marks of Inter/Fsc/A-level/DAE/DCOM/ICOM/ICS/FA in %:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" value="<?php echo $Details['inter_marks'];?>" name="inter_marks" required placeholder="">
    </div>
  </div>
  
   <div class="form-group" id="bsc" class="bsc">
    <label class="control-label col-sm-5" for="email"><span class="star">*</span>Minimum 14 Year Marks of BA/BSC/BCOM/BBA in %:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" value="<?php echo $Details['bachlor_marks'];?>" name="bachlor_marks"  placeholder="">
    </div>
  </div>
  <div class="form-group" id="msc" class="msc">
    <label class="control-label col-sm-5" for="email"><span class="star">*</span>Minimum 16 Year Marks of BS/MSC in %:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" value="<?php echo $Details['master_marks'];?>" name="master_marks"  placeholder="">
    </div>
  </div>
   <div class="form-group" id="mphill" class="mphill">
    <label class="control-label col-sm-5" for="email"><span class="star">*</span>Minimum MPHILL/MS Marks in %:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" value="<?php echo $Details['mphil_marks'];?>" name="mphil_marks"  placeholder="">
    </div>
  </div>
	 <?php
	 $checked = "";
	 $openMerit = "";
	 $block = "hidden";
	 if($Details['type']=="enteryTest")
	 {	 
		$checked = "checked";
		$block = "visible";
	 }else{
		$openMerit  = "checked";
	 }
	 ?>
	<div class="form-group"> 
  <div class="col-sm-offset-5 col-sm-5">
  <label class="radio-inline">
      <input type="radio"  value="openMerit" id="openMerit" <?php echo $openMerit;?> name="merit" required onclick="Test(this.value)">Open Merit
    </label>
    <label class="radio-inline">
      <input type="radio"  value="enteryTest" id="enteryTest" <?php echo $checked;?> name="merit" required onclick="Test(this.value)">Entry test
    </label>
  </div>
  </div>
    <div id="test" <?php echo $block?>>
     <div class="form-group" id="sat">
    <label class="control-label col-sm-5" for="email"><span class="star">*</span>SAT:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="tsat" value="<?php echo $Details['sat'];?>"  name="sat"  placeholder="">
    </div>
	<a href="#" onclick="hideFun('sat');"><span class="fa fa-times-circle-o"></span></a>
  </div>
  
   <div class="form-group" id="hec">
    <label class="control-label col-sm-5" for="email"><span class="star">*</span>HEC:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" name="hec" id="thec" value="<?php echo $Details['hec'];?>"   placeholder="">
    </div>
	<a href="#" onclick="hideFun('hec');"><span class="fa fa-times-circle-o"></span></a>
  </div>
   <div class="form-group" id="nat">
    <label class="control-label col-sm-5" for="email"><span class="star">*</span>NAT:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="tnat" value="<?php echo $Details['nat'];?>"  name="nat"  placeholder="">
    </div>
	<a href="#" onclick="hideFun('nat');"><span class="fa fa-times-circle-o"></span></a>
  </div>
   <div class="form-group" id="nts">
    <label class="control-label col-sm-5" for="email"><span class="star">*</span>NTS:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="tnts" value="<?php echo $Details['nts'];?>"  name="nts"  placeholder="">
    </div>
	<a href="#" onclick="hideFun('nts');"><span class="fa fa-times-circle-o"></span></a>
  </div>
</div> 
   

  
  <div class="form-group"> 
  <div class="col-sm-offset-2 col-sm-10">
  <?php
  if($programD->rowCount()>0)
  {
  ?>
    <input type="submit" class="col-sm-2 btn btn-primary" name="update" value="Update"/>
  <?php
  }else{	  
  ?>
  <input type="submit" class="col-sm-2 btn btn-primary" name="done" value="Save"/>
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
function hideFun(myval)
{
	if(myval=='hec')
	{
	document.getElementById("thec").value = "";
	document.getElementById(myval).style.display = "none";
	}else if(myval=='nat')
	{
	document.getElementById("tnat").value = "";
	document.getElementById(myval).style.display = "none";
	}else if(myval=='sat')
	{
	document.getElementById("tsat").value = "";
	document.getElementById(myval).style.display = "none";
	}else if(myval=='nts')
	{
	document.getElementById("tnts").value = "";
	document.getElementById(myval).style.display = "none";
	}
}
</script> 
<?php
require_once "assets/footer.php";
?>