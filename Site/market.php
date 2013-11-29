<?php
$rootpath = "./";
include ($rootpath."include/header.php");
include ($rootpath."include/top-menu.php");
?>
<div id="content">
	<div class="container_12">

		<div id="container" class="left">
			<div id="content-middle" class="grid_12">
<?php
				//######## is Best Practice #########
				if ($_GET["id"]==10 && $_GET["glvl"]==2) {
?>
					<h1 class="center text-orange" id="coming-soon">Coming Soon</h1>
<?php
				}
				
			
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

					</div><!--end content-middle -->
				</div><!-- end container -->
			</div><!--end container_12 -->
		</div><!--end content -->

<?php
	include ("include/footer.php");
//######## end is not Best Practice #########
?>