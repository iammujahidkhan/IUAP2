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
		
		
	if(isset($_POST['testNO']))
	{
	$title_p_name = $_POST['p_name'];
	$query=$class->insert("UPDATE `course_enrolled` SET `marks`='$_POST[testNO]' WHERE p_id = $_POST[p_id] and user_id = '$_POST[user_id]'");
	$checkD=$class->fetchdata("SELECT * FROM `notification` WHERE p_id = '$_POST[p_id]'");

	if($checkD->rowCount()==0)
	{
	$p_name = "Yours Entry Test Marks ".$_POST['testNO']." are added for program ".$title_p_name;
    $class->insert("INSERT INTO `notification`(`title`,`fromNot`,`toNot`,`p_id`) VALUES('$p_name','$user_id','$_POST[user_id]','$_POST[p_id]')");
	}else{
	$p_name = "Yours Entry Test Marks ".$_POST['testNO']." are added for program ".$title_p_name;
	$class->insert("UPDATE `notification` SET `title`='$p_name',`toNot`='$_POST[user_id]',`fromNot`='$user_id' where `p_id`='$_POST[p_id]'");	
	}
	
	}
	if(isset($_POST['interviewNO']))
	{
	$title_p_name = $_POST['p_name'];
	$query=$class->insert("UPDATE `course_enrolled` SET `interview_marks`='$_POST[interviewNO]' WHERE p_id = $_POST[p_id] and user_id = '$_POST[user_id]'");
	$checkD=$class->fetchdata("SELECT * FROM `notification` WHERE p_id = '$_POST[p_id]'");

	if($checkD->rowCount()==0)
	{
	$p_name = "Yours Interview Marks ".$_POST['interviewNO']." are added for program ".$title_p_name;
    $class->insert("INSERT INTO `notification`(`title`,`fromNot`,`toNot`,`p_id`) VALUES('$p_name','$user_id','$_POST[user_id]','$_POST[p_id]')");
	}else{
	$p_name = "Yours Interview Marks ".$_POST['interviewNO']." are added for program ".$title_p_name;
	$class->insert("UPDATE `notification` SET `title`='$p_name',`toNot`='$_POST[user_id]',`fromNot`='$user_id' where `p_id`='$_POST[p_id]'");	
	}
	}
	if(isset($_POST['TotalsEntryTest']))
	{
	$title_p_name = $_POST['p_name'];
	$query=$class->insert("UPDATE `course_enrolled` SET `E_total`='$_POST[TotalsEntryTest]' WHERE p_id = $_POST[p_id] and user_id = '$_POST[user_id]'");
	}
	if(isset($_POST['TotalsInterviewTest']))
	{
	$title_p_name = $_POST['p_name'];
	$query=$class->insert("UPDATE `course_enrolled` SET `I_total`='$_POST[TotalsInterviewTest]' WHERE p_id = $_POST[p_id] and user_id = '$_POST[user_id]'");
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
if(isset($_POST['cnic']))
{
	$course_enrolled_query = $class->fetchdata("SELECT * FROM `course_enrolled` WHERE `cnic` like '$_POST[cnic]%'");	
}else{
	$course_enrolled_query = $class->fetchdata("SELECT * FROM `course_enrolled` WHERE `by_`='$user_id'");
}
		
if(isset($_GET['pId']))
{
	$course_enrolled_query = $class->fetchdata("SELECT * FROM `course_enrolled` WHERE `p_id`='$_GET[pId]'");
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
	 <td><a href="enroll.php?pId=<?php echo $Datacourse_query['id'];?>"><?php echo $Datacourse_query['title'];?></a></td>
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
	<th colspan="6">
	<form method="post">
	<input class="form-control" name="cnic" type="search" placeholder="Search by Cnic">
	</form>
	</th>
	</tr>
      <tr>
        <th>Program Name</th>
        <th>Student Name</th>
		<th>Student Email</th>
		<th>Student CNIC</th>
		<th>Enter Entry Test Marks</th>
		<th>Interview Test Marks</th>
      </tr>
    </thead>
    <tbody>
		<?php
		while($data_course_enrolled_query=$course_enrolled_query->fetch(PDO::FETCH_ASSOC))
		{
		
									
									$queryP= $class->fetchdata(" select * from admin_p_detail where p_id='$data_course_enrolled_query[p_id]'");
									$dataP=$queryP->fetch(PDO::FETCH_ASSOC);
									
									$querySeats= $class->fetchdata(" select * from admin_e_criteria where p_id='$data_course_enrolled_query[p_id]'");
									$SeatsData=$querySeats->fetch(PDO::FETCH_ASSOC);
									
									$Userquery= $class->fetchdata(" select * from users where id='$data_course_enrolled_query[user_id]'");
									$Userdata=$Userquery->fetch(PDO::FETCH_ASSOC);
									
									$query_student_p_detail= $class->fetchdata("SELECT * FROM `student_p_detail` where user_id='$data_course_enrolled_query[user_id]'");
									$CninData=$query_student_p_detail->fetch(PDO::FETCH_ASSOC);
									
									//updating
									$class->insert("UPDATE `course_enrolled` SET `cnic`='$CninData[cnic]' where user_id='$data_course_enrolled_query[user_id]'");
									//
									
									?>
									<tr class="odd gradeX">
                                        <td><?php echo $dataP['uni_program'];?></td>
                                        <td><?php echo $Userdata['name'];?></td>
                                        <td><?php echo $Userdata['email'];?></td>
										<td><?php echo $data_course_enrolled_query['cnic'];?></td>
                                    <?php
									   if($SeatsData['type']=="enteryTest")
									{
									?>
									   <td>
										<div class="form-group row">
										<div class="col-xs-6">
										<?php
										if(isset($_GET['pId']))
										{?>
										<form method="post" action="enroll.php?pId=<?php echo $_GET['pId']?>">	
										<?php
										}else{?>
										<form method="post" action="enroll.php">	
										<?php
										}
										?>
									   <input type="text" class="form-control"	name="testNO" required 	value="<?php echo $data_course_enrolled_query['marks'];?>" placeholder="Obtained Marks"/>
									   <input type="hidden" name="p_id"   	value="<?php echo $data_course_enrolled_query['p_id'];?>"/>
									   <input type="hidden" name="user_id" 	value="<?php echo $data_course_enrolled_query['user_id'];?>"/>
									   <input type="hidden" name="p_name" 	value="<?php echo $dataP['uni_program'];?>"/>
									   </form>
										</div>
										<div class="col-xs-6">
										<?php
										if(isset($_GET['pId']))
										{?>
										<form method="post" action="enroll.php?pId=<?php echo $_GET['pId']?>">	
										<?php
										}else{?>
										<form method="post" action="enroll.php">	
										<?php
										}
										?>
									   <input type="text" class="form-control"	name="TotalsEntryTest" required 	value="<?php echo $data_course_enrolled_query['E_total'];?>" placeholder="Totals Marks"/>
									   <input type="hidden" name="p_id"   	value="<?php echo $data_course_enrolled_query['p_id'];?>"/>
									   <input type="hidden" name="user_id" 	value="<?php echo $data_course_enrolled_query['user_id'];?>"/>
									   <input type="hidden" name="p_name" 	value="<?php echo $dataP['uni_program'];?>"/>
									   </form>
										</div>
										</div>
									   </td>
									  <td>
										<div class="form-group row">
										<div class="col-xs-6">
										<?php
										if(isset($_GET['pId']))
										{?>
										<form method="post" action="enroll.php?pId=<?php echo $_GET['pId']?>">	
										<?php
										}else{?>
										<form method="post" action="enroll.php">	
										<?php
										}
										?>
									   <input type="text" class="form-control"	name="interviewNO" required 	value="<?php echo $data_course_enrolled_query['interview_marks'];?>" placeholder="Obtained Marks"/>
									   <input type="hidden" name="p_id"   	value="<?php echo $data_course_enrolled_query['p_id'];?>"/>
									   <input type="hidden" name="user_id" 	value="<?php echo $data_course_enrolled_query['user_id'];?>"/>
									   <input type="hidden" name="p_name" 	value="<?php echo $dataP['uni_program'];?>"/>
									   </form>
										</div>
										<div class="col-xs-6">
										<?php
										if(isset($_GET['pId']))
										{?>
										<form method="post" action="enroll.php?pId=<?php echo $_GET['pId']?>">	
										<?php
										}else{?>
										<form method="post" action="enroll.php">	
										<?php
										}
										?>
									   <input type="text" class="form-control"	name="TotalsInterviewTest" required 	value="<?php echo $data_course_enrolled_query['I_total'];?>" placeholder="Totals Marks"/>
									   <input type="hidden" name="p_id"   	value="<?php echo $data_course_enrolled_query['p_id'];?>"/>
									   <input type="hidden" name="user_id" 	value="<?php echo $data_course_enrolled_query['user_id'];?>"/>
									   <input type="hidden" name="p_name" 	value="<?php echo $dataP['uni_program'];?>"/>
									   </form>
										</div>
										</div>
									   </td>
									   <?php
									}
									?>
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
/*for($i=9;$i<=29;$i++)
{
	if($i%2==0)
	{
		$no = 1;
	}else{
		$no = 3;
	}
echo "INSERT INTO `course_enrolled`(`p_id`, `user_id`, `cnic`, `marks`, `E_total`, `interview_marks`, `I_total`, `by_`) VALUES ('".$no."','".$i."','112131124124141','45','100','67','100','4');<br>";
}
*/

include "assets/footer.php";
?>