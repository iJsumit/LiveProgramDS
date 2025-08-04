<?php
// Replace with your receiving email address
$to = "sumitpcsa@gmail.com";

// Get form values safely
$name = isset($_POST['fname']) ? htmlspecialchars($_POST['fname']) : '';
$email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
$phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '';

// Optional: Add more fields if needed
// $experience = isset($_POST['experience']) ? htmlspecialchars($_POST['experience']) : '';

$subject = "New Enquiry from AI Data Science Landing Page";

// Email Body
$message = "
You have received a new enquiry:\n\n
Name: $name\n
Email: $email\n
Phone: $phone\n
";

// Email Headers
$headers = "From: no-reply@ijaipuria.com\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

// Send the email
if (mail($to, $subject, $message, $headers)) {
    echo "success";
} else {
    echo "error";
}
?>
