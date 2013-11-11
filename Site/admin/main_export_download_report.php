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
$sql_download_statistic="
	SELECT *, Date(DOWNLOAD_DATETIME) AS download_date, Time(DOWNLOAD_DATETIME) AS download_time
	FROM  `DOWNLOAD_STATISTICS`
	GROUP BY `USER_ID`
	ORDER BY `USER_ID` ;
";
$Result_download_statistic=@mysql_query($sql_download_statistic);
while($rs_download_statistic=@mysql_fetch_array($Result_download_statistic)){
	
	$sql_user="
		SELECT * 
		FROM  `USER_PROFILE`
		WHERE `ID` = '".$rs_download_statistic["USER_ID"]."';
	";
	$result_user=@mysql_query($sql_user);
	if($rs_user=@mysql_fetch_array($result_user)){
		$stat_user_name[] = $rs_user["FIRSTNAME"]." ".$rs_user["LASTNAME"];
	}
	
	$sql_pdf_name="
		SELECT * 
		FROM  `PDF`
		WHERE `ID` = '{$rs_download_statistic["PDF_ID"]}'
	;";
	$Result_pdf_name=@mysql_query($sql_pdf_name);
	if($rs_pdf_name=@mysql_fetch_array($Result_pdf_name)){
		$pdf_name[]=$rs_pdf_name["NAME"];
	}
	$stat_user_No[]=$i;
	$DOWNLOAD_DATETIME[] = $rs_download_statistic["DOWNLOAD_DATETIME"];
	$download_date[]=$rs_download_statistic["download_date"];
	$download_time[]=$rs_download_statistic["download_time"];
	$i++;
}

$user_array=array();
for($i=0; $i<count($stat_user_No); $i++){
	//$user_array[] = "\"".$stat_user_No[$i]."\",\"".$stat_user_name[$i]."\",\"".$stat_user_total_download[$i]."\"\n";
	$user_array[$i][0] = $stat_user_No[$i];
	$user_array[$i][1] = $stat_user_name[$i];
	$user_array[$i][2] = $pdf_name[$i];
	$user_array[$i][3] = $DOWNLOAD_DATETIME[$i];
}

array_to_csv_download(
	$user_array, // this array is going to be the second row
  "User_Statistic_Report.csv"
);
?>