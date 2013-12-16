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
$gLv4Id=intval($_GET['gLv4Id']);

$query="SELECT * FROM GROUP_LV5 WHERE GROUP_LV4_ID = '".$gLv4Id."'";
$result=mysql_query($query);

$count = mysql_num_rows($result);
if ($gLv4Id!=0 && $count!=0) {?>
<div id="gLv5Div">
<label for="group-name">Group level 5</label>
	<select name="gLv5" id="gLv5">
		<option value="0">--Select Menu--</option>
		<?php while($row=mysql_fetch_array($result)) { ?>
		<option value="<?=$row['ID']?>" <?php if($gLv4Id== $row['ID']){ echo "selected='selected' "; } ?>><?=$row['NAME']?></option>
		<?php } ?>
	</select>
</div>
<?php } ?>
