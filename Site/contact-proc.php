<?php 
if(isset($_POST['email'])) {
     
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "ms_bullshitta@hotmail.com";
    $email_subject = "Message From Customer[Mckansys]";

    // validation expected data exists
       
    $firstname = $_POST['firstname']; // required
    $lastname = $_POST['lastname']; //required
    $email_from = $_POST['email']; // required
    $phonenumber = $_POST['phonenumber']; // required
    $comment = $_POST['comment']; // required

	// echo $firstname;
	// echo $lastname;
	// echo $email_from;
	// echo $phonenumber;
	// echo $comment;
     
  
    $email_message = "From details below.\n\n";

     
    $email_message .= "Firstname: ".$firstname."\n";
	$email_message .= "Lastname: ".$lastname."\n";
    $email_message .= "Email: ".$email_from."\n";
    $email_message .= "Telephone: ".$phonenumber."\n";
    $email_message .= "Comments: ".$comment."\n";
     
     
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_to."\r\n" .
'X-Mailer: PHP/' . phpversion();
$result = @mail($email_to, $email_subject, $email_message, $headers);  

if($result)
	{
		header("Location: sucess-page.php");
	}
else
	{
		header("Location: fail-page.php");
	}

}

?>