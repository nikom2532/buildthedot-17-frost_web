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
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$company = $_POST['company'];
	$jobTitle = $_POST['jobTitle'];
	$department_id = $_POST['department_id'];
	$industry_id = $_POST['industry_id'];	
	$address = $_POST['address'];
	$city = $_POST['city'];
	$zip = $_POST['zip'];
	$country_id = $_POST['country'];
	$phone = $_POST['phone'];
	$fax = $_POST['fax'];
	
	// upload image
	if(!(!file_exists($_FILES['imagefile']['tmp_name']) || !is_uploaded_file($_FILES['imagefile']['tmp_name']))){
		
		if ($_FILES["imagefile"]["error"] > 0) {
			echo "Error: " . $_FILES["imagefile"]["error"] . "<br>";
		} else {
			echo "Upload: " . $_FILES["imagefile"]["name"] . "<br>";
			echo "Type: " . $_FILES["imagefile"]["type"] . "<br>";
			echo "Size: " . ($_FILES["imagefile"]["size"] / 1024) . " kB<br>";
			echo "Stored in: " . $_FILES["imagefile"]["tmp_name"];
		}
		?>
		
		<?php
		$target_path = "../images/user_images/";
		$filename = "userimage_".$_SESSION["userid"]."_".strtotime("now")."_".basename($_FILES["imagefile"]['name']);
		$target_path = $target_path . $filename;
		
		$allowedExts = array("gif", "jpeg", "jpg", "png");
		$temp = explode(".", $_FILES["imagefile"]["name"]);
		$extension = end($temp);
		if ((($_FILES["imagefile"]["type"] == "image/gif")
		|| ($_FILES["imagefile"]["type"] == "image/jpeg")
		|| ($_FILES["imagefile"]["type"] == "image/jpg")
		|| ($_FILES["imagefile"]["type"] == "image/pjpeg")
		|| ($_FILES["imagefile"]["type"] == "image/x-png")
		|| ($_FILES["imagefile"]["type"] == "image/png"))
		&& in_array($extension, $allowedExts)){
			if ($_FILES["imagefile"]["error"] > 0) {
				echo "Error: " . $_FILES["imagefile"]["error"] . "<br />";
			} else {
				if (move_uploaded_file($_FILES["imagefile"]['tmp_name'], $target_path)) {
					echo "The file " . basename($_FILES["imagefile"]['name']) . " has been uploaded";
					include("edit-customer-proc-with-image.php");
				} else {
					echo "There was an error uploading the file, please try again!";
				}
			}
		} else {
			echo "Invalid file";
		}
	} else{
		include("edit-customer-proc.php");
		
	}
?>