<?php
include ("include/header.php");
@session_start();
$rootpath = "../";
include ($rootpath . "lib/db.php");
include ($rootpath . "lib/conn.inc.php");
include ($rootpath . "lib/func_date.php");
if (!$db -> open()) {
	die($db -> error());
}
?>

<?php
	
	$userID = $_POST['userId'];
	$LIMIT_DOWNLOAD = $_POST["LIMIT_DOWNLOAD"];
	
	$sql_read_limit = "
		SELECT * 
		FROM  `USER_LIMIT_DOWNLOAD`
		WHERE `USER_ID` = '{$userID}' ;
	";
	$result_read_limit = @mysql_query($sql_read_limit);
	if($rs_read_limit = @mysql_fetch_array($result_read_limit)) {
		$sql_update_limit = "
			UPDATE `USER_LIMIT_DOWNLOAD`
			SET
				`LIMIT_DOWNLOAD` = '{$LIMIT_DOWNLOAD}'
			WHERE 
				`USER_ID` = '{$userID}' ;
		";
		@mysql_query($sql_update_limit);
		$msg = "Sucess";
		//header("location: customer.php?msg=$msg");
		?><script>window.location = "customer.php?msg=<?php echo $msg; ?>";</script><?php
	}
	else{
		$sql_insert_limit = "
			INSERT INTO `USER_LIMIT_DOWNLOAD`
			(`USER_ID`, `LIMIT_DOWNLOAD`)
			VALUES
			('{$userID}', '{$LIMIT_DOWNLOAD}')
		";
		@mysql_query($sql_insert_limit);
		$msg = "Sucess";
		//header("location: customer.php?msg=$msg");
		?><script>window.location = "customer.php?msg=<?php echo $msg; ?>";</script><?php
	}
?>