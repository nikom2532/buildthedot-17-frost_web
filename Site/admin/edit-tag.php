<?php 
include ("include/header.php");
@session_start();
$rootpath = "../";
include ($rootpath . "lib/db.php");
include ($rootpath . "lib/conn.inc.php");
include ($rootpath . "lib/func_date.php");
if (!$db -> open()) {
	die($db -> error());
}
include("include/top-bar.php");?>
<?php include("include/checksession.php");?>	
	
	<!-- HEADER -->
	<div id="header-with-tabs">
		
		<div class="page-full-width cf">
	
			<ul id="tabs" class="left">
				<li><a href="main.php" class="dashboard-tab">Dashboard</a></li>
				<li><a href="customer.php">Customer Management</a></li>
				<li><a href="pdf.php">PDF Management</a></li>
                <li><a href="tag.php" class="active-tab">Tag Management</a></li>
                <li><a href="home-info.php">Home Info</a></li>
			</ul> <!-- end tabs -->
			
			<!-- company logo -->
			<a href="#" id="company-branding-small" class="right"><img src="images/mckansys_logo.png" width="200" height="27" alt="logo"></a>
			
		</div> <!-- end full-width -->	

	</div> <!-- end header -->
		
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Edit tag</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main cf">
				
						<div class="half-size-column fl">
						
							<form method='POST' action='edit-tag-proc.php' id='edittag' name='edittag'>
							
								<fieldset>
									<?php
										$tagId = $_POST['tagId'];
					
										$result = mysql_query("
												SELECT ID as tagId ,NAME as tagName
												FROM Tag 
												WHERE ID = $tagId");
												
												while ($row = mysql_fetch_array($result)) {
											
												?>
								
									<p>
										<label for="tag-name">Tag Name</label>
										<input type="text" id="tagName" name="tagName" class="round default-width-input" value="<?=$row['tagName'] ?>"/>
									</p>
									 <input type="hidden" name="tagId" value="<?=$row['tagId'] ?>">
                                     <input type="submit" value="Save change" class="round blue ic-right-arrow" />
									
									<?}?>
                           		</fieldset>
							
							</form>
							
						</div> <!-- end half-size-column -->
				
					</div> <!-- end content-module-main -->
					
				</div> <!-- end content-module -->
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->

<?php include("include/footer.php");?>