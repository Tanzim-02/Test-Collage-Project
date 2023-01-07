<?php

// Validate the form data
if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['subject']) || empty($_POST['message'])) {
  // One or more fields are empty. Redirect back to the form.
  header("Location: contact.html");
  exit;
}

$name = $_POST['name'];
$visitor_email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$email_from = 'info@yourwebsite.com';
$email_subject = 'New Form Submission';
$email_body = "User Name: $name\nUser Email: $visitor_email\nSubject: $subject\nUser Message: $message\n";

$to = 'tanzimhossain2@gmail.com';

$headers = "Form: $email_from\r\n";
$headers .= "Reply-To: $visitor_email\r\n";

// Send the email
if (mail($to, $email_subject, $email_body, $headers)) {
  // Email sent successfully. Redirect back to the form.
  header("Location: contact.html");
  exit;
} else {
  // An error occurred. Display an error message.
  echo "Error: Failed to send email. Please try again later.";
}

