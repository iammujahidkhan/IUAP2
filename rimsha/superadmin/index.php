<?php
require "includes/header.php";
$query= $class->fetchdata("select * from users where id='$_SESSION[id]'");
		$data=$query->fetch(PDO::FETCH_ASSOC);	
		if($data['role']=="admin" || $data['role']=="student")
		{
		?>
		<script> window.location.href="logout.php";</script>
		<?php 	
		}

?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Latest Contacts</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"></li>
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
                            <strong class="card-title">Contact Us</strong>
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
						<th>Subject</th>
						<th>Message</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                      <?php
					  $programD=$class->fetchdata("SELECT * FROM `contact` order by id asc");
					  while($Details=$programD->fetch(PDO::FETCH_ASSOC))
					  {
					  ?>
					  <tr>
                        <td><?php echo $Details['name'];?></td>
                        <td><?php	echo $Details['email'];?></td>
						<td><?php echo $Details['phone'];?></td>
						<td><?php echo $Details['subject'];?></td>
						<td><?php echo $Details['message'];?></td>
                       
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
