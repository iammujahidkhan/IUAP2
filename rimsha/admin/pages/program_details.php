
<?php
require_once "assets/header.php";
require_once "assets/sidebar.php";
$p_id=$pId;
$program=$class->fetchdata("select * FROM programs where id='$p_id'");
$activepost=$program->fetch(PDO::FETCH_ASSOC);
$programD=$class->fetchdata("SELECT * FROM `admin_p_detail` where p_id='$p_id'");
$Details=$programD->fetch(PDO::FETCH_ASSOC);
if(isset($_POST['done']))
{
$degree = $_POST['degree'];
$uni_name= $_POST['uni_name'];
$uni_program= $_POST['uni_program'];
$uni_dept= $_POST['uni_dept'];
$uni_campus= $_POST['uni_campus'];
$max_time= $_POST['max_time'];
$min_time= $_POST['min_time'];
$t_courses= $_POST['t_courses'];
$t_hours= $_POST['t_hours'];
$folder = "../../images/";
$image = $_FILES['img']['name'];
$path= $folder.$image;
move_uploaded_file($_FILES['img']['tmp_name'],$path);
		
$query=$class->insert("INSERT INTO admin_p_detail (p_id, user_id,degreeLevel,uni_name, uni_program, uni_dept, uni_campus, max_duration, min_duration, t_courses, t_hours, img) VALUES ('$p_id','$user_id','$degree','$uni_name','$uni_program','$uni_dept','$uni_campus','$max_time','$min_time','$t_courses','$t_hours','$image')");
			if($query){
			//$class->redirect("program_details.php?pId=1");
			?>
			 <script> window.location.href="eligibility_criteria.php?pId=<?php echo $p_id ;?>";</script>
			<?php
			}
			else{
				echo "Error";
			}
	


}
if(isset($_POST['update']))
{
$degree = $_POST['degree'];
$uni_name= $_POST['uni_name'];
$uni_program= $_POST['uni_program'];
$uni_dept= $_POST['uni_dept'];
$uni_campus= $_POST['uni_campus'];
$max_time= $_POST['max_time'];
$min_time= $_POST['min_time'];
$t_courses= $_POST['t_courses'];
$t_hours= $_POST['t_hours'];
$folder = "../../images/";
$image = $_FILES['img']['name'];
$path= $folder.$image;
move_uploaded_file($_FILES['img']['tmp_name'],$path);

if(empty($image))
{
$image = $Details['img'];
}	
$query=$class->insert("UPDATE  admin_p_detail SET degreeLevel='$degree', uni_name = '$uni_name' , uni_program = '$uni_program', uni_dept = '$uni_dept', uni_campus = '$uni_campus', max_duration = '$max_time', min_duration = '$min_time', t_courses = '$t_courses', t_hours = '$t_hours', img = '$image' where `p_id` = '$p_id' and `user_id`='$user_id'");
			if($query){
			//$class->redirect("program_details.php?pId=1");
			?>
			 <script> window.location.href="eligibility_criteria.php?pId=<?php echo $p_id ;?>";</script>
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
                    <h1 class="page-header">Programs Details</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
               <div class="panel panel-primary">
				<div class="panel-heading">Enter Your University Offer Program Details</div>
				<div class="panel-body">
				
  <form class="form-horizontal" method="post" enctype="multipart/form-data">
   <div class="row">
     <label class="control-label col-sm-5" for="email"><span class="star">*</span>Select Degree Program:</label>
    <div class="col-md-4">
  <select class="form-control" name="degree" required>
	<option value="">...</option>
	<option value="PHD" <?php if($Details['degreeLevel']=="PHD"){ echo 'selected';}?>>PHD</option>
	<option value="MS" <?php if($Details['degreeLevel']=="MS"){ echo 'selected';}?>>MS</option>
	<option value="BS" <?php if($Details['degreeLevel']=="BS"){ echo 'selected';}?>>BS</option>
  </select>
  </div>
  </div>
	<br>
	
  <div class="form-group">
    <label class="control-label col-sm-2" for="email"><span class="star">*</span>University Name:</label>
    <div class="col-sm-10">
      <input type="text" name="uni_name" value="<?php echo 	$_SESSION['uni_name']; ?>" class="form-control" readonly placeholder="">
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="email"><span class="star">*</span>Programme Name:</label>
    <div class="col-sm-10">
      <input type="text" name="uni_program" class="form-control" readonly value="<?php echo $activepost['title'] ?>" placeholder="">
    </div>
  </div>
 
  <div class="form-group">
    <label class="control-label col-sm-2" for="email"><span class="star">*</span>Department:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" value="<?php echo $Details['uni_dept'];?>" name="uni_dept" required placeholder="">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email"><span class="star">*</span>Campus:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" value="<?php echo $Details['uni_campus'];?>" name="uni_campus" required placeholder="">
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="email"><span class="star">*</span>Maximum Duration:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" value="<?php echo $Details['max_duration'];?>" name="max_time" required placeholder="">
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="email"><span class="star">*</span>Minimun Duration:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" value="<?php echo $Details['min_duration'];?>" name="min_time" required placeholder="">
    </div>
  </div> 

    <div class="form-group">
    <label class="control-label col-sm-2" for="email"><span class="star">*</span>Total no of courses:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" value="<?php echo $Details['t_courses'];?>" name="t_courses" required >
    </div>
	</div>
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="email"><span class="star">*</span>Total no of credit hours:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" value="<?php echo $Details['t_hours'];?>" name="t_hours" required >
    </div>
  </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="email"><span class="star">*</span>Upload Complete Description File:</label>
    <div class="col-sm-4">
	
               <div class="image-upload">
				<?php
	if($programD->rowCount()>0)
	{
	?>
	<input id="file-input" id="image" value="<?php echo $Details['img'];?>" class="form-control" type="file" name="img"/>
	<a href="../images/<?php echo $Details['img'];?>"><?php echo $Details['img'];?></a>
	 <?php
	}else{
	?>
	<input id="file-input" id="image"  class="form-control" type="file" name="img"/>
	<?php
	}
	?>
         </div>
		</div>
	</div>

<?php
	if($programD->rowCount()>0)
	{
	?>
 <div class="form-group"> 
  <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="col-sm-2 btn btn-primary" name="update" >Update</button>
  </div>
  </div>
  <?php
	}else{
		?>
<div class="form-group"> 
  <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="col-sm-2 btn btn-primary" name="done" >Save</button>
  </div>
  </div>
	<?php
	}
	?>
  
</form>
				
				</div>
				</div> 
                </div>
               </div>
			 
            </div>
        
<?php
require_once "assets/footer.php";
?>