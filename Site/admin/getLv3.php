<?php
include ("include/header.php");
$gLv2Id=intval($_GET['gLv2Id']);

$query="SELECT * FROM GROUP_LV3 WHERE GROUP_LV2_ID = '".$gLv2Id."'";
$result=mysql_query($query);

?>
<div id="gLv3Div">
<label for="group-name">Group level 3</label>
<select name="gLv3Div" onchange="getGLv4(this.value)">
<option>--Select Menu--</option>
<? while($row=mysql_fetch_array($result)) { ?>
<option value=<?=$row['ID']?>><?=$row['NAME']?></option>
<? } ?>
</select>
</div>