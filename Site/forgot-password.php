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
		<img src="images/mckansys_logo.png" width="200" height="27" alt="logo">
		<!-- login-intro -->
	</div>
	<!-- end full-width -->

</div>
<!-- end header -->

<!-- MAIN CONTENT -->
<div id="content-login">

	<form action="forgot-password-proc.php" method="POST" name="forgot-password-form" id="forgot-password-form" onsubmit="return validateForm()">

		<fieldset>

			<p>
				<label for="email">E-mail</label>
				<input type="text" id="email" name="email" class="round full-width-input" autofocus />
			</p>
			<input class="button round orange image-right ic-right-arrow" type="submit" value="SEND EMAIL">
		</fieldset>

	</form>
	

</div>
<!-- end content -->

<!-- FOOTER -->
<?php  include("include/footer.php"); ?>