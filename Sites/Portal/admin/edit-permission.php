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
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css" />
    <script>
       $(function() {
		$( "#datepicker" ).datepicker({
			changeMonth: true,
			dateFormat:"dd-mm-yy",
			onClose: function( selectedDate ) {
				$( "#datepicker2" ).datepicker( "option", "minDate", selectedDate );
				
			}
		});
		$( "#datepicker2" ).datepicker({
			changeMonth: true,
			dateFormat:"dd-mm-yy",
			onClose: function( selectedDate ) {
				$( "#datepicker" ).datepicker( "option", "maxDate", selectedDate );
			}
		});
		 
	});
       function confirmSubmit()
		{
			var agree=confirm("Are you sure you want to delete?");
			if (agree)
				return true ;
			else
				return false ;
		}
   </script>
</head>	

	<!-- HEADER -->
	<div id="header-with-tabs">
		
		<div class="page-full-width cf">
	
			<ul id="tabs" class="left">
				<li><a href="main.php" class="dashboard-tab">Dashboard</a></li>
				<li><a href="customer.php" class="active-tab">Customer Management</a></li>
				<li><a href="pdf.php">PDF Management</a></li>
                <li><a href="tag.php">Tag Management</a></li>
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
					
						<h3 class="fl">Customer Management - Change permission</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					<div class="content-module-main cf">
				
						<div class="half-size-column fl">
						
							<form action="edit-permission-update.php" method="POST">
								
								<fieldset>
									
									<?php
										$userId = $_POST['userId'];
										$groupLevelId = $_POST['groupLevelId'];
										$editId = $_POST['editId'];
										
										$result = mysql_query("SELECT b.NAME AS NAME,
													a.USER_PROFILE_ID AS USER_PROFILE_ID,
													a.START_DATE AS START_DATE,
													a.END_DATE AS END_DATE,
													a.ID AS ID,
													a.IS_ACTIVE AS IS_ACTIVE
													FROM PERMISSION AS a
													INNER JOIN GROUP_LV2 as b
													ON a.GROUP_LV2_ID = b.ID
													WHERE a.ID = $editId");
												
												while ($row = mysql_fetch_array($result)) {
											
												
									?>
                                   
									<p>
										<label for="menu">Menu</label>
										<?php
											$sqlGroupLv2 = "SELECT * FROM GROUP_LV2";
											$resultGroupLv2 = mysql_query($sqlGroupLv2);
											echo "<p>";
											echo "<select name='groupLv2'>";
											while ($rowGroupLv2 = mysql_fetch_array($resultGroupLv2)) {
												if ($rowGroupLv2['ID']==$groupLevelId) {
													echo "<option value='" . $rowGroupLv2['ID'] . "' selected>" . $rowGroupLv2['NAME'] . "</option>";
												} else {
													echo "<option value='" . $rowGroupLv2['ID'] . "'>" . $rowGroupLv2['NAME'] . "</option>";
												}
												
												
											}
											echo "</select>";
											echo "</p>";
										?>
									
									
									<p>
										<label for="name">Start Date</label>
										<?php 
											$originalDateStartDate = $row['START_DATE'];
											$newDateStartDate = date("m/d/Y", strtotime($originalDateStartDate));
										?>
										<input type="text" id="datepicker" name="startDate" value="<?=$newDateStartDate?>"/>
									</p>
									
									<p>
										<label for="name">End Date</label>
										<?php 
											$originalDateEndDate = $row['END_DATE'];
											$newDateEndDate = date("m/d/Y", strtotime($originalDateEndDate));
										?>
										<input type="text" id="datepicker2" name="endDate" value="<?=$newDateEndDate?>"/>
									</p>
									
									<p>
									<select name = "status">
										
										<?php 
											if ($row['IS_ACTIVE']=="Y") {
												echo "<option value='Y' selected>Active</option>";
												echo "<option value='N'>Inactive</option>";
											} else {
												echo "<option value='Y'>Active</option>";
												echo "<option value='N' selected>Inactive</option>";
											}
											
										?>
										
									</select>
									</p>
									
									<?php } ?>
									
								</fieldset>
								<input type="hidden" name="editId" id="editId" value="<?=$editId ?>">
								<input type="hidden" name="userId" id="userId" value="<?=$userId ?>">
								<input type="submit" value="Save" class="round blue ic-right-arrow" />
							</form>
						
						</div> <!-- end half-size-column -->
						
					</div> <!-- end content-module-main -->
					
					
				</div> <!-- end content-module -->
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->

<?php include("include/footer.php");?>