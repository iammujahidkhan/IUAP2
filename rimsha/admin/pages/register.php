<?php

include_once "../../config.php";
$email_exist = "";
$name= "";	
$email= "";
$password= "";
if(isset($_POST['done']))
{
$name= $_POST['name'];	
$email= $_POST['email'];
$password= $_POST['pass'];
$role= $_POST['role'];
$status= "active";
if($role == 'admin')
{
$request = "Wanna ".$role;
}else{
$request = "";
}
$uni_name = $_POST['uni_name'];
date_default_timezone_set("Asia/Karachi"); //Your timezone
$created_date = date("d-M-Y h:i:sa");
//
$queryC= $class->fetchdata("select * from users where email = '$email'");
$dataC=$queryC->fetch(PDO::FETCH_ASSOC);
if($dataC['email']==$email)
{
	$email_exist = "Email Already Exist";
}else{
$query=$class->insert("INSERT INTO users  (name,email,pass, role,status, created_date ,request , uni_name) VALUES ('$name','$email','$password','student','$status','$created_date' , '$request' , '$uni_name')");
				if($query){
					
			$class->redirect("login.php");
				}
				else{
					
					echo "Error";
				}
}
}
?>
<script>
  function Test(myval) {
	  var x = document.getElementById("test");
    if(myval=="student")
	{
	  document.getElementById("test").style.visibility = "hidden";
	}
	if(myval=="admin")
	{
	  document.getElementById("test").style.visibility = "visible";
	  
	if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "block";
    }	  
	}
}
</script>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

       <title>University</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Register Here</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post">
                            <fieldset>
								<div class="form-group">
                                    <input class="form-control" value="<?php echo $name;?>" placeholder="Enter Name" name="name" type="text" autofocus>
                                </div>
                                <div class="form-group">
								<h5 class="text-danger"><?php echo $email_exist;?></h5>
                                <input class="form-control" value="<?php echo $email;?>" placeholder="E-mail" name="email" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" value="<?php echo $pass;?>" placeholder="Password" name="pass" type="password">
                                </div>
								
								<div class="form-group">
                                <select name="role" class="form-control" required onchange="Test(this.value)">
								<option value="">Select Role</option>
								<option value="admin">Admin</option>
								</select>
                                </div>
								<div class="form-group" hidden id="test">
                                    <input class="form-control" placeholder="Enter University Name" name="uni_name" type="text" autofocus>
                                </div>
                                <div class="checkbox hidden">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="Submit" class="btn btn-lg btn-success btn-block" name="done" value="Sign Up">
								<br>
                                <a  href="login.php" type="button"  > <p class="text-center">Have An Account</p></a>
                                
								
							
							</fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
