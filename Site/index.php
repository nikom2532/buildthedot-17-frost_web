<?php
$rootpath = "./";
include ($rootpath . "include/header.php");
?>
<?php
include ("include/top-menu.php");
?>
<div id="content">
	<div class="container_12" id="container">
		<h1 id="head-title" class="text-orange uppercase grid_12">Welcome to Mckansys</h1>
		<br class="clear"/>
		<div id="icon">
			<div class="grid_3 center">
				<a href="<?php echo $rootpath; ?>main-knowledge.php?id=1&glvl=2"><img src="images/icon-technology.png" width="123" height="123" alt="Technology">
				<p class="text-blue bold">
					Technology
				</p> </a>
			</div>
			<div class="grid_3 center">
				<a href="<?php echo $rootpath; ?>main-knowledge.php?id=2&glvl=2"> <img src="images/icon-strategy.png" width="124" height="123" alt="Strategy">
				<p class="text-blue bold">
					Strategy
				</p> </a>
			</div>
			<div class="grid_3 center">
				<a href="<?php echo $rootpath; ?>main-knowledge.php?id=3&glvl=2"> <img src="images/icon-asean.png" width="127" height="127" alt="Around Asean">
				<p class="text-blue bold">
					Around Asean
				</p> </a>
			</div>
			<div class="grid_3 center">
				<a href="<?php echo $rootpath; ?>main-knowledge.php?id=2"> <img src="images/icon-best-practice.png" width="124" height="123" alt="Best Practice">
				<p class="text-blue bold">
					Best Practice
				</p> </a>
			</div>
		</div><!--end icon -->

		<br class="clear"/>

		<div id="new-release">
			<?php
			// Add by fon
			$result = mysql_query("
SELECT *
FROM  PDF
ORDER BY UPDATE_DATE DESC") or die(mysql_error());
			?>

			<h2 class="text-lightgreen2 uppercase">New release August 2013</h2>

			<?php
			//-- Add by Fon
			while ($row = mysql_fetch_array($result)) {
				echo "<section>";
				echo "<a href='report-detail.php'>";
				echo "<h3>" . $row['NAME'] . "</h3>";
				echo "</a>";
				echo "<p>" . substr_replace($row['DESCRIPTION'],'...',220) . "</p>";
				echo "</section>";
			}
			?>
		</div><!--end new-release -->
	</div><!--end container_12 -->
</div><!--end content -->

<?php
include ("include/footer.php");
?>