<?php
require_once "header.php";
if(isset($_GET['id']))
		{
			$id = $_GET['id'];
			$query=$class->insert("DELETE FROM `notification` WHERE id = '$id'");
				if($query){
				 ?>
			 <script> window.location.href="notifications.php";</script>
			 <?php	
				}
		}
?>

   <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Notifications</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Latest Alert for you
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <?php
						   $checkD=$class->fetchdata("SELECT * FROM `notification` WHERE toNot = '$user_id'");
						    while($notData=$checkD->fetch(PDO::FETCH_ASSOC))
						   {
						   ?>						   
							<div class="alert alert-success">
                            <?php echo $notData['title'];?><a href="notifications.php?id=<?php echo $notData['id'];?>" title="Clear" class="alert-link"><i class="fa fa-close fa-fw"></i></a>.
                            </div>
						   <?php
						   }
						  
						   ?>
                        </div>
                        <!-- .panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
               
            </div>
            
        </div>
        <!-- /#page-wrapper -->
<?php
require_once "footer.php";
?>