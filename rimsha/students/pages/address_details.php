<?php
require_once "header.php";
$programD=$class->fetchdata("SELECT * FROM student_address where user_id='$user_id'");
$Details=$programD->fetch(PDO::FETCH_ASSOC);
if(isset($_POST['done']))
{
$permanent_address= $_POST['permanent_address'];
$city1= $_POST['city1'];
$postal_address= $_POST['postal_address'];
$city2= $_POST['city2'];		
$query=$class->insert("INSERT INTO `student_address`( `user_id`, `permanent_address`, `city1`, `postal_address`, `city2`)
												VALUES ('$user_id','$permanent_address','$city1','$postal_address','$city2')");
			if($query){
			//$class->redirect("program_details.php?pId=1");
			?>
			 <script> window.location.href="educational_details.php";</script>
			<?php
			}
			else{
				echo "Error";
				}
}
if(isset($_POST['update']))
{
$permanent_address= $_POST['permanent_address'];
$city1= $_POST['city1'];
$postal_address= $_POST['postal_address'];
$city2= $_POST['city2'];		
$query=$class->insert("UPDATE `student_address` SET `permanent_address` = '$permanent_address', `city1` = '$city1', `postal_address` = '$postal_address', `city2` = '$city2' WHERE `user_id`='$user_id'");
			if($query){
			//$class->redirect("program_details.php?pId=1");
			?>
			 <script> window.location.href="educational_details.php";</script>
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
                    <h1 class="page-header">Address Details</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
               <div class="panel panel-primary">
				<div class="panel-heading">Enter Your Address Details</div>
				<div class="panel-body">
				
				<form class="form-horizontal" method="post">
<fieldset class="scheduler-border">
    <legend class="scheduler-border">Permanent Address</legend>
    <div class="form-group">
    <label class="control-label col-sm-1" for="email"><span class="star">*</span>Address:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="<?php echo $Details['permanent_address'];?>" name="permanent_address" required placeholder="">
    </div>
  </div>
    <div class="form-group">
  <label class="control-label col-sm-1" for="email"><span class="star">*</span>City:</label>
  <div class="row">
  <div class="col-md-5">
	<input type="text" class="form-control"  value="<?php echo $Details['city1'];?>" name="city1" required placeholder="">
	</div>
	</div>
	</div>
  
</fieldset>
 <fieldset class="scheduler-border">
    <legend class="scheduler-border">Postal Address</legend>
	
  <div class="form-group">
    <label class="control-label col-sm-1" for="email"><span class="star">*</span>Address:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  value="<?php echo $Details['postal_address'];?>" name="postal_address" required placeholder="">
    </div>
  </div>
    <div class="form-group">
  <label class="control-label col-sm-1" for="email"><span class="star">*</span>City:</label>
  <div class="row">
  <div class="col-md-5">
 
	<input type="text" class="form-control"  value="<?php echo $Details['city2'];?>" name="city2" required placeholder="">
	</div>
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
        
<?php
require_once "footer.php";
?>