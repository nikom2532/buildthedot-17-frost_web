<script>
function validateForm()
{
var x=document.forms["forgot-password-form"]["newpassword"].value;
var y=document.forms["forgot-password-form"]["renewpassword"].value;
	if (x == ""){
  		alert("New password can not be empty");
  		return false;
  	} else if (y == ""){
  		alert("Re-type new password can not be empty");
  		return false;
	} else {
		if(x != y) {
			alert("The password not match");
  			return false;
		}
	}
}
</script>


<?php  include("include/header.php"); ?>

<!-- HEADER -->
<div id="header">

	<div class="page-full-width cf">
		<img src="images/mckansys_logo.png" width="200" height="27" alt="logo">
		<!-- login-intro -->
	</div>
	<!-- end full-width -->

</div>
<!-- end header -->
	<div id="content">
		<div class="container_12" id="container">
			<div id="content-middle">
				<div id="profile" >
					<h1 id="head-title" class="text-green grid_12">Forgot password > Security question > Create new password</h1>
					<?php 
						$userID = $_GET["userID"];
					
						if($_GET["validatepass"] != ""){
						$validatemessage=$_GET["validatepass"];
					?>
						<div class="grid_6 prefix_5 text-validate"><?php echo $validatemessage;?></div>
						
					<?php }?>
					
					<br class="clear"/>
					
					<form action="new-password-proc.php" name="forgot-password-form" id="forgot-password-form" method="POST" onsubmit="return validateForm()">
						<div class="grid_3" id="profile-title">
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
									<input type="password" id="newpassword" name="newpassword"/>
								</p>
								<p>
									<input type="password" id="renewpassword" name="renewpassword" />
								</p>
							</fieldset>
	
						</div>
						<br class="clear"/>
						<input name="userID" type="hidden" id="userID" value="<?=$userID?>" />
						<input type="submit" value="Save change" class="button orange image-right ic-right-arrow"/>
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

?>