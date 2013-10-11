<?php include("include/header.php");?>
<?php include("include/top-bar.php");?>
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
				<li><a href="pdf.php" class="active-tab">PDF Management</a></li>
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
				
					<h3 class="fl">PDF</h3>
					<span class="fr expand-collapse-text">Click to collapse</span>
					<span class="fr expand-collapse-text initial-expand">Click to expand</span>
				
				</div> <!-- end content-module-heading -->
				
				
				<div class="content-module-main">
					<div id="wrap-add-customer">
						<a href="upload-pdf.php" class="round button orange ic-add image-left" >Upload PDF</a>
                    </div>
					
					<table class="fixed">
						<col width="2em" />
	    				<col width="20em" />
	    				<col width="5em" />
	    				<col width="5em" />
					
						<thead>
					
							<tr>
								<th>No.</th>
								<th>Title</th>
                                <th>Update dated</th>
								<th>Actions</th>
							</tr>
						
						</thead>
						
						<tbody>
						<?php 
							$result = mysql_query("
							SELECT p.ID AS id, 
							p.NAME AS name,
							p.UPDATE_DATE AS updateDate
							FROM PDF AS p WHERE IS_ASIAN_COUNTRY = '0'
							ORDER BY ID DESC");
							
							$i = 1;
							while ($row = mysql_fetch_array($result)) {
						?>
							<tr>
								<td><?=$i?></td>
								<td><?=$row['name']?></td>
								<?php
									$originalDate = $row['updateDate'];
									$newDate = date("M d, Y", strtotime($originalDate));
									echo "<td>" .$newDate."</td>";
								?>

								<td>
									<form method='post' action='edit-pdf.php' id='submitform' name='submitform'>
										<INPUT TYPE='image' class='left' SRC='images/icons/table/actions-edit.png' BORDER='0' style='margin:5px 10px 5px 75px;' ALT='EDIT'> 
										<input type='hidden' name='pdfId' value="<?=$row['id']?>"/>	
									</form>
									<form method='post' action='delete-pdf.php'id='submitform' name='submitform'>
										<input type='hidden' name='pdfId' value="<?=$row['id']?>"/>
										<INPUT TYPE='image' class='left' SRC='images/icons/table/actions-delete.png' BORDER='0' style='margin:5px 0' ALT='DELETE'  onClick='return confirmSubmit()'>
									</form>
								</td>
							</tr>
						
						<?php 
								$i = $i + 1;
							
							}?>
							
						</tbody>
						
					</table>
									
					
				</div> <!-- end content-module-main -->
			
			</div> <!-- end content-module -->
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->

<?php include("include/footer.php");?>