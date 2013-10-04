<?php
session_start();
$rootpath = "../";
include ($rootpath . "lib/db.php");
include ($rootpath . "lib/conn.inc.php");
include ($rootpath . "lib/func_date.php");
if (!$db -> open()) {
	die($db -> error());
}

function array_to_csv_download($array, $filename = "User_Statistic_Report.csv", $delimiter=",") {
    // open raw memory as file so no temp files needed, you might run out of memory though
    $f = fopen('php://memory', 'w'); 
    // loop over the input array
    foreach ($array as $line) { 
        // generate csv lines from the inner arrays
        fputcsv($f, $line, $delimiter); 
    }
    // rewrind the "file" with the csv lines
    fseek($f, 0);
    // tell the browser it's going to be a csv file
    header('Content-Type: application/csv');
    // tell the browser we want to save it instead of displaying it
    header('Content-Disposition: attachement; filename="'.$filename.'"');
    // make php send the generated csv lines to the browser
    fpassthru($f);
}

$i=1;
$sql_statistic_by_user="
	SELECT *
	FROM  `DOWNLOAD_STATISTICS`
	GROUP BY `USER_ID`
	ORDER BY `USER_ID`
";
$Result_statistic_by_user=@mysql_query($sql_statistic_by_user);
while($rs_statistic_by_user=@mysql_fetch_array($Result_statistic_by_user)){
	
	$sql_user="
		SELECT * 
		FROM  `USER_PROFILE`
		WHERE `ID` = '".$rs_statistic_by_user["USER_ID"]."';
	";
	$result_user=@mysql_query($sql_user);
	if($rs_user=@mysql_fetch_array($result_user)){
		$stat_user_name[] = $rs_user["FIRSTNAME"]." ".$rs_user["LASTNAME"];
	}
	
	$sql_statistic_each_user="
		SELECT COUNT(`USER_ID`) AS `number_user`
		FROM  `DOWNLOAD_STATISTICS`
		WHERE `USER_ID` = '".$rs_statistic_by_user["USER_ID"]."';
	";
	$Result_statistic_each_user=@mysql_query($sql_statistic_each_user);
	if($rs_statistic_each_user=@mysql_fetch_array($Result_statistic_each_user)){
		$stat_user_total_download[]=$rs_statistic_each_user["number_user"];
	}
	$stat_user_No[]=$i;
	$i++;
}

$user_array=array();
for($i=0; $i<count($stat_user_No); $i++){
	//$user_array[] = "\"".$stat_user_No[$i]."\",\"".$stat_user_name[$i]."\",\"".$stat_user_total_download[$i]."\"\n";
	$user_array[$i][0] = $stat_user_No[$i];
	$user_array[$i][1] = $stat_user_name[$i];
	$user_array[$i][2] = $stat_user_total_download[$i];
}

array_to_csv_download(
	$user_array, // this array is going to be the second row
  "User_Statistic_Report.csv"
);
?>