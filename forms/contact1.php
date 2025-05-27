<?php
$to = "reachchitteshchittuselvaraj@gmail.com";
$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
$message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
if (!$email) {
  echo "Invalid email format.";
  exit;
}
$headers = "From: $name <$email>\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
$body = "You have received a new message from your website contact form.\n\n";
$body .= "Here are the details:\n";
$body .= "Name: $name\n";
$body .= "Email: $email\n";
$body .= "Subject: $subject\n";
$body .= "Message:\n$message\n";
if (mail($to, $subject, $body, $headers)) {
  echo "Message sent successfully!";
} else {
  echo "Error sending message.";
}
?>
