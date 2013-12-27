<?php
	    
   function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
	     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }/*
	 if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['phone']) ||
        !isset($_POST['comment'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
    */ 
if(isset($_POST['email'])) {
     
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "contact@buildthedot.com";
    $email_subject = "Message From Customer[Build The Dot]";


    // validation expected data exists
   
     
    $name = $_POST['name']; // required
    $email_from = $_POST['email']; // required
    $phone = $_POST['phone']; // required
    $comment = $_POST['comment']; // required
	
	echo $email_to;
	echo $email_from;
	echo $phone;
	echo $comment;
     
  
    $email_message = "Form details below.\n\n";

     
    $email_message .= "Name: ".clean_string($name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Telephone: ".clean_string($phone)."\n";
    $email_message .= "Comments: ".clean_string($comment)."\n";
     
     
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_to."\r\n" .
'X-Mailer: PHP/' . phpversion();
$result = @mail($email_to, $email_subject, $email_message, $headers);  
if($result)
	{
		echo "Email Sending."+$result ;
	}
	else
	{
		echo "Email Can Not Send."+$result;
	}
//header("Location: index.php");
?><script>window.location = "index.php?";</script><?php
}
?>
 
<!-- include your own success html here -->
 
<!--Thank you for contacting us. We will be in touch with you very soon.
 --> 
