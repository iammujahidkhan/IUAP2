<?php
include "assets/header.php";
?>
	<!-- services -->
	<div class="banner-bottom">
		<div class="container">
			<h3 class="heading-agileinfo">Universities<span>...</span></h3>
			<div class="w3ls_banner_bottom_grids">
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				<?php
				$pName=$class->fetchdata("SELECT * FROM `users` where role='admin'");
				while($ND=$pName->fetch(PDO::FETCH_ASSOC))
				{
				?>
	<div class="col-md-3">
	<div class="panel panel-default" >
      <div class="panel-heading" role="tab" id="heading<?php echo $ND['id'];?>">
        <h4 class="panel-title">
          <a style="text-transform:capitalize;" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $ND['id'];?>" aria-expanded="false">
		  <?php echo $ND['uni_name'];?>
		  </a>
        </h4>
      </div>
      <div id="collapse<?php echo $ND['id']; ?>" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading<?php echo $row_count; ?>">
        <div class="panel-body">
		<ul style="padding-left:15px;">
		<li><a href="uni_list.php?id=<?php echo $ND['id'];?>&title=<?php echo $ND['uni_name'];?>&degree=PHD">PHD</a></li>
		<li><a href="uni_list.php?id=<?php echo $ND['id'];?>&title=<?php echo $ND['uni_name'];?>&degree=MS">MS</a></li>
		<li><a href="uni_list.php?id=<?php echo $ND['id'];?>&title=<?php echo $ND['uni_name'];?>&degree=BS">BS</a></li>
		</ul>
		</div>
      </div>
    </div>
	</div>
				<?php
				}
				?>
				</div>
				<div class="clearfix"> </div>
			</div>
		
		
		
		</div>
	</div>
<!-- //services -->	
<script>
function applied(){
	document.getElementById('degree').style.display="block";
}
</script>
<?php
include "assets/footer.php";
?>