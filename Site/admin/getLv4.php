<?php
include ("include/header.php");
$gLv3Id=intval($_GET['gLv3Id']);

$query="SELECT * FROM GROUP_LV4 WHERE GROUP_LV3_ID = '".$gLv3Id."'";
$result=mysql_query($query);

$count = mysql_num_rows($result);
if ($gLv3Id!=0 && $count!=0) {?>
	<div id="gLv4Div">
<label for="group-name">Group level 4</label>
	<select name="gLv4" id="gLv4" onchange="getGLv5(this.value)">
		<option value="0">--Select Menu--</option>
		<?php while($row=mysql_fetch_array($result)) { ?>
		<option value="<?=$row['ID']?>" <?php if($gLv3Id== $row['ID']){ echo "selected='selected' "; } ?>><?=$row['NAME']?></option>
		<?php } ?>
	</select>
</div>
<?php } ?>
