<?php
if(empty($_GET['pId']))
{?>
<script> window.location.href="index.php"</script>
<?php
}else{
$pId = $_GET['pId'];
$p_id = $pId;
$program=$class->fetchdata("SELECT * FROM `programs` where id='$pId' and user_id='$user_id'");
$activepost=$program->fetch(PDO::FETCH_ASSOC);
if($program->rowCount()==0)
{
?>
<script> window.location.href="index.php"</script>
<?php	
}
}
?>

 <div class="navbar-default sidebar"  role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="hidden sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="instruction.php?pId=<?php echo $pId;?>">Instructions</a>
                        </li>
						 
                        <li>
                            <a href="about.php?pId=<?php echo $pId;?>">About</a>
                        </li>
                        <li>
                            <a href="program_details.php?pId=<?php echo $pId;?>">Programe Details</a>
                        </li>
                      
                        <li>
                            <a href="eligibility_criteria.php?pId=<?php echo $pId;?>">Eligibility Criteria </a>
                        </li>
						 <li>
                            <a href="aggregate.php?pId=<?php echo $pId;?>">Aggregate Formula </a>
                        </li>
                     
						  <li>
                            <a href="admission_schedule.php?pId=<?php echo $pId;?>">Admission Schedule</a>
                        </li>
						 <li>
                            <a href="merit_list_criteria.php?pId=<?php echo $pId;?>">Merit List Criteria</a>
                        </li>
						 <li>
                            <a href="fees.php?pId=<?php echo $pId;?>">Fee Structure</a>
                        </li>
						 <li>
                            <a href="late_admission_policy.php?pId=<?php echo $pId;?>">Late Addmission Policy</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>