<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name    = $_POST["name"] ?? "No Name";
    $email   = $_POST["email"] ?? "No Email";
    $phone   = $_POST["phone"] ?? "No Phone";
    $message = $_POST["message"] ?? "No Message";

    $to = "sumit.pandey@jaipuria.ac.in";  // Replace with your receiving email
    $subject = "New Form Submission from Landing Page";

    $body = "
    <h2>Form Submission Details</h2>
    <p><strong>Name:</strong> {$name}</p>
    <p><strong>Email:</strong> {$email}</p>
    <p><strong>Phone:</strong> {$phone}</p>
    <p><strong>Message:</strong> {$message}</p>
    ";

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: Website Form <noreply@yourdomain.com>" . "\r\n";

    if (mail($to, $subject, $body, $headers)) {
        echo json_encode(["success" => true]);
    } else {
        http_response_code(500);
        echo json_encode(["success" => false, "message" => "Email could not be sent."]);
    }
} else {
    http_response_code(403);
    echo json_encode(["success" => false, "message" => "Invalid request method."]);
}
?>
