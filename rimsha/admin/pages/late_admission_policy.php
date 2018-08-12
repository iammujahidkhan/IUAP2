<?php

require_once "assets/header.php";
require_once "assets/sidebar.php";
$programD=$class->fetchdata("SELECT * FROM `admin_late_admission` where p_id='$p_id' and user_id='$user_id'");
$Details=$programD->fetch(PDO::FETCH_ASSOC);
?>

  <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">LATE ADMISSION POLICY</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
<?php
if(isset($_POST['done']))
{	
$title= $_POST['title'];		
$query=$class->insert("INSERT INTO `admin_late_admission`(`p_id`, `user_id`, `late_title`) VALUES ('$p_id','$user_id','$title')");
			if($query){
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
$title= $_POST['title'];		
$query=$class->insert("UPDATE  admin_late_admission SET late_title = '$title' WHERE p_id = '$p_id' and user_id = '$user_id'");
			if($query){
			?>
			 <script> window.location.href="index.php";</script>
			<?php	
			}
			else{
				echo "Error";
				}
}
?>
<div class="panel-heading">
                            Enter Your Late Admission Policy.
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" method="post">
                                        <div class="form-group">
                                            <textarea style="resize: vertical;" name="title" class="form-control" required><?php echo $Details['late_title']; ?></textarea>
                                        </div>
                                      
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
                                      
                                    </form>
                                </div>
                               
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
    <!-- /#page-wrapper -->
<?php
require_once "assets/footer.php";
?>