<?php
//error_reporting(0);
require_once "header.php"; 

$programD=$class->fetchdata("SELECT * FROM student_p_detail where user_id='$user_id'");
$Details=$programD->fetch(PDO::FETCH_ASSOC);
if(isset($_POST['done']))
{
$folder = "../images/";
$image = $_FILES['img']['name'];
$path= $folder.$image;
move_uploaded_file($_FILES['img']['tmp_name'],$path);
$name= $_POST['name'];
$f_name= $_POST['f_name'];
$dob= $_POST['day']."-".$_POST['month']."-".$_POST['year'];
$gender= $_POST['gender'];
$nationality= $_POST['nationality'];
$domicile= $_POST['domicile'];
$domicileDistrict = $_POST['domicileDistrict'];
$cnic= $_POST['cnic'];
$mobile= $_POST['mobile'];
$emailId= $_POST['emailId'];
$hq= $_POST['hq'];
$handicaped = $_POST['handicaped'];
$sm = $_POST['sm'];

		
$query=$class->insert("INSERT INTO `student_p_detail`(`user_id`, `img`, `name`, `f_name`, `dob`, `gender`, `nationality`, `domicile`, `domicileDistrict`,`cnic`, `mobile`, `email`,`hq`,`handicaped`,`sm`) 
												VALUES ('$user_id','$image','$name','$f_name','$dob','$gender','$nationality','$domicile','$domicileDistrict','$cnic','$mobile','$emailId','$hq','$handicaped','$sm')");
			if($query){
			//$class->redirect("program_details.php?pId=1");
			?>
			 <script> window.location.href="address_details.php";</script>
			<?php
			}
			else{
				echo "Error";
				}
}

?>

<script type="text/javascript">
function showImage() {
		if(this.files && this.files[0]){
			
			var obj = new FileReader();
			obj.onload=function(data){
				
				var image = document.getElementById("image");
				image.src=data.target.result;
				image.style.display="block";
			}
			obj.readAsDataURL(this.files[0]);
		}
        
    }


</script>
<style>
.image-upload > input
{
    display: none;
}
</style>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Personal Details</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
               <div class="panel panel-primary">
				<div class="panel-heading">Enter Your Personal Details</div>
				<div class="panel-body">
<?php
if(isset($_POST['update']))
{
$folder = "../images/";
$image = $_FILES['img']['name'];
$path= $folder.$image;
move_uploaded_file($_FILES['img']['tmp_name'],$path);
$name= $_POST['name'];
$f_name= $_POST['f_name'];
$dob= $_POST['day']."-".$_POST['month']."-".$_POST['year'];
$gender= $_POST['gender'];
$nationality= $_POST['nationality'];
$domicile= $_POST['domicile'];
$domicileDistrict = $_POST['domicileDistrict'];
$cnic= $_POST['cnic'];
$mobile= $_POST['mobile'];
$emailId= $_POST['emailId'];
$hq= $_POST['hq'];
$handicaped = $_POST['handicaped'];
$sm = $_POST['sm'];
if(empty($image))
{
	$image = $Details['img'];
}
$query=$class->insert("UPDATE `student_p_detail` set `img` = '$image', `name` = '$name', `f_name` = '$f_name', `dob` = '$dob', `gender` = '$gender', `nationality` = '$nationality', `domicile` = '$domicile',`domicileDistrict`='$domicileDistrict', `cnic` = '$cnic', `mobile` = '$mobile', `email` = '$emailId' , `hq` = '$hq' , `handicaped` = '$handicaped' , `sm` = '$sm' where `user_id`='$user_id'");
			if($query){
			//$class->redirect("program_details.php?pId=1");
			?>
			<script> window.location.href="address_details.php";</script>
			<?php
			}
			else{
				echo "Error";
				}
}?>
<form class="form-horizontal"  method="post" enctype="multipart/form-data">
  <div class="form-group" >
    <label class="control-label col-sm-1" for="email"><span class="star">*</span>Upload Photo:</label>
    <div class="col-sm-5">
      <input id="file-input" id="image" class="form-control"  onchange="showImage.call(this)" type="file" name="img"/>
		    
    </div>
	<div class="col-sm-5 pull-right">
	  <?php
	  if($programD->rowCount()>0)
	  {
	  ?>
               <div class="image-upload">
					<label for="file-input">
					<img src="../images/<?php echo $Details['img'];?>" class="img-responsive img-thumbnail" onchange="showImage.call(this)" style="min-width:50px;max-width:50px;max-height:50px;" id="image"/>
					</label>	
                </div>			
	<?php
	  }else{
	  ?>
	   <div class="image-upload">
					<label for="file-input">
					<img src="../images/down.jpg" class="img-responsive img-thumbnail" onchange="showImage.call(this)" style="min-width:50px;max-width:50px;max-height:50px;" id="image"/>
					</label>	
                </div>
	  <?php
	  }
	  ?>
	</div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-1" for="email"><span class="star">*</span>Name:</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" value="<?php echo $_SESSION['name'];?>" name="name" readonly placeholder="Your Name">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-1" for="email"><span class="star">*</span>Father Name:</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" value="<?php echo $Details['f_name'];?>" name="f_name" required placeholder="Father Name">
    </div>
  </div>
  <div class="form-group">
  <div class="row">
     <label class="control-label col-sm-1" for="email" style="margin-left:10px;"><span class="star">*</span>DOB:</label>
    <div class="col-md-2">
	
  <select class="form-control" id="day" required name="day">
<option value="">Day</option>
<?php
if($programD->rowCount()>0)
{
$string = $Details['dob'];
//echo $result = sscanf('$string', '%d-%d');
$pieces = explode("-", $string);
$pieces[0]; // piece0
$pieces[1]; // piece1
$pieces[2]; // piece2

?>
<option value='1' <?php if($pieces[0]==1){ echo 'selected';}?>>1</option>
<option value='2' <?php if($pieces[0]==2){ echo 'selected';}?>>2</option>
<option value='3' <?php if($pieces[0]==3){ echo 'selected';}?>>3</option>
<option value='4' <?php if($pieces[0]==4){ echo 'selected';}?>>4</option>
<option value='5' <?php if($pieces[0]==5){ echo 'selected';}?>>5</option>
<option value='6' <?php if($pieces[0]==6){ echo 'selected';}?>>6</option>
<option value='7' <?php if($pieces[0]==7){ echo 'selected';}?>>7</option>
<option value='8' <?php if($pieces[0]==8){ echo 'selected';}?>>8</option>
<option value='9' <?php if($pieces[0]==9){ echo 'selected';}?>>9</option>
<option value='10' <?php if($pieces[0]==10){ echo 'selected';}?>>10</option>
<option value='11' <?php if($pieces[0]==11){ echo 'selected';}?>>11</option>
<option value='12' <?php if($pieces[0]==12){ echo 'selected';}?>>12</option>
<option value='13' <?php if($pieces[0]==13){ echo 'selected';}?>>13</option>
<option value='14' <?php if($pieces[0]==14){ echo 'selected';}?>>14</option>
<option value='15' <?php if($pieces[0]==15){ echo 'selected';}?>>15</option>
<option value='16' <?php if($pieces[0]==16){ echo 'selected';}?>>16</option>
<option value='17' <?php if($pieces[0]==17){ echo 'selected';}?>>17</option>
<option value='18' <?php if($pieces[0]==18){ echo 'selected';}?>>18</option>
<option value='19' <?php if($pieces[0]==19){ echo 'selected';}?>>19</option>
<option value='20' <?php if($pieces[0]==20){ echo 'selected';}?>>20</option>
<option value='21' <?php if($pieces[0]==21){ echo 'selected';}?>>21</option>
<option value='22' <?php if($pieces[0]==22){ echo 'selected';}?>>22</option>
<option value='23' <?php if($pieces[0]==23){ echo 'selected';}?>>23</option>
<option value='24' <?php if($pieces[0]==24){ echo 'selected';}?>>24</option>
<option value='25' <?php if($pieces[0]==25){ echo 'selected';}?>>25</option>
<option value='26' <?php if($pieces[0]==26){ echo 'selected';}?>>26</option>
<option value='27' <?php if($pieces[0]==27){ echo 'selected';}?>>27</option>
<option value='28' <?php if($pieces[0]==28){ echo 'selected';}?>>28</option>
<option value='29' <?php if($pieces[0]==29){ echo 'selected';}?>>29</option>
<option value='30' <?php if($pieces[0]==30){ echo 'selected';}?>>30</option>
<option value='31' <?php if($pieces[0]==31){ echo 'selected';}?>>31</option>
<?php
}else{
?>
<option value='1'>1</option>
<option value='2'>2</option>
<option value='3'>3</option>
<option value='4'>4</option>
<option value='5'>5</option>
<option value='6'>6</option>
<option value='7'>7</option>
<option value='8'>8</option>
<option value='9'>9</option>
<option value='10'>10</option>
<option value='11'>11</option>
<option value='12'>12</option>
<option value='13'>13</option>
<option value='14'>14</option>
<option value='15'>15</option>
<option value='16'>16</option>
<option value='17'>17</option>
<option value='18'>18</option>
<option value='19'>19</option>
<option value='20'>20</option>
<option value='21'>21</option>
<option value='22'>22</option>
<option value='23'>23</option>
<option value='24'>24</option>
<option value='25'>25</option>
<option value='26'>26</option>
<option value='27'>27</option>
<option value='28'>28</option>
<option value='29'>29</option>
<option value='30'>30</option>
<option value='31'>31</option>
<?php
}
?>
</select>

  </div>
    
  <div class="col-md-2">
  <select class="form-control" id="month" required name="month">
    <option value="">MONTH</option>
	<?php
if($programD->rowCount()>0)
{
$string = $Details['dob'];
//echo $result = sscanf('$string', '%d-%d');
$pieces = explode("-", $string);
$pieces[0]; // piece0
$pieces[1]; // piece1
$pieces[2]; // piece2

?>
    <option value="JAN" <?php if($pieces[1]=='JAN'){ echo 'selected';}?>>JAN</option>
	<option value="FEB" <?php if($pieces[1]=='FEB'){ echo 'selected';}?>>FEB</option>
	<option value="MAR" <?php if($pieces[1]=='MAR'){ echo 'selected';}?>>MAR</option>
	<option value="APR" <?php if($pieces[1]=='APR'){ echo 'selected';}?>>APR</option>
	<option value="MAY" <?php if($pieces[1]=='MAY'){ echo 'selected';}?>>MAY</option>
	<option value="JUN" <?php if($pieces[1]=='JUN'){ echo 'selected';}?>>JUN</option>
	<option value="JUL" <?php if($pieces[1]=='JUL'){ echo 'selected';}?>>JUL</option>
	<option value="AUG" <?php if($pieces[1]=='AUG'){ echo 'selected';}?>>AUG</option>
	<option value="SEP" <?php if($pieces[1]=='SEP'){ echo 'selected';}?>>SEP</option>
	<option value="OCT" <?php if($pieces[1]=='OCT'){ echo 'selected';}?>>OCT</option>
	<option value="NOV" <?php if($pieces[1]=='NOV'){ echo 'selected';}?>>NOV</option>
	<option value="DEC" <?php if($pieces[1]=='DEC'){ echo 'selected';}?>>DEC</option>
<?php
}else{
?>
    <option value="JAN">JAN</option>
	<option value="FEB">FEB</option>
	<option value="MAR">MAR</option>
	<option value="APR">APR</option>
	<option value="MAY">MAY</option>
	<option value="JUN">JUN</option>
	<option value="JUL">JUL</option>
	<option value="AUG">AUG</option>
	<option value="SEP">SEP</option>
	<option value="OCT">OCT</option>
	<option value="NOV">NOV</option>
	<option value="DEC">DEC</option>
<?php
}
?>
  </select>
  </div>
 
	
<div class="col-md-2">
<select class="form-control" id="year" required name="year">
<option value="">YEAR</option>
	<?php
if($programD->rowCount()>0)
{
$string = $Details['dob'];
//echo $result = sscanf('$string', '%d-%d');
$pieces = explode("-", $string);
$pieces[0]; // piece0
$pieces[1]; // piece1
$pieces[2]; // piece2

?>
<option value='1960' <?php if($pieces[2]==1960){ echo 'selected';}?>>1960</option>
<option value='1961' <?php if($pieces[2]==1961){ echo 'selected';}?>>1961</option>
<option value='1962' <?php if($pieces[2]==1962){ echo 'selected';}?>>1962</option>
<option value='1963' <?php if($pieces[2]==1963){ echo 'selected';}?>>1963</option>
<option value='1964' <?php if($pieces[2]==1964){ echo 'selected';}?>>1964</option>
<option value='1965' <?php if($pieces[2]==1965){ echo 'selected';}?>>1965</option>
<option value='1966' <?php if($pieces[2]==1966){ echo 'selected';}?>>1966</option>
<option value='1967' <?php if($pieces[2]==1967){ echo 'selected';}?>>1967</option>
<option value='1968' <?php if($pieces[2]==1968){ echo 'selected';}?>>1968</option>
<option value='1969' <?php if($pieces[2]==1969){ echo 'selected';}?>>1969</option>
<option value='1970' <?php if($pieces[2]==1970){ echo 'selected';}?>>1970</option>
<option value='1971' <?php if($pieces[2]==1971){ echo 'selected';}?>>1971</option>
<option value='1972' <?php if($pieces[2]==1972){ echo 'selected';}?>>1972</option>
<option value='1973' <?php if($pieces[2]==1973){ echo 'selected';}?>>1973</option>
<option value='1974' <?php if($pieces[2]==1974){ echo 'selected';}?>>1974</option>
<option value='1975' <?php if($pieces[2]==1975){ echo 'selected';}?>>1975</option>
<option value='1976' <?php if($pieces[2]==1976){ echo 'selected';}?>>1976</option>
<option value='1977' <?php if($pieces[2]==1977){ echo 'selected';}?>>1977</option>
<option value='1978' <?php if($pieces[2]==1978){ echo 'selected';}?>>1978</option>
<option value='1979' <?php if($pieces[2]==1979){ echo 'selected';}?>>1979</option>
<option value='1980' <?php if($pieces[2]==1980){ echo 'selected';}?>>1980</option>
<option value='1981' <?php if($pieces[2]==1981){ echo 'selected';}?>>1981</option>
<option value='1982' <?php if($pieces[2]==1982){ echo 'selected';}?>>1982</option>
<option value='1983' <?php if($pieces[2]==1983){ echo 'selected';}?>>1983</option>
<option value='1984' <?php if($pieces[2]==1984){ echo 'selected';}?>>1984</option>
<option value='1985' <?php if($pieces[2]==1985){ echo 'selected';}?>>1985</option>
<option value='1986' <?php if($pieces[2]==1986){ echo 'selected';}?>>1986</option>
<option value='1987' <?php if($pieces[2]==1987){ echo 'selected';}?>>1987</option>
<option value='1988' <?php if($pieces[2]==1988){ echo 'selected';}?>>1988</option>
<option value='1989' <?php if($pieces[2]==1989){ echo 'selected';}?>>1989</option>
<option value='1990' <?php if($pieces[2]==1990){ echo 'selected';}?>>1990</option>
<option value='1991' <?php if($pieces[2]==1991){ echo 'selected';}?>>1991</option>
<option value='1992' <?php if($pieces[2]==1992){ echo 'selected';}?>>1992</option>
<option value='1993' <?php if($pieces[2]==1993){ echo 'selected';}?>>1993</option>
<option value='1994' <?php if($pieces[2]==1994){ echo 'selected';}?>>1994</option>
<option value='1995' <?php if($pieces[2]==1995){ echo 'selected';}?>>1995</option>
<option value='1996' <?php if($pieces[2]==1996){ echo 'selected';}?>>1996</option>
<option value='1997' <?php if($pieces[2]==1997){ echo 'selected';}?>>1997</option>
<option value='1998' <?php if($pieces[2]==1998){ echo 'selected';}?>>1998</option>
<option value='1999' <?php if($pieces[2]==1999){ echo 'selected';}?>>1999</option>
<option value='2000' <?php if($pieces[2]==2000){ echo 'selected';}?>>2000</option>
<option value='2001' <?php if($pieces[2]==2001){ echo 'selected';}?>>2001</option>
<option value='2002' <?php if($pieces[2]==2002){ echo 'selected';}?>>2002</option>
<option value='2003' <?php if($pieces[2]==2003){ echo 'selected';}?>>2003</option>
<?php
}else{
?>
<option value='1960' >1960</option>
<option value='1961' >1961</option>
<option value='1962' >1962</option>
<option value='1963' >1963</option>
<option value='1964' >1964</option>
<option value='1965' >1965</option>
<option value='1966' >1966</option>
<option value='1967' >1967</option>
<option value='1968' >1968</option>
<option value='1969' >1969</option>
<option value='1970' >1970</option>
<option value='1971' >1971</option>
<option value='1972' >1972</option>
<option value='1973' >1973</option>
<option value='1974' >1974</option>
<option value='1975' >1975</option>
<option value='1976' >1976</option>
<option value='1977' >1977</option>
<option value='1978' >1978</option>
<option value='1979' >1979</option>
<option value='1980' >1980</option>
<option value='1981' >1981</option>
<option value='1982' >1982</option>
<option value='1983' >1983</option>
<option value='1984' >1984</option>
<option value='1985' >1985</option>
<option value='1986' >1986</option>
<option value='1987' >1987</option>
<option value='1988' >1988</option>
<option value='1989' >1989</option>
<option value='1990' >1990</option>
<option value='1991' >1991</option>
<option value='1992' >1992</option>
<option value='1993' >1993</option>
<option value='1994' >1994</option>
<option value='1995' >1995</option>
<option value='1996' >1996</option>
<option value='1997' >1997</option>
<option value='1998' >1998</option>
<option value='1999' >1999</option>
<option value='2000' >2000</option>
<option value='2001' >2001</option>
<option value='2002' >2002</option>
<option value='2003' >2003</option>
<?php
}
?>
</select>

  </div>

  </div>
</div>
  
  <div class="form-group">
  <label class="control-label col-sm-1" for="email"><span class="star">*</span>Gender:</label>
  <div class="row">
  <div class="col-md-2">
  <select class="form-control" id="gender" name="gender" required>
    <option value="">Select Gender</option>
    <option value="Male" <?php if($Details['gender']=='Male'){ echo 'selected';}?>>Male</option>
	<option value="Female" <?php if($Details['gender']=='Female'){ echo 'selected';}?>>Female</option>
	<option value="Others" <?php if($Details['gender']=='others'){ echo 'selected';}?>>Others</option>
	</select>
	</div>
	</div>
	</div>
	
	
  <div class="form-group">
  <label class="control-label col-sm-1" for="nationality"><span class="star">*</span>Nationality:</label>
  <div class="row">
  <div class="col-md-2">
  <select class="form-control" id="gender" name="nationality" required>
    <option value="">Select Nationality</option>
    <option value="Pakistani" <?php if($Details['nationality']=='Pakistani'){ echo 'selected';}?>>Pakistani</option>
	<option value="Others" <?php if($Details['nationality']=='Others'){ echo 'selected';}?>>Others</option>
	</select>
	</div>
	</div>
	</div>
	
	 <div class="form-group">
  <label class="control-label col-sm-1" for="nationality"><span class="star">*</span>Domicile:</label>
  <div class="row">
  <div class="col-md-2">
  <select class="form-control" id="gender" name="domicile" required>
    <option value="">Select Domicile</option>
	<option value="Attock" <?php if($Details['domicile']=='Attock'){ echo 'selected';}?>>Attock</option>
	<option value="Bahawalnagar" <?php if($Details['domicile']=='Bahawalnagar'){ echo 'selected';}?>>Bahawalnagar</option>
	<option value="Bahawalpur"<?php if($Details['domicile']=='Bahawalpur'){ echo 'selected';}?>>Bahawalpur</option>
	<option value="Bhakkar" <?php if($Details['domicile']=='Bhakkar'){ echo 'selected';}?>>Bhakkar</option>
	<option value="Chakwal" <?php if($Details['domicile']=='Chakwal'){ echo 'selected';}?>>Chakwal</option>
	<option value="Chiniot" <?php if($Details['domicile']=='Chiniot'){ echo 'selected';}?>>Chiniot</option>
	<option value="D.G Khan" <?php if($Details['domicile']=='D.G Khan'){ echo 'selected';}?>>D.G Khan</option>
	<option value="Faisalabad" <?php if($Details['domicile']=='Faisalabad'){ echo 'selected';}?>>Faisalabad</option>
	<option value="Federal" <?php if($Details['domicile']=='Federal'){ echo 'selected';}?>>Federal </option>
	<option value="Gujranwala" <?php if($Details['domicile']=='Gujranwala'){ echo 'selected';}?>>Gujranwala</option>
	<option value="Gujrat" <?php if($Details['domicile']=='Gujrat'){ echo 'selected';}?>>Gujrat</option>
	<option value="Hafizabad" <?php if($Details['domicile']=='Hafizabad'){ echo 'selected';}?>>Hafizabad</option>
	<option value="Jhang" <?php if($Details['domicile']=='Jhang'){ echo 'selected';}?>>Jhang</option>
	<option value="Jhelum" <?php if($Details['domicile']=='Jhelum'){ echo 'selected';}?>>Jhelum</option>
	<option value="Kasur" <?php if($Details['domicile']=='Kasur'){ echo 'selected';}?>>Kasur</option>
	<option value="Khanewal" <?php if($Details['domicile']=='Khanewal'){ echo 'selected';}?>>Khanewal</option>
	<option value="Khushab" <?php if($Details['domicile']=='Khushab'){ echo 'selected';}?>>Khushab</option>
	<option value="Lahore" <?php if($Details['domicile']=='Lahore'){ echo 'selected';}?>>Lahore</option>
	<option value="Layyah" <?php if($Details['domicile']=='Layyah'){ echo 'selected';}?>>Layyah</option>
	<option value="Lodhran" <?php if($Details['domicile']=='Lodhran'){ echo 'selected';}?>>Lodhran</option>
	<option value="M.B Din" <?php if($Details['domicile']=='M.B Din'){ echo 'selected';}?>>M.B Din</option>
	<option value="Mianwali" <?php if($Details['domicile']=='Mianwali'){ echo 'selected';}?>>Mianwali</option>
	<option value="Multan" <?php if($Details['domicile']=='Multan'){ echo 'selected';}?>>Multan</option>
	<option value="Muzaffargarh" <?php if($Details['domicile']=='Muzaffargarh'){ echo 'selected';}?>>Muzaffargarh</option>
	<option value="Nankana Sahib" <?php if($Details['domicile']=='Nankana Sahib'){ echo 'selected';}?>>Nankana Sahib</option>
	<option value="Narowal" <?php if($Details['domicile']=='Narowal'){ echo 'selected';}?>>Narowal</option>
	<option value="Okara" <?php if($Details['domicile']=='Okara'){ echo 'selected';}?>>Okara</option>
	<option value="Pakpattan" <?php if($Details['domicile']=='Pakpattan'){ echo 'selected';}?>>Pakpattan</option>
	<option value="Rahimyar Khan" <?php if($Details['domicile']=='Rahimyar Khan'){ echo 'selected';}?>>Rahimyar Khan</option>
	<option value="Rajanpur" <?php if($Details['domicile']=='Rajanpur'){ echo 'selected';}?>>Rajanpur </option>
	<option value="Rawalpindi" <?php if($Details['domicile']=='Rawalpindi'){ echo 'selected';}?>>Rawalpindi</option>
	<option value="Sahiwal" <?php if($Details['domicile']=='Sahiwal'){ echo 'selected';}?>>Sahiwal</option>
	<option value="Sargodha" <?php if($Details['domicile']=='Sargodha'){ echo 'selected';}?>>Sargodha</option>
	<option value="Sheikhupura" <?php if($Details['domicile']=='Sheikhupura'){ echo 'selected';}?>>Sheikhupura</option>
	<option value="Sialkot" <?php if($Details['domicile']=='Sialkot'){ echo 'selected';}?>>Sialkot</option>
	<option value="Toba Tek Singh" <?php if($Details['domicile']=='Toba Tek Singh'){ echo 'selected';}?>>Toba Tek Singh</option>
	<option value="Vehari" <?php if($Details['domicile']=='Vehari'){ echo 'selected';}?>>Vehari</option>

	</select>
	</div>
	</div>
	</div>
	 
	 
	  <div class="form-group">
  <label class="control-label col-sm-1" for="nationality"><span class="star">*</span>Domicile District:</label>
  <div class="row">
  <div class="col-md-2">
  <select class="form-control" name="domicileDistrict" required>
    <option value="">Domicile District</option>
	<option value="Balochistan" <?php if($Details['domicileDistrict']=='Balochistan'){ echo 'selected';}?>>Balochistan</option>
	<option value="Federal" <?php if($Details['domicileDistrict']=='Federal'){ echo 'selected';}?>>Federal</option>
	<option value="Fata" <?php if($Details['domicileDistrict']=='Fata'){ echo 'selected';}?>>Fata</option>
	<option value="KPK"<?php if($Details['domicileDistrict']=='KPK'){ echo 'selected';}?>>KPK</option>
	<option value="Punjab" <?php if($Details['domicileDistrict']=='Punjab'){ echo 'selected';}?>>Punjab</option>
	<option value="Sindh" <?php if($Details['domicileDistrict']=='Sindh'){ echo 'selected';}?>>Sindh</option>

	</select>
	</div>
	</div>
	</div>
	 
	 <div class="form-group">
    <label class="control-label col-sm-1" for=""><span class="star">*</span>CNIC:</label>
	  <div class="col-sm-4">
      <input type="text" class="form-control" value="<?php if(isset($Details['cnic'])){ echo $Details['cnic'];};?>" name="cnic" required placeholder="Enter CNIC">
    </div>
	</div>
	 <div class="form-group">
    <label class="control-label col-sm-1" for=""><span class="star">*</span>Mobile:</label>
	  <div class="col-sm-4">
      <input type="text" class="form-control"  value="<?php echo $Details['mobile'];?>" name="mobile" placeholder="03***"> 
    </div>
	</div>
	
	<div class="form-group">
    <label class="control-label col-sm-1" for="email"><span class="star">*</span>Email:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" readonly  value="<?php echo $_SESSION['email'] ;?>" name="emailId">
    </div>
  </div>
  <div class="form-group">
	 <label class="control-label col-sm-4"><span class="star">*</span>Are You Hafiz e Quran:</label>
	 <div class="row">
	<div class="col-md-6">
	<?php 
	$yes = "";
	$no = "";
	if($Details['hq']=="yes")
	{
		$yes = "checked";
		$no = "";
	}else{
		$no = "checked";
		$yes = "";
	}
	?>
	<label class="radio-inline">
      <input type="radio" name="hq" <?php echo $no;?> required value="no">No , I'm not
    </label>
    <label class="radio-inline">
      <input type="radio" name="hq" <?php echo $yes;?> value="yes">Yes , I'm
    </label>
	</div>
	</div>
	</div>
	<div class="form-group">
	 <label class="control-label col-sm-4"><span class="star">*</span>Are You Sportman:</label>
	 <div class="row">
	<div class="col-md-6">
	<?php 
	$yes = "";
	$no = "";
	if($Details['sm']=="yes")
	{
		$yes = "checked";
		$no = "";
	}else{
		$no = "checked";
		$yes = "";
	}
	?>
	<label class="radio-inline">
      <input type="radio" name="sm" <?php echo $no;?> required value="no">No , I'm not
    </label>
    <label class="radio-inline">
      <input type="radio" name="sm" <?php echo $yes;?> value="yes">Yes , I'm
    </label>
	</div>
	</div>
	</div>
	<div class="form-group">
	 <label class="control-label col-sm-4"><span class="star">*</span>Are You handicaped :</label>
	 <div class="row">
	<div class="col-md-6">
	<?php 
	$yes = "";
	$no = "";
	if($Details['handicaped']=="yes")
	{
		$yes = "checked";
		$no = "";
	}else{
		$no = "checked";
		$yes = "";
	}
	?>
	<label class="radio-inline">
      <input type="radio" name="handicaped" <?php echo $no;?> required value="no">No , I'm not
    </label>
    <label class="radio-inline">
      <input type="radio" name="handicaped" <?php echo $yes;?> value="yes">Yes , I'm
    </label>
	</div>
	</div>
	</div>
  
	<br>
	<br>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <?php
	  if($programD->rowCount()>0)
	  {
	  ?>
	  <button type="submit" class="col-sm-2 btn btn-danger" name="update">Update | Next</button>
	  <?php
	  }else{
	  ?>
	  <button type="submit" class="col-sm-2 btn btn-primary" name="done">Save | Next</button>
	  <?php
	  }
	  ?>
    </div>
  </div>
</form>
				
				</div>
				</div> 
                </div>
               </div>
			 
            </div>
          
<?php
require_once "footer.php";
?>