<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['tel']);
    $details = htmlspecialchars($_POST['project-details']);

    // Email details
    $to = "your-email@example.com"; // Replace with your email address
    $subject = "New Quote Request from $name";
    $message = "Name: $name\n";
    $message .= "Email: $email\n";
    $message .= "Phone: $phone\n";
    $message .= "Project Details:\n$details\n";

    $headers = "From: $email";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "Thank you, your request has been sent.";
    } else {
        echo "Sorry, there was an error sending your request. Please try again later.";
    }
} else {
    // If not a POST request, redirect to the form page
    header("Location: getaquote.html");
    exit();
}
?>
