<?php 
$errors = '';
$myemail = 'ellen@ellensmithdesigns.com';
if(empty($_POST['name'])  || 
   empty($_POST['email']) || 
   empty($_POST['message']))
{
    $errors .= "\n Error: all fields are required";
}

$name = $_POST['name']; 
$email_address = $_POST['email']; 
$message = $_POST['message']; 

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
	$to = $myemail; 
	$email_subject = "Contact form submission: $name";
	$email_body = "You have received a new message. ".
	" Here are the details:\n Name: $name \n Email: $email_address \n Message \n $message"; 
	
	$headers = "From: $myemail\n"; 
	$headers .= "Reply-To: $email_address";
	
	mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page
	header('Location: contact-form-thank-you.html');
} 
?>
<!doctype html>
<html lang="en-US">
<head>
 	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
 	<title>Contact Me</title>
 	<link rel="shortcut icon" href="img/favicon.ico">
 	<link rel="icon" href="img/favicon.ico">
 	<link rel="stylesheet" type="text/css" media="all" href="css/main.css"/>
	<title>Contact form handler</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>
<div class="nav_container">
	<div class="bg">
		<a href="http://ellensmithdesigns.com"><img class="logo_img" src="img/logo.svg" title="Ellen Smith Designs" /></a>
    </div>
	<div class="nav">
        <div class="nav_pages">
        	<div class="nav_social">
            	<a href="contact-form.html"><img class="nav_img" src="img/email.svg" title="Contact Me" /></a>
            	<a href="http://www.linkedin.com/pub/ellen-smith/9/b37/876"><img class="nav_img" src="img/linkedin.svg" title="LinkedIn" /></a>
                <a href="http://ellensmithdesigns.blogspot.com/"><img class="nav_img" src="img/blog.svg" title="Blog" /></a>
           	</div>
            <div class="nav_item"><a href="marketing.html">Marketing</a></div>
            <div class="nav_item"><a href="design.html">Design</a></div>
            <div class="nav_item"><a href="prd_mgt.html">Product Management</a></div>
		</div>
	</div>
</div>

<div class="wrapper">
	<div class="project_header">
    	<h1>Contact Me</h1>
    </div>
	<div class="content-left">
        <h2>Email</h2>
        <p>ellen@ellensmithdesigns.com</p>
    </div>
    
    <div class="content-right">
    	<h2>Something Went Wront</h2>
        <p>Your email did not send successfully.</p>
        <h2>Try Again</h2>
        	<p>You can try again by returning to the 
        	<a href="contact-form.html">Contact Page</a>
            </p>
        <h2>Launch Default Email Client</h2>
        	<form action="MAILTO:ellen@ellensmithdesigns.com" method="post" enctype="text/plain">
			<input type="submit" value="Email Client">
			</form> 
        <h2>Plain text</h2>
        	<p>ellen@ellensmithdesigns.com</p>
	</div>
</div>

</body>
</html>