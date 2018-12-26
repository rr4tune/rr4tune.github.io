<?php
	header('Content-type: application/json');
	$status = array(
		'type'=>'submit',
		'message'=>'Thank you for contact us. As early as possible  we will contact you '
	);

    $name = @trim(stripslashes($_GET['name'])); 
    $email = @trim(stripslashes($_GET['email'])); 
    $subject = @trim(stripslashes($_GET['subject'])); 
    $message = @trim(stripslashes($_GET['message'])); 

    $email_from = $email;
    $email_to = 'maxi_plast@mail.ru';

    $body = 'Name: ' . $name . "\n\n" . 'Email: ' . $email . "\n\n" . 'Subject: ' . $subject . "\n\n" . 'Message: ' . $message;

    $success = @mail($email_to, $subject, $body, 'From: <'.$email_from.'>');

    echo json_encode($status);
    die;

    