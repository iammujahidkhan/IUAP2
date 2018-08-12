<?php
include "assets/header.php";
$pName=$class->fetchdata("SELECT * FROM `admin_p_detail` where p_status = 'Completed' and status=1 and user_id='$_GET[id]' and degreeLevel = '$_GET[degree]'");
?>
	<!-- services -->
	<div class="banner-bottom">
		<div class="container">
			<h3 class="heading-agileinfo">Universities/Courses<span>..<?php echo $_GET['title'];?>..</span></h3>
			<div class="w3ls_banner_bottom_grids">
				<?php 
				if($pName->rowCount()>0)
				{
				while($NameD=$pName->fetch(PDO::FETCH_ASSOC))
				{
					//$pName1=$class->fetchdata("SELECT * FROM `admin_p_detail` where degreeLevel = 'MS'");
					//$NameD=$pName1->fetch(PDO::FETCH_ASSOC);
				?>
				
				<div class="col-md-4 agileits_services_grid" style="margin-top:50px;">
					<h3><?php echo $NameD['uni_program'];?></h3>
					<p><?php echo $NameD['uni_name'];?></p>
					<div class="w3_agile_services_grid1">
						
						<div class="w3_blur"></div>
					</div>
					<div class="w3layouts_more">
						<a href="view_programs.php?id=<?php echo $NameD['p_id'];?>">Learn More<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
					</div>
				</div>

				<?php
				}
				}else{
					echo "<center>No data founds</center>";
				}
				?>
				
				<div class="clearfix"> </div>
			</div>
		
		
		
		</div>
	</div>
<!-- //services -->	

<?php
include "assets/footer.php";
?>