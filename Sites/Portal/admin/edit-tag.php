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

$header_with_tag = "tag";
include("include/header-with-tabs.php");
?>

<!-- MAIN CONTENT -->
<div id="content">

	<div class="page-full-width cf">

		<div class="content-module">

			<div class="content-module-heading cf">

				<h3 class="fl">Edit tag</h3>
				<span class="fr expand-collapse-text">Click to collapse</span>
				<span class="fr expand-collapse-text initial-expand">Click to expand</span>

			</div>
			<!-- end content-module-heading -->

			<div class="content-module-main cf">

				<div class="half-size-column fl">

					<form method='POST' action='edit-tag-proc.php' id='edittag' name='edittag'>

						<fieldset>
<?php
							$tagId = $_POST['tagId'];
							$sql_tag = "
								SELECT ID as tagId ,NAME as tagName
								FROM `TAG`
								WHERE ID = '{$tagId}'
							;";
							$result = mysql_query($sql_tag);
							while ($row = mysql_fetch_array($result)) {
?>
								<p>
									<label for="tag-name">Tag Name</label>
									<input type="text" id="tagName" name="tagName" class="round default-width-input" value="<?php echo $row['tagName']; ?>"/>
								</p>
								<input type="hidden" name="tagId" value="<?php echo $row['tagId']; ?>">
								<input type="submit" value="Save change" class="round blue ic-right-arrow" />
<?php 
							}
?>
						</fieldset>

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