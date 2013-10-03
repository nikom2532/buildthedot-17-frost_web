<?php include("include/header.php");?>
<?php include("include/top-bar.php");?>
<?php include("include/checksession.php");?>	

<script LANGUAGE="JavaScript">
function confirmSubmit()
	{
	var agree=confirm("Are you sure you want to delete?");
	if (agree)
		return true ;
	else
		return false ;
	}
</script>	
	<!-- HEADER -->
	<div id="header-with-tabs">
		
		<div class="page-full-width cf">
	
			<ul id="tabs" class="left">
				<li><a href="main.php" class="dashboard-tab">Dashboard</a></li>
				<li><a href="customer.php" >Customer Management</a></li>
				<li><a href="pdf.php">PDF Management</a></li>
                <li><a href="tag.php" class="active-tab">Tag Management</a></li>
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
				
					<h3 class="fl">Tag</h3>
					<span class="fr expand-collapse-text">Click to collapse</span>
					<span class="fr expand-collapse-text initial-expand">Click to expand</span>
				
				</div> <!-- end content-module-heading -->
				
				
				<div class="content-module-main">
					<div id="wrap-add-customer">
						<a href="add-tag.php" class="round button orange ic-add image-left" >Add tag</a>
                    </div>
					
					<table class="fixed">
						<col width="2em" />
	    				<col width="20em" />
	    				<col width="5em" />
					
						<thead>
					
							<tr>
								<th>No.</th>
								<th>Name</th>
								<th>Actions</th>
							</tr>
						
						</thead>
						
						<tbody>
							<?php

								$result = mysql_query("
									SELECT ID as tagId ,NAME as tagName
									FROM TAG 
									ORDER BY ID DESC");
		
								$i = 1;
								while ($row = mysql_fetch_array($result)) {
									echo "<tr>";
									echo "<td>" . $i . "</td>";
									echo "<td>" . $row['tagName']."</td>";
									
									echo "<td>";
									echo "<form method='POST' action='edit-tag.php' id='edittag' name='edittag'>";
									echo "<input type='hidden' name='tagId' value=".$row['tagId'].">";
									echo " <INPUT TYPE='image' class='left' SRC='images/icons/table/actions-edit.png' BORDER='0' style='margin:5px 10px 5px 95px;' ALT='SUBMIT'> ";
									echo "</form>";
									
									echo "<form method='POST' action='delete-tag-proc.php' id='deletetag' name='deletetag'>";
									echo "<input type='hidden' name='tagId' value=".$row['tagId'].">";
									echo "<INPUT TYPE='image' class='left' SRC='images/icons/table/actions-delete.png' BORDER='0' style='margin:5px 0' onClick='return confirmSubmit()'>";
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