<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Email receiver
    $to = "srikrishnay.94@gmail.com";

    // Email headers
    $headers = "From: $email \r\n";
    $headers .= "Reply-To: $email \r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Compose email content
    $email_content = "You have received a new message from your website contact form.\n\n";
    $email_content .= "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Subject: $subject\n";
    $email_content .= "Message:\n$message\n";

    // Send email
    if (mail($to, $subject, $email_content, $headers)) {
        echo '<script>alert("Message sent successfully. I will get back to you soon!"); window.location.replace("index.html");</script>';
    } else {
        echo '<script>alert("Sorry, something went wrong. Please try again later."); window.location.replace("index.html");</script>';
    }
} else {
    // If not a POST request, redirect to homepage or display error
    header("Location: index.html");
    exit();
}
?>
