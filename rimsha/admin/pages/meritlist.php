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

		if(isset($_POST['selected']))
		{
		$query=$class->insert("UPDATE `meritlist` SET `status`='selected' WHERE `p_id` = '$_POST[p_id]' and `s_id` = '$_POST[user_id]'");		
		$query=$class->insert("UPDATE `course_enrolled` SET `status`='selected' WHERE `p_id` = '$_POST[p_id]' and `user_id` = '$_POST[user_id]'");		
		
		}
		
	if(isset($_POST['testNO']))
	{
	$title_p_name = $_POST['p_name'];
	$query=$class->insert("UPDATE `course_enrolled` SET `marks`='$_POST[testNO]' WHERE p_id = $_POST[p_id]");
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
	$query=$class->insert("UPDATE `course_enrolled` SET `interview_marks`='$_POST[interviewNO]' WHERE p_id = $_POST[p_id]");
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
	$course_enrolled_query = $class->fetchdata("SELECT * FROM course_enrolled WHERE `cnic` like '$_POST[cnic]%'");
}else{
	$course_enrolled_query = $class->fetchdata("SELECT * FROM  course_enrolled WHERE `by_`='$user_id'");
}
		
if(isset($_GET['pId']))
{
	$course_enrolled_query = $class->fetchdata("SELECT * FROM course_enrolled WHERE `p_id`='$_GET[pId]' and `by_`='$user_id'");
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
        <th colspan="2">Program Name</th>
      </tr>
    </thead>
    <tbody>
	 <?php
	 $course_query = $class->fetchdata("SELECT * FROM `programs` WHERE `user_id`='$user_id' and p_status = 'Completed' and status = '1'");
	 while($Datacourse_query = $course_query->fetch(PDO::FETCH_ASSOC))
	 {
	 ?>
	 <tr>
	 <td><a href="meritlist.php?pId=<?php echo $Datacourse_query['id'];?>"><?php echo $Datacourse_query['title'];?></a></td>
	 <td><a class="btn btn-info" href="generateMeritlist.php?pId=<?php echo $Datacourse_query['id'];?>&page=1">Generate Merit List</a></td>
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
	<th colspan="7">
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
		<th>Domicile District</th>
		<th>Aggregate</th>
		<th>Action</th>
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
									
									$SEquery= $class->fetchdata("SELECT * FROM `student_e_detail` where user_id='$data_course_enrolled_query[user_id]'");
									$SEDataP=$SEquery->fetch(PDO::FETCH_ASSOC);
									
									$Userquery= $class->fetchdata(" select * from users where id='$data_course_enrolled_query[user_id]'");
									$Userdata=$Userquery->fetch(PDO::FETCH_ASSOC);
									
									$query_student_p_detail= $class->fetchdata("SELECT * FROM `student_p_detail` where user_id='$data_course_enrolled_query[user_id]'");
									$CninData=$query_student_p_detail->fetch(PDO::FETCH_ASSOC);
									?>
									<tr class="odd gradeX">
                                        <td><?php echo $p_name = $dataP['uni_program'];?></td>
                                        <td><?php echo $s_name = $Userdata['name'];?></td>
                                        <td><?php echo $s_email = $Userdata['email'];?></td>
										<td><?php echo $s_cnic = $data_course_enrolled_query['cnic'];?></td>
										<td><?php echo $s_domicile = $CninData['domicileDistrict'];?></td>
									    <td>
										<?php
					$queryMerit= $class->fetchdata("SELECT * FROM `admin_e_criteria` where p_id='$data_course_enrolled_query[p_id]'");
					$MeritData=$queryMerit->fetch(PDO::FETCH_ASSOC);
					/*echo "ssc".$MeritData['af_matric'];
					echo "fsc".$MeritData['af_inter'];
					echo "bs".$MeritData['af_bachlor'];
					echo $MeritData['af_master'];
					echo $MeritData['af_mphil'];
					echo $MeritData['ahq'];
					echo $MeritData['aet'];
					echo $MeritData['ait']."<br>";*/
					$s_aggregate  ="";
					if($SeatsData['type']=="enteryTest")
					{					
					if(empty($data_course_enrolled_query['E_total']) || empty($data_course_enrolled_query['I_total']) )
					{
						echo "Enter Interview Marks Or Entry Test Marks";
					}
					else
					{
					if(empty($SEDataP['ssc_max_marks']))
					{
						$SEDataP['ssc_max_marks'] = 1;
						//echo "ssc";
					}
					if(empty($SEDataP['fa_max_marks']))
					{
						$SEDataP['fa_max_marks'] = 1;
						//echo "fa";
					}
					if(empty($SEDataP['bs_max_marks']))
					{
						$SEDataP['bs_max_marks'] = 1;
						//echo "bs";
					}
					if(empty($SEDataP['ms_max_marks']))
					{
						$SEDataP['ms_max_marks'] = 1;
						//echo "ms";
					}
echo $s_aggregate=(round(($SEDataP['ssc_obtained']/$SEDataP['ssc_max_marks']*$MeritData['af_matric'])+($SEDataP['fa_obtained']/$SEDataP['fa_max_marks']*$MeritData['af_inter'])+($SEDataP['bs_obtained']/$SEDataP['bs_max_marks']*$MeritData['af_bachlor'])+($SEDataP['ms_obtained']/$SEDataP['ms_max_marks']*$MeritData['af_master'])+ ($data_course_enrolled_query['marks']/$data_course_enrolled_query['E_total']*$MeritData['aet']) +($data_course_enrolled_query['interview_marks']/$data_course_enrolled_query['I_total']*$MeritData['ait']),3));
					}
					}else{
					if(empty($data_course_enrolled_query['E_total']))
					{
						$data_course_enrolled_query['E_total'] = 1;
					}
					if(empty($data_course_enrolled_query['I_total']))
					{
						$data_course_enrolled_query['I_total'] = 1;
					}
					if(empty($SEDataP['ssc_max_marks']))
					{
						$SEDataP['ssc_max_marks'] = 1;
						//echo "ssc";
					}
					if(empty($SEDataP['fa_max_marks']))
					{
						$SEDataP['fa_max_marks'] = 1;
						//echo "fa";
					}
					if(empty($SEDataP['bs_max_marks']))
					{
						$SEDataP['bs_max_marks'] = 1;
						//echo "bs";
					}
					if(empty($SEDataP['ms_max_marks']))
					{
						$SEDataP['ms_max_marks'] = 1;
						//echo "ms";
					}
echo $s_aggregate=(round(($SEDataP['ssc_obtained']/$SEDataP['ssc_max_marks']*$MeritData['af_matric'])+($SEDataP['fa_obtained']/$SEDataP['fa_max_marks']*$MeritData['af_inter'])+($SEDataP['bs_obtained']/$SEDataP['bs_max_marks']*$MeritData['af_bachlor'])+($SEDataP['ms_obtained']/$SEDataP['ms_max_marks']*$MeritData['af_master'])+ ($data_course_enrolled_query['marks']/$data_course_enrolled_query['E_total']*$MeritData['aet']) +($data_course_enrolled_query['interview_marks']/$data_course_enrolled_query['I_total']*$MeritData['ait']),3));
										
					}
					?>
					</td>
					<td>
<?php
if($data_course_enrolled_query['status']=="selected")
{
	echo "selected";
}else{
?>					
					<form method="post" action="meritlist.php">
					<input type="hidden" name="p_id"   	value="<?php echo $data_course_enrolled_query['p_id'];?>"/>
					<input type="hidden" name="user_id" 	value="<?php echo $data_course_enrolled_query['user_id'];?>"/>				   
					<label class="checkbox-inline">
					<input type="checkbox" name="selected" onChange="this.form.submit()" value="<?php $data_course_enrolled_query['user_id']?>">SELECT
					</label>
					</form>
					<?php
}
?>
					</td>
					<?php
			$admin_id = $data_course_enrolled_query['by_'];
			$p_id = $data_course_enrolled_query['p_id'];
			$s_id = $data_course_enrolled_query['user_id'];
			$query1= $class->fetchdata("SELECT * FROM `meritlist` WHERE `p_id` = '$p_id' and `admin_id` = '$admin_id' and `s_id` = '$s_id'");
			if($query1->rowCount()==0)
			{
			//$data=$query->fetch(PDO::FETCH_ASSOC);
		$query=$class->insert("INSERT INTO `meritlist`(`p_name`, `p_id`, `s_email`, `s_name`, `s_cnic`, `s_domicile`, `s_aggregate`, `admin_id`, `s_id`, `status`) VALUES ('$p_name','$p_id','$s_email','$s_name','$s_cnic','$s_domicile','$s_aggregate','$admin_id','$s_id','')");
			}else{
		$query=$class->insert("UPDATE `meritlist` SET `s_cnic`='$s_cnic',s_domicile = '$s_domicile',`s_aggregate`='$s_aggregate' WHERE `p_id` = '$p_id' and `admin_id` = '$admin_id' and `s_id` = '$s_id'");		
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
include "assets/footer.php";
?>