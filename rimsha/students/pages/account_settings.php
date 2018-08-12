<?php
require_once "header.php";
$programD=$class->fetchdata("SELECT * FROM users where id='$user_id'");
$Details=$programD->fetch(PDO::FETCH_ASSOC);
$error = "";
if(isset($_POST['done']))
{
$old = $_POST['old'];
$new = $_POST['new'];
$confirm = $_POST['confirm'];
if($Details['pass']==$old)
{
if($new==$confirm)
{
$query=$class->insert("UPDATE `users` SET `pass`='$confirm' where id ='$user_id'");
if($query)
{?>
<script> alert("Updated"); </script>
<?php
}
}else{
	$error = "New Password Not Match with confirm Password";
}	
}else{
	$error = "Old Password Not Match";
}
}
?>
  <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Account Settings</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Change Password
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" method="post">
									<h3 style="color:red;"><?php echo $error;?></h3>
                                        <div class="form-group">
                                            <label>Old Password</label>
                                            <input class="form-control" name="old" required>
                                          
                                        </div>
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input class="form-control" name="new" required>
                                        </div>
                                         <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input class="form-control" name="confirm" required>
                                        </div>
                                      
                                     <input type="submit" name="done" class="btn btn-danger" value="Change Password"/>
                                      
                                    </form>
                                </div>
                               
                            </div>
                            <!-- /.row (nested) -->
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
<?php
require_once "footer.php";
?>