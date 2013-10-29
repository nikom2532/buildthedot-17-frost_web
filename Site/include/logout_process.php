<?php
include($rootpath."include/header.php");
unset($_SESSION["userid"]);
// include($rootpath."include/footer.php");

//If you are on Profile Page
if(strstr(urldecode($_GET["pa"]), '?', true) == "myprofile.php"){
	?><form id="logout_finish" action="<?php echo $rootpath; ?>./index.php" method="POST"></form>
	<script>
		document.getElementById("logout_finish").submit();
	</script><?php
	// header("Location: ".$rootpath."./index.php");
}
else{
	?><form id="logout_finish" action="<?php echo $rootpath.urldecode($_GET["pa"]); ?>" method="POST"></form>
	<script>
		document.getElementById("logout_finish").submit();
	</script><?php
	// header("Location: ".$rootpath.urldecode($_GET["pa"]));
}
?>