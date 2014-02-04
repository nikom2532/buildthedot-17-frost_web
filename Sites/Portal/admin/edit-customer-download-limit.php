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

include ("include/top-bar.php");

include ("include/checksession.php");

$header_with_tag = "customer";
include("include/header-with-tabs.php");
?>

<!-- MAIN CONTENT -->
<div id="content">

	<div class="page-full-width cf">

		<div class="content-module">

			<div class="content-module-heading cf">

				<h3 class="fl">Edit User Limit Download</h3>
				<span class="fr expand-collapse-text">Click to collapse</span>
				<span class="fr expand-collapse-text initial-expand">Click to expand</span>

			</div>
			<!-- end content-module-heading -->

			<div class="content-module-main cf">

				<div class="half-size-column fl">

					<form action="edit-customer-download-limit-proc.php" method="POST" enctype="multipart/form-data">

						<fieldset>

<?php
							$userId = $_POST['userId'];
							$LIMIT_DOWNLOAD = "";
							$sql_limit_download = "
								SELECT * 
								FROM  `USER_LIMIT_DOWNLOAD`
								WHERE `USER_ID` = '{$userId}' ; 
							";
							$result_limit_download = mysql_query($sql_limit_download);

							while ($row = mysql_fetch_array($result_limit_download)) {
								$LIMIT_DOWNLOAD = $row['LIMIT_DOWNLOAD'];
							}
?>
								<p>
									<label for="name">User Limit Download</label>
									<input type="text" name= "LIMIT_DOWNLOAD" id="LIMIT_DOWNLOAD" class="round full-width-input" value="<?php echo $LIMIT_DOWNLOAD; ?>"/>
								</p>
						</fieldset>

						<input type="hidden" name="userId" id="userId" value="<?php echo $userId; ?>">
						<input type="submit" value="Save change" class="round blue ic-right-arrow" />
					</form>

				</div>
				<!-- end half-size-column -->

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