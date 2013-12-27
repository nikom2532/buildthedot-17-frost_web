<?php // include("include/header.php"); ?>

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

	<form action="<?php echo $rootpath; ?>include/login_process_2pdf.php" method="POST" id="login-form">

		<fieldset>

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
				<a href="forgot-password-with-url.php">Forgot password?</a>
<?php
				if($_POST["login_messaage"]=="login_false"){
					echo "Wrong E-mail or Password.";
				}
?>
			</p>
		</fieldset>
		<input type="hidden" name="pdfId" value="<?php echo $pdfId; ?>" / >
	</form>

</div>
<!-- end content -->

<!-- FOOTER -->
<?php // include("include/footer.php"); ?>