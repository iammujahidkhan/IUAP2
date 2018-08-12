		<?php
		include "header.php";

		$query= $class->fetchdata("select * from users where id='$user_id'");
		$data=$query->fetch(PDO::FETCH_ASSOC);	
		if($data['role']=="admin" || $data['role']=="superadmin")
		{
		?>
		<script> window.location.href="logout.php";</script>
		<?php 	
		}
		$course_enrolled_query= $class->fetchdata("SELECT * FROM `course_enrolled` where user_id='$user_id'");
		?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Applied Courses</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span>Applied Courses Table</span>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Programe</th>
                                        <th>Department</th>
                                        <th>University</th>
										<th>Entry Test Marks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
									while($data_course_enrolled_query=$course_enrolled_query->fetch(PDO::FETCH_ASSOC))
									{
									$queryP= $class->fetchdata(" select * from admin_p_detail where p_id='$data_course_enrolled_query[p_id]'");
									$dataP=$queryP->fetch(PDO::FETCH_ASSOC);
									?>
									<tr class="odd gradeX">
                                        
										<td><a href="../../view_programs.php?id=<?php echo $dataP['p_id'];?>"><?php echo $dataP['uni_program'];?></td></a>
                                        <td><?php echo $dataP['uni_dept'];?></td>
                                        <td><?php echo $dataP['uni_name'];?></td>
										<td><?php echo $data_course_enrolled_query['marks'];?></td>
										
                                    </tr>
									<?php
									}
									?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                           
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

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
</body>
</html>