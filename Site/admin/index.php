<?php
include ("include/header.php");
@session_start();
$rootpath = "../";
include ($rootpath . "lib/db.php");
include ($rootpath . "lib/conn.inc.php");
include ($rootpath . "lib/func_date.php");
if (!$db -> open()) {
	die($db -> error());
}
$sess_id=$_SESSION["userid"];
?>	
	<!-- HEADER -->
	<div id="header">
		
		<div class="page-full-width cf">
			<img src="images/mckansys_logo.png" width="200" height="27" alt="logo">
            <!-- login-intro -->
			<a href="#" class="round button green ic-left-arrow image-left right">Return to website</a>
		</div> <!-- end full-width -->	

	</div> <!-- end header -->
	
	
	
	<!-- MAIN CONTENT -->
	<div id="content-login">
	
		<form action="include/login-process.php" method="POST" id="login-form">
			<?php
				if($_POST["login_messaage"] != ""){
					if($_POST["login_messaage"]=="login_false"){
					 ?>
						<p class="text-validate">Username or password is wrong</p>
					<?php 
					}
					else if($_POST["login_messaage"]=="forget_formdata_login"){
					?>
						<p class="text-validate">Username or password is empty</p>
				<?php }
				}
			?>
			<fieldset>

				<p>
					<label for="login-username">username</label>
					<input type="text" id="email" name="email" class="round full-width-input" onkeypress="return login_form_keypress(event)" />
				</p>

				<p>
					<label for="login-password">password</label>
					<input type="password" id="password" name="password" class="round full-width-input" onkeypress="return login_form_keypress(event)" />
				</p>
				
				<input type="submit" value="LOG IN" class="round orange image-right ic-right-arrow" />
			</fieldset>

		</form>
		
	</div> <!-- end content -->
	
	
	
	<!-- FOOTER -->
	<?php include("include/footer.php");?>

</body>
</html>