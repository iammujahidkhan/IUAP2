<?php
$search =  $_POST['search'];
include "assets/header.php";

$query= $class->fetchdata("SELECT * FROM `admin_p_detail` where uni_name like '$search%' or uni_program like '$search%' and status=1");

?>
<div class="inner_content_info_agileits">
<div class="container">
<div class="panel panel-default">
<div class="panel-heading text-center">
<?php if($query->rowCount()==0)
{
echo "no result";	
}else{
echo "Search Result";	
}?>

</div>
    <div class="panel-body">
	<?php 
	while($data=$query->fetch(PDO::FETCH_ASSOC)){
 echo 	"<h4>".$data['uni_program']."</h4>";
 echo 	"<p>University : ".$data['uni_name']."</p><br>";
 ?>
<p><a href="view_programs.php?id=<?php echo $data['p_id'];?>" class='btn btn-success'>View</a></p><hr>
	<?php
	}
	?>
	
	</div>
  </div>		
</div>
</div>
<?php
include "assets/footer.php";
?>