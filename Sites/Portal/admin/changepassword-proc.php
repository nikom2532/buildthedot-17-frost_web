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
$userID = $_POST['userID'];

$oldpassword = $_POST['oldpassword'];
$newpassword = $_POST['newpassword'];
$renewpassword = $_POST['renewpassword'];

echo "userID=>".$userID ."<br/>";
echo "oldpassword=>".$oldpassword ."<br/>";
echo "newpassword=>".$newpassword ."<br/>";
echo "renewpassword=>".$renewpassword ."<br/>";


	$password_source = htmlspecialchars(trim($_POST["oldpassword"]),ENT_QUOTES);
	$oldpassword = md5(sha1($password_source)).sha1(md5($password_source));
	unset($password_source);

	$strQuery ="
		SELECT `ID`, `NAME`, `EMAIL`
		FROM  `ADMIN` 
		WHERE `PASSWORD` =  \"{$oldpassword}\" AND `ID` =  \"{$userID}\"
	;";
	echo "sql=>".$strQuery."<br/>";
	$cmdQuery =  mysql_query($strQuery);
	$num_row= mysql_num_rows($cmdQuery);
	echo "num_row=>".$num_row;
	$fetchArray=mysql_fetch_array($cmdQuery);
	if(mysql_num_rows($cmdQuery) == 1){		
		if($newpassword == $renewpassword){
			$password = md5(sha1($newpassword)).sha1(md5($newpassword));
			$strSQLUpdatePass = "UPDATE ADMIN SET PASSWORD='$password'";
			$strSQLUpdatePass.="WHERE ID='$userID'" ;
			
			echo "strQuery=>".$strSQLUpdatePass ;
			$cmdQuery = mysql_query($strSQLUpdatePass);
			
			if(mysql_affected_rows()){
				//header("location: my-profile.php?userID=$userID");
				?><script>window.location = "my-profile.php?userID=<?php echo $userID; ?>";</script><?php
			}
			if($oldpassword == ($newpassword == $renewpassword)){
				//header("location: my-profile.php?userID=$userID");
				?><script>window.location = "my-profile.php?userID=<?php echo $userID; ?>";</script><?php
			}

		}else {
			$passnotmatch = "New Password don't match";
			echo $passnotmatch;
			//header("location: edit-password.php?userID=$userID&validatepass=$passnotmatch");
			?><script>window.location = "edit-password.php?userID=<?php echo $userID; ?>&validatepass=<?php echo $passnotmatch; ?>";</script><?php
		}
		
	}else if(mysql_num_rows($cmdQuery) == 0){
		$passincorect = "Old password is incorrect";
		echo $passincorect;
		//header("location: edit-password.php?userID=$userID&validatepass=$passincorect");
		?><script>window.location = "edit-password.php?userID=<?php echo $userID; ?>&validatepass=<?php echo $passincorect; ?>";</script><?php
		if($newpassword != $renewpassword){
			$passnotmatch = "New Password don't match";
			echo $passincorect;
			//header("location: edit-password.php?userID=$userID&validatepass=$passnotmatch");
			?><script>window.location = "edit-password.php?userID=<?php echo $userID; ?>&validatepass=<?php echo $passnotmatch; ?>";</script><?php
		}
	}
	

?>

