<?php
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
				<section>
					<p class="bold text-title-report">
						<span class="text-lightgreen head-desc">Title: </span><a href="#">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,<span id="ic-lock"><img src="images/icons/ic_lock.png" width="16" height="16"></span></a>
					</p>
					<p>
						<span class="text-lightgreen bold head-desc">Update: </span><span class="date">Sep, 16 2013</span>
					</p>
					<p class="text-desc">
						<span class="text-lightgreen bold head-desc">Description: </span>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
					</p>
				</section>
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

			</div><!--end content-middle -->
		</div>
	</div><!--end container_12 -->
</div><!--end content -->

<?php
include ("include/footer.php");
?>