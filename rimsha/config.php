<?php

    $host = "localhost";
	$db_name = "education";
    $username = "root";
    $password = "";

	try	{
		
		$DB_con= new PDO ("mysql:host={$host};dbname={$db_name}",$username,$password);
		$DB_con->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
		//echo "Connected";
	}
	catch (PDOException $e)
	{
		echo $e->getMessage();
	}
	require_once "classcrud.php";
	$class= new crud($DB_con);
	
?>