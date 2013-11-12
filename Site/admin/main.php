<?php
include ("include/header.php");
// include($rootpath."lib/func_expert_csv.php");
?>
<?php
	include ("include/top-bar.php");
?>
<?php
	include ("include/checksession.php");
?>
<!-- HEADER -->
<div id="header-with-tabs">

	<div class="page-full-width cf">

		<ul id="tabs" class="left">
			<li>
				<a href="main.php" class="active-tab dashboard-tab">Dashboard</a>
			</li>
			<li>
				<a href="customer.php">Customer Management</a>
			</li>
			<li>
				<a href="pdf.php">PDF Management</a>
			</li>
			<li>
				<a href="tag.php">Tag Management</a>
			</li>
			<li>
				<a href="home-info.php">Home Info</a>
			</li>
		</ul>
		<!-- end tabs -->

		<!-- company logo -->
		<a href="#" id="company-branding-small" class="right"><img src="images/mckansys_logo.png" width="200" height="27" alt="logo"></a>

	</div>
	<!-- end full-width -->

</div>
<!-- end header -->

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