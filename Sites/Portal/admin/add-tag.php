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
include("include/top-bar.php");
include("include/checksession.php");

$header_with_tag = "tag";
include("include/header-with-tabs.php");
?>
		
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Add tag</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main cf">
				
						<div class="half-size-column fl">
						
							<form method='POST' action='add-tag-proc.php' id='addtag' name='addtag'>
							
								<fieldset>
								
									<p>
										<label for="name">Tag Name</label>
										<input type="text" id="tagName" name="tagName1" class="round default-width-input" />
									</p>
									
									<p>
										<label for="name">Tag Name</label>
										<input type="text" id="tagName" name="tagName2" class="round default-width-input" />
									</p>
									
									<p>
										<label for="name">Tag Name</label>
										<input type="text" id="tagName" name="tagName3" class="round default-width-input" />
									</p>
									
									<p>
										<label for="name">Tag Name</label>
										<input type="text" id="tagName" name="tagName4" class="round default-width-input" />
									</p>
									
									<p>
										<label for="name">Tag Name</label>
										<input type="text" id="tagName" name="tagName5" class="round default-width-input" />
									</p>
									
									<p>
										<label for="name">Tag Name</label>
										<input type="text" id="tagName" name="tagName6" class="round default-width-input" />
									</p>
									
									<p>
										<label for="name">Tag Name</label>
										<input type="text" id="tagName" name="tagName7" class="round default-width-input" />
									</p>
									 
                                     <input type="submit" value="Submit" class="round blue ic-right-arrow" />
				
                           		</fieldset>
							
							</form>
							
						</div> <!-- end half-size-column -->
				
					</div> <!-- end content-module-main -->
					
				</div> <!-- end content-module -->
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->

<?php include("include/footer.php");?>