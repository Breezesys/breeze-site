<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $licenseOption = $_POST['license-option'];
    $paymentMethod = $_POST['payment-method'];
    $transactionId = $_POST['transaction-id'];
    $screenshot = $_FILES['screenshot'];

    // Save the screenshot file
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($screenshot["name"]);
    move_uploaded_file($screenshot["tmp_name"], $target_file);

    // Send email to you with the payment details for manual verification
    $to = "your-email@example.com";  // Your email address
    $subject = "New Payment Verification for " . $licenseOption;
    $message = "License: $licenseOption\nPayment Method: $paymentMethod\nTransaction ID: $transactionId\nScreenshot: $target_file\n\nPlease verify the payment in your CashApp or PayPal account.";
    mail($to, $subject, $message);

    // Show success message
    echo "Thank you! Your payment details have been submitted for verification.";
} else {
    echo "Invalid request.";
}
?>