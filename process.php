<?php
// Check if form is submitted using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Collect form data
  $name = $_POST["name"];
  $email = $_POST["email"];
  $message = $_POST["message"];

  // Basic validation
  if (empty($name) || empty($email) || empty($message)) {
    echo "Please fill in all required fields.";
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // Check for valid email format
    echo "Please enter a valid email address.";
  } else {

    // Email details (replace with your actual email address)
    $to = "aditis.singh99@gmail.com";
    $subject = "Message from Contact Form";
    $body = "Name: " . $name . "\n\nEmail: " . $email . "\n\nMessage:\n" . $message;
    $headers = "From: " . $email . "\r\n";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
      echo "Thank you, " . $name . ", for contacting us! We will get back to you soon.";
    } else {
      echo "There was an error sending your message. Please try again later.";
    }
  }
}
?>
