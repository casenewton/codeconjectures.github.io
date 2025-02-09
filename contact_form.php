<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    
    // Set recipient email (change this to your email)
    $to = "lavianvishal23@gmail.com"; // Your email address here
    $subject = "New Contact Message from $name";
    
    // Create email headers
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: $email" . "\r\n";
    
    // Create email body
    $body = "<html><body>";
    $body .= "<h2>Contact Message</h2>";
    $body .= "<p><strong>Name:</strong> $name</p>";
    $body .= "<p><strong>Email:</strong> $email</p>";
    $body .= "<p><strong>Message:</strong> $message</p>";
    $body .= "</body></html>";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "<p>Your message has been sent successfully!</p>";
    } else {
        echo "<p>Sorry, there was an error sending your message. Please try again later.</p>";
    }
} else {
    // If form is not submitted, redirect to the contact page
    header("Location: contact.html");
    exit();
}
?>
