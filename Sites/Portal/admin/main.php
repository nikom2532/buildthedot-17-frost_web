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
// include($rootpath."lib/func_expert_csv.php");
?>
<?php
	include ("include/top-bar.php");
?>
<?php
	include ("include/checksession.php");
?>
<script>
	$(function() {
		$( "#datepicker" ).datepicker({
			changeMonth: true,
			dateFormat:"yy-mm-dd",
			onClose: function( selectedDate ) {
				$( "#datepicker2" ).datepicker( "option", "minDate", selectedDate );
			}
		});
		$( "#datepicker2" ).datepicker({
			changeMonth: true,
			dateFormat:"yy-mm-dd",
			onClose: function( selectedDate ) {
				$( "#datepicker" ).datepicker( "option", "maxDate", selectedDate );
			}
		});
	});
</script>
<?php
$header_with_tag = "main";
include("include/header-with-tabs.php");
?>

<!-- MAIN CONTENT -->
<div id="content">

	<div class="page-full-width cf">

		<div class="content-module">

			<div class="content-module-heading cf">

				<h3 class="fl">Top five downloads </h3>
				<span class="fr expand-collapse-text">Click to collapse</span>
				<span class="fr expand-collapse-text initial-expand">Click to expand</span>

			</div>
			<!-- end content-module-heading -->

			
			<div class="content-module-main">
				<h2>Group by user</h2>
				<table class="fixed">
					<col width="2em" />
					<col width="20em" />
					<col width="5em" />

					<thead>

						<tr>
							<th>No.</th>
							<th>Name</th>
							<th>Total Downloaded</th>
						</tr>

					</thead>

					<tfoot>
						
						<tbody>
<?php
							$i=1;
							$sql_statistic_by_user="
								SELECT *
								FROM  `DOWNLOAD_STATISTICS`
								GROUP BY `USER_ID`
								ORDER BY `USER_ID`
								LIMIT 0,5;
							";
							$Result_statistic_by_user=@mysql_query($sql_statistic_by_user);
							while($rs_statistic_by_user=@mysql_fetch_array($Result_statistic_by_user)){
?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php 
										$sql_user="
											SELECT * 
											FROM  `USER_PROFILE`
											WHERE `ID` = '".$rs_statistic_by_user["USER_ID"]."';
										";
										$result_user=@mysql_query($sql_user);
										if($rs_user=@mysql_fetch_array($result_user)){
											echo $rs_user["FIRSTNAME"]." ".$rs_user["LASTNAME"];
										}
									?></td>
									<td><?php
										$sql_statistic_each_user="
											SELECT COUNT(`USER_ID`) AS `number_user`
											FROM  `DOWNLOAD_STATISTICS`
											WHERE `USER_ID` = '".$rs_statistic_by_user["USER_ID"]."';
										";
										$Result_statistic_each_user=@mysql_query($sql_statistic_each_user);
										if($rs_statistic_each_user=@mysql_fetch_array($Result_statistic_each_user)){
											echo $rs_statistic_each_user["number_user"];
										}
									?></td>
								</tr>
<?php
								$i++;
							}
?>
						</tbody>
					</tfoot>
				</table>
<?php
				//Create the CSV Report
?>
				<a href="./main_export_csv_user.php" class="round button orange ic-download image-left">Download Report</a>
				<div class="stripe-separator">
					<!--  -->
				</div>
				<!--end group by user -->

				<h2>Group by title</h2>

				<table class="fixed">
					<col width="2em" />
					<col width="20em" />
					<col width="5em" />

					<thead>

						<tr>
							<th>No.</th>
							<th>Title</th>
							<th>Total Downloaded</th>
						</tr>

					</thead>

					<tfoot>

						<tbody>
<?php
							$i=1;
							$sql_statistic_by_pdf="
								SELECT *
								FROM  `DOWNLOAD_STATISTICS`
								GROUP BY `PDF_ID`
								ORDER BY `PDF_ID`
								LIMIT 0,5;
							";
							$Result_statistic_by_pdf=@mysql_query($sql_statistic_by_pdf);
							while($rs_statistic_by_pdf=@mysql_fetch_array($Result_statistic_by_pdf)){
?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php
										$sql_pdf="
											SELECT * 
											FROM  `PDF`
											WHERE `ID` = '".$rs_statistic_by_pdf["PDF_ID"]."'; 
										";
										$Result_pdf=@mysql_query($sql_pdf);
										if($rs_pdf=@mysql_fetch_array($Result_pdf)){
											echo $rs_pdf["NAME"];
										}
									?></td>
									<td><?php
										$sql_statistic_each_pdf="
											SELECT COUNT(`PDF_ID`) AS `number_pdf`
											FROM  `DOWNLOAD_STATISTICS`
											WHERE `PDF_ID` = '".$rs_statistic_by_pdf["PDF_ID"]."';
										";
										$Result_statistic_each_pdf=@mysql_query($sql_statistic_each_pdf);
										if($rs_statistic_each_pdf=@mysql_fetch_array($Result_statistic_each_pdf)){
											echo $rs_statistic_each_pdf["number_pdf"];
										}
									?></td>
								</tr>
<?php
								$i++;
							}
?>
						</tbody>
					</tfoot>
				</table>
<?php
				//Create the CSV Report
?>
				<a href="./main_export_csv_pdf.php" class="round button orange ic-download image-left">Download Report</a>
				<!--end group by user -->
				
				<div class="stripe-separator">
					<!--  -->
				</div>
				
				<h2>Download report</h2>

				<table class="fixed">
					<col width="2em" />
					<col width="8em" />
					<col width="8em" />
					<col width="3em" />
					<col width="3em" />

					<thead>

						<tr>
							<th>No.</th>
							<th>USER</th>
							<th>Title</th>
							<th>Download Date</th>
							<th>Download Time</th>
						</tr>

					</thead>

					<tfoot>

						<tbody>
<?php
							$i=1;
							$sql_download_statistic="
								SELECT *, Date(DOWNLOAD_DATETIME) AS download_date, Time(DOWNLOAD_DATETIME) AS download_time
								FROM  `DOWNLOAD_STATISTICS`
								GROUP BY `USER_ID`
								ORDER BY `USER_ID` ;
							";
							$Result_download_statistic=@mysql_query($sql_download_statistic);
							while($rs_download_statistic=@mysql_fetch_array($Result_download_statistic)){
?>
								<tr>
									<td><?php echo $i++; ?></td>
									<td><?php
										$sql_user_name = "
											SELECT * 
											FROM  `USER_PROFILE` 
											WHERE `ID` = '{$rs_download_statistic["USER_ID"]}'
										;";
										$result_user_name = @mysql_query($sql_user_name);
										while ($rs_user_name = @mysql_fetch_array($result_user_name)) {
											echo $rs_user_name["FIRSTNAME"]." ".$rs_user_name["FIRSTNAME"];
										}
									?></td>
									<td><?php 
										$sql_pdf_name = "
											SELECT * 
											FROM  `PDF`
											WHERE `ID` = '{$rs_download_statistic["PDF_ID"]}'
										;";
										$result_pdf_name = @mysql_query($sql_pdf_name);
										while ($rs_pdf_name = @mysql_fetch_array($result_pdf_name)) {
											echo $rs_pdf_name["NAME"]; 
										}
									?></td>
									<td><?php echo $rs_download_statistic["download_date"]; ?></td>
									<td><?php echo $rs_download_statistic["download_time"]; ?></td>
								</tr>
<?php
							}
?>
						</tbody>
					</tfoot>
				</table>
				<!-- <br />ลูกค้า ต้องการให้มันมีให้เลือก ออก Report โดยฟิวเตอร์ เฉพาะ Date, Time -->
				<form id="download_report_form" name="download_report_form" action="<?php echo $rootadminpath; ?>main_export_download_report.php" method="POST">
					<br />
					<p>
						<label for="name">Start Date</label>
						<input type="text" id="datepicker" name="startDate" required="required"/>
					</p>
					
					<p>
						<label for="name">End Date</label>
						<input type="text" id="datepicker2" name="endDate" required="required"/>
					</p>
					<br />
					<!-- <a onclick="document.getElementById('download_report_form').submit();" href="#" class="round button orange ic-download image-left">Download Report</a> -->
					<input type="submit" href="#" class="round button orange ic-download image-left" value="Download Report" />
				</form>
			</div>
			<!-- end content-module-main -->

		</div>
		<!-- end content-module -->

	</div>
	<!-- end full-width -->

</div>
<!-- end content -->

<?php
	include ("include/footer.php");
?>
