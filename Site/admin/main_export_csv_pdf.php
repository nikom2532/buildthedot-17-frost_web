<?php
@session_start();
$rootpath = "../";
include ($rootpath . "lib/db.php");
include ($rootpath . "lib/conn.inc.php");
include ($rootpath . "lib/func_date.php");
if (!$db -> open()) {
	die($db -> error());
}

function array_to_csv_download($array, $filename = "PDF_Statistic_Report.csv", $delimiter = ",") {
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

$i = 1;
$sql_statistic_by_pdf = "
	SELECT *
	FROM  `DOWNLOAD_STATISTICS`
	GROUP BY `PDF_ID`
	ORDER BY `PDF_ID`;
";
$Result_statistic_by_pdf = @mysql_query($sql_statistic_by_pdf);
while ($rs_statistic_by_pdf = @mysql_fetch_array($Result_statistic_by_pdf)) {
	$sql_pdf = "
		SELECT * 
		FROM  `PDF`
		WHERE `ID` = '" . $rs_statistic_by_pdf["PDF_ID"] . "'; 
	";
	$Result_pdf = @mysql_query($sql_pdf);
	if ($rs_pdf = @mysql_fetch_array($Result_pdf)) {
		$stat_pdf_name[] = $rs_pdf["NAME"];
	}

	$sql_statistic_each_pdf = "
		SELECT COUNT(`PDF_ID`) AS `number_pdf`
		FROM  `DOWNLOAD_STATISTICS`
		WHERE `PDF_ID` = '" . $rs_statistic_by_pdf["PDF_ID"] . "';
	";
	$Result_statistic_each_pdf = @mysql_query($sql_statistic_each_pdf);
	if ($rs_statistic_each_pdf = @mysql_fetch_array($Result_statistic_each_pdf)) {
		$stat_pdf_total_download[] = $rs_statistic_each_pdf["number_pdf"];
	}
	$stat_pdf_No[] = $i;
	$i++;
}

$pdf_array = array();
for ($i = 0; $i < count($stat_pdf_No); $i++) {
	//$pdf_array[] = "\"".$stat_pdf_No[$i]."\",\"".$stat_pdf_name[$i]."\",\"".$stat_pdf_total_download[$i]."\"\n";
	$pdf_array[$i][0] = $stat_pdf_No[$i];
	$pdf_array[$i][1] = $stat_pdf_name[$i];
	$pdf_array[$i][2] = $stat_pdf_total_download[$i];
}

array_to_csv_download(
	$pdf_array, // this array is going to be the second row
	"PDF_Statistic_Report.csv"
);
?>