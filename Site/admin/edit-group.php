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

$header_with_tag = "group";
include("include/header-with-tabs.php");

$glvl_id = $_POST["glvl_id"];
$glvl_id_parent = $_POST["glvl_id_parent"];
$glvl_glvl = $_POST	["glvl_glvl"];
?>

<!-- MAIN CONTENT -->
<div id="content">

	<div class="page-full-width cf">
		<div class="content-module">

			<div class="content-module-heading cf">

				<h3 class="fl">Edit Group</h3>
				<span class="fr expand-collapse-text">Click to collapse</span>
				<span class="fr expand-collapse-text initial-expand">Click to expand</span>

			</div>
			<!-- end content-module-heading -->
			<div class="content-module-main cf">
				<form action="edit-group-proc.php" method='POST' name="editinfo" id="editinfo">
					<input type="hidden" name="glvl_glvl" id="glvl_glvl" value="<?php echo $glvl_glvl; ?>" />
					<input type="hidden" name="glvl_id" id="glvl_id" value="<?php echo $glvl_id; ?>" />
					<div class="half-size-column fl">
<?php
						$sql_group = "
							SELECT * 
							FROM `GROUP_LV".$glvl_glvl."` 
							WHERE `ID` = '{$glvl_id}'
						;";
						$result = @mysql_query($sql_group);
						while ($row = @mysql_fetch_array($result)) {
?>
							<fieldset>
								<p>
									<label for="description">Topic Name</label>
									<input id="NAME" name="NAME" type="text" value="<?php echo $row['NAME']; ?>" />
								</p>
								<p>
									<label for="description">Description</label>
									<textarea name="description" id="description" class="round full-width-textarea" ><?php echo $row['DESCRIPTION']; ?></textarea>
								</p>
								<p>
<?php
									if($glvl_glvl>1){
?>
										<label for="glvl_id_parent">glvl_glvl_parent</label>
										<select name="glvl_id_parent" id="glvl_id_parent">
<?php
											$sql_glvl_parent = "
												SELECT * 
												FROM  `GROUP_LV".($glvl_glvl-1)."` 
											";
											$result_glvl_parent = @mysql_query($sql_glvl_parent);
											while ($rs_glvl_parent = @mysql_fetch_array($result_glvl_parent)) {
?>
												<option value="<?php echo $rs_glvl_parent["ID"]; ?>"<?php
													$sql_group_selected = "
														SELECT `ID`
														FROM  `GROUP_LV".($glvl_glvl-1)."`
														WHERE `ID` = '".$row["GROUP_LV".($glvl_glvl-1)."_ID"]."'
													;";
													$result_group_selected = @mysql_query($sql_group_selected);
													if($rs_group_selected = @mysql_fetch_array($result_group_selected)){
														echo "selected = \"selected\"";
													}
												?>>
													<?php echo $rs_glvl_parent["NAME"]; ?>
												</option>
<?php
											}
?>
										</select>
<?php
									}
?>
								</p>
							</fieldset>
							<input type='hidden' name='infoId' value="<?=$infoId?>"/>	
							<input type="submit" value="Save change" class="round blue ic-right-arrow" />
<?php 
						}
?>
					</div>
					<!-- end half-size-column -->
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