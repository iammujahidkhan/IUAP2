<?php
include "assets/header.php";

if(isset($_POST['done']))
{
$Name = $_POST['Name'];
$Email = $_POST['Email'];
$Telephone = $_POST['Telephone'];
$Subject = $_POST['Subject'];
$Message = $_POST['Message'];
$query=$class->insert("INSERT INTO `contact`(`name`, `email`, `phone`, `subject`, `message`) VALUES ('$Name','$Email','$Telephone','$Subject','$Message')");
if($query)
{
?>
<script> alert("We Will Be Contact With You Shortly!");</script>
<?php
}
}
?>
	<!-- //header -->
		<!-- /inner_content -->
	<div class="inner_content_info_agileits">
		<div class="container">
		
			<h3 class="heading-agileinfo">Contact Us<span></span></h3>
			<div class="inner_sec_grids_info_w3ls">
				<div class="col-md-4 agile_info_mail_img_info">
					<div class="address-grid">
					<br>
						<h4>Contact <span>Info</span></h4>
						
						<br>
						<div class="mail-agileits-w3layouts">
							<i class="fa fa-volume-control-phone" aria-hidden="true"></i>
							<div class="contact-right">
								<p>Telephone </p><span>+1 (100)222-23-33</span>
							</div>
							
							<div class="clearfix"> </div>
						</div>
						<br>
						<div class="mail-agileits-w3layouts">
							<i class="fa fa-envelope-o" aria-hidden="true"></i>
							<div class="contact-right">
								<p>Mail </p><a href="mailto:info@example.com">info@example.com</a>
							</div>
							<div class="clearfix"> </div>
						</div>
					
							<br><br>
							
							<div class="clearfix"> </div>
						
						<div class="agileits_w3layouts_nav_right contact">
							<div class="social two">
								<ul>
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-rss"></i></a></li>
								</ul>
							</div>
						</div>
					
					</div>
				</div>
				<div class="col-md-8 agile_info_mail_img">

				</div>
				<div class="clearfix"> </div>
				<div class="w3layouts_mail_grid">
					<form action="#" method="post">
						<div class="col-md-6 wthree_contact_left_grid">
							<input type="text" name="Name" placeholder="Name" required="">
							<input type="email" name="Email" placeholder="Email" required="">
							<input type="text" name="Telephone" placeholder="Telephone" required="">
							<input type="text" name="Subject" placeholder="Subject" required="">
						</div>
						<div class="col-md-6 wthree_contact_left_grid">
							<textarea name="Message" placeholder="Message..." required=""></textarea>
							<input name="done" type="submit" value="Submit">
						</div>
						<div class="clearfix"> </div>

					</form>
				</div>


			</div>

		</div>
	</div>
	<!-- //mid-services -->
<?php
include "assets/footer.php";
?>