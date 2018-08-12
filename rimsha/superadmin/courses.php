<?php
include "../config.php";
require "includes/header.php";
$programD=$class->fetchdata("SELECT * FROM `programs` where p_status = 'Completed'");
if(isset($_GET['status']))
{
	$status = $_GET['status'];
	$user_id = $_GET['user_id'];
	
	$checkD=$class->fetchdata("SELECT * FROM `notification` WHERE p_id = '$_GET[id]'");
	if($checkD->rowCount()==0)
	{
	$p_name = "Your Program : ".$_GET['p_name']." is not active.";
	$class->insert("INSERT INTO `notification`(`title`, `toNot`,`p_id`) VALUES('$p_name','$user_id','$_GET[id]')");
	}
	if($status=="Pending")
	{
		$query=$class->insert("UPDATE `programs` SET `status`=0 WHERE id = '$_GET[id]'");
		$class->insert("UPDATE `admin_p_detail` SET status=0 WHERE p_id = '$_GET[id]'");
		$p_name = "Your Program : ".$_GET['p_name']." is not active.";
		$class->insert("UPDATE `notification` SET `title`='$p_name' WHERE `p_id` = '$_GET[id]'");
		if($query){
			?>
		 <script> window.location.href="courses.php";</script>
			<?php
			}
	}else	{
		$query=$class->insert("UPDATE `programs` SET `status`=1 WHERE id = '$_GET[id]'");
		$class->insert("UPDATE `admin_p_detail` SET status=1 WHERE p_id = '$_GET[id]'");
		$p_name = "Your Program : ".$_GET['p_name']." is now live.";
		
		$class->insert("UPDATE `notification` SET `title`='$p_name' WHERE `p_id` = '$_GET[id]'");
		
		if($query){
			?>
		 <script> window.location.href="courses.php";</script>
			<?php
			}
	}
}
?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Courses table</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Courses table</strong>
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Program Name</th>
                        <th>Offer By </th>
						<th>Upload By </th>
                        <th>Current Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
					  while($Details=$programD->fetch(PDO::FETCH_ASSOC))
					  {
					  ?>
					  <tr>
                        <td><a href="view_programs.php?id=<?php echo $Details['id'];?>"><?php echo $Details['title'];?></a></td>
                        <td>
						<?php 
						$usersD=$class->fetchdata("SELECT * FROM `users` WHERE `id` = '$Details[user_id]'");
						$UserInfo=$usersD->fetch(PDO::FETCH_ASSOC);
						echo $UserInfo['uni_name'];
						?>
						</td>
						<td><?php echo $UserInfo['name'];?></td>
                        <?php 
						if($Details['status']==0)
						{
						$status = "Pending";
						$do = "Active";
						$color = "bg-danger";
						}else{
						$status = "Active";
						$do = "Pending";
						$color = "bg-success";
						}
						?>
						<td class="<?php echo $color;?>">
						<?php echo $status;?>
						</td>
                        <td><a class="btn btn-danger" href="courses.php?p_name=<?php echo $Details['title']; ?>&user_id=<?php echo $Details['user_id'];?>&id=<?php echo $Details['id'];?>&status=<?php echo $do;?>"><?php echo "Do ".$do;?></a></td>
                      </tr>
					  <?php
					  }
					  ?>
                     
                       
                    </tbody>
                  </table>
                        </div>
                    </div>
                </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/lib/data-table/datatables-init.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        } );
    </script>


</body>
</html>
