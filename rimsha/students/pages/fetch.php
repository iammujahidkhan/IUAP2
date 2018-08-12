<?php
include "../../config.php";
if(isset($_GET['id']))
{
	if($_GET['status']==0)
	{
		$status=1;
	}
	else {
		
		$status=0;
	}
	$query=$class->insert("update programs SET status='status' where id='$_GET[id]'");
}
?>
<table border="2">
<thead>
<tr>
<th>ID</th>
<th>TITLE</th>
<th>STATUS</th>
<th>Action</th>
</tr>
</thead>
<?php
			$query= $class->fetchdata(" select * from programs");
	while	($data=$query->fetch(PDO::FETCH_ASSOC))
	{	extract ($data)
		

?>
<tr>
<td><?php echo $id; ?></td>
<td><?php echo $title; ?></td>
<td><?php echo $status; ?></td>
<td><a href="fetch.php?status=<?php echo $status;  ?> &id=<?php echo $id; ?>">
<?php 


if($status==0)
	
	{
		echo "pending";
	}
	else {
			echo "Active";
			
	}
?>	
</a></td>

</tr>
<?php 

	} ?>
</table>