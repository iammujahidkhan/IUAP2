<?php
session_start();
include "../../config.php";
if(empty($_SESSION['id']))
		{
			 ?>
			 <script> window.location.href="login.php";</script>
			 <?php 
		}else{
			$user_id = $_SESSION['id'];
		}

		$query= $class->fetchdata(" select * from users where id='$user_id'");
		$data=$query->fetch(PDO::FETCH_ASSOC);
		if($data['role']=="student")
		{
		?>
		<script> window.location.href="logout.php";</script>
		<?php 	
		}
		

if(isset($_POST['add_done']))
{
$title= $_POST['title'];

	try {
    $sql = "INSERT INTO `programs`(`title`, `user_id`) VALUES('$title','$user_id')";
    // use exec() because no results are returned
    $DB_con->exec($sql);
    $last_id = $DB_con->lastInsertId();
	$_SESSION['pId'] = $last_id;
	
	$class->redirect("instruction.php?pId=".$_SESSION['pId']);
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

}

		
if(isset($_GET['pId']))
{
	$course_enrolled_query = $class->fetchdata("SELECT * FROM `meritlist` WHERE  `admin_id`='$user_id' and `p_id`='$_GET[pId]' and status = 'selected' order by `s_aggregate` desc");
}else{
	$course_enrolled_query = $class->fetchdata("SELECT * FROM `meritlist` WHERE `admin_id`='$user_id' and status = 'selected' order by `s_aggregate` desc");
}
include "assets/main_header.php";		
?>
<div class="row">
<div class="col-md-12">
<div class="col-md-3">
 <div class="table-responsive">
 <table class="table table-hover table-bordered">
    <thead>
      <tr>
        <th>Program Name</th>
      </tr>
    </thead>
    <tbody>
	 <?php
	 $course_query = $class->fetchdata("SELECT * FROM `programs` WHERE `user_id`='$user_id' and p_status = 'Completed' and status = '1'");
	 while($Datacourse_query = $course_query->fetch(PDO::FETCH_ASSOC))
	 {
	 ?>
	 <tr>
	 <td><a href="selected_students.php?pId=<?php echo $Datacourse_query['id'];?>"><?php echo $Datacourse_query['title'];?></a></td>
	 </tr>
	 <?php
	 }
	 ?>
	 </tbody>
  </table>
</div>
</div>
<div class="col-md-9">
 <div class="table-responsive">
 <table class="table table-hover table-bordered">
    <thead>
	
      <tr>
        <th>Program Name</th>
        <th>Student Name</th>
		<th>Student Email</th>
		<th>Student CNIC</th>
		<th>Domicile</th>
		<th>Aggregate</th>
      </tr>
    </thead>
    <tbody>
		<?php
		while($data_course_enrolled_query=$course_enrolled_query->fetch(PDO::FETCH_ASSOC))
		{
									?>
									<tr class="odd gradeX">
                                        <td><?php echo $data_course_enrolled_query['p_name'];?></td>
                                        <td><?php echo $data_course_enrolled_query['s_name'];?></td>
                                        <td><?php echo $data_course_enrolled_query['s_email'];?></td>
										<td><?php echo $data_course_enrolled_query['s_cnic'];?></td>
										<td><?php echo $data_course_enrolled_query['s_domicile'];?></td>
										<td><?php echo $data_course_enrolled_query['s_aggregate'];?></td>
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

<?php
include "assets/footer.php";
?>