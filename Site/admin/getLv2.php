<?php
include ("include/header.php");
$gLv1Id=intval($_GET['gLv1Id']);

$query="SELECT * FROM GROUP_LV2 WHERE GROUP_LV1_ID = '".$gLv1Id."'";
$result=mysql_query($query);
$count = mysql_num_rows($result);
if ($gLv1Id!=0 && $count!=0) {?>
	<div id="gLv2Div">
	<label for="group-name">Group level 2</label>
	<select name="gLv2Div" onchange="getGLv3(this.value)">
	<option value="0">--Select Menu--</option>
	<?php while($row=mysql_fetch_array($result)) { ?>
	<option value=<?=$row['ID']?>><?=$row['NAME']?></option>
	<?php } ?>
	</select>
	</div>
<?php }?>
