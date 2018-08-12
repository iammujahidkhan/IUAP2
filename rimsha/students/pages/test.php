<?php
require_once "header.php";
$programD=$class->fetchdata("SELECT * FROM student_e_detail where user_id='$user_id'");
$Details=$programD->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['done']))
{
$degree= $_POST['degree'];
$passing_year= $_POST['passing_year'];
$board= $_POST['board'];
$subject= $_POST['subject'];
$max_marks= $_POST['max_marks'];
$obtain_marks= $_POST['obtain_marks'];
		
$query=$class->insert("INSERT INTO `student_e_detail`( `user_id`, `degree`, `passing_year`, `board`, `subject`, `max_marks`, `obtain_marks`) 
												VALUES ('$user_id','$degree','$passing_year','$board','$subject','$max_marks','$obtain_marks')");
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
$passing_year= $_POST['passing_year'];
$board= $_POST['board'];
$subject= $_POST['subject'];
$max_marks= $_POST['max_marks'];
$obtain_marks= $_POST['obtain_marks'];
		
$query=$class->insert("UPDATE `student_e_detail` SET `degree` = '$degree', `passing_year`='$passing_year', `board`='$board', `subject`='subject', `max_marks`='$max_marks', `obtain_marks` = '$obtain_marks' WHERE `user_id`='$user_id'");
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
				
<form class="form-horizontal" method="post">  
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="email"><span class="star">*</span>Latest Degree:</label>
    <div class="col-sm-4">
      <select class="form-control" name="degree" id="day" required>
    <option value="">Select Degree</option>
    <option value="PHD"  <?php if($Details['degree']=='PHD'){ echo 'selected';}?>>PHD</option>
	<option value="MS/MPHILL" <?php if($Details['degree']=='MS/MPHILL'){ echo 'selected';}?>>MS/MPHILL</option>
	<option value="BS/MSC" <?php if($Details['degree']=='BS/MSC'){ echo 'selected';}?>>BS/MSC</option>
    <option value="BA/BSC/BCOM/BBA" <?php if($Details['degree']=='BA/BSC/BCOM/BBA'){ echo 'selected';}?>>BA/BSC/BCOM/BBA</option>
  </select>
    </div>
  </div>
  
    <div class="form-group">
    <label class="control-label col-sm-2" for="email"><span class="star">*</span>Year of Passsing:</label>
    <div class="col-sm-4">
      <select class="form-control" name="passing_year" id="day" required>
    <option value="">---</option>
  <option value="2010" <?php if($Details['passing_year']=='2010'){ echo 'selected';}?>>2010</option>
  <option value="2011" <?php if($Details['passing_year']=='2011'){ echo 'selected';}?>>2011</option>
  <option value="2012" <?php if($Details['passing_year']=='2012'){ echo 'selected';}?>>2012</option>
  <option value="2013" <?php if($Details['passing_year']=='2013'){ echo 'selected';}?>>2013</option>
  <option value="2014" <?php if($Details['passing_year']=='2014'){ echo 'selected';}?>>2014</option>
  <option value="2015" <?php if($Details['passing_year']=='2015'){ echo 'selected';}?>>2015</option>
  <option value="2016" <?php if($Details['passing_year']=='2016'){ echo 'selected';}?>>2016</option>
  <option value="2017" <?php if($Details['passing_year']=='2017'){ echo 'selected';}?>>2017</option>
  <option value="2018" <?php if($Details['passing_year']=='2018'){ echo 'selected';}?>>2018</option>
  
  </select>

    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="email"><span class="star">*</span>Board:</label>
    <div class="col-sm-4">
      <select class="form-control" id="day" name="board" required>
    <option value="">---</option>
    <option value="Faisalabad" <?php if($Details['board']=='Faisalabad'){ echo 'selected';}?>>Faisalabad</option>
	<option value="Lahore" <?php if($Details['board']=='Lahore'){ echo 'selected';}?>>Lahore</option>
	<option value="Multan" <?php if($Details['board']=='Multan'){ echo 'selected';}?>>Multan</option>
	<option value="Sargodha" <?php if($Details['board']=='Sargodha'){ echo 'selected';}?>>Sargodha</option>
 
 </select>
    </div>
	
  </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="email"><span class="star">*</span>Subjects:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" value="<?php echo $Details['subject'];?>"  name="subject" required >
    </div>
  </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="email"><span class="star">*</span>Max Marks:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" value="<?php echo $Details['max_marks'];?>"  name="max_marks" required >
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="email"><span class="star">*</span>Obtained Marks:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" value="<?php echo $Details['obtain_marks'];?>"  name="obtain_marks" required >
    </div>
  </div>
 
	
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
          
<?php
require_once "footer.php";
?>