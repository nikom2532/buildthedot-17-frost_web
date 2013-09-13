<?php include("include/header.php");?>
<?php include("include/top-bar.php");?>
	
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
					
					<table>
					
						<thead>
					
							<tr>
								<th>No.</th>
								<th>Name</th>
								<th>Actions</th>
							</tr>
						
						</thead>
						
						<tbody>

							<tr>
								<td>1</td>
								<td>Technology</td>
								<td>
									<a href="edit-tag.php" class="table-actions-button ic-table-edit"></a>
									<a href="#" class="table-actions-button ic-table-delete"></a>
								</td>
							</tr>

							<tr>
								<td>2</td>
								<td>E-commerce</td>
								<td>
									<a href="edit-tag.php" class="table-actions-button ic-table-edit"></a>
									<a href="#" class="table-actions-button ic-table-delete"></a>
								</td>
							</tr>
							<tr>
								<td>3</td>
								<td>Knowledge</td>
								<td>
									<a href="edit-tag.php" class="table-actions-button ic-table-edit"></a>
									<a href="#" class="table-actions-button ic-table-delete"></a>
								</td>
							</tr>
							<tr>
								<td>4</td>
								<td>Reserach</td>
								<td>
									<a href="edit-tag.php" class="table-actions-button ic-table-edit"></a>
									<a href="#" class="table-actions-button ic-table-delete"></a>
								</td>
							</tr>

						</tbody>
						
					</table>
									
					
				</div> <!-- end content-module-main -->
			
			</div> <!-- end content-module -->
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->

<?php include("include/footer.php");?>