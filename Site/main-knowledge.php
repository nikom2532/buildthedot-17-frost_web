<?php
$rootpath = "./";
include ($rootpath."include/header.php");

include ($rootpath."include/top-menu.php");
?>
<div id="content">
	<div class="container_12">
		<?php
			include ("include/side-menu-knowledge.php");
		?>
		<div id="container" class="left">
			<div id="content-middle" class="grid_8">
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
				<h2 class="text-lightgreen2">Lasted Update</h2>
				<div class="grid_8" style="margin:0">
<?php
					//####### Find Lock Download Key ##########
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
					
					//####### Query List ##########
					
					$temp_glvl_content = $_GET["glvl"];
					$temp_id_content = $_GET["id"];
					
					$c_ID = array();
					$c_NAME = array();
					$c_UPDATE_DATE = array();
					$c_DESCRIPTION = array();
				 $SQLcontent="
						SELECT * 
						FROM  `PDF`
						INNER JOIN `PDF_CATEGORY`  
						WHERE `PDF_CATEGORY`.`GROUP_LEVEL_NAME` = '{$temp_glvl_content}'
						AND `PDF_CATEGORY`.`GROUP_LEVEL_ID` = '{$temp_id_content}'
						AND `PDF_CATEGORY`.`PDF_ID` = `PDF`.`ID`
					;";
					$resultcontent = @mysql_query($SQLcontent);
					while ($rscontent = @mysql_fetch_array($resultcontent)) {
						$c_ID[] = $temp_id_content;
						$c_glvl[] = $temp_glvl_content;
						$c_PDF_CATEGORY_ID[] = $rscontent["ID"];
						$c_NAME[] = $rscontent["NAME"];
						$c_UPDATE_DATE[] = $rscontent["UPDATE_DATE"];
						$c_DESCRIPTION[] = $rscontent["DESCRIPTION"];
						$c_PHOTO_NAME[] = $rscontent["PHOTO_NAME"];
					}
				
					//#################################
					//####### Query 2nd List ##########
					//#################################
					
					/*
					//############## Find Parents ################
				
					while ($temp_glvl_content > 2) {
						$SQLcontent="
							SELECT * 
							FROM  `PDF`
							INNER JOIN `PDF_CATEGORY`  
							WHERE `PDF_CATEGORY`.`GROUP_LEVEL_NAME` = '".($temp_glvl_content-1)."'
							AND `PDF_CATEGORY`.`GROUP_LEVEL_ID` = 
							(
								SELECT `GROUP_LV".($temp_glvl_content-1)."`.`ID`
								FROM  `GROUP_LV{$temp_glvl_content}` 
								INNER JOIN  `GROUP_LV".($temp_glvl_content-1)."` 
								WHERE  `GROUP_LV".($temp_glvl_content)."`.`GROUP_LV".($temp_glvl_content-1)."_ID` =  `GROUP_LV".($temp_glvl_content-1)."`.`ID` 
								AND  `GROUP_LV".($temp_glvl_content)."`.`ID` =  '{$temp_id_content}'
							)
							AND `PDF_CATEGORY`.`PDF_ID` = `PDF`.`ID`
						;";	
						$resultcontent = @mysql_query($SQLcontent);
						while ($rscontent = @mysql_fetch_array($resultcontent)) {
							$c_NAME[] = $rscontent["NAME"];
							$c_UPDATE_DATE[] = $rscontent["UPDATE_DATE"];
							$c_DESCRIPTION[] = $rscontent["DESCRIPTION"];
						}
						$SQLcontent2="
							SELECT * 
							FROM  `GROUP_LV{$temp_glvl_content}`
							WHERE `ID` = '{$temp_id_content}'
						";
						$resultcontent2 = @mysql_query($SQLcontent2);
						while ($rscontent2 = @mysql_fetch_array($resultcontent2)) {
							$temp_id_content = $rscontent2["GROUP_LV".($temp_glvl_content-1)."_ID"];
						}
						$temp_glvl_content--;
					}//end while
					*/
				
					############## Find Children ####################
					while ($temp_glvl_content < 6) {
						$temp_c_ID = array();
						$SQLcontent="
							SELECT * 
							FROM  `PDF`
							INNER JOIN `PDF_CATEGORY`  
							WHERE `PDF_CATEGORY`.`GROUP_LEVEL_NAME` = '".($temp_glvl_content+1)."'
							AND `PDF_CATEGORY`.`GROUP_LEVEL_ID` IN 
							(
								SELECT `GROUP_LV".($temp_glvl_content+1)."`.`ID`
								FROM  `GROUP_LV".($temp_glvl_content+1)."` 
								WHERE  `GROUP_LV{$temp_glvl_content}_ID` = '{$temp_id_content}'
							)
							AND `PDF_CATEGORY`.`PDF_ID` = `PDF`.`ID`
						;";
						$resultcontent = @mysql_query($SQLcontent);
						while ($rscontent = @mysql_fetch_array($resultcontent)) {
							//print_r($rscontent);
							//$c_ID[] = $rscontent["ID"];
							
							$c_ID[] = $rscontent["GROUP_LEVEL_ID"];
							//$c_glvl[] = $rscontent["GROUP_LEVEL_NAME"];
							$c_glvl[] = $temp_glvl_content+1;
							$c_PDF_CATEGORY_ID[] = $rscontent["ID"];
							$c_NAME[] = $rscontent["NAME"];
							$c_UPDATE_DATE[] = $rscontent["UPDATE_DATE"];
							$c_DESCRIPTION[] = $rscontent["DESCRIPTION"];
							$c_PHOTO_NAME[] = $rscontent["PHOTO_NAME"];
							
							$temp_c_ID[] = $rscontent["GROUP_LEVEL_ID"];
						}
						$SQLcontent2="
							SELECT * 
							FROM  `GROUP_LV{$temp_glvl_content}`
							WHERE `ID` = '{$temp_id_content}'
						";
						$SQLcontent2="
							SELECT * 
							FROM  `GROUP_LV".($temp_glvl_content+2)."`
							WHERE `GROUP_LV".($temp_glvl_content+1)."_ID`
							IN (";
						for ($ii=0; $ii < count($temp_c_ID); $ii++) {
							$SQLcontent2.=$temp_c_ID[$ii];
							if($ii<count($temp_c_ID)-1){
								$SQLcontent2.=",";
							}
						}
						$SQLcontent2=
						")
						;";
						
						$resultcontent2 = @mysql_query($SQLcontent2);
						while ($rscontent2 = @mysql_fetch_array($resultcontent2)) {
							$temp_id_content = $rscontent2["GROUP_LV".($temp_glvl_content+1)."_ID"];
						}
						$temp_glvl_content++;
					}//end while
					
					//#####################################
					//Display List content from Above query
					//#####################################
					
					//Start Page = 1
					if(!isset($_GET["page"])){
						$_GET["page"]=1;
					}
					$page = $_GET["page"];
					$page_limit = 10;
					$number_of_items = count($c_NAME);
					$number_of_pages = ((int)($number_of_items/$page_limit)) + 1; 
					
					if($number_of_pages==$page){	//means the last page
						$page_runing = $number_of_items;
					}
					else{	//not the last page
						$page_runing = $page_limit*$page;
					}
				
					//for ($i=0; $i < count($c_NAME); $i++) {	//for all Pages
					for ($i = ($page_limit*($page-1)); $i < $page_runing; $i++) { //for each Page
						//if Group --> Around Asian
						if(
							($_GET["id"]==3 && $_GET["glvl"]==2) ||
							($_GET["id"]==9 && $_GET["glvl"]==3) ||
							($_GET["id"]==10 && $_GET["glvl"]==3)
						){
?>
							<section>
<?php
						}
						//if not Group --> Around Asian
						else{
?>
							<section <?php 
								if($i%2==0){
									echo "class=\"grid_4\"";
								}
						 ?>>
<?php
						}
?>
							<p class="bold text-title-report">
<?php
								//if Group --> Around Asian
								if(
									($_GET["id"]==3 && $_GET["glvl"]==2) ||
									($_GET["id"]==9 && $_GET["glvl"]==3) ||
									($_GET["id"]==10 && $_GET["glvl"]==3)
								){
?>
									<img src="images/pdf_image/<?php echo $c_PHOTO_NAME["$i"]; ?>" />
<?php
								}
?>
								<span class="text-lightgreen head-desc">Title: </span>
								<a href="<?php echo $rootpath; ?>report-detail.php?pdf_id=<?php echo $c_PDF_CATEGORY_ID["$i"]; ?>&id=<?php echo $c_ID["$i"];?>&glvl=<?php echo $c_glvl["$i"]; ?>">
									<?php echo $c_NAME["$i"]; ?>
									<span id="ic-lock">
<?php
										if($PERMISSION_Is_Lockkey=="Y"){
?>
											<img src="images/icons/ic_lock.png" width="16" height="16">
<?php
										}
?>
									</span>
								</a>
							</p>
							<p>
								<span class="text-lightgreen bold head-desc">Update: </span><span class="date"><?php echo convertDate2String($c_UPDATE_DATE["$i"]); ?></span>
							</p>
							<p class="text-desc">
								<span class="text-lightgreen bold head-desc">Description: </span><?php echo $c_DESCRIPTION["$i"]; ?>
							</p>
						</section>
<?php
				}
					
					//#############################
					//####### test ##########
					//echo $_SESSION["userid"];
					// print_r($c_ID);
					// print_r($c_NAME);
					//#############################
					
					
					//############ Paging ############
					if($number_of_pages>1){
?>
						<ul class="pagination">
							<li class="details">Page <?php echo $_GET["page"]; ?> of <?php echo $number_of_pages; ?></li>
<?php
							for($i=1;$i<=$number_of_pages;$i++){	//Page Button
?>
								<li><a href="main-knowledge.php?id=<?php echo $_GET["id"]; ?>&glvl=<?php echo $_GET["glvl"]; ?>&page=<?php echo $i; ?>" <?php if($page==$i){ ?>class="current" <?php } ?>><?php echo $i; ?></a></li>
<?php
							}
							if($_GET["page"]<$number_of_pages){	//Next Button
?>
								<li><a href="main-knowledge.php?id=<?php echo $_GET["id"]; ?>&glvl=<?php echo $_GET["glvl"]; ?>&page=<?php echo ($_GET["page"]+1); ?>">Next</a></li>
<?php
							}
?>
						</ul>
<?php
					}
?>
<?php
						/*
?>
						<section>
							<p class="bold">
								<span class="text-lightgreen head-desc">Title: </span><a href="#">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,<span id="ic-lock"><img src="images/icons/ic_lock.png" width="16" height="16"></span></a>
							</p>
							<p>
								<span class="text-lightgreen bold head-desc">Update: </span><span class="date">Sep, 16 2013</span>
							</p>
							<p>
								<span class="text-lightgreen bold head-desc">Description: </span>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
							</p>
						</section>
						<div class="grid_12" id="page-num">
							<ul class="left">
								<li class="active-page">
									<a href="#">1</a>
								</li>
								<li>
									<a href="#">2</a>
								</li>
								<li>
									<a href="#">3</a>
								</li>
								<li>
									<a href="#">4</a>
								</li>
								<li>
									<a href="#">5</a>
								</li>
								<li>
									<a href="#">6</a>
								</li>
								<li>
									<a href="#">7</a>
								</li>
								<li>
									<a href="#">8</a>
								</li>
								<li>
									<a href="#">></a>
								</li>
								<li>
									<a href="#">>></a>
								</li>
							</ul>
						</div>
						<!--end page num -->
<?php
						*/
?>
						</div>
					</div><!--end content-middle -->
				</div>
			</div><!--end container_12 -->
		</div><!--end content -->

<?php
		include ("include/footer.php");
?>