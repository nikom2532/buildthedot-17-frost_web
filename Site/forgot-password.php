<script>
function validateForm()
{
var x=document.forms["forgot-password-form"]["email"].value;
if (x==null || x=="")
  {
  alert("First name must be filled out");
  return false;
  }
}
</script>

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
	<form action="forgot-password-proc.php" method="POST" name="forgot-password-form" id="forgot-password-form" class="grid_12" onsubmit="return validateForm()">

		<fieldset>

			<p>
				<label for="email">Please enter yor E-mail</label>
				<input autocomplete="off" type="text" id="email" name="email" class="round full-width-input" autofocus />
			</p>
			<input class="button round orange image-right ic-right-arrow" type="submit" value="NEXT">
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