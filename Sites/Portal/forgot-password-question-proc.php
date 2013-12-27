<?php

	include("include/header.php");
	$id = $_POST['id'];
	$ans = $_POST['ans'];
	
	$query = "SELECT * FROM USER_PROFILE WHERE ID ='".$id."' AND ANSWER ='".$ans."'";
				$result = mysql_query($query) OR die(mysql_error());
				$count = mysql_num_rows($result);
	if($count > 0) {
		$row = mysql_fetch_array($result);
		
		//header("location: {$rootpath}new-password.php?userID=".$row['ID']);
		?><script>window.location = "<?php echo $rootpath; ?>new-password.php?userID=<?php echo $row['ID']; ?>";</script><?php
	} else {
		//header("location: {$rootpath}index.php");
		?><script>window.location = "<?php echo $rootpath; ?>index.php";</script><?php
	}
?>