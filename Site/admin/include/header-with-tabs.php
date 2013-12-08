<!-- HEADER -->
<div id="header-with-tabs">

	<div class="page-full-width cf">

		<ul id="tabs" class="left">
			<li>
				<a href="main.php" class="<?php if($header_with_tag="main"){ ?>active-tab <?php } ?>dashboard-tab">Dashboard</a>
			</li>
			<li>
				<a href="customer.php" <?php if($header_with_tag="customer"){ ?>class="active-tab"<?php } ?>>Customer Management</a>
			</li>
			<li>
				<a href="pdf.php" <?php if($header_with_tag="pdf"){ ?>class="active-tab"<?php } ?>>PDF Management</a>
			</li>
			<li>
				<a href="tag.php" <?php if($header_with_tag="tag"){ ?>class="active-tab"<?php } ?>>Tag Management</a>
			</li>
			<li>
				<a href="group.php" <?php if($header_with_tag="tag"){ ?>class="active-tab"<?php } ?>>Group Management</a>
			</li>
			<li>
				<a href="home-info.php" <?php if($header_with_tag="info"){ ?>class="active-tab"<?php } ?>>Home Info</a>
			</li>
		</ul>
		<!-- end tabs -->

		<!-- company logo -->
		<a href="#" id="company-branding-small" class="right"><img src="images/mckansys_logo.png" width="200" height="27" alt="logo"></a>

	</div>
	<!-- end full-width -->

</div>
<!-- end header -->