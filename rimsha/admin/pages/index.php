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
		if($data['role']=="student" || $data['role']=="superadmin")
		{
		?>
		<script> window.location.href="logout.php";</script>
		<?php 	
		}
		
		$program_query= $class->fetchdata("SELECT * FROM `programs` WHERE `user_id` ='$user_id'");
	

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
include "assets/main_header.php";			
?>

 <div class="table-responsive">
 <table class="table table-hover table-bordered">
    <thead>
      <tr>
        <th>Program Name</th>
        <th>Action</th>
		<th>Status</th>
      </tr>
    </thead>
    <tbody>
	<?php
	while($p_data=$program_query->fetch(PDO::FETCH_ASSOC))
	{
	?>
     <tr>
     <td><a href="../../view_programs.php?id=<?php echo $p_data['id'];?>"><?php echo $p_data['title'];?></a></td>	
     <td>
	<?php
	$admin_about= $class->fetchdata("SELECT * FROM `admin_about` WHERE `p_id` ='$p_data[id]'");
	$admin_p_detail=$class->fetchdata("SELECT * FROM `admin_p_detail` where p_id='$p_data[id]' and user_id='$user_id'");
	$admin_e_criteria=$class->fetchdata("SELECT * FROM `admin_e_criteria` where p_id='$p_data[id]' and user_id='$user_id'");
	$admin_a_schedule=$class->fetchdata("SELECT * FROM `admin_a_schedule` where p_id='$p_data[id]' and user_id='$user_id'");
	$admin_criteria_list=$class->fetchdata("SELECT * FROM `admin_criteria_list` where p_id='$p_data[id]' and user_id='$user_id'");
	//$programD=$class->fetchdata("SELECT * FROM `admin_late_admission` where p_id='$p_data[id]' and user_id='$user_id'");
	$admin_late_admission=$class->fetchdata("SELECT * FROM `admin_late_admission` where p_id='$p_data[id]' and user_id='$user_id'");
	if($admin_about->rowCount()==0)
	{
	?>		
	<a href="instruction.php?pId=<?php echo $p_data['id'];?>" class="text-default" style="text-decoration:none;"><span class="glyphicon glyphicon-repeat"></span> Draft</a>
	<?php
	}else if($admin_p_detail->rowCount()==0)
	{
	?>		
	<a href="instruction.php?pId=<?php echo $p_data['id'];?>" class="text-default" style="text-decoration:none;"><span class="glyphicon glyphicon-repeat"></span> Draft</a>
	<?php
	}
	else if($admin_e_criteria->rowCount()==0)
	{
	?>		
	<a href="instruction.php?pId=<?php echo $p_data['id'];?>" class="text-default" style="text-decoration:none;"><span class="glyphicon glyphicon-repeat"></span> Draft</a>
	<?php
	}
	else if($admin_a_schedule->rowCount()==0)
	{
	?>		
	<a href="instruction.php?pId=<?php echo $p_data['id'];?>" class="text-default" style="text-decoration:none;"><span class="glyphicon glyphicon-repeat"></span> Draft</a>
	<?php
	}
	else if($admin_criteria_list->rowCount()==0)
	{
	?>		
	<a href="instruction.php?pId=<?php echo $p_data['id'];?>" class="text-default" style="text-decoration:none;"><span class="glyphicon glyphicon-repeat"></span> Draft</a>
	<?php
	}
	else if($admin_late_admission->rowCount()==0)
	{
	?>		
	<a href="instruction.php?pId=<?php echo $p_data['id'];?>" class="text-default" style="text-decoration:none;"><span class="glyphicon glyphicon-repeat"></span> Draft</a>
	<?php
	}
	else {
	$class->insert("UPDATE `programs` SET `p_status`='Completed' WHERE id = '$p_data[id]'");
	$class->insert("UPDATE `admin_p_detail` SET `p_status`='Completed' WHERE p_id = '$p_data[id]'");
	?>
	<a href="instruction.php?pId=<?php echo $p_data['id'];?>" class="text-success" style="text-decoration:none;"><span class="glyphicon glyphicon-check"></span> Completed</a>
	<?php
	}
	?>
	</td>
	<td>
	<?php
	if($p_data['status']==0)
	{
	echo "<span class='text-danger'>Pending</span>";
	}else{
	echo "<span class='text-danger'>Active</span>";
	}	
	?></td>
     </tr>
    <?php
	}
	?>
    </tbody>
  </table>
</div>
</div>

<?php
include "assets/footer.php";
?>