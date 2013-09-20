<?php
include ("include/header.php");
include ("myprofile-proc.php");
?>
<?php
if ($_SESSION["userid"] == "") {
	include ($rootpath . "include/login.php");
	include ("include/footer.php");
} else {
	include ("include/top-menu.php");
}
?>
<div id="content">
    <div class="container_12" id="container">
    <div id="content-middle" class="grid_12">
         <div id="profile" >
            <h1 id="head-title" class="text-green grid_12">My Profile</h1>
            <div class="grid_2">
            <img src="images/test-pic.jpg"  alt="profile">
            </div>
            <div class="grid_8" id="profile-detail">
            	<?php while($fetchArray=mysql_fetch_array($cmdQueryMyprofile)){?>
            		<p>Name</p>
	                <p><?=$fetchArray['FIRSTNAME'] ?><span class="indent"><?=$fetchArray['LASTNAME'] ?></span></p><br>
	                <p>Email</p>
	                <p><?=$fetchArray['EMAIL'] ?></p><br>
	                <p>Company</p>
	                <p><?=$fetchArray['COMPANY'] ?></p><br>
	                <p>Job title</p>
	                <p><?=$fetchArray['JOB_TITLE'] ?></p><br>
	                <p>Department</p>
	                <?php
                		$departmentID = $fetchArray['DEPARTMENT_ID'];
						$sqlDepartment = "SELECT * FROM DEPARTMENT WHERE ID = '$departmentID'";
						$resultDepartment = mysql_query($sqlDepartment);
						echo "<p>";
						while ($rowDepartment = mysql_fetch_array($resultDepartment)) {
							echo $rowDepartment['NAME'];
						}
						echo "</p>";
					?><br>
	                <p>Industry</p>
	                <?php
                		$industryID = $fetchArray['INDUSTRY_ID'];
						$sqlIndustry = "SELECT * FROM INDUSTRY WHERE ID = '$industryID'";
						$resultIndustry = mysql_query($sqlIndustry);
						echo "<p>";
						while ($rowIndustry = mysql_fetch_array($resultIndustry)) {
							echo $rowIndustry['NAME'];
						}
						echo "</p>";
					?><br>
	                <!-- <p>Technology</p>
	                <p><?=$fetchArray['TECHNOLOGY_ID'] ?></p><br> -->
	                <!-- <p>Company Size</p>
	                <p><?=$fetchArray['COMPANY'] ?></p><br> -->
	                <p>Address</p>
	                <p><?=$fetchArray['ADDRESS'] ?></p><br>
	                <p>City</p>
	                <p><?=$fetchArray['CITY'] ?></p><br>
	                <p>Zip</p>
	                <p><?=$fetchArray['ZIP'] ?></p><br>
	                <p>Country</p>
	                <?php
                		$countryID = $fetchArray['COUNTRY_ID'];
						$sqlCountry = "SELECT * FROM COUNTRY WHERE ID = '$countryID'";
						$resultCountry = mysql_query($sqlCountry);
						echo "<p>";
						while ($rowCountry = mysql_fetch_array($resultCountry)) {
							echo $rowCountry['NAME'];
						}
						echo "</p>";
					?><br>
	                <p>Phone</p>
	                <p><?=$fetchArray['PHONE'] ?></p><br>
	                <p>Fax</p>
	                <p><?=$fetchArray['FAX'] ?></p><br>
                <?php } ?>
            </div>
            <br class="clear"/>
            <div class="grid_3">
            <a href="edit-profile.php?userID=<?=$userID ?>" class="button orange ic-edit image-right">Edit profile</a>
            </div>
        </div><!--end profile -->
        <div id="billing-account" class="grid_12">
            <h1 id="head-title" class="text-green">Billing account</h1>
            <div class="grid_2" id="profile-title">
                <p>Name</p>
                <p>Company</p>
                <p>Email</p>
            </div>
            <div class="grid_8" id="profile-detail">
                <p>- </p><!--name -->
                <p>- </p><!--Company -->
                <p>- </p><!--Email -->
            </div>
            <br class="clear"/>
            <div class="grid_3">
                <a href="#" class="button orange ic-edit image-right">Billing Account</a>
            </div>
        </div>
    </div><!--end content-middle -->
    
    <br class="clear"/>
    
    </div><!--end container_12 -->
</div><!--end content -->
<?php
	include ("include/footer.php");
?>
