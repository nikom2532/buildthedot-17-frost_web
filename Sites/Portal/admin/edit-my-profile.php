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
<?php include("my-profile-proc.php");?>	
<?php $userID= $_GET["userID"];
	//echo "$userID";

include("include/header-with-tabs.php");
?>
		
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">My profile</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main cf">
				
						<div class="half-size-column fl" >
						
							<form action="update-my-profile.php" name="editprofile-form" id="editprofile-form" method="POST">
							<?php
								if($_POST["msg-error"] != ""){
								?>
									<p class="text-validate"><?=$_POST["msg-error"]?></p>
								<?php 	
								}
								while($fetchArray=mysql_fetch_array($cmdQueryMyprofile)){
								?>
								<fieldset>
                  
									<p>
										<label for="name">Name</label>
										<input type="text" id="name" name="name" class="round full-width-input" value="<?=$fetchArray['NAME'] ?>"/>
									</p>
									
									<p>
										<label for="email">Email</label>
										<input type="text" id="email" name="email" class="round full-width-input" value="<?=$fetchArray['EMAIL'] ?>"/>
									</p>
	
                                     <input type="submit" value="Save change" class="round blue ic-right-arrow" />
									
								</fieldset>
							<?php }?>
						</form>
						
						</div> <!-- end half-size-column -->

					</div> <!-- end content-module-main -->
					
				</div> <!-- end content-module -->
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->
    
<?php include("include/footer.php");?>