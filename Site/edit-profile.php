<?php 
include("include/header.php");
include ("myprofile-proc.php");
if($_SESSION["userid"]==""){
	include ($rootpath . "include/login.php");
	include ("include/footer.php");
}
else{
	include("include/top-menu.php");
}
?>

	<div id="content">
    	<div class="container_12" id="container">
        <div id="content-middle" class="grid_12">
             <div id="profile" >
             	<h1 id="head-title" class="text-green grid_12">Edit profile</h1>
                <div class="grid_2">
            	<img src="images/test-pic.jpg"  alt="profile">
            	</div>
                <form action="edit-profile-update.php" name="editprofile-form" id="editprofile-form" method="POST">
                <div class="grid_2" id="profile-title">
                    <p>Name</p>
                    <p>Company</p>
                    <p>Email</p>
                    <p id="pass">Password</p>
                </div>
                <div class="grid_6" id="profile-detail">      	 
                    <fieldset>
                    	<?php while($fetchArray=mysql_fetch_array($cmdQueryMyprofile)){?>
                        <p><input type="text" id="firstname" name="firstname" value="<?=$fetchArray['FIRSTNAME']?>" />
                           <span class="indent"></span><input type="text" id="lastname" name="lastname"  value="<?=$fetchArray['LASTNAME']?>" /></span>
                        </p>
                        <p><input type="text" id="company" name="company" value="<?=$fetchArray['COMPANY']?>" /></p>
                        <p><input type="text" id="email" name="email" value="<?=$fetchArray['EMAIL']?>" /></p>
                        <?php }?>
                    </fieldset>
                   		<p id="edit-password"><a href="edit-password.php?userID=<?=$userID?>" >edit password</a></p>
                </div>
                <br class="clear"/>
                <div class="grid_2 prefix_4">
                	<input name="userID" type="hidden" value="<?=$userID?>" />
                	<input type="submit" value="Save change" class="button orange image-right ic-right-arrow"/>
                </div>
                </form>
                <br class="clear"/>
                <div class="grid_3">
               
                </div>
            </div><!--end profile -->
           	
        </div><!--end content-middle -->
        
        <br class="clear"/>
        
    	</div><!--end container_12 -->
    </div><!--end content -->
<?php include("include/footer.php");?>
