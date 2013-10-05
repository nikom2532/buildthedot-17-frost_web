<?php  include("include/header.php"); ?>

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
<div id="content">
		<div class="container_12" id="container">
			<div id="content-middle">
				<div id="profile" >
					<h1 id="head-title" class="text-green grid_12">Forgot password</h1>
					<br class="clear"/>
					
	<form action="forgot-password-with-url-proc.php" method="POST">

		<fieldset>
			

			<p>
				<label for="email">Please enter yor E-mail</label>
				<input autocomplete="off" type="text" id="email" name="email" class="round full-width-input" autofocus />
			</p>
			<input class="button round orange image-right ic-right-arrow" name="submit" type="submit" value="Send">
		</fieldset>

	</form>
	

</div><!--end profile -->
	
			</div><!--end content-middle -->
	
			<br class="clear"/>
	
		</div><!--end container_12 -->
	</div><!--end content -->
<!-- end content -->

<!-- FOOTER -->
<?php  include("include/footer.php"); ?>