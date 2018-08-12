<?php
require "includes/header.php";
?>


        

        <div class="content mt-3">
  <div class="row">
                  <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Add New Program </strong>
                        </div>
                        <div class="card-body">
                          <!-- Credit Card -->
                          <div id="pay-invoice">
                              <div class="card-body">
                                  <div class="card-title">
                                      <h3 class="text-center">Enter Your University Offer Program Name.</h3>
                                  </div>
                                  <hr>
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                         
                        <div class="row form-group">
                            <div class="col col-md-4"><label for="select" class=" form-control-label">Select Degree Program:</label></div>
                            <div class="col-12 col-md-8">
                              <select class="form-control" id="mySelect" required="">
								<option value="">...</option>
								<option value="PHD">PHD</option>
								<option value="MS/MPHILL">MS/MPHILL</option>
								<option value="BS/MSC">BS/MSC</option>
								<option value="BA/BSC/BCOM/BBA">BA/BSC/BCOM/BBA</option>
							  </select>

                            </div>
                          </div>
                          <div class="row form-group" id="ssc">
                            <div class="col col-md-4"><label for="email-input" class=" form-control-label">Program Name:</label></div>
                            <div class="col-12 col-md-8">
							<input type="text" name="p_name" required class="form-control">
							</div>
                          </div>
                         
                	 <div >
                        <button type="submit" class="btn btn-primary btn-sm">
                          <i class="fa fa-plus-square"></i> Add New Program
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                          <i class="fa fa-ban"></i> Reset
                        </button>
                      </div>        
                     
                        </form>
                      
					  
                              </div>
                          </div>

                        </div>
                    
				
					</div> <!-- .card -->

                  </div><!--/.col-->
          

        </div> <!-- .content -->
    
	
	</div><!-- /#right-panel -->
<?php
require "includes/footer.php";

?>