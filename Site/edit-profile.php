<?php 
include("include/header.php");
if($_SESSION["userid"]==""){
	include ($rootpath . "include/login.php");
	include ("include/footer.php");
}
else{
	include("include/top-menu.php");
?>
	<div id="content">
		<div class="container_12" id="container">
			<div id="content-middle" class="grid_12">
				<div id="profile" >
					<h1 id="head-title" class="text-green grid_12">Edit profile</h1>
					<div class="grid_2">
						<img src="images/test-pic.jpg"  alt="profile">
					</div>
					<form action="#" method="POST">
						<div class="grid_2" id="profile-title">
							<p>
								Name
							</p>
							<p>
								Company
							</p>
							<p>
								Email
							</p>
							<p id="pass">
								Password
							</p>
						</div>
						<div class="grid_6" id="profile-detail">
							<fieldset>
								<p>
									<input type="text" id="name" class="" value="Lorem Ipsum Lorem Ipsum" />
								</p>
								<p>
									<input type="text" id="company" class="" value="Lorem Ipsum Lorem Ipsum" />
								</p>
								<p>
									<input type="text" id="email" class="" value="Lorem@Ipsum.com" />
								</p>
							</fieldset>
							<p id="edit-password">
								<a href="edit-password.php" >edit password</a>
							</p>
						</div>
						<br class="clear"/>
						<div class="grid_2 prefix_4">
							<input type="submit" value="Save change" class="button orange image-right ic-right-arrow"/>
						</div>
					</form>
					<br class="clear"/>
					<div class="grid_3">
	
					</div>
				</div><!--end profile -->
	
			</div><!--end content-middle -->
	
			<br class="clear"/>
	
		</div><!--end container_12 -->
	</div><!--end content -->
<?php
	include ("include/footer.php");
}
?>