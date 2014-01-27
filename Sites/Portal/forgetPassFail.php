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
	<div class="center" id="notif">
		<h1 class="fail-msg">Sorry</h1>
		<?php
			$error = $_GET['e'];
			if ($error == "1") {
			?> 
				<h1 class="fail-msg">Activation email can not be sent.</h1>
			<?php } else if ($error == "2"){?>
				<h1 class="fail-msg">Record not found.</h1>
			<?php } else if ($error == "3"){?>
				<h1 class="fail-msg">The session for reseted password expired, please try to reset password again.</h1>
			<?php } else {?>
				<h1 class="fail-msg">The session expired, please try again.</h1>
			<?php }
			
		?>
	</div>
</div>
<!-- end content -->
<!-- FOOTER -->
<?php  include("include/footer.php"); ?>