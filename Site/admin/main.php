<?php include("include/header.php");?>
<?php include("include/top-bar.php");?>
	
	<!-- HEADER -->
	<div id="header-with-tabs">
		
		<div class="page-full-width cf">
	
			<ul id="tabs" class="left">
				<li><a href="main.php" class="active-tab dashboard-tab">Dashboard</a></li>
				<li><a href="customer.php">Customer Management</a></li>
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
				
					<h3 class="fl">Top five downloads </h3>
					<span class="fr expand-collapse-text">Click to collapse</span>
					<span class="fr expand-collapse-text initial-expand">Click to expand</span>
				
				</div> <!-- end content-module-heading -->
				
				
				<div class="content-module-main">
				
					<h2>Group by user</h2>
					
					<table>
					
						<thead>
					
							<tr>
								<th>No.</th>
								<th>Name</th>
								<th>Total Downloaded</th>
							</tr>
						
						</thead>

						<tfoot>
						
						
						<tbody>

							<tr>
								<td>1</td>
								<td>Adrian Purdila</td>
								<td>35</td>
							</tr>

							<tr>
								<td>2</td>
								<td>Adrian Purdila</td>
								<td>32</td>
							</tr>

							<tr>
								<td>3</td>
								<td>Adrian Purdila</td>
								<td>23</td>
							</tr>

							<tr>
								<td>4</td>
								<td>Adrian Purdila</td>
								<td>18</td>
							</tr>

							<tr>
								<td>5</td>
								<td>Adrian Purdila</td>
								<td>10</td>
							</tr>
						</tbody>
						
					</table>
                   	<a href="#" class="round button orange ic-download image-left">Download Report</a>
					<div class="stripe-separator"><!--  --></div>
					<!--end group by user -->
					
                    <h2>Group by title</h2>
					
					<table>
					
						<thead>
					
							<tr>
								<th>No.</th>
								<th>Title</th>
								<th>Total Downloaded</th>
							</tr>
						
						</thead>

						<tfoot>
						
						
						<tbody>

							<tr>
								<td>1</td>
								<td>Adrian Purdila</td>
								<td>35</td>
							</tr>

							<tr>
								<td>2</td>
								<td>Adrian Purdila</td>
								<td>32</td>
							</tr>

							<tr>
								<td>3</td>
								<td>Adrian Purdila</td>
								<td>23</td>
							</tr>

							<tr>
								<td>4</td>
								<td>Adrian Purdila</td>
								<td>18</td>
							</tr>

							<tr>
								<td>5</td>
								<td>Adrian Purdila</td>
								<td>10</td>
							</tr>
						</tbody>
						
					</table>
                   	<a href="#" class="round button orange ic-download image-left">Download Report</a>
				
					<!--end group by user -->
				</div> <!-- end content-module-main -->
			
			</div> <!-- end content-module -->
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->
	
<?php include("include/footer.php");?>