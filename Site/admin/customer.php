<?php
include ("include/header.php");
include ("include/top-bar.php");
?>


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
			<li>
				<a href="main.php" class="dashboard-tab">Dashboard</a>
			</li>
			<li>
				<a href="customer.php" class="active-tab">Customer Management</a>
			</li>
			<li>
				<a href="pdf.php">PDF Management</a>
			</li>
			<li>
				<a href="tag.php">Tag Management</a>
			</li>
		</ul>
		<!-- end tabs -->

		<!-- company logo -->
		<a href="#" id="company-branding-small" class="right"><img src="images/mckansys_logo.png" width="200" height="27" alt="logo"></a>

	</div>
	<!-- end full-width -->

</div>
<!-- end header -->

<!-- MAIN CONTENT -->
<div id="content">

	<div class="page-full-width cf">

		<div class="content-module">

			<div class="content-module-heading cf">

				<h3 class="fl">Customer</h3>
				<span class="fr expand-collapse-text">Click to collapse</span>
				<span class="fr expand-collapse-text initial-expand">Click to expand</span>

			</div>
			<!-- end content-module-heading -->

			<div class="content-module-main">
				<div id="wrap-add-customer">
					<a href="add-customer.php" class="round button orange ic-add image-left" >Add customer</a>
				</div>

				<table>

					<thead>

						<tr>
							<th>No.</th>
							<th>Name</th>
							<th>Company</th>
							<th>Username</th>
							<th>Permission Level</th>
							<th>Status</th>
							<th>Actions</th>
						</tr>

					</thead>

					<tbody>

						<?php

						$result = mysql_query("
							SELECT a.FIRSTNAME AS firstname,
							a.ID AS userId,
							a.LASTNAME AS lastname,
							a.COMPANY AS company,
							a.EMAIL AS email,
							b.GROUP_LV2_ID AS permission,
							a.IS_ACTIVE AS userActive
							
							FROM USER_PROFILE AS a
							INNER JOIN PERMISSION AS b
							ON a.ID = b.USER_PROFILE_ID
							ORDER BY a.ID DESC");

						$i = 1;
						while ($row = mysql_fetch_array($result)) {
							echo "<tr>";
							echo "<td>" . $i . "</td>";
							echo "<td>" . $row['firstname'] . "&nbsp;" . $row['lastname'] . "</td>";
							echo "<td>" . $row['company'] . "</td>";
							echo "<td>" . $row['email'] . "</td>";
							echo "<td>" . $row['permission'] . "</td>";

							if ($row['userActive'] == "Y") {
								echo "<td id='status'><img src='images/icons/message-boxes/confirmation.png' alt='active'></td>";
							} else {
								echo "<td id='status'><img src='images/icons/message-boxes/error.png' alt='active'></td>";
							}
							echo "<td>";
							echo "<form method='post' action='edit-customer.php' id='submitform' name='submitform'>";
							echo "<input type='hidden' name='userId' value=".$row['userId'].">";
							echo " <INPUT TYPE='image' SRC='images/icons/table/actions-edit.png' BORDER='0' style='margin:8px 0' ALT='EDIT'> ";
							echo "</form>";
							
							echo "<form method='post' action='edit-customer.php' id='submitform' name='submitform'>";
							echo "<input type='hidden' name='userId' value=".$row['userId'].">";
							echo " <INPUT TYPE='image' SRC='images/icons/table/actions-lock.png' BORDER='0' style='margin:8px 0' ALT='PERMISSION'> ";
							echo "</form>";
							
							echo "<form method='post' action='customer_delete.php' id='submitform' name='submitform'>";
							echo "<input type='hidden' name='userId' value=".$row['userId'].">";
							echo "<INPUT TYPE='image' SRC='images/icons/table/actions-delete.png' BORDER='0' style='margin:8px 0'ALT='DELETE'  onClick='return confirmSubmit()'>";
							echo "</form>";
							echo "</td>";

							echo "</tr>";

							$i = $i + 1;
						}
						?>
					</tbody>

				</table>

			</div>
			<!-- end content-module-main -->

		</div>
		<!-- end content-module -->

	</div>
	<!-- end full-width -->

</div>
<!-- end content -->

<?php
include ("include/footer.php");
?>