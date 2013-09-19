<?php
include ("include/header.php");
include ("lib/func_search.php");
require ("lib/func_pagination.php");
if($_SESSION["userid"]==""){
	include ($rootpath . "include/login.php");
	include ("include/footer.php");
}
else{
	include ("include/top-menu.php");
?>
	<div id="content">
		<div class="container_12" id="container">
			<div id="content-middle" class="grid_12">
	
				<h1 id="head-title" class="text-green grid_12">Advanced Search</h1>
	
				<form action="advance-search.php" method="GET" id="advancesearch-form" class="fr">
					<div class="grid_5">
						<input type="text" id="keyword" name="keyword" value="<?=$keyword ?>" class="" placeholder="Keyword.." />
					</div>
					<div class="grid_6" id="advancesearch-kw">
						<p>
							Result include one or more of the words
						</p>
					</div>
					<br class="clear"/>
	
					<div class="grid_5">
						<?php
						$strSQL = "SELECT * FROM  group_lv1 ORDER BY ID ";
						$cmdQueryCat = mysql_query($strSQL);
						?>
	
						<select id="category_id" name="category_id" >
							<option selected="selected" value="">Select a category</option>
							<?php while($fetchArray=mysql_fetch_array($cmdQueryCat)){
	
							?>
							<option value="<?=$fetchArray['ID'] ?>"> <?=$fetchArray['NAME'] ?>
							</option>
							<?php } ?>
						</select>
					</div>
					<div class="grid_6" id="advancesearch-cat">
						<p>
							Result include selected category
						</p>
					</div>
					<br class="clear"/>
					<div class="grid_5">
						<select id="year" name="year">
							<option selected="selected" value="">Select a year</option>
							<option value="2006">2006</option>
							<option value="2007">2007</option>
							<option value="2008">2008</option>
							<option value="2009">2009</option>
							<option value="2010">2010</option>
							<option value="2011">2011</option>
							<option value="2011">2012</option>
							<option value="2013">2013</option>
						</select>
					</div>
					<div class="grid_6" id="advancesearch-year">
						<p>
							Result include in range of year
						</p>
					</div>
					<br class="clear"/>
					<div class="grid_5">
						<input type="submit" value="Search" class="button orange image-right ic-search"/>
					</div>
				</form>
				<br class="clear"/>
				<div id="advancesearch-result">
					<?php
					include ("advance-search-proc.php");
					?>
					<?php if($Num_Rows != 0){
					?>
					<h2 class="text-lightgreen2 grid_12"><span class="text-orange"><?=$Num_Rows ?></span> results founds </h1>
					<?php
	while($fetchArraySearch =mysql_fetch_array($cmdQuerySearch)){
	
					?>
					<section class="grid_11">
						<h3>Title : <?=highlightkeyword($fetchArraySearch['NAME'], $keyword) ?></h3>
						<?php $date = $fetchArraySearch['UPDATE_DATE'];
							$date = date('F d, Y', strtotime($date));
						?>
						<h3>Date :<?=highlightkeyword($date, $year) ?></h3>
						<p>
							Description :<?=highlightkeyword($fetchArraySearch['DESCRIPTION'], $keyword) ?>
						</p>
					</section>
					<?php } ?>
					<div class="grid_12" id="page-num">
						<ul class="left">
	
							<?php
							echo pagination($limit, $page, "advance-search-result.php?keyword=$keyword&categoryID=$categoryID&year=$year&page=", $Num_Rows);
							//call function to show pagination
							?>
						</ul>
					</div><!--end page-num --> <?php } ?>
				</div><!--end advancesearch-year -->
			</div><!--end content-middle -->
		</div><!--end container_12 -->
	</div><!--end content -->
<?php
	include ("include/footer.php");
}
?>