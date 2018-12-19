<!-- <?php
	header('Content-type: application/json');
	$status = array(
		'type'=>'success',
		'message'=>'Спасибо, мы Вам ответим как можно скорее. '
	);

    $name = @trim(stripslashes($_POST['name'])); 
    $email = @trim(stripslashes($_POST['email'])); 
    $subject = @trim(stripslashes($_POST['subject'])); 
    $message = @trim(stripslashes($_POST['message'])); 

    $email_from = $email;
    $email_to = 'maxi_plast@mail.ru';//replace with your email

    $body = 'Name: ' . $name . "\n\n" . 'Email: ' . $email . "\n\n" . 'Subject: ' . $subject . "\n\n" . 'Message: ' . $message;

    $success = @mail($email_to, $subject, $body, 'From: <'.$email_from.'>');

    echo json_encode($status);
    die;
?> -->

<?php
  //Если форма отправлена
  if(isset($_POST['submit'])) {
 //Проверка Поля ИМЯ
  if(trim($_POST['contactname']) == '') {
  $hasError = true;
  } else {
  $name = trim($_POST['contactname']);
  }
 //Проверка поля ТЕМА
  if(trim($_POST['subject']) == '') {
  $hasError = true;
  } else {
  $subject = trim($_POST['subject']);
  }
 //Проверка правильности ввода EMAIL
  if(trim($_POST['email']) == '')  {
  $hasError = true;
  } else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
  $hasError = true;
  } else {
  $email = trim($_POST['email']);
  }
 //Проверка наличия ТЕКСТА сообщения
  if(trim($_POST['message']) == '') {
  $hasError = true;
  } else {
  if(function_exists('stripslashes')) {
  $comments = stripslashes(trim($_POST['message']));
  } else {
  $comments = trim($_POST['message']);
  }
  }
 //Если ошибок нет, отправить email
  if(!isset($hasError)) {
  $emailTo = 'maxi_plast@mail.ru'; //Сюда введите Ваш email
  $body = "Name: $name \n\nEmail: $email \n\nSubject: $subject \n\nComments:\n $comments";
  $headers = 'From: My Site <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
 mail($emailTo, $subject, $body, $headers);
  $emailSent = true;
  }
  }
  ?>