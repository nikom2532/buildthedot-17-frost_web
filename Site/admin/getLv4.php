<?php
include ("include/header.php");
$gLv3Id=intval($_GET['gLv3Id']);

$query="SELECT * FROM GROUP_LV4 WHERE GROUP_LV3_ID = '".$gLv3Id."'";
$result=mysql_query($query);

?>
<div id="gLv4Div">
<label for="group-name">Group level 4</label>
<select name="gLv4Div" onchange="getGLv5(this.value)">
<option>--Select Menu--</option>
<? while($row=mysql_fetch_array($result)) { ?>
<option value=<?=$row['ID']?>><?=$row['NAME']?></option>
<? } ?>
</select>
</div>