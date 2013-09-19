<?php
$rootpath = "./";
include ("include/header.php");
?>
<?php
include ("include/top-menu.php");
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
					$temp_glvl__ = $_GET["glvl"];
					$temp_id__ = $_GET["id"];
					$str = array();
					while ($temp_glvl__ >= 2) {
						$SQLnav = "
							SELECT *
							FROM `GROUP_LV" . $temp_glvl__ . "`
							WHERE `ID` = " . $temp_id__ . "
						;";
						$resultnav = @mysql_query($SQLnav);
						if ($rsnav = @mysql_fetch_array($resultnav)) {
							$temp_id__ = $rsnav["GROUP_LV" . ($temp_glvl__ - 1) . "_ID"];
							$temp_glvl__--;
							$SQLnav2 = "
								SELECT *
								FROM `GROUP_LV" . ($temp_glvl__) . "`
								WHERE `ID` = " . $temp_id__ . "
							";
							$resultnav2 = @mysql_query($SQLnav2);
							if ($rsnav2 = @mysql_fetch_array($resultnav2)) {
								if($temp_glvl__>2)
								{
									$str[]="
										<li class=\"text-lightorange bold  text-nav\">
											{$rsnav2["NAME"]}
										</li>
									";
								}
								else{
									$str[]="
										<li>
											<a href=\"menu-knowledge.php?id={$rsnav2["ID"]}&glvl={$temp_glvl__}\">".$rsnav2["NAME"]."</a>
										</li>
									";
								}
							}//end query2
						}//end query
					}//end while
					unset($SQLnav);
					$temp_glvl__ = $_GET["glvl"];
					for($i=$temp_glvl__;$i>=0;$i--){
						echo $str[$i];
					}
					//####### end display Body Nav ###########
?>
					<!-- <li>
					<a href="#">Technology</a>
					</li>
					<li class="text-lightorange bold  text-nav">
						Research
					</li> -->
				</ul>
				<h2 class="text-lightgreen2">Lasted Update</h2>
				
<?php
					//####### Query List ##########
					$c_NAME = array();
					$c_UPDATE_DATE = array();
					$c_DESCRIPTION = array();
				 $SQLcontent="
					SELECT * 
					FROM  `PDF`
					INNER JOIN `PDF_CATEGORY`  
					WHERE `PDF_CATEGORY`.`GROUP_LEVEL_NAME` = '{$_GET["glvl"]}'
					AND `PDF_CATEGORY`.`GROUP_LEVEL_ID` = '{$_GET["id"]}'
					AND `PDF_CATEGORY`.`PDF_ID` = `PDF`.`ID`
				;";
				$resultcontent = @mysql_query($SQLcontent);
				while ($rscontent = @mysql_fetch_array($resultcontent)) {
					$c_NAME[] = $rscontent["NAME"];
					$c_UPDATE_DATE[] = $rscontent["UPDATE_DATE"];
					$c_DESCRIPTION[] = $rscontent["DESCRIPTION"];
				}
				
				//####### Query 2nd List ##########
				$temp_glvl_content = $_GET["glvl"];
				$temp_id_content = $_GET["id"];
				while ($temp_glvl_content > 2) {
				echo	$SQLcontent="
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
?>
					<section>
						<p class="bold text-title-report">
							<span class="text-lightgreen head-desc">Title: </span><a href="#"><?php echo $c_NAME["$i"]; ?><span id="ic-lock"><img src="images/icons/ic_lock.png" width="16" height="16"></span></a>
						</p>
						<p>
							<span class="text-lightgreen bold head-desc">Update: </span><span class="date"><?php echo $c_UPDATE_DATE["$i"]; ?></span>
						</p>
						<p class="text-desc">
							<span class="text-lightgreen bold head-desc">Description: </span><?php echo $c_DESCRIPTION["$i"]; ?>
						</p>
					</section>
<?php
				}
?>
				<ul class="pagination">
					<li class="details">Page <?php echo $_GET["page"]; ?> of <?php echo $number_of_pages; ?></li>
<?php
					for($i=1;$i<=$number_of_pages;$i++){
?>
						<li><a href="main-knowledge.php?id=<?php echo $_GET["id"]; ?>&glvl=<?php echo $_GET["glvl"]; ?>&page=<?php echo $i; ?>" <?php if($page==$i){ ?>class="current" <?php } ?>><?php echo $i; ?></a></li>
<?php
					}
					if($_GET["page"]<$number_of_pages){
?>
						<li><a href="main-knowledge.php?id=<?php echo $_GET["id"]; ?>&glvl=<?php echo $_GET["glvl"]; ?>&page=<?php echo ($_GET["page"]+1); ?>">Next</a></li>
<?php
					}
?>
				</ul>
				<!-- <section>
					<p class="bold">
						<span class="text-lightgreen head-desc">Title: </span><a href="#">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,<span id="ic-lock"><img src="images/icons/ic_lock.png" width="16" height="16"></span></a>
					</p>
					<p>
						<span class="text-lightgreen bold head-desc">Update: </span><span class="date">Sep, 16 2013</span>
					</p>
					<p>
						<span class="text-lightgreen bold head-desc">Description: </span>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
					</p>
				</section> -->

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

			</div><!--end content-middle -->
		</div>
	</div><!--end container_12 -->
</div><!--end content -->

<?php
include ("include/footer.php");
?>