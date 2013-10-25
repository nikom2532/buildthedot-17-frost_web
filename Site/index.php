<?php
$rootpath = "./";
include ($rootpath . "include/header.php");
include ("include/top-menu.php");
?>
<div id="content">
	<div class="container_12" id="container">
		<h1 id="head-title" class="text-orange uppercase grid_12">Welcome to Mckansys</h1>
		<br class="clear"/>
		<div id="icon">
			<div class="grid_3 center">
				<!-- <?php echo $rootpath; ?>main-knowledge.php?id=2 -->
				<a href="<?php echo $rootpath; ?>main-knowledge.php?id=1&glvl=2&gp=<?php 
					$SQL2="
						SELECT * 
						FROM  `GROUP_LV3`
						WHERE `GROUP_LV2_ID` = '1'
					";
					$result2=@mysql_query($SQL2);
					if($rs2=@mysql_fetch_array($result2)){
						echo "y";
					}
					else{
						echo "n";
					}
				?>"> <img src="images/icon-best-practice.png" width="124" height="123" alt="Market">
				<p class="text-blue bold">
					Market
				</p> </a>
			</div>
			<div class="grid_3 center">
				<a href="<?php echo $rootpath; ?>main-knowledge.php?id=2&glvl=2&gp=<?php 
					$SQL2="
						SELECT * 
						FROM  `GROUP_LV3`
						WHERE `GROUP_LV2_ID` = '2'
					";
					$result2=@mysql_query($SQL2);
					if($rs2=@mysql_fetch_array($result2)){
						echo "y";
					}
					else{
						echo "n";
					}
				?>"><img src="images/icon-technology.png" width="123" height="123" alt="Technology">
				<p class="text-blue bold">
					Technology
				</p> </a>
			</div>
			<div class="grid_3 center">
				<a href="<?php echo $rootpath; ?>main-knowledge.php?id=2&glvl=2&gp=<?php 
					$SQL2="
						SELECT * 
						FROM  `GROUP_LV3`
						WHERE `GROUP_LV2_ID` = '3'
					";
					$result2=@mysql_query($SQL2);
					if($rs2=@mysql_fetch_array($result2)){
						echo "y";
					}
					else{
						echo "n";
					}
				?>"> <img src="images/icon-strategy.png" width="124" height="123" alt="Strategy">
				<p class="text-blue bold">
					Strategy
				</p> </a>
			</div>
			<div class="grid_3 center">
				<a href="<?php echo $rootpath; ?>main-knowledge.php?id=4&glvl=2&gp=<?php 
					$SQL2="
						SELECT * 
						FROM  `GROUP_LV3`
						WHERE `GROUP_LV2_ID` = '4'
					";
					$result2=@mysql_query($SQL2);
					if($rs2=@mysql_fetch_array($result2)){
						echo "y";
					}
					else{
						echo "n";
					}
				?>"> <img src="images/icon-asean.png" width="127" height="127" alt="Around Asean">
				<p class="text-blue bold">
					Around Asean
				</p> </a>
			</div>
		</div><!--end icon -->

		<br class="clear"/>

		<div id="new-release">
			<?php
			
			//-- get current month
			$current_month =  date('m');
			$current_month_all =  date('M');
			$current_year_all =  date('Y');
			
			$sql_new_release = "
				SELECT a.ID as id,
				a.NAME as name,
				a.DESCRIPTION as description,
				b.GROUP_LEVEL_NAME as glvl,
				b.GROUP_LEVEL_ID as glvId
				FROM PDF AS a
				INNER JOIN PDF_CATEGORY AS b
				ON a.ID = b.PDF_ID
				WHERE MONTH(a.UPDATE_DATE) = ". $current_month ." AND YEAR(a.UPDATE_DATE) = ". $current_year_all ."
				ORDER BY a.UPDATE_DATE DESC
				LIMIT 10
			";
			$result = @mysql_query($sql_new_release) or die(mysql_error());
			?> 
			
			<h2 class="text-lightgreen2 uppercase">New release <?php echo $current_month_all;?>, <?php echo $current_year_all;?></h2>
			<?php
			//-- Add by Fon
			while ($row = @mysql_fetch_array($result)) {
				echo "<section>";
				echo "<a href='report-detail.php?pdf_id=". $row['id'] ."&id=".$row['glvId']."&glvl=".$row['glvl']."' id='new-release'>";
				echo "<h3>" . $row['name'] . "</h3>";
				echo "</a>";
				echo "<p>" . substr_replace($row['description'],'',220) ."<a href='report-detail.php?pdf_id=". $row['id'] ."&id=".$row['glvId']."&glvl=".$row['glvl']."' id='new-release'>"."  "."<span class='italic text-orange'>read more..</span>"."</a></p>";
				echo "</section>";
			}
			?>
			<br class="clear" />
			<h2 class="text-lightgreen2 uppercase">Top 5 PDF Download <?php echo $current_month_all;?>, <?php echo $current_year_all;?></h2>
<?php
							$sql_statistic_by_pdf="
								SELECT *
								FROM  `DOWNLOAD_STATISTICS`
								GROUP BY `PDF_ID`
								ORDER BY `PDF_ID`
								LIMIT 0,5;
							";
							$Result_statistic_by_pdf=@mysql_query($sql_statistic_by_pdf);
							while($rs_statistic_by_pdf=@mysql_fetch_array($Result_statistic_by_pdf)){
?>
								<section>
<?php
									$sql_pdf="
										SELECT 
										a.ID as id,
										a.NAME as name,
										a.DESCRIPTION as description,
										b.GROUP_LEVEL_NAME as glvl,
										b.GROUP_LEVEL_ID as glvId
										FROM  PDF AS a
										INNER JOIN PDF_CATEGORY AS b
										ON a.ID = b.PDF_ID
										WHERE a.ID = '".$rs_statistic_by_pdf["PDF_ID"]."'; 
									";
									$Result_pdf=@mysql_query($sql_pdf);
									if($rs_pdf=@mysql_fetch_array($Result_pdf)){
?>
										<a href="report-detail.php?pdf_id=<?php echo $rs_statistic_by_pdf["PDF_ID"]; ?>&id=<?php echo $rs_pdf["glvId"]; ?>&glvl=<?php echo $rs_pdf["glvl"]; ?>" id='new-release'>
											<h3><?php
												echo $rs_pdf["name"];
											?>
											</h3>
										</a>
										<h4>
											Total Download:
<?php
											$sql_statistic_each_pdf="
												SELECT COUNT(`PDF_ID`) AS `number_pdf`
												FROM  `DOWNLOAD_STATISTICS`
												WHERE `PDF_ID` = '".$rs_statistic_by_pdf["PDF_ID"]."';
											";
											$Result_statistic_each_pdf=@mysql_query($sql_statistic_each_pdf);
											if($rs_statistic_each_pdf=@mysql_fetch_array($Result_statistic_each_pdf)){
												echo $rs_statistic_each_pdf["number_pdf"];
											}
?>
										</h4>
										<p><?php
											echo substr_replace($rs_pdf['description'],'',220);
?>
											<a href="report-detail.php?pdf_id=<?php echo $rs_pdf['id']; ?>&id=<?php echo $rs_pdf["glvId"]; ?>&glvl=<?php echo $rs_pdf["glvl"]; ?>" id="new-release"><span class='italic text-orange'>read more..</span></a>
										</p>
<?php
									}
?>
									<br />
								</section>
<?php
							}
?>
		</div><!--end new-release -->
	</div><!--end container_12 -->
</div><!--end content -->

<?php
include ("include/footer.php");
?>