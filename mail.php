<?php
// Sample Form Data (replace with actual $_POST if coming from form)
$data = [
    "FirstName" => $_POST['fname'] ?? '',
    "LastName" => $_POST['lname'] ?? '',
    "EmailAddress" => $_POST['email'] ?? '',
    "Phone" => $_POST['phone'] ?? '',
    "Experience" => $_POST['experience'] ?? '',
    "City" => $_POST['city'] ?? '',
    "Source" => "AI Powered Data Analytics - Landing Page",
];

// Convert to JSON
$jsonData = json_encode($data);

// LeadSquared API endpoint to create/update lead
$url = "https://api-in21.leadsquared.com/v2/LeadManagement.svc/Lead.Capture";

// Your Access Key and Secret Key (replace with real values)
$accessKey = "u$r12655856dd0e79352834b4c9f0d22c35";
$secretKey = "a8e09685f4f7313da323cd56f1604e6a26832757";

// Build full URL with keys
$fullUrl = $url . "?accessKey=$accessKey&secretKey=$secretKey";

// Initialize cURL
$ch = curl_init($fullUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);

// Execute request
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

// Close cURL
curl_close($ch);

// Debug response
if ($httpCode === 200) {
    echo "Lead submitted successfully.";
} else {
    echo "Error submitting lead. Response: " . $response;
}
?>
