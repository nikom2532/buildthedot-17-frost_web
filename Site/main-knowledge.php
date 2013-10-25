<?php
$rootpath = "./";
include ($rootpath."include/header.php");
include ($rootpath."include/top-menu.php");
?>
<div id="content">
	<div class="container_12">
<?php
/*
		//######## is Best Practice #########
		if ($_GET["id"]==2 && $_GET["glvl"]==1) {
		?>
			<span class="text-lightgreenhead-desc">Comming Soon</span>
		<?php
		}
		
		else{
*/

 	//######## is Best Practice #########
		if(!($_GET["id"]==2 && $_GET["glvl"]==1)) {
			include ("include/side-menu-knowledge.php");
		}
?>
		<div id="container" class="left">
			<div id="content-middle" class="grid_<?php if($_GET["id"]==2 && $_GET["glvl"]==1) { echo "12"; } else{ echo "8"; }?>">
<?php
				//######## is Best Practice #########
				if ($_GET["id"]==2 && $_GET["glvl"]==1) {
?>
					<h1 class="center text-orange" id="coming-soon">Coming Soon</h1>
<?php
				}
				
				//######## is not Best Practice #########
				else{
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
					
					//###################### Check Data fact #################
					//############### If there are no contents, ##############
					//####### Tell the users that there are no Content #######
					$Is_there_are_content1=0;
					$Is_there_are_content2=0;
					
					//####### Query List ##########
					$temp_glvl_content = $_GET["glvl"];
					$temp_id_content = $_GET["id"];
					
					$c_ID = array();
					$c_glvl = array(); 
					$c_PDF_CATEGORY_ID = array();
					$c_PDF_ID = array();
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
						$c_PDF_ID[] = $rscontent["PDF_ID"];
						$c_UPDATE_DATE[] = $rscontent["UPDATE_DATE"];
						$c_DESCRIPTION[] = $rscontent["DESCRIPTION"];
						$c_PHOTO_NAME[] = $rscontent["PHOTO_NAME"];
					}
					if(mysql_num_rows($resultcontent) > 0){
						$Is_there_are_content1++;
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
						
						if(mysql_num_rows($resultcontent) > 0){
							$Is_there_are_content2++;
						}
					}//end while
					
					// echo $Is_there_are_content1;
					// echo $Is_there_are_content2;
					
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
					$number_of_pages = ((int)(($number_of_items-1)/$page_limit)) + 1; 
					
					if($number_of_pages==$page){	//means the last page
						$page_runing = $number_of_items;
					}
					else{	//not the last page
						$page_runing = $page_limit*$page;
					}
?>
					
<?php
					//#####################################################
					//#####################################################
					//	This is The New Version = Support for the front 
					//	of the Group that have Children Group.
					//#####################################################
					//#####################################################
					if($_GET["gp"]=="y" || $_GET["gp"]=="Y"){
						
						//############### Display the Body Page #####################
						//for ($i=0; $i < count($c_NAME); $i++) {	//for all Pages
						for ($i = ($page_limit*($page-1)); $i < $page_runing; $i++) { //for each Page
							
							//is Best Practice
							if ($_GET["id"]==2 && $_GET["glvl"]==1) {
?>
								<h1>Coming Soon</h1>
<?php
							}
							
							//########### is Country Profile #############
							elseif ($_GET["id"]==11 && $_GET["glvl"]==3) {
								if($i%4==0){
?>
									<div class="grid_8" id="wrap-cp">
<?php
								}
?>
										<div class="left" id="cp">
											<a href="<?php echo $rootpath; ?>report-detail.php?pdf_id=<?php echo $c_PDF_ID["$i"]; ?>&id=<?php echo $c_ID["$i"];?>&glvl=<?php echo $c_glvl["$i"]; ?>">
												<img src="images/coutries/<?php echo $c_PHOTO_NAME[$i]; ?>"  width="120" height="120" alt="<?php echo $c_NAME[$i]; ?>" />
											</a>
											<p class="center">
												<?php echo $c_NAME[$i]; ?>
											</p>
										</div>
<?php
								if($i%4==3 || $i==$page_runing-1){
?>
									</div>
									<br class="clear"/>
<?php
								}
							}
							//######### end: is Country Profile ##########
						}

						//########### is Normal Group #############
						if((!($_GET["id"]==2 && $_GET["glvl"]==1)) && (!($_GET["id"]==11 && $_GET["glvl"]==3))){
							$SQL_Menu="
								SELECT * 
								FROM  `GROUP_LV".($_GET["glvl"]+1)."`
								WHERE `GROUP_LV".($_GET["glvl"])."_ID` = '{$_GET["id"]}'
							";
							$result_Menu=@mysql_query($SQL_Menu);
							while($rs_Menu = @mysql_fetch_array($result_Menu)){
								?>
								<!-- <nav id="side-menu" class="grid_6 text-green" style="padding: 3px;"> -->
									<ul id="pad-6">
										<li class="link-main">
											<a href="./main-knowledge.php?id=<?php echo $rs_Menu["ID"]; ?>&glvl=<?php echo ($_GET["glvl"]+1); ?>&gp=<?php 
												$SQL_Menu2="
													SELECT * 
													FROM  `GROUP_LV".($_GET["glvl"]+2)."`
													WHERE `GROUP_LV".($_GET["glvl"]+1)."_ID` = '{$rs_Menu["ID"]}'
												";
												$result_Menu2=@mysql_query($SQL_Menu2);
												if($rs_Menu2=@mysql_fetch_array($result_Menu2)){
													echo "y";
												}
												else{
													echo "n";
												}
											?>" class="bold text-green" >
												<?php echo $rs_Menu["NAME"]; ?>
											</a>
										 </li>
									</ul>
								<!--</nav> -->
								<?php
							}
						}
						//########### end Is Normal Group #############
						

						//############### End Display the Body Page #####################
						

					}
					//#####################################################
					//###################		(End)		#######################
					//	This is The New Version = Support for the front 
					//	of the Group that have Children Group.
					//#####################################################
					//#####################################################
					
					
					//#####################################################
					//#####################################################
					//	This is The Old Version = Support for the last 
					//	of the Group that have no Child Group.
					//#####################################################
					//#####################################################
					elseif($_GET["gp"]=="n" || $_GET["gp"]=="N"){
						
						if (!(($_GET["id"]==11 && $_GET["glvl"]==3) || ($_GET["id"]==3&&$_GET["glvl"]==2) )) {
						
	?>
							<h2 class="text-lightgreen2">Lasted Update</h2>
	<?php
						}
	?>
						<div class="grid_8" style="margin:0">
	<?php
							
							
							//############### Display the Body Page #####################
							//for ($i=0; $i < count($c_NAME); $i++) {	//for all Pages
							for ($i = ($page_limit*($page-1)); $i < $page_runing; $i++) { //for each Page
								
								//is Best Practice
								if ($_GET["id"]==2 && $_GET["glvl"]==1) {
	?>
									<h1>Coming Soon</h1>
	<?php
								}
								
								//########### is Country Profile #############
								elseif ($_GET["id"]==11 && $_GET["glvl"]==3) {
									if($i%4==0){
	?>
										<div class="grid_8" id="wrap-cp">
	<?php
									}
	?>
											<div class="left" id="cp">
												<a href="<?php echo $rootpath; ?>report-detail.php?pdf_id=<?php echo $c_PDF_ID["$i"]; ?>&id=<?php echo $c_ID["$i"];?>&glvl=<?php echo $c_glvl["$i"]; ?>">
													<img src="images/coutries/<?php echo $c_PHOTO_NAME[$i]; ?>"  width="120" height="120" alt="<?php echo $c_NAME[$i]; ?>" />
												</a>
												<p class="center">
													<?php echo $c_NAME[$i]; ?>
												</p>
											</div>
	<?php
									if($i%4==3 || $i==$page_runing-1){
	?>
										</div>
										<br class="clear"/>
	<?php
									}
								}
								//######### end: is Country Profile ##########
								
								//is not Country Profile
								else{
									
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
												echo "class=\"grid_4\" ";
											}
										?>>
	<?php
									}
	?>
										<p class="bold text-title-report">
	<?php
											//if Group --> Around Asian
											if(!(
												($_GET["id"]==3 && $_GET["glvl"]==2) ||
												($_GET["id"]==9 && $_GET["glvl"]==3) ||
												($_GET["id"]==10 && $_GET["glvl"]==3)
											)){
	?>
												<a href="<?php echo $rootpath; ?>report-detail.php?pdf_id=<?php echo $c_PDF_ID["$i"]; ?>&id=<?php echo $c_ID["$i"];?>&glvl=<?php echo $c_glvl["$i"]; ?>">
													<img src="images/pdf_image/<?php echo $c_PHOTO_NAME["$i"]; ?>" />
												</a>
	<?php
											}
	?>
											
										</p>
										
										<p>
											<span class="text-lightgreen bold head-desc">Title: </span>
											<a href="<?php echo $rootpath; ?>report-detail.php?pdf_id=<?php echo $c_PDF__ID["$i"]; ?>&id=<?php echo $c_ID["$i"];?>&glvl=<?php echo $c_glvl["$i"]; ?>">
												<?php echo $c_NAME["$i"]; ?>
												<span id="ic-lock">
	<?php /*
													if($PERMISSION_Is_Lockkey=="Y"){
	?>
														<img src="images/icons/ic_lock.png" width="16" height="16">
	<?php
													}
	*/ ?>
												</span>
											</a>
										</p>
										<p>
											<span class="text-lightgreen bold head-desc">Update: </span><span class="date"><?php echo convertDate2String($c_UPDATE_DATE["$i"]); ?></span>
										</p>
										<p class="text-desc">
											<span class="text-lightgreen bold head-desc">Description: </span><?php echo substr_replace($c_DESCRIPTION["$i"],' ..',220); ?>
											<a href="<?php echo $rootpath; ?>report-detail.php?pdf_id=<?php echo $c_PDF_ID["$i"]; ?>&id=<?php echo $c_ID["$i"];?>&glvl=<?php echo $c_glvl["$i"]; ?>">
												<span class='italic text-orange'>read more..</span>
											</a>
										</p>
									</section>
	<?php
								}
							}
							//if there are no contents
							if($Is_there_are_content1==0 && $Is_there_are_content2==0){
								?><p><span class="text-lightgreen head-desc">There are no researchs in this group.</span></p><?php
							}
		
							//############### End Display the Body Page #####################
							
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
						</div>
<?php
					}
					//#####################################################
					//###################		(End)		#######################
					//	This is The Old Version = Support for the last 
					//	of the Group that have no Child Group.
					//#####################################################
					//#####################################################
?>
						
<?php
				}//######## end is not Best Practice #########
?>
			</div><!--end content-middle -->
		</div><!-- end container -->
	</div><!--end container_12 -->
</div><!--end content -->

<?php
include ("include/footer.php");
//######## end is not Best Practice #########
?>
