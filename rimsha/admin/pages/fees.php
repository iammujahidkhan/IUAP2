<?php
require_once "assets/header.php";
?>

<?php
require_once "assets/sidebar.php";
$p_id=$pId;

if(isset($_POST['update']))
{
	$about= $_POST['about'];		
	$query=$class->insert("UPDATE programs set fees='$about' where user_id='$user_id' and id='$p_id'");
			if($query){
			?>
			 <script> window.location.href="late_admission_policy.php?pId=<?php echo $p_id ;?>";</script>
			<?php
			}
			else{
				echo "Error";
			}
}
$program=$class->fetchdata("select * FROM programs where id='$p_id' and user_id = '$user_id'");
$activepost=$program->fetch(PDO::FETCH_ASSOC);

?>

  <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Fee </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Enter Fee of programs.
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" method="post">
                                        <div class="form-group">
                                            <textarea style="resize: vertical;" name="about" class="form-control" required><?php echo $activepost['fees'];?></textarea>
                                        </div>
										<?php
										if($program->rowCount()>0)
										{?>
									 <input type="submit" class="btn btn-danger" name="update" value="Update"/>
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
require_once "footer.php";
?>