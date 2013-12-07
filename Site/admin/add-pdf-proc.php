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

$sql = "INSERT INTO USER_PROFILE (PHOTO_NAME, 
	FIRSTNAME, 
	LASTNAME, 
	EMAIL, 
	COMPANY,
	JOB_TITLE,
	DEPARTMENT_ID,
	INDUSTRY_ID,
	ADDRESS,
	CITY,
	ZIP,
	COUNTRY_ID,
	PHONE,
	FAX)
	
	VALUES
	('test',
	'$_POST[firstname]',
	'$_POST[lastname]',
	'$_POST[email]',
	'$_POST[company]',
	'$_POST[jobTitle]',
	'$_POST[department_id]',
	'$_POST[industry_id]',
	'$_POST[address]',
	'$_POST[city]',
	'$_POST[zip]',
	'$_POST[country]',
	'$_POST[phone]',
	'$_POST[fax]')";
// echo $sql;
$result = mysql_query($sql);
header("location: customer.php");
?><script>window.location = "customer.php";</script><?php
?>