<?php
include ("include/header.php");

echo $sql = "INSERT INTO USER_PROFILE (PHOTO_NAME, 
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
if ($result) {
$msg = "Sucess";
//header("location: customer.php?msg=$msg");
}else{
$msg = "Failed";
//header("location: customer.php?msg=$msg");
}
?>