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
$gLv2Id=intval($_GET['gLv2Id']);

$query="SELECT * FROM GROUP_LV3 WHERE GROUP_LV2_ID = '".$gLv2Id."'";
$result=mysql_query($query);

$count = mysql_num_rows($result);
if ($gLv2Id!=0 && $count!=0) {?>
	<div id="gLv3Div">
	<label for="group-name">Group level 3</label>
	<select name="gLv3" id="gLv3" onchange="getGLv4(this.value)">
		<option value="0">--Select Menu--</option>
		<?php while($row=mysql_fetch_array($result)) { ?>
		<option value="<?php echo $row['ID']; ?>" <?php if($gLv2Id== $row['ID']){ echo "selected='selected' "; } ?>><?php echo $row['NAME']; ?></option>
		<?php } ?>
	</select>
	</div>
<?php } ?>
