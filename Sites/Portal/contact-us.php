<?php
$rootpath = "./";
include ($rootpath . "include/header.php");
include ("include/top-menu.php");
?>
<script type="text/javascript">
$(document).ready(function() {
    $("#contact-us").validate({
    	//errorLabelContainer: "#loginMessage",
        rules: {
            
            firstname: {
                required: true,
            },
            lastname: {
                required: true,
            },
            email: {
                required: true,
                email: true
            },
            phonenumber: {
                required: true,
                number:true             
            },
            comment: {
                required: true,
            }
        },
        messages: {
            firstname: "Please enter your firstname",
        	lastname: "Please enter your lastname",
        	phonenumber: {
        		required: "Please enter your phone number",
        		number: "Please enter a valid phone number",
        	},
        	 email: {
                required: "Please enter your Email",
                email: "Please enter a valid email address.",

           },
        	comment: "Please enter your comment"

        }
    })

    $('#btn').click(function() {
        $("#form1").valid();
    });
});
</script>
	<div id="content">
    	<div class="container_12" id="container">
        <div id="content-middle" class="grid_12">
             <div id="profile" >
             	<h1 id="head-title" class="text-green grid_12">Contact us</h1>
                <form action="contact-proc.php" method="POST" id="contact-us">
                <div class="grid_5" id="profile-detail">
                    <p>
                    	<p class="seperator">Firstname</p>
                    	<input type="text" id="firstname" name="firstname" class="" />                 	
                    </p>
                    <p>
                    	<p class="seperator">Lastname</p>
                    	<input type="text" id="lastname" name="lastname" class="" />                 	
                    </p>
                    <p>
                    	<p class="seperator">Email</p>
                    	<input type="text" id="email" name="email" class=""/>                   	
                    </p>
                    <p>
                    	<p class="seperator">Phone number</p>
                    	<input type="text" id="phonenumber" name="phonenumber" class=""/>          	
                    </p>
                    <p>
                    	<p class="seperator">Comment</p>
                    	<textarea id="comment" name="comment" type="text" class=""></textarea>                   	
                    </p>
                </div>
                <div class="grid_5">
                	<h1 class="text-orange bold">ติดต่อ </h1>
                	<p><img src="images/mckansys_logo.png" alt="logo" style="margin-bottom: 10px;"></p>
                	<p class="bold">บริษัท มัคคานซิส (ประเทศไทย) จำกัด</p>
                	<p>152 อาคารชาร์เตอร์ สแควร์ ชั้น12  ห้อง 12-03 ถนนสาทรเหนือ แขวงสีลม เขตบางรัก  กรุงเทพมหานคร 10500 </p>
                	<p><span class="bold">โทรศัพท์:</span> +66.2.637.9663</p>
                	<p><span class="bold">แฟกซ์:</span> +66.2.637.9474</p>
                	<p style="margin-bottom: 10px;"><span class="bold">Email:</span> admin@mckansys.com</p>
                	<p class="bold">Mckansys (Thailand) Co., Ltd.</p> 
                	<p>152 Chartered Square Building, 12th Floor, Unit 12-03</p>
                	<p>North Sathorn Road, Sliom, Bangrak Bangkok 10500, THAILAND</p>
                	<p><span class="bold">Tel:</span> +66.2.637.9663</p>
                	<p><span class="bold">Fax:</span> +66.2.637.9474</p>
                	<p style="margin-bottom: 10px;"><span class="bold">Email:</span> admin@mckansys.com</p>

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