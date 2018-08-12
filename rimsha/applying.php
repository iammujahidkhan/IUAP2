<?php
session_start();
if(!empty($_SESSION['id']))
{
$user_id = $_SESSION['id'];	
}
include "config.php";
$p_id = $_GET['id'];
$user_id = $_GET['user_id'];

$pD=$class->fetchdata("SELECT * FROM `programs` where id = '$p_id'");
$DP=$pD->fetch(PDO::FETCH_ASSOC);

$query_student_p_detail=$class->fetchdata("SELECT * FROM `student_p_detail` where user_id='$user_id'");
$CninData=$query_student_p_detail->fetch(PDO::FETCH_ASSOC);
$cnic=$CninData['cnic'];
$checkD=$class->fetchdata("SELECT * FROM `notification` WHERE p_id = '$p_id' and fromNot = '$DP[user_id]'");

if($checkD->rowCount()==0)
{
	$p_name = "You have successfully applied to  ".$DP['title']." program.";
	$class->insert("INSERT INTO `notification`(`title`,`fromNot`,`toNot`,`p_id`) VALUES('$p_name','$DP[user_id]','$user_id','$p_id')");
	$class->insert("INSERT INTO `notification`(`title`,`fromNot`,`toNot`,`p_id`) VALUES('New Student enroll to your programs','$user_id','$DP[user_id]','$p_id')");
}


$pName=$class->fetchdata("SELECT * FROM `course_enrolled` where p_id = '$p_id' and user_id = '$user_id'");
$NameD=$pName->fetch(PDO::FETCH_ASSOC);

if(isset($_GET['cancel']))
{
//removed notification
$p_name = "You have Cancel applied to  ".$DP['title']." program.";
$class->insert("UPDATE `notification` SET `title`='$p_name',`toNot`='$user_id',`fromNot`='$DP[user_id]' where `p_id`='$p_id'");
$class->insert("INSERT INTO `notification`(`title`,`fromNot`,`toNot`,`p_id`) VALUES('Student removed enroll from your programs','$user_id','$DP[user_id]','$p_id')");
//removed notification
if($pName->rowCount()==1)
{
if($class->delet("DELETE FROM `course_enrolled` WHERE p_id = '$p_id' and user_id = '$user_id'"))
{
$class->redirect("view_programs.php?id=".$p_id."&message=Removed From Applied");
}
}
}else{
if($pName->rowCount()>0)
{
	echo "Already Applied";
}else{
//add notification
$p_name = "You have successfully applied to  ".$DP['title']." program.";
$class->insert("UPDATE `notification` SET `title`='$p_name',`toNot`='$user_id',`fromNot`='$DP[user_id]' where `p_id`='$p_id'");
$class->insert("INSERT INTO `notification`(`title`,`fromNot`,`toNot`,`p_id`) VALUES('New Student enroll to your programs','$user_id','$DP[user_id]','$p_id')");
	//add notification
	
	if($class->insert("INSERT INTO `course_enrolled`(`p_id`, `user_id`, `cnic`,`by_`) VALUES('$p_id','$user_id','$cnic','$DP[user_id]')"))
	{
		$class->redirect("view_programs.php?id=".$p_id."&message=Applied");
	}
}
}
?>