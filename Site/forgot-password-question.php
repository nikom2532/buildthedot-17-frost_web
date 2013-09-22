<script>
function validateForm()
{
var x=document.forms["forgot-password-form"]["ans"].value;
if (x==null || x=="")
  {
  alert("Please answer the question");
  return false;
  }
}
</script>

<?php  include("include/header.php"); 
	
	$qId = $_GET['qId'];
	$id = $_GET['id'];
	
	$query = "SELECT * FROM QUESTION WHERE ID ='".$qId."'";
				$result = mysql_query($query) OR die(mysql_error());
				$count = mysql_num_rows($result);
	
?>

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
					<h1 id="head-title" class="text-green grid_12">Forgot password > Security question</h1>
					<br class="clear"/>
	
	<form action="forgot-password-question-proc.php" method="POST" name="forgot-password-form" id="forgot-password-form" onsubmit="return validateForm()">
		<input type="hidden" name="id" value=<?=$id?> />
		<fieldset>
			<p>
				<?php
				if($count > 0) {
					$row = mysql_fetch_array($result);
					echo "<label for='question'>";
					echo $row['NAME'];
					echo "</label>";
				}
				?>
				<input autocomplete="off" type="text" id="ans" name="ans" class="round full-width-input" autofocus/>
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