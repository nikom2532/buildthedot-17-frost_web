<?php
include ("include/header.php");
?>
<?php
	include ("include/top-menu.php");
?>
<div id="content">
	<div class="container_12" id="container">
		<div id="content-middle" class="grid_12">

			<?php
				$tagId   = $_GET["tagId"];
				$tagName = $_GET["tagName"];
			?>
			<h1 id="head-title" class="text-green grid_12"><?php echo $tagName; ?></h1>

			<br class="clear"/>
			<div id="advancesearch-result">
				
				<?php
				
				$result = mysql_query("
						SELECT *
						FROM  TAG_RELATIONSHIP AS a
						INNER JOIN PDF AS b
						ON a.PDF_ID = b.ID
						WHERE a.TAG_ID =".$tagId) or die(mysql_error());
				
				while ($row = mysql_fetch_array($result)) {
					echo "<section class='grid_11'>";
					echo "<a href='report-detail-no-sidemenu.php?id=" . $row['ID'] . "'>";
					echo "<h3>" . $row['NAME'] . "</h3>";
					echo "<p>" . substr_replace($row['DESCRIPTION'], '...', 220) . "</p>";
					echo "</a>";
					echo "</section>";
				}
				?>

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
			</div>
		</div><!--end content-middle -->
	</div><!--end container_12 -->
</div><!--end content -->
<?php
	include ("include/footer.php");
?>