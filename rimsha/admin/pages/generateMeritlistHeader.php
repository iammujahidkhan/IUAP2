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
?>