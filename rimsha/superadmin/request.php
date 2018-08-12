<?php
include "../config.php";
require "includes/header.php";
$programD=$class->fetchdata("SELECT * FROM `users` where request='Wanna admin' ");
if(isset($_GET['status']))
{
	$status = $_GET['status'];
	if($status=="Wanna admin")
	{
		$query=$class->insert("UPDATE `users` SET `role`='admin', `request`='' WHERE id = '$_GET[id]'");
		if($query){
			?>
		<script> window.location.href="request.php";</script>
			<?php
			}
	}else	{
		$query=$class->insert("UPDATE `users` SET `role`='student' WHERE id = '$_GET[id]'");
		if($query){
			?>
		<script> window.location.href="request.php";</script>
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
                        <th>User Name</th>
                        <th>University  </th>
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
                        <td><?php echo $Details['name'];?></td>
                        <td>
						<?php	echo $Details['uni_name'];?>
						</td>
						<td class="<?php echo $color;?>">
						<?php echo $Details['role'];?>
						</td>
             <td><a class="btn btn-danger" href="request.php?id=<?php echo $Details['id'];?>&status=<?php echo $Details['request'];?>"><?php echo $Details['request'];?></a></td>
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
