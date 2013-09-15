<?php
include ("include/header.php");
?>
<?php
include ("include/top-menu.php");
?>
<div id="content">
	<div class="container_12">
		<div id="container" class="left">
			<div id="content-middle" class="grid_8">

				<?php

				$id = $_GET["id"];

				$query = "SELECT * FROM  PDF WHERE ID =".$id;
				$result = mysql_query($query) OR die(mysql_error());
				$count = mysql_num_rows($result);

				if($count > 0) {
					$row = mysql_fetch_array($result);
				
				?>
				<ul class="nav-title">
					<li>
						<a href="index.php">New release August 2013</a>
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
						FROM  tag_relationship AS a
						INNER JOIN tag AS b
						ON a.TAG_ID = b.ID
						WHERE PDF_ID =".$id) or die(mysql_error());
				
						while ($tagRow = mysql_fetch_array($tagResult)) {
							echo "<a href='search.php?tagId=". $tagRow['TAG_ID'] ."'>";
							echo "<li class='button orange'>";
							echo $tagRow['NAME'];
							echo "</li>";
							echo "</a>";
						}
						?>
					</ul>

				</div>
				<div class="grid_1 center" id="price-box">
					<b class="center">฿ <?php echo $row['PRICE']; ?></b>
					<b class="button darkgreen" id="download-button">Download</b>
				</div>
			
				<?php } ?>
				
				
			</div><!--end content-middle -->
		</div>
	</div><!--end container_12 -->
</div><!--end content -->

<?php
include ("include/footer.php");
?>