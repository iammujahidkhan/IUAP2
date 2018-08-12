<?php
require "includes/addProgramHeader.php";
?>
<script>
   function Test(myval) {
	   
	  var test = document.getElementById("test");
	  var x = document.getElementById("test");
	 
	  
	  
    if(myval=="openMerit")
	{
	  document.getElementById("test").style.visibility = "hidden";
	}
	if(myval=="enteryTest")
	{
	  document.getElementById("test").style.visibility = "visible";
	  
	if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "block";
    }	  
	}
}
	function valueselect()
{
      //window.location.href = "eligibility_criteria.php?degree="+myval;
	  //document.getElementsByClassName("circles")
	  
	  var x = document.getElementById("mySelect").value;
	  var ssc = document.getElementById("ssc");
	  var hssc = document.getElementById("hssc");
	  
	  var bsc = document.getElementById("bsc");
	  var msc = document.getElementById("msc");
	  var mphill = document.getElementById("mphill");
	  
	  var Assc = document.getElementById("Assc");
	  var Ahssc = document.getElementById("Ahssc");
	  var Absc = document.getElementById("Absc");
	  var Amsc = document.getElementById("Amsc");
	  var Amphill = document.getElementById("Amphill");
	  //document.getElementById("myP").style.visibility = "hidden";
    //document.getElementById("mphill").innerHTML = "You selected: " + x;
	if(x=="PHD")
	{
		alert("ok");
		bsc.style.visibility = "visible";
		msc.style.visibility = "visible";
		mphill.style.visibility = "visible";
		
		Absc.style.visibility = "visible";
		Amsc.style.visibility = "visible";
		Amphill.style.visibility = "visible";
	}
	
	if(x=="MS/MPHILL")																					
	{
		alert("ok");
		Absc.style.visibility = "visible";
		Amsc.style.visibility = "visible";
		Amphill.style.visibility = "hidden";
		
		bsc.style.visibility = "visible";
		msc.style.visibility = "visible";
		mphill.style.visibility = "hidden";
	}
	
	if(x=="BS/MSC")
	{
	    Amphill.style.visibility = "hidden";
		Amsc.style.visibility = "hidden";
		
		mphill.style.visibility = "hidden";
		msc.style.visibility = "hidden";
	}
	if(x=="BS/MSC")
	{
		Absc.style.visibility = "visible";
	    Amphill.style.visibility = "hidden";
		Amsc.style.visibility = "hidden";
		
		bsc.style.visibility = "visible";
	    mphill.style.visibility = "hidden";
		msc.style.visibility = "hidden";
	}
	if(x=="BA/BSC/BCOM/BBA")
	{
		Absc.style.visibility = "hidden";
		Amsc.style.visibility = "hidden";
		Amphill.style.visibility = "hidden";
		
		bsc.style.visibility = "hidden";
		msc.style.visibility = "hidden";
		mphill.style.visibility = "hidden";
		
	}

}
</script>

        

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
                            <div class="col col-md-4"><label for="select" class=" form-control-label">Select Degree Program:</label></div>
                            <div class="col-12 col-md-8">
                              <select class="form-control" id="mySelect" required onchange="valueselect();">
								<option value="PHD">PHD</option>
								<option value="MS/MPHILL">MS/MPHILL</option>
								<option value="BS/MSC">BS/MSC</option>
								<option value="BA/BSC/BCOM/BBA">BA/BSC/BCOM/BBA</option>
							  </select>

                            </div>
                          </div>
                          <div class="row form-group" id="ssc">
                            <div class="col col-md-4"><label for="email-input" class=" form-control-label">Minimum Marks of Matric/O-level in %:</label></div>
                            <div class="col-12 col-md-8">
							<input type="text" name="p_name" class="form-control">
							</div>
                          </div>
                          <div class="row form-group" id="hssc">
                            <div class="col col-md-4"><label for="password-input" class=" form-control-label">Minimum Marks of Inter/Fsc/A-level/DAE/DCOM/ICOM/ICS/FA in %:</label></div>
                            <div class="col-12 col-md-8">
							<input type="text" required name="department" class="form-control">
							</div>
                          </div>
                          <div class="row form-group" id="bsc">
                            <div class="col col-md-4"><label for="disabled-input" class=" form-control-label">Minimum 14 Year Marks of BA/BSC/BCOM/BBA in %:</label></div>
                            <div class="col-12 col-md-8">
							<input type="text" name="campus" class="form-control"></div>
                          </div>
                          <div class="row form-group" id="msc">
                            <div class="col col-md-4"><label for="textarea-input" class=" form-control-label">Minimum 16 Year Marks of BS/MSC in %:</label></div>
                            <div class="col-12 col-md-8">
							<input type="text" name="max_dur" class="form-control">
							</div>
                          </div>
						   <div class="row form-group"  id="mphill">
                            <div class="col col-md-4"><label for="textarea-input" class=" form-control-label">Minimum MPHILL/MS Marks in %:</label></div>
                                             <div class="col-12 col-md-8">
											 <input type="text" id="text-input" name="text-input" class="form-control">
							</div> 
							</div>
							  <div class="row form-group">
                            <div class="col col-md-4"><label class=" form-control-label">Choose Option</label></div>
                            <div class="col col-md-9">
                              <div class="form-check-inline form-check">
                                <label for="inline-radio1" class="form-check-label ">
                                  <input type="radio" id="inline-radio1"  name="optradio" value="openMerit" required onclick="Test(this.value)" class="form-check-input">Open Merit
                                </label>
								
                                <label for="inline-radio2" class="form-check-label ">
                                  <input type="radio" id="inline-radio2" name="optradio" value="openMerit" required onclick="Test(this.value)" class="form-check-input">Entry test
                                </label>
                               
                              </div>
                            </div>
							 <div id="test" hidden>
							<div class="form-group" id="sat">
							<label class="control-label col-sm-5" for="email"><span class="star">*</span>SAT:</label>
							<div class="col-sm-4">
							<input type="text" class="form-control" required placeholder="">
							</div>
					</div>
  
   <div class="form-group" id="hec">
    <label class="control-label col-sm-5" for="email"><span class="star">*</span>HEC:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" required placeholder="">
    </div>
  </div>
   <div class="form-group" id="nat">
    <label class="control-label col-sm-5" for="email"><span class="star">*</span>NAT:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" required placeholder="">
    </div>
  </div>
</div>
							
                          </div>
						  <div class="row form-group">
						   <div class="col col-md-6"><label class=" form-control-label"><h2>AGGREGATE FORMULA</h2></label></div>
						  </div>
						  
						  <div class="row form-group">
                            <div class="col col-md-4"><label for="textarea-input" class=" form-control-label">Matric/O-level :</label></div>
                                            <div class="col-12 col-md-8"><input type="text" id="text-input" name="text-input" class="form-control">
							</div> </div>
						  <div class="row form-group">
                            <div class="col col-md-4"><label for="textarea-input" class=" form-control-label">Inter/Fsc/A-level/DAE/DCOM/ICOM/ICS/FA :</label></div>
                                             <div class="col-12 col-md-8"><input type="text" id="text-input" name="text-input" class="form-control">
							</div>
							</div>
						   <div class="row form-group">
                            <div class="col col-md-4"><label for="textarea-input" class=" form-control-label">BA/BSC/BCOM/BBA :</label></div>
                            <div class="col-12 col-md-8"><input type="text" id="text-input" name="text-input" class="form-control">
							</div> 
							</div>
							 <div class="row form-group">
                            <div class="col col-md-4"><label for="textarea-input" class=" form-control-label">BS/MSC :</label></div>
                            <div class="col-12 col-md-8"><input type="text" id="text-input" name="text-input" class="form-control">
							</div> 
							</div>
							 <div class="row form-group">
                            <div class="col col-md-4"><label for="textarea-input" class=" form-control-label">MPHILL/MS :</label></div>
                            <div class="col-12 col-md-8"><input type="text" id="text-input" name="text-input" class="form-control">
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