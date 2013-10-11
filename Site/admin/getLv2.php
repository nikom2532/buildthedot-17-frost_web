<?php
include ("include/header.php");
$gLv1Id=intval($_GET['gLv1Id']);

$query="SELECT * FROM GROUP_LV2 WHERE GROUP_LV1_ID = '".$gLv1Id."'";
$result=mysql_query($query);

?>
<div id="gLv2Div">
<label for="group-name">Group level 2</label>
<select name="gLv2Div" onchange="getGLv3(this.value)">
<option>--Select Menu--</option>
<? while($row=mysql_fetch_array($result)) { ?>
<option value=<?=$row['ID']?>><?=$row['NAME']?></option>
<? } ?>
</select>
</div>