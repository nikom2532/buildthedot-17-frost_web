<?php
$rootpath = "./";
include ($rootpath . "include/header.php");
include ("include/top-menu.php");
?>
	<div id="content">
    	<div class="container_12" id="container">
        <div id="content-middle" class="grid_12">
             <div id="profile" >
             	<h1 id="head-title" class="text-green grid_12">Contact us</h1>
                <form action="contact-proc.php" method="POST" id="contact-us">
                <div class="grid_8" id="profile-detail">
                    <p>
                    	<p class="seperator">Firstname</p>
                    	<p><input type="text" id="firstname" name="firstname" class="" /><span id="error" class="text-red">Test Error</span></p>
                    </p>
                    <p>
                    	<p class="seperator">Lastname</p>
                    	<input type="text" id="lastname" name="lastname" class="" /><span id="error" class="text-red">Test Error</span>                 	
                    </p>
                    <p>
                    	<p class="seperator">Email</p>
                    	<input type="text" id="email" name="email" class=""/><span id="error" class="text-red">Test Error</span>                   	
                    </p>
                    <p>
                    	<p class="seperator">Phone number</p>
                    	<input type="text" id="phonenumber" name="phonenumber" class=""/><span id="error" class="text-red">Test Error</span>          	
                    </p>
                    <p>
                    	<p class="seperator">Comment</p>
                    	<p><textarea id="textarea" name="comment" type="text" class=""></textarea><span id="error" class="text-red">Test Error</span></p>                   	
                    </p>
                </div>
                <br class="clear"/>
                <div class="grid_2">
                	<input type="submit" value="Send Message" class="button orange image-right ic-right-arrow"/>
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
<?php
include ("include/footer.php");
?>