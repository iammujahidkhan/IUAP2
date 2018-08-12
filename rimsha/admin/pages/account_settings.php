<?php
require_once "assets/header.php";
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
                                    <form role="form">
                                        <div class="form-group">
                                            <label>Old Password</label>
                                            <input class="form-control" required>
                                          
                                        </div>
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input class="form-control" required>
                                        </div>
                                         <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input class="form-control" required>
                                        </div>
                                      
                                     <input type="submit" class="btn btn-danger" value="Change Password"/>
                                      
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
require_once "assets/footer.php";
?>