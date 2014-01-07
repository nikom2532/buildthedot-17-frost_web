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
					
					//add the topic name on top Nav bar
					$str[]="
						<li class=\"text-lightorange bold  text-nav\">{$row["NAME"]}</li>
					";
					
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
								// $str[]="
									// <li class=\"ic-nav-title\">{$rsnav["NAME"]}</li>
								// ";
							}
							// else{
								// $str[]="
									// <li>
										// <a href=\"main-knowledge.php?id={$rsnav2["ID"]}&glvl={$temp_glvl__}\">".$rsnav["NAME"]."</a>
									// </li>
								// ";
							// }
							
							$temp_str="
								<li>
									<a href=\"main-knowledge.php?id={$rsnav["ID"]}&glvl={$temp_glvl__}&gp="
							;
							
							$SQL2="
											SELECT * 
											FROM  `GROUP_LV".($temp_glvl__+1)."`
											WHERE `GROUP_LV".$temp_glvl__."_ID` = '{$rsnav2["ID"]}'
										";
										$result2=@mysql_query($SQL2);
										if($rs2=@mysql_fetch_array($result2)){
											$temp_str .= "y";
										}
										else{
											$temp_str .= "n";
										}
										
										$temp_str .= 
												"\">".$rsnav["NAME"]."</a>
											</li>
										";
										$str[] = $temp_str;
							
							$SQLnav2 = "
								SELECT *
								FROM `GROUP_LV" . ($temp_glvl__-1) . "`
								WHERE `ID` = " . $temp_id__ . "
							;";
							$resultnav2 = @mysql_query($SQLnav2);
							//I don't know why we push this $SQLnav2, but it is not useful now. #Nov, 12, 2013
							if(!($rsnav2 = @mysql_fetch_array($resultnav2))) {
								// if($temp_glvl__==$_GET["glvl"]){
									// $str[]="
										// <li class=\"text-lightorange bold  text-nav\">{$rsnav2["NAME"]}</li>
									// ";
								// }
								// else{
									$temp_str = "
											<li>
												<a href=\"main-knowledge.php?id={$rsnav2["ID"]}&glvl=".($temp_glvl__-1)."&gp="
										;
										
										$SQL2="
											SELECT * 
											FROM  `GROUP_LV".$temp_glvl__."`
											WHERE `GROUP_LV". ($temp_glvl__-1)."_ID` = '{$rsnav2["ID"]}'
										";
										$result2=@mysql_query($SQL2);
										if($rs2=@mysql_fetch_array($result2)){
											$temp_str .= "y";
										}
										else{
											$temp_str .= "n";
										}
										
										$temp_str .= 
												"\">".$rsnav2["NAME"]."</a>
											</li>
										";
										$str[] = $temp_str;
								// }
							}//end query2
							if($temp_glvl__==3){	//find Group Level 2 ID
								$PERMISSION_glvl2_ID = $temp_id__;
							}
							$temp_glvl__--;
						}//end query
						//End of ==> I don't know why we push this $SQLnav2, but it is not useful now. #Nov, 12, 2013
						
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
				<div class="grid_4">
					<section class="report-detail" >
						<p class="text-blue bold">
<?php 
							if($_GET["id"]==11 && $_GET["glvl"]==3){
?>
								<img class="pdf-image" src="images/pdf_image/<?php echo $row["PHOTO_NAME"]; /*width="250" height="172"*/ ?>" /><br />
<?php
							}else{
							// elseif(!(
								// ($_GET["id"]==3 && $_GET["glvl"]==2) ||
								// ($_GET["id"]==9 && $_GET["glvl"]==3) ||
								// ($_GET["id"]==10 && $_GET["glvl"]==3)
							// )){
?>
								<img class="pdf-image" src="images/pdf_image/<?php echo $row["PHOTO_NAME"]; ?>" /><br />
<?php 
							}
?>
						</p>
						<p class="bold">
							<h2 class="text-title"><?php echo $row['NAME']; ?></h2>
						</p>
						<p class="date bold">
							<?php echo date("F d, Y", strtotime($row['UPDATE_DATE'])); ?>
							<?php echo "<span id=\"editor\">By ".$row['BY']. "</span>"; ?>
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
						$numrow = mysql_num_rows($tagResult);
						$i = 1;
						while ($tagRow = mysql_fetch_array($tagResult)) {
					
							echo "<a class='text-orange' href='tagSearch.php?tagId=". $tagRow['TAG_ID'] ."&tagName=".$tagRow['NAME']."'>";
							//echo "<li class='text-orange'>";//button orange'
							echo $tagRow['NAME'];
							//echo "</li>";
							echo "</a>";
							
							if($i < $numrow){
								echo ", ";
							}
							$i++;
						}
						?>
						
					</ul>

				</div>
			<!-- price = 0, disable download box  -->
		<div class="grid_3 right" id="wrap-download">
			<?php if(!($row['PRICE'] == null || $row['PRICE'] == 0)){?>
				<div class="center" id="price-box">
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
								<a href="download-pdf.php?pdfId=<?php echo $id; ?>" target="_blank">
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
				
				<?php if(!($row['PRICE'] == null || $row['PRICE'] == 0)){?>
					<p class="center"><b id="download-no">
	<?php
					$sql_amount_download="
						SELECT COUNT(`PDF_ID`) AS Number_PDF
						FROM  `DOWNLOAD_STATISTICS`
						WHERE `PDF_ID` = '".$_GET["pdf_id"]."' 
					";
					$result_amount_download = @mysql_query($sql_amount_download);
					while($rs_amount_download = @mysql_fetch_array($result_amount_download)){
						echo $rs_amount_download["Number_PDF"]." download";
						if($rs_amount_download["Number_PDF"]>1){
							echo "s";
						}
					}
	?>	
				  </b></p>
			  <?php }
			
			 }?><!-- end price-box -->
			 <div id="wrap-description">
			 	<?php 
			 		  $sqlDesc1 = "SELECT * FROM  INFO WHERE ID = '2' ";
					  $resultDesc1 = @mysql_query($sqlDesc1);					  
			          $rowDesc1 = @mysql_fetch_array($resultDesc1);
					  
					  $sqlDesc2 = "SELECT * FROM  INFO WHERE ID = '3' ";
					  $resultDesc2 = @mysql_query($sqlDesc2);					  
			          $rowDesc2 = @mysql_fetch_array($resultDesc2);
				?>
				
				 <b><?=$rowDesc1["DESCRIPTION"]?></b>
				 <p><?=$rowDesc2["DESCRIPTION"]?></p>
		
			 </div>
			</div>
		</div><!-- end description -->
		<!-- </div> -->
	</div><!--end container_12 -->
</div><!--end content -->



<?php
include("include/footer.php");
?>