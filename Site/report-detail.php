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

				$id = $_GET["pdf_id"];

				$query = "SELECT * FROM  PDF WHERE ID =".$id;
				$result = mysql_query($query) OR die(mysql_error());
				$count = mysql_num_rows($result);

				$current_month_all =  date('M');
				$current_year_all =  date('Y');
			
				if($count > 0) {
					$row = mysql_fetch_array($result);
				
				?>
				<ul class="nav-title">
<?php
					//####### Display Body Nav ########
					$temp_id__ = $_GET["id"];
					$temp_glvl__ = $_GET["glvl"];
					$str = array();
					while ($temp_glvl__ >= 1) {
						$SQLnav = "
							SELECT *
							FROM `GROUP_LV" . $temp_glvl__ . "`
							WHERE `ID` = '" . $temp_id__ . "'
						;";
						$resultnav = @mysql_query($SQLnav);
						if($rsnav = @mysql_fetch_array($resultnav)) {
							$temp_id__ = $rsnav["GROUP_LV" . ($temp_glvl__ - 1) . "_ID"];
							//echo $rsnav["NAME"]."-";
							if($temp_glvl__==$_GET["glvl"]){
								$str[]="
									<li class=\"text-lightorange bold  text-nav\">{$rsnav["NAME"]}</li>
								";
							}
							// else{
								// $str[]="
									// <li>
										// <a href=\"main-knowledge.php?id={$rsnav2["ID"]}&glvl={$temp_glvl__}\">".$rsnav["NAME"]."</a>
									// </li>
								// ";
							// }
							$SQLnav2 = "
								SELECT *
								FROM `GROUP_LV" . ($temp_glvl__-1) . "`
								WHERE `ID` = " . $temp_id__ . "
							;";
							$resultnav2 = @mysql_query($SQLnav2);
							if($rsnav2 = @mysql_fetch_array($resultnav2)) {
								// if($temp_glvl__==$_GET["glvl"]){
									// $str[]="
										// <li class=\"text-lightorange bold  text-nav\">{$rsnav2["NAME"]}</li>
									// ";
								// }
								// else{
									$str[]="
										<li>
											<a href=\"main-knowledge.php?id={$rsnav2["ID"]}&glvl=".($temp_glvl__-1)."\">".$rsnav2["NAME"]."</a>
										</li>
									";
								// }
							}//end query2
							if($temp_glvl__==3){	//find Group Level 2 ID
								$PERMISSION_glvl2_ID = $temp_id__;
							}
							$temp_glvl__--;
						}//end query
					}//end while
					
					unset($SQLnav);
					$temp_glvl__ = $_GET["glvl"];
					for($i=$temp_glvl__;$i>=0;$i--){
						echo $str[$i];
					}
					//####### end display Body Nav ###########
?>
				</ul>
				<br class="clear"/>
				<div class="grid_6">
					<section class="report-detail" class="grid_4">
						<p class="text-blue bold">
<?php 
							if($_GET["id"]==11 && $_GET["glvl"]==3){
?>
								<img src="images/coutries/<?php echo $row["PHOTO_NAME"]; ?>" /><br />
<?php
							}
							elseif(!(
								($_GET["id"]==3 && $_GET["glvl"]==2) ||
								($_GET["id"]==9 && $_GET["glvl"]==3) ||
								($_GET["id"]==10 && $_GET["glvl"]==3)
							)){
?>
								<img src="images/pdf_image/<?php echo $row["PHOTO_NAME"]; ?>" /><br />
<?php 
							}
?>
						</p>
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
					<!-- <p><b class="center">฿ <?php echo $row['PRICE']; ?></b></p> -->
<?php
					
?>
					<?php //### Download ####
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
					if($PERMISSION_Is_Lockkey=="Y"){ //#### if you cannot download ####
?>
						<b class="button grey" id="disable-button">
<?php
						echo "Download";// paid
?>
						</b>
<?php
					}
					elseif($PERMISSION_Is_Lockkey=="N"){ //#### if you can download ####
						$SQL_Is_download_5_pdfs_a_day="
							SELECT COUNT(`PDF_ID`) AS Download_Count
							FROM `DOWNLOAD_STATISTICS`
							WHERE `USER_ID` = '".$_SESSION["userid"]."'
							AND DATE(`DOWNLOAD_DATETIME`) = DATE(NOW())
						;";
						$result_Is_download_5_pdfs_a_day = @mysql_query($SQL_Is_download_5_pdfs_a_day);
						while($rs_Is_download_5_pdfs_a_day = @mysql_fetch_array($result_Is_download_5_pdfs_a_day)) {
							if($rs_Is_download_5_pdfs_a_day["Download_Count"]>5) { //if user download more than 5 Downloads on 1 day.
?>
								<a href="#" onclick="window.alert('You download more than 5 times a day');">
									<b class="button darkgreen" id="download-button">Download</b>
								</a>
<?php
							}
							else{ //if user download less than 5 Downloads on 1 day.
?>
								<a href="download-pdf.php?pdfId=<?php echo $id; ?>">
									<b class="button darkgreen" id="download-button">
										Download
									</b>
								</a>
<?php
							}
						}
					} //#### end if you can download ####
?>
				</div>
<?php
				} //### end if($count > 0)
?>
				<!--end content-middle -->
				<br /><br /><br /><br />
				Download: 
<?php
				$sql_amount_download="
					SELECT COUNT(`PDF_ID`) AS Number_PDF
					FROM  `DOWNLOAD_STATISTICS`
					WHERE `PDF_ID` = '".$_GET["pdf_id"]."' 
				";
				$result_amount_download = @mysql_query($sql_amount_download);
				while($rs_amount_download = @mysql_fetch_array($result_amount_download)){
					echo $rs_amount_download["Number_PDF"]." time";
					if($rs_amount_download["Number_PDF"]>1){
						echo "s";
					}
				}
?>	
			</div>
		<!-- </div> -->
	</div><!--end container_12 -->
</div><!--end content -->

<?php
include("include/footer.php");
?>