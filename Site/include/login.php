<?php include("include/header.php"); ?>

<!-- HEADER -->
<div id="header">

	<div class="page-full-width cf">
		<a href="index.php"><img src="images/mckansys_logo.png" width="200" height="27" alt="logo"></a>
		<!-- login-intro -->
	</div>
	<!-- end full-width -->

</div>
<!-- end header -->

<!-- MAIN CONTENT -->
<div id="content-login">

	<form action="<?php echo $rootpath; ?>include/login_process.php" method="POST" id="login-form">

		<fieldset>
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
			<p>
				<label for="login-username">E-mail</label>
				<input autocomplete="off" type="text" id="login-username" name="email" class="round full-width-input" autofocus />
			</p>

			<p>
				<label for="login-password">password</label>
				<input autocomplete="off" type="password" id="login-password" name="password" class="round full-width-input" />
			</p>

			<a href="#" class="button round orange image-right ic-right-arrow" onclick="document.getElementById('login-form').submit();">LOG IN</a>
			<p id="forgot-pass">
				<a href="forgot-password.php">Forgot password?</a>

			</p>
		</fieldset>

	</form>

</div>
<!-- end content -->

<!-- FOOTER -->
<?php // include("include/footer.php"); ?>