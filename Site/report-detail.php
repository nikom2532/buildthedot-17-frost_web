<?php
$rootpath = "./";
include ("include/header.php");

include ("include/top-menu.php");
?>
<div id="content">
	<div class="container_12">
		<?php
			include ("include/side-menu-knowledge.php");
		?>
		 <div id="container" class="left">
			<div id="content-middle" class="grid_8">

				<?php

				$id = $_GET["id"];

				$query = "SELECT * FROM  PDF WHERE ID =".$id;
				$result = mysql_query($query) OR die(mysql_error());
				$count = mysql_num_rows($result);

				$current_month_all =  date('M');
				$current_year_all =  date('Y');
			
				if($count > 0) {
					$row = mysql_fetch_array($result);
				
				?>
				<ul class="nav-title">
					<li>
						<a href="index.php">New release <?php echo $current_month_all;?>, <?php echo $current_year_all;?></a>
					</li>
					<li class="text-orange bold text-nav">
						<?php echo $row['NAME']; ?>
					</li>
				</ul>
				<br class="clear"/>
				<div class="grid_6">
					<section class="report-detail" class="grid_4">
						<p class="text-blue bold">
							<?php echo $row['NAME']; ?>
						</p>
						<p class="date bold">
							<?php echo date("M, d Y", strtotime($row['UPDATE_DATE'])); ?>
						</p>
						<p class="indent">
							<?php echo $row['DESCRIPTION']; ?>
						</p>
					</section>
					<p class="text-tag">
						Tags
					</p>
					<ul class="report-tag">
						
						<?php
						$tagResult = mysql_query("
						SELECT *
						FROM  TAG_RELATIONSHIP AS a
						INNER JOIN TAG AS b
						ON a.TAG_ID = b.ID
						WHERE PDF_ID =".$id) or die(mysql_error());
				
						while ($tagRow = mysql_fetch_array($tagResult)) {
							echo "<a href='tagSearch.php?tagId=". $tagRow['TAG_ID'] ."&tagName=".$tagRow['NAME']."'>";
							echo "<li class='button orange'>";
							echo $tagRow['NAME'];
							echo "</li>";
							echo "</a>";
						}
						?>
					</ul>

				</div>
				<div class="grid_1 center" id="price-box">
					<p><b class="center">฿ <?php echo $row['PRICE']; ?></b></p>
<?php
					
?>
						<!-- Download --><?php 
							//####### Find Lock Download Key ##########
							$temp_id__ = $_GET["id"];
							$temp_glvl__ = $_GET["glvl"];
							$str = array();
							while ($temp_glvl__ >= 2) {
								$SQLnav = "
									SELECT *
									FROM `GROUP_LV" . $temp_glvl__ . "`
									WHERE `ID` = '" . $temp_id__ . "'
								;";
								$resultnav = @mysql_query($SQLnav);
								if($rsnav = @mysql_fetch_array($resultnav)) {
									$temp_id__ = $rsnav["GROUP_LV" . ($temp_glvl__ - 1) . "_ID"];
									if($temp_glvl__==3){	//find Group Level 2 ID
										$PERMISSION_glvl2_ID = $temp_id__;
									}
									$temp_glvl__--;
								}//end query
							}//end while
							$PERMISSION_Is_Lockkey="";
							if(!$PERMISSION_glvl2_ID){
								if($_GET["glvl"]==2){
									$PERMISSION_glvl2_ID = $_GET["id"];
								}
							}
							$SQLlockKey="
								SELECT * 
								FROM  `PERMISSION`
								WHERE `USER_PROFILE_ID` = '{$_SESSION["userid"]}'
								AND `GROUP_LV2_ID` = '{$PERMISSION_glvl2_ID}'
								AND `IS_ACTIVE` = 'Y'
								AND `END_DATE` > NOW()
							;";
							$resultLockKey = @mysql_query($SQLlockKey);
							if($rsLockKey = @mysql_fetch_array($resultLockKey)) {
								$PERMISSION_Is_Lockkey = "N";
							}
							else{
								$PERMISSION_Is_Lockkey = "Y";
							}
							if($PERMISSION_Is_Lockkey=="Y"){
								echo "<a href='#'>";
?>
								<b class="button darkgreen" id="download-button">
<?php
								echo "Paid";
?>
								</b>
<?php
							}
							elseif($PERMISSION_Is_Lockkey=="N"){
								echo "<a href='download-pdf.php?pdfId=". $id ."'>";
?>
								<b class="button darkgreen" id="download-button">
<?php
								echo "Download";
?>
								</b>
<?php
							}
						?>
					</a>
				</div>
			
				<?php } ?>
				
				
			</div><!--end content-middle -->
		<!-- </div> -->
	</div><!--end container_12 -->
</div><!--end content -->

<?php
include ("include/footer.php");

?>