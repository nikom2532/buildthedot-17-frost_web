<?php 
$strQuery = "";
$strQuery = "SELECT * FROM ADMIN WHERE ID ='".$_SESSION["userid"]."';";
//echo "strQuery=>".$strQuery ;
$cmdQueryMyprofile =  mysql_query($strQuery);
$Num_Rows = mysql_num_rows($cmdQueryMyprofile);

?>