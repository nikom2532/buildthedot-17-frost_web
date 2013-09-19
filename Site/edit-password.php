<?php
include ("include/header.php");
if($_SESSION["userid"]==""){
	include ($rootpath . "include/login.php");
	include ("include/footer.php");
}
else{
	include ("include/top-menu.php");
?>
	<div id="content">
		<div class="container_12" id="container">
			<div id="content-middle">
				<div id="profile" >
					<h1 id="head-title" class="text-green grid_12">Change password</h1>
					<div class="grid_2">
						<img src="images/test-pic.jpg"  alt="profile">
					</div>
					<form action="#" method="POST">
						<div class="grid_3" id="profile-title">
							<p>
								Old password
							</p>
							<p>
								New password
							</p>
							<p>
								Re-type new password
							</p>
						</div>
						<div class="grid_6" id="profile-detail">
							<fieldset>
								<p>
									<input type="password" id="oldpassword" />
								</p>
								<p>
									<input type="password" id="newpassword"/>
								</p>
								<p>
									<input type="password" id="renewpassword"  />
								</p>
							</fieldset>
	
						</div>
						<br class="clear"/>
						<div class="grid_2 prefix_5">
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