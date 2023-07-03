<?php
include "./Assets/mail.php";
$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$phone = htmlspecialchars($_POST['phone']);
$subject = htmlspecialchars($_POST['subject']);
$message = htmlspecialchars($_POST['message']);

if (!empty($email) && !empty($message)) {
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $receiver = "surenams1505@gmail.com";
    $subject = "From: $name <$email>";
    $message = "Name: $name\r\nEmail: $email\r\nPhone: $phone\r\nWebsite: $subject\r\nMessage:\n $message \r\n\nRegards,\r\n$name";
    $sender = "From: $email";
    if (send_mail($receiver, $subject, $message, $email)) {
      echo "Your message has been sent";
    } else {
      echo "Sorry, failed to send your message!";
    }
  } else {
    echo "Enter a valid email address!";
  }
} else {
  echo "Email and message field is required!";
}
?>
