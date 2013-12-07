<?php
include("include/header.php"); 
	$email = $_POST['email'];

	$email = htmlspecialchars(trim($_POST["email"]),ENT_QUOTES);
	$query = "SELECT * FROM  USER_PROFILE WHERE EMAIL ='".$email."' AND IS_ACTIVE = 'Y'";
				$result = mysql_query($query);
				$count = mysql_num_rows($result);
	if($count > 0) {
		$row = mysql_fetch_array($result);
		
		//header("location: {$rootpath}forgot-password-question.php?qId=".$row['QUESTION_ID']."&id=".$row['ID']);
		?><script>window.location = "<?php echo $rootpath; ?>forgot-password-question.php?qId=<?php echo $row['QUESTION_ID']; ?>&id=<?php echo $row['ID']; ?>";</script><?php
	} else {
		header("location: {$rootpath}index.php");
		?><script>window.location = "<?php echo $rootpath; ?>index.php";</script><?php
	}
?>