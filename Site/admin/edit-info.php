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
include ("include/checksession.php");
$infoId = $_POST['infoId'];
$msg = $_GET['msg'];
if ($msg=="Sucess") {
    $message = "Process Complete";
    ?>
     <script type="text/javascript">
        showNotification({
            message: "<?php echo $message; ?>",
            type: "success",
            autoClose: true,
            duration: 5                                        
        });
    </script>
    <?php
}if($msg=="Failed"){
	$message = "Process Failed! Please try again";
    ?>
     <script type="text/javascript">
        showNotification({
            message: "<?php echo $message; ?>",
            type: "error",
            autoClose: true,
            duration: 5                                        
        });
    </script>
    <?php
}

include ("include/top-bar.php");
?>
<!-- HEADER -->
<div id="header-with-tabs">

	<div class="page-full-width cf">

		<ul id="tabs" class="left">
			<li>
				<a href="main.php" >Dashboard</a>
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
				<a href="home-info.php" class="active-tab">Home Info</a>
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

				<h3 class="fl">Edit PDF</h3>
				<span class="fr expand-collapse-text">Click to collapse</span>
				<span class="fr expand-collapse-text initial-expand">Click to expand</span>

			</div>
			<!-- end content-module-heading -->

			<div class="content-module-main cf">

				<form action="edit-info-proc.php" method='POST' name="editinfo" id="editinfo">
					<div class="half-size-column fl">

						<!-- <form action="edit-pdf-proc.php" method='POST' name="editpdf" id="editpdf"> -->
						<?php
						$result = mysql_query("
							SELECT *
							FROM INFO AS i
							WHERE i.ID = $infoId
						");

						while ($row = mysql_fetch_array($result)) {
						?>
						<fieldset>

							<p>
								<label for="description">Description</label>
								<textarea id="description" class="round full-width-textarea" name="description" ><?=$row['DESCRIPTION']; ?></textarea>
							</p>

						</fieldset>
						<input type='hidden' name='infoId' value="<?=$infoId?>"/>	
						<input type="submit" value="Save change" class="round blue ic-right-arrow" />
					</div>
					<!-- end half-size-column -->
						<?php } ?>
				</form>

			</div>
			<!-- end half-size-column -->

		</div>
		<!-- end content-module-main -->

	</div>
	<!-- end content-module -->

</div>
<!-- end full-width -->

</div> <!-- end content -->

<?php
include($rootadminpath."js/module/upload-pdf-edit.php");
	include ("include/footer.php");
?>