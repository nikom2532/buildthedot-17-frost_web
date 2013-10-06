<?php include("include/header.php"); ?>

<!-- HEADER -->
<div id="header">

	<div class="page-full-width cf">
		<a href="index.php"><img src="images/mckansys_logo.png" width="200" height="27" alt="logo"></a>
	</div>

</div>
<!-- end header -->

<!-- MAIN CONTENT -->
<div id="content-login">
	<fieldset>
		<p>Sorry</p>
		<?php
			$error = $_GET['e'];
			if ($error == "1") {
				echo "<p>Activation email can not be sent.</p>";
			} else if ($error == "2"){
				echo "<p>Record not found.</p>";
			} else {
				echo "<p>The session expired, please try again.</p>";
			}
			
		?>
		
	</fieldset>
</div>
<!-- end content -->
<!-- FOOTER -->
<?php  include("include/footer.php"); ?>