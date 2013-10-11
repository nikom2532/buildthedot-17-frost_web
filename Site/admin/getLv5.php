<?php
include ("include/header.php");
$gLv4Id=intval($_GET['gLv4Id']);

$query="SELECT * FROM GROUP_LV5 WHERE GROUP_LV4_ID = '".$gLv4Id."'";
$result=mysql_query($query);

?>
<div id="gLv5Div">
<label for="group-name">Group level 5</label>
<select name="gLv5Div")">
<option>--Select Menu--</option>
<? while($row=mysql_fetch_array($result)) { ?>
<option value=<?=$row['ID']?>><?=$row['NAME']?></option>
<? } ?>
</select>
</div>