<?php
require_once "header.php";
$programD=$class->fetchdata("SELECT * FROM student_doc_detail where user_id='$user_id'");
$Details=$programD->fetch(PDO::FETCH_ASSOC);
if(isset($_POST['done']))
{
$folder = "../images/";
$image1 = $_FILES['img1']['name'];
$path= $folder.$image1;
move_uploaded_file($_FILES['img1']['tmp_name'],$path);
$image2 = $_FILES['img2']['name'];
$path= $folder.$image2;
move_uploaded_file($_FILES['img2']['tmp_name'],$path);
$image3 = $_FILES['img3']['name'];
$path= $folder.$image3;
move_uploaded_file($_FILES['img3']['tmp_name'],$path);
$image4 = $_FILES['img4']['name'];
$path= $folder.$image4;
move_uploaded_file($_FILES['img4']['tmp_name'],$path);
$image5 = $_FILES['img5']['name'];
$path= $folder.$image5;
move_uploaded_file($_FILES['img5']['tmp_name'],$path);
$image6 = $_FILES['img6']['name'];
$path= $folder.$image6;
move_uploaded_file($_FILES['img6']['tmp_name'],$path);
$image7= $_FILES['img7']['name'];
$path= $folder.$image7;
move_uploaded_file($_FILES['img7']['tmp_name'],$path);
$query=$class->insert("INSERT INTO `student_doc_detail`(`user_id`, `img1`, `img2`, `img3`, `img4`, `img5`, `img6`, `img7`) 
												VALUES ('$user_id','$image1','$image2','$image3','$image4','$image5','$image6','$image7')");
			if($query){
			//$class->redirect("program_details.php?pId=1");
			?>
			 <script> window.location.href="index.php";</script>
			<?php
			}
			else{
				echo "Error";
				}
}
if(isset($_POST['update']))
{
$folder = "../images/";
$image1 = $_FILES['img1']['name'];
$path= $folder.$image1;
move_uploaded_file($_FILES['img1']['tmp_name'],$path);
$image2 = $_FILES['img2']['name'];
$path= $folder.$image2;
move_uploaded_file($_FILES['img2']['tmp_name'],$path);
$image3 = $_FILES['img3']['name'];
$path= $folder.$image3;
move_uploaded_file($_FILES['img3']['tmp_name'],$path);
$image4 = $_FILES['img4']['name'];
$path= $folder.$image4;
move_uploaded_file($_FILES['img4']['tmp_name'],$path);
$image5 = $_FILES['img5']['name'];
$path= $folder.$image5;
move_uploaded_file($_FILES['img5']['tmp_name'],$path);
$image6 = $_FILES['img6']['name'];
$path= $folder.$image6;
move_uploaded_file($_FILES['img6']['tmp_name'],$path);
$image7= $_FILES['img7']['name'];
$path= $folder.$image7;
move_uploaded_file($_FILES['img7']['tmp_name'],$path);

if(empty($image1))
{
	$image1 = $Details['img1'];
}
if(empty($image2))
{
	$image2 = $Details['img2'];
}
if(empty($image3))
{
	$image3 = $Details['img3'];
}
if(empty($image4))
{
	$image4 = $Details['img4'];
}
if(empty($image5))
{
	$image5 = $Details['img5'];
}
if(empty($image6))
{
	$image6 = $Details['img6'];
}
if(empty($image7))
{
	$image7 = $Details['img7'];
}

$query=$class->insert("UPDATE  `student_doc_detail` SET `img1` = '$image1', `img2`='$image2', `img3`='$image3', `img4`='$image4', `img5`='$image5', `img6`='$image6', `img7`='$image7' WHERE `user_id`='$user_id'");
			if($query){
			//$class->redirect("program_details.php?pId=1");
			?>
			 <script> window.location.href="index.php";</script>
			<?php
			}
			else{
				echo "Error";
				}
}
?>

<script type="text/javascript">
function showImage1() {
		if(this.files && this.files[0]){
			
			var obj = new FileReader();
			obj.onload=function(data){
				
				var image = document.getElementById("image1");
				image.src=data.target.result;
				image.style.display="block";
			}
			obj.readAsDataURL(this.files[0]);
		}
        
    }

	function showImage2() {
		if(this.files && this.files[0]){
			
			var obj = new FileReader();
			obj.onload=function(data){
				
				var image = document.getElementById("image2");
				image.src=data.target.result;
				image.style.display="block";
			}
			obj.readAsDataURL(this.files[0]);
		}
        
    }
function showImage3() {
		if(this.files && this.files[0]){
			
			var obj = new FileReader();
			obj.onload=function(data){
				
				var image = document.getElementById("image3");
				image.src=data.target.result;
				image.style.display="block";
			}
			obj.readAsDataURL(this.files[0]);
		}
        
    }

function showImage4() {
		if(this.files && this.files[0]){
			
			var obj = new FileReader();
			obj.onload=function(data){
				
				var image = document.getElementById("image4");
				image.src=data.target.result;
				image.style.display="block";
			}
			obj.readAsDataURL(this.files[0]);
		}
        
    }
function showImage5() {
		if(this.files && this.files[0]){
			
			var obj = new FileReader();
			obj.onload=function(data){
				
				var image = document.getElementById("image5");
				image.src=data.target.result;
				image.style.display="block";
			}
			obj.readAsDataURL(this.files[0]);
		}
        
    }
function showImage6() {
		if(this.files && this.files[0]){
			
			var obj = new FileReader();
			obj.onload=function(data){
				
				var image = document.getElementById("image6");
				image.src=data.target.result;
				image.style.display="block";
			}
			obj.readAsDataURL(this.files[0]);
		}
        
    }
function showImage7() {
		if(this.files && this.files[0]){
			
			var obj = new FileReader();
			obj.onload=function(data){
				
				var image = document.getElementById("image7");
				image.src=data.target.result;
				image.style.display="block";
			}
			obj.readAsDataURL(this.files[0]);
		}
        
    }

</script>
<style>
.image-upload > input
{
    display: none;
}
</style>

  <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Upload Documents</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
               <div class="panel panel-primary">
				<div class="panel-heading">Please fill the form</div>
				<div class="panel-body">
				
				<form class="form-horizontal" enctype="multipart/form-data" method="post">
				<fieldset class="scheduler-border">
    <legend class="scheduler-border">Upload CNIC / B-Form</legend>
    <div class="row">
	
	<div class="form-group">
    <label class="control-label col-sm-2" for="email"><span class="star">*</span>Upload Fornt of CNIC / B-Form:</label>
    <div class="col-sm-7">
      <input id="file-input" id="image1" class="form-control"  onchange="showImage1.call(this)" type="file" name="img1"/>
		</div>
	<div class="col-sm-3 pull-right">
	  <?php
	if($programD->rowCount()>0)
	{
	?>
	
               <div class="image-upload">
					<label for="file-input">
					<img src="../images/<?php echo $Details['img1'];?>" class="img-responsive img-thumbnail" onchange="showImage1.call(this)" style="min-width:50px;max-width:50px;max-height:50px;" id="image1"/>
					</label>
					
                </div>
				<?php
	}else{
	?>
		 <div class="image-upload">
					<label for="file-input">
					<img src="../images/down.jpg" class="img-responsive img-thumbnail" onchange="showImage7.call(this)" style="min-width:50px;max-width:50px;max-height:50px;" id="image7"/>
					</label>
					
                </div>	
<?php
	}
?>	
	</div>
	
  </div>
	
	
	</div>
	<div class="row">
	<div class="form-group">
    <label class="control-label col-sm-2" for="email"><span class="star">*</span>Upload Back of CNIC / B-Form:</label>
    <div class="col-sm-7">
      <input id="file-input" id="image2" class="form-control"  onchange="showImage2.call(this)" type="file" name="img2"/>
		</div>
	<div class="col-sm-3 pull-right">
	  
	<?php
	if($programD->rowCount()>0)
	{
	?>
               <div class="image-upload">
					<label for="file-input">
					<img src="../images/<?php echo $Details['img2'];?>" class="img-responsive img-thumbnail" onchange="showImage2.call(this)" style="min-width:50px;max-width:50px;max-height:50px;" id="image2"/>
					</label>
					
                </div>
				<?php
	}else{
	?>
		 <div class="image-upload">
					<label for="file-input">
					<img src="../images/down.jpg" class="img-responsive img-thumbnail" onchange="showImage7.call(this)" style="min-width:50px;max-width:50px;max-height:50px;" id="image7"/>
					</label>
					
                </div>	
<?php
	}
?>	
	</div>
	
  </div>
	</div>
  

</fieldset>
<fieldset class="scheduler-border">
    <legend class="scheduler-border">SSC Document</legend>
    <div class="form-group">
    <label class="col-sm-8 well">Scan and upload SSC or equivalent transcript.</label>
  </div>
    	<div class="row">
	
	<div class="form-group">
    <label class="control-label col-sm-2" for="email"><span class="star">*</span>Upload SSC:</label>
    <div class="col-sm-7">
      <input id="file-input" id="image3" class="form-control"  onchange="showImage3.call(this)" type="file" name="img3"/>
		</div>
	<div class="col-sm-3 pull-right">
	  <?php
	if($programD->rowCount()>0)
	{
	?>
	
               <div class="image-upload">
					<label for="file-input">
					<img src="../images/<?php echo $Details['img3'];?>" class="img-responsive img-thumbnail" onchange="showImage3.call(this)" style="min-width:50px;max-width:50px;max-height:50px;" id="image3"/>
					</label>
					
                </div>
				<?php
	}else{
	?>
		 <div class="image-upload">
					<label for="file-input">
					<img src="../images/down.jpg" class="img-responsive img-thumbnail" onchange="showImage7.call(this)" style="min-width:50px;max-width:50px;max-height:50px;" id="image7"/>
					</label>
					
                </div>	
<?php
	}
?>	
	</div>
	
  </div>
	</div>
  

</fieldset>

<fieldset class="scheduler-border">
    <legend class="scheduler-border">HSSC Document</legend>
    <div class="form-group">
    <label class="col-sm-8 well">If result awaited then upload Part-I mark sheet.</label>
  </div>
  	<div class="row">
	<div class="form-group">
    <label class="control-label col-sm-2" for="email"><span class="star">*</span>Upload HSSC:</label>
    <div class="col-sm-7">
      <input id="file-input" id="image4" class="form-control"  onchange="showImage4.call(this)" type="file" name="img4"/>
		</div>
	<div class="col-sm-3 pull-right">
	  <?php
	if($programD->rowCount()>0)
	{
	?>
	
               <div class="image-upload">
					<label for="file-input">
					<img src="../images/<?php echo $Details['img4'];?>" class="img-responsive img-thumbnail" onchange="showImage4.call(this)" style="min-width:50px;max-width:50px;max-height:50px;" id="image4"/>
					</label>
					
                </div>
				<?php
	}else{
	?>
		 <div class="image-upload">
					<label for="file-input">
					<img src="../images/down.jpg" class="img-responsive img-thumbnail" onchange="showImage7.call(this)" style="min-width:50px;max-width:50px;max-height:50px;" id="image7"/>
					</label>
					
                </div>	
<?php
	}
?>	
	</div>
	
  </div>
	</div>
  

</fieldset>
<fieldset class="scheduler-border">
    <legend class="scheduler-border">BS/MSc/MA Transcript</legend>
    <div class="form-group">
    <label class="col-sm-8 well">Scan and upload BS/MSc/MA or equivalent transcript.</label>
  </div>
     	<div class="row">
	<div class="form-group">
    <label class="control-label col-sm-2" for="email"><span class="star">*</span>Upload BS/MSc/MA:</label>
    <div class="col-sm-7">
      <input id="file-input" id="image5" class="form-control"  onchange="showImage5.call(this)" type="file" name="img5"/>
		</div>
	<div class="col-sm-3 pull-right">
	  <?php
	if($programD->rowCount()>0)
	{
	?>
	
               <div class="image-upload">
					<label for="file-input">
					<img src="../images/<?php echo $Details['img5'];?>" class="img-responsive img-thumbnail" onchange="showImage5.call(this)" style="min-width:50px;max-width:50px;max-height:50px;" id="image5"/>
					</label>
					
                </div>
				<?php
	}else{
	?>
		 <div class="image-upload">
					<label for="file-input">
					<img src="../images/down.jpg" class="img-responsive img-thumbnail" onchange="showImage7.call(this)" style="min-width:50px;max-width:50px;max-height:50px;" id="image7"/>
					</label>
					
                </div>	
<?php
	}
?>	
	</div>
	
  </div>
	</div>
  
</fieldset>
<fieldset class="scheduler-border">
    <legend class="scheduler-border">MSc/MPhill Transcript</legend>
    <div class="form-group">
    <label class="col-sm-8 well">Scan and upload MSc/MPhill or equivalent transcript.</label>
  </div>
     	<div class="row">
		<div class="form-group">
    <label class="control-label col-sm-2" for="email"><span class="star">*</span>Upload MSc/MPhill:</label>
    <div class="col-sm-7">
      <input id="file-input" id="image6" class="form-control"  onchange="showImage6.call(this)" type="file" name="img6"/>
		</div>
	<div class="col-sm-3 pull-right">
	  
	<?php
	if($programD->rowCount()>0)
	{
	?>
               <div class="image-upload">
					<label for="file-input">
					<img src="../images/<?php echo $Details['img6'];?>" class="img-responsive img-thumbnail" onchange="showImage6.call(this)" style="min-width:50px;max-width:50px;max-height:50px;" id="image6"/>
					</label>
					
                </div>
				<?php
	}else{
	?>
		 <div class="image-upload">
					<label for="file-input">
					<img src="../images/down.jpg" class="img-responsive img-thumbnail" onchange="showImage7.call(this)" style="min-width:50px;max-width:50px;max-height:50px;" id="image7"/>
					</label>
					
                </div>	
<?php
	}
?>	
	</div>
	
  </div>
		</div>
  
</fieldset>
<fieldset class="scheduler-border">
    <legend class="scheduler-border">NTS Result (if any)</legend>
     	<div class="row">
	
	<div class="form-group">
    <label class="control-label col-sm-2" for="email"><span class="star">*</span>Upload NTS Result:</label>
    <div class="col-sm-7">
      <input id="file-input" id="image7" class="form-control"  onchange="showImage7.call(this)" type="file" name="img7"/>
		</div>
	<div class="col-sm-3 pull-right">
	  
	<?php
	if($programD->rowCount()>0)
	{
	?>
               <div class="image-upload">
					<label for="file-input">
					<img src="../images/<?php echo $Details['img7'];?>" class="img-responsive img-thumbnail" onchange="showImage7.call(this)" style="min-width:50px;max-width:50px;max-height:50px;" id="image7"/>
					</label>
					
                </div>
				<?php
	}else{
	?>
		 <div class="image-upload">
					<label for="file-input">
					<img src="../images/down.jpg" class="img-responsive img-thumbnail" onchange="showImage7.call(this)" style="min-width:50px;max-width:50px;max-height:50px;" id="image7"/>
					</label>
					
                </div>	
<?php
	}
?>	
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