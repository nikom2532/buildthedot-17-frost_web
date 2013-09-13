<?php include("include/header.php");?>
<?php include("include/top-menu.php");?>
<div id="content">
    <div class="container_12" id="container">
    <div id="content-middle" class="grid_12">
         <div id="profile" >
            <h1 id="head-title" class="text-green grid_12">My Profile</h1>
            <div class="grid_2">
            <img src="images/test-pic.jpg"  alt="profile">
            </div>
            <div class="grid_2" id="profile-title">
                <p>Name</p>
                <p>Company</p>
                <p>Email</p>
            </div>
            <div class="grid_6" id="profile-detail">
                <p>Lorem Ipsum Lorem Ipsum</p><!--name -->
                <p>Lorem Ipsum Lorem Ipsum</p><!--Company -->
                <p>Lorem@Ipsum.com</p><!--Email -->
            </div>
            <br class="clear"/>
            <div class="grid_3">
            <a href="edit-profile.php" class="button orange ic-edit image-right">Edit profile</a>
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
                <p>Lorem Ipsum Lorem Ipsum</p><!--name -->
                <p>Lorem Ipsum Lorem Ipsum</p><!--Company -->
                <p>Lorem@Ipsum.com</p><!--Email -->
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
<?php include("include/footer.php");?>