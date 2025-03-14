<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // Define email recipient
    $to = "sameerkhonde998@gmail.com"; // Replace with your email address

    // Set email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Prepare email body
    $email_body = "<html><body>";
    $email_body .= "<h2>Contact Form Submission</h2>";
    $email_body .= "<strong>Name:</strong> $name<br>";
    $email_body .= "<strong>Email:</strong> $email<br>";
    $email_body .= "<strong>Subject:</strong> $subject<br>";
    $email_body .= "<strong>Message:</strong><br>$message";
    $email_body .= "</body></html>";

    // Send email and provide feedback
    if (mail($to, $subject, $email_body, $headers)) {
        echo "<script>alert('Your message has been sent. Thank you!'); window.location.href='contact.html';</script>";
    } else {
        echo "<script>alert('There was an error sending your message. Please try again.'); window.location.href='contact.html';</script>";
    }
}
?>



