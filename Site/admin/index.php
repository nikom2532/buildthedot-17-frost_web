<?php
include ("include/header.php");
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
	<div id="content">
	
		<form action="include/login-process.php" method="POST" id="login-form">
		
			<fieldset>

				<p>
					<label for="login-username">username</label>
					<input type="text" id="email" name="email" class="round full-width-input" />
				</p>

				<p>
					<label for="login-password">password</label>
					<input type="password" id="password" name="password" class="round full-width-input" />
				</p>
				
				<input type="submit" value="LOG IN" class="round orange image-right ic-right-arrow" />
			</fieldset>

		</form>
		
	</div> <!-- end content -->
	
	
	
	<!-- FOOTER -->
	<div id="footer">
	
	</div> <!-- end footer -->

</body>
</html>