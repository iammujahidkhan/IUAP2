<?php
require "includes/addProgramHeader.php";
?>

        

        <div class="content mt-3">
  <div class="row">
                  <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Programs Details </strong>
                        </div>
                        <div class="card-body">
                          <!-- Credit Card -->
                          <div id="pay-invoice">
                              <div class="card-body">
                                  <div class="card-title">
                                      <h3 class="text-center">Enter Your University Offer Program Details.</h3>
                                  </div>
                                  <hr>
                                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                         
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">University Name</label></div>
                            <div class="col-12 col-md-9">
							<input type="text" required name="uni_name" class="form-control">
							</div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="email-input" class=" form-control-label">Programme Name</label></div>
                            <div class="col-12 col-md-9">
							<input type="text" name="p_name" class="form-control">
							</div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="password-input" class=" form-control-label">Department</label></div>
                            <div class="col-12 col-md-9">
							<input type="text" required name="department" class="form-control">
							</div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Campus</label></div>
                            <div class="col-12 col-md-9">
							<input type="text" name="campus" class="form-control"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Maximum Duration</label></div>
                            <div class="col-12 col-md-9">
							<input type="text" name="max_dur" class="form-control">
							</div>
                          </div>
						   <div class="row form-group">
                            <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Minimun Duration</label></div>
                                             <div class="col-12 col-md-9">
											 <input type="text" id="text-input" name="text-input" class="form-control">
							</div> </div>
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Total no of courses</label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="text-input" class="form-control">
							</div> </div>
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Total no of credit hours:</label></div>
                                             <div class="col-12 col-md-9"><input type="text" id="text-input" name="text-input" class="form-control">
							</div></div>
						   <div class="row form-group">
                            <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Upload Complete Description File:</label></div>
                            <div class="col-12 col-md-9"><input type="file" id="text-input" name="text-input" class="form-control">
							</div> 
							</div>
                     
                        </form>
                      
					  
                              </div>
                          </div>

                        </div>
                    
					 <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
                          <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                          <i class="fa fa-ban"></i> Reset
                        </button>
                      </div>
					</div> <!-- .card -->

                  </div><!--/.col-->
          

        </div> <!-- .content -->
    
	
	</div><!-- /#right-panel -->
<?php
require "includes/footer.php";

?>