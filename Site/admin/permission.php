<?php include("include/header.php");?>
<?php include("include/top-bar.php");?>
	
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css" />
    <script>
       $(function() {
          $( "#datepicker" ).datepicker();
       });
       
       $(function() {
          $( "#datepicker2" ).datepicker();
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
						
							<form action="add-permission.php" method="POST">
								
								<fieldset>
									
									<?php
										if ($_POST['userId'] == "") {
											$userId = $_GET['userId'];
										} else {
											$userId = $_POST['userId'];
										}
									?>
                                   
									<p class="seperator">Add permission menu</p>
									
									<p>
										<label for="menu">Menu</label>
										<?php
											$sqlGroupLv2 = "SELECT * FROM GROUP_LV2";
											$resultGroupLv2 = mysql_query($sqlGroupLv2);
											echo "<p>";
											echo "<select name='groupLv2'>";
											while ($rowGroupLv2 = mysql_fetch_array($resultGroupLv2)) {
												echo "<option value='" . $rowGroupLv2['ID'] . "'>" . $rowGroupLv2['NAME'] . "</option>";
											}
											echo "</select>";
											echo "</p>";
										?>
									
									
									<p>
										<label for="name">Start Date</label>
										<input type="text" id="datepicker" name="startDate"/>
									</p>
									
									<p>
										<label for="name">End Date</label>
										<input type="text" id="datepicker2" name="endDate"/>
									</p>
									
									<p>
									<select name = "status">
										<option value="Y" selected>Active</option>
										<option value="N">Inactive</option>
									</select>
									</p>
									
								</fieldset>
								
								<input type="hidden" name="userId" id="userId" value="<?=$userId ?>">
								<input type="submit" value="Add" class="round blue ic-right-arrow" />
							</form>
						
						</div> <!-- end half-size-column -->
						
					</div> <!-- end content-module-main -->
					
					<div class="content-module-main">
					<br>
					<table>
					
						<thead>
					
							<tr>
								<th>No.</th>
								<th>Menu</th>
								<th>Start Date</th>
								<th>End Date</th>
								<th>Status</th>
								<th>Actions</th>
							</tr>
						
						</thead>
						
						<tbody>
							<?php

								$resultPermission = mysql_query("
									SELECT b.NAME AS NAME,
									a.USER_PROFILE_ID AS USER_PROFILE_ID,
									a.START_DATE AS START_DATE,
									a.END_DATE AS END_DATE,
									a.ID AS ID,
									a.GROUP_LV2_ID AS GROUP_ID,
									a.IS_ACTIVE AS STATUS
									FROM PERMISSION AS a
									INNER JOIN GROUP_LV2 as b
									ON a.GROUP_LV2_ID = b.ID
									WHERE USER_PROFILE_ID = $userId");
		
								$i = 1;
								while ($rowPermission = mysql_fetch_array($resultPermission)) {
									echo "<tr>";
									echo "<td>" . $i . "</td>";
									echo "<td>" . $rowPermission['NAME']."</td>";
									
									$originalDateStartDate = $rowPermission['START_DATE'];
									$newDateStartDate = date("d M Y", strtotime($originalDateStartDate));
									echo "<td>" .$newDateStartDate."</td>";
									
									$originalDateEndDate = $rowPermission['END_DATE'];
									$newDateEndDate = date("d M Y", strtotime($originalDateEndDate));
									echo "<td>" .$newDateEndDate."</td>";
									
									$dateNow = date('d M Y');
									$dateEnd = $newDateEndDate;
									$dateStart = $newDateStartDate;
									
									// if ($rowPermission['STATUS']=="Y") {
										if (strtotime($dateNow) < strtotime($dateEnd) && strtotime($dateNow) > strtotime($dateStart)) {
										$strSQL = "UPDATE PERMISSION SET 
										IS_ACTIVE='Y'";
										$strSQL .= "WHERE ID='".$rowPermission['ID']."'";
										$cmdQuery = mysql_query($strSQL);
										
										echo "<td id='status'><img src='images/icons/message-boxes/confirmation.png' alt='active'></td>";
										} else {
											$strSQL = "UPDATE PERMISSION SET 
											IS_ACTIVE='N'";
											$strSQL .= "WHERE ID='".$rowPermission['ID']."'";
											$cmdQuery = mysql_query($strSQL);
											
											echo "<td id='status'><img src='images/icons/message-boxes/error.png' alt='active'></td>";
										}
									// } else {
										// echo "<td id='status'><img src='images/icons/message-boxes/error.png' alt='active'></td>";
									// }
									
									
									echo "<td>";
									echo "<form method='post' action='edit-permission.php' id='submitform' name='submitform'>";
									echo "<input type='hidden' name='userId' value=".$rowPermission['USER_PROFILE_ID'].">";
									echo "<input type='hidden' name='groupLevelId' value=".$rowPermission['GROUP_ID'].">";
									echo "<input type='hidden' name='editId' value=".$rowPermission['ID'].">";
									echo " <INPUT TYPE='image' class='left' SRC='images/icons/table/actions-edit.png' BORDER='0' style='margin:5px 10px 5px 55px;' ALT='EDIT'> ";
									echo "</form>";
									
									echo "<form method='post' action='permission_delete.php' id='submitform' name='submitform'>";
									echo "<input type='hidden' name='userId' value=".$rowPermission['USER_PROFILE_ID'].">";
									echo "<input type='hidden' name='delId' value=".$rowPermission['ID'].">";
									echo "<INPUT TYPE='image' class='left' SRC='images/icons/table/actions-delete.png' BORDER='0' style='margin:5px 0'ALT='DELETE'  onClick='return confirmSubmit()'>";
									echo "</form>";
									echo "</td>";	
		
									echo "</tr>";
		
									$i = $i + 1;
								}
								?>
									
						</tbody>
						
					</table>
										
						
					</div> <!-- end content-module-main -->
				</div> <!-- end content-module -->
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->

<?php include("include/footer.php");?>