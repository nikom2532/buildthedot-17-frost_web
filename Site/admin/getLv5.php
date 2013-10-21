<?php
include ("include/header.php");
$gLv4Id=intval($_GET['gLv4Id']);

$query="SELECT * FROM GROUP_LV5 WHERE GROUP_LV4_ID = '".$gLv4Id."'";
$result=mysql_query($query);
$count = mysql_num_rows($result);
if ($gLv4Id!=0 && $count!=0) {?>
<div id="gLv5Div">
<label for="group-name">Group level 5</label>
	<select name="gLv5")">
		<option value="0">--Select Menu--</option>
		<?php while($row=mysql_fetch_array($result)) { ?>
		<option value=<?=$row['ID']?>><?=$row['NAME']?></option>
		<?php } ?>
	</select>
</div>
<?php } ?>