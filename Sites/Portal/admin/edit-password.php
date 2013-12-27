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
<?php $userID = $_GET["userID"];

include("include/header-with-tabs.php");
?>
		
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Edit password</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main cf">
				
						<div class="half-size-column fl">
							<?php if($_GET["validatepass"] != ""){
								$validatemessage=$_GET["validatepass"];
							?>
						<p class="text-validate"><?php echo $validatemessage;?></p>
						
							<?php }?>
							<form action="changepassword-proc.php" method="POST">
							
								<fieldset>
                                  
									<p>
										<label for="old-password">Old password</label>
										<input type="password" id="oldpassword" name="oldpassword" class="round full-width-input" />
									</p>
									
									<p>
										<label for="new-password">New password</label>
										<input type="password" id="newpassword" name="newpassword" class="round full-width-input" />
									</p>
	
									<p>
										<label for="renew-password">re-type new password</label>
										<input type="password" id="renewpassword" name="renewpassword" class="round full-width-input" />
									</p>
	
									<input name="userID" type="hidden" id="userID" name="userID" value="<?=$_SESSION["userid"]?>" />
                                    <input type="submit" value="Save change" class="round blue ic-right-arrow" />
									
								</fieldset>

						
						</div> <!-- end half-size-column -->
						
				
					</div> <!-- end content-module-main -->
					
				</div> <!-- end content-module -->
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->

<?php include("include/footer.php");?>