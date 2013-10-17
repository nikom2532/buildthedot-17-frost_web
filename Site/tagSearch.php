<?php
include ("include/header.php");
?>
<?php
include ("include/top-menu.php");
?>
<?php
include ("lib/func_pagination.php");
?>
<div id="content">
	<div class="container_12" id="container">
		<div id="content-middle" class="grid_12">

			<?php
			$tagId = $_GET["tagId"];
			$tagName = $_GET["tagName"];
			?>
			<h1 id="head-title" class="text-green grid_12"><?php echo $tagName; ?></h1>

			<br class="clear"/>
			<div >
				
				<?php
				/*---------Paging------------*/
				$page = 1;
				//Default page
				$limit = 10;
				//Records per page
				$start = 0;
				//starts displaying records from 0
				if (isset($_GET['page']) && $_GET['page'] != '') {
					$page = $_GET['page'];
				}
				$start = ($page - 1) * $limit;
				/*---------end Paging------------*/
				$strQuery = "SELECT *
						FROM  TAG_RELATIONSHIP AS a
						INNER JOIN PDF AS b
						ON a.PDF_ID = b.ID
						WHERE a.TAG_ID =" . $tagId;
				$result = mysql_query($strQuery);
				$Num_Rows = mysql_num_rows($result);
				$strQuery .= " LIMIT $start , $limit";
				$result =  mysql_query($strQuery);
				while ($row = mysql_fetch_array($result)) {
					echo "<section class='grid_11' id='tag-search'>";
					echo "<a href='report-detail-no-sidemenu.php?id=" . $row['ID'] . "'>";
					echo "<h3>" . $row['NAME'] . "</h3>";
					echo "<p>" . substr_replace($row['DESCRIPTION'], '...', 220) . "</p>";
					echo "</a>";
					echo "</section>";
				}
				?>

				<div class="grid_12" id="page-num">
					<ul class="left">
						<?php		
					 echo pagination($limit,$page,"tagSearch.php?tagId=$tagId&tagName=$tagName&page=",$Num_Rows); //call function to show pagination
					?>		
					</ul>
				</div>
			</div>
		</div><!--end content-middle -->
	</div><!--end container_12 -->
</div><!--end content -->
<?php
include ("include/footer.php");
?>