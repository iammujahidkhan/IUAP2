<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="images/logo.png" alt="">
                    </a>
                </div>
                <div class="login-form">
				
				<?php
include "../class.php";
$class = new USER();
if(isset($_POST['signUp']))
{
$uName = $_POST['uName'];
$uEmail = $_POST['uEmail'];
$uPass = $_POST['uPass'];
$uRole = $_POST['uRole'];

$check = $class->runQuery("SELECT * FROM `users` WHERE `uEmail` = '$uEmail'");
$data = $check->fetch(PDO::FETCH_ASSOC);
if($check->rowCount()==1)
{
echo "already";
}else{
echo "not";
}
}
?>


                    <form method="post">
					<div class="form-group">
                            <label>Your Name</label>
                            <input type="text" name="uName" required class="form-control" placeholder="Name">
                        </div>  
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" name="uEmail"  value="<?php if(isset($error)){echo $uEmail;}?>" required class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="uPass" required class="form-control" placeholder="Password">
                        </div>
						  <select class="form-control" name="uRole" required="">
								<option value="">...</option>
								<option value="admin">As University Admin</option>
								<option value="student">As Student</option>
							  </select>
                        <div class="checkbox" hidden>
                           
                            <label class="pull-right">
                                <a href="#" >Forgotten Password?</a>
                            </label>

                        </div>
						<br>
                        <input type="submit" name="signUp" class="btn btn-success btn-flat m-b-30 m-t-30" value="Sign Up"/>
                       
                        <div class="register-link m-t-15 text-center">
                            <p>Already have account ? <a href="adminLogin.php"> Sign In Here</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


</body>
</html>
