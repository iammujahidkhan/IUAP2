<div class="row">
<div class="col-md-6">
<ul class="pagination <?php if($course_Merit_query->rowCount()==0){echo "hidden";}?>">
<li><a target="_blank" href="generateMeritlist.php?pId=<?php echo $_GET['pId'];?>&page=<?php echo $page+1;?>">Generate Merit List <?php echo $page+1;?></a></li>	
</ul>
</div>
<div class="col-md-6">
<?php
$seats_query= $class->fetchdata("SELECT * FROM `admin_criteria_list` where  p_id = '$_GET[pId]' and  user_id='$user_id'");
$DataSeats=$seats_query->fetch(PDO::FETCH_ASSOC);
if($DataSeats['quota']=="Quota System")
{
if(!empty($DataSeats['punjab']))
{
echo " <span> <span class='badge badge-warning'> $DataSeats[punjab] </span> Punjab Seats </span>";	
}
if(!empty($DataSeats['sindh']))
{
echo " <span><span class='badge badge-warning'> $DataSeats[sindh] </span> Sindh Seats </span> ";	
}
if(!empty($DataSeats['kpk']))
{
echo "<span><span class='badge badge-warning'> $DataSeats[kpk] </span> KPK Seats </span>";	
}
if(!empty($DataSeats['bal']))
{
echo "<span><span class='badge badge-warning'>$DataSeats[bal]</span> Balochistan Seats </span>";	
}
if(!empty($DataSeats['fed']))
{
echo "<span><span class='badge badge-warning'>$DataSeats[fed]</span> Federal Seats </span>";	
}
if(!empty($DataSeats['fata']))
{
echo "<span><span class='badge badge-warning'>$DataSeats[fata]</span> Fata Seats </span>";	
}
if(!empty($DataSeats['sports']))
{
echo "<span><span class='badge badge-warning'>$DataSeats[sports]</span> Sports Seats </span>";	
}
if(!empty($DataSeats['handicaped']))
{
echo "<span><span class='badge badge-warning'>$DataSeats[handicaped]</span> Handicaped Seats </span>";	
}

}
?>
</div>
</div>