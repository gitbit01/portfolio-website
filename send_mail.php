<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);
    
    // Email details
    $to = "shahsarfraz214@gmail.com";
    $subject = !empty($subject) ? $subject : 'New Contact Form Submission';
    $headers = "From: ".$email."\r\n";
    $headers .= "Reply-To: ".$email."\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    
    // Email content
    $body = "
        <h2>New Contact Form Submission</h2>
        <p><strong>Name:</strong> {$name}</p>
        <p><strong>Email:</strong> {$email}</p>
        <p><strong>Message:</strong><br/>{$message}</p>
    ";

    // Send email
    if(mail($to, $subject, $body, $headers)) {
        // Success message
        echo "Your message has been sent successfully.";
    } else {
        // Failure message
        echo "There was an issue sending your message. Please try again.";
    }
}
?>
