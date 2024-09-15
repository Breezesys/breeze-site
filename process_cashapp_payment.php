<?php
if(isset($_POST['transaction-id']) && isset($_POST['sender-name'])) {
    $transactionId = $_POST['transaction-id'];
    $senderName = $_POST['sender-name'];

    // Status is pending until verified manually
    $paymentStatus = "Pending Verification";

    // Log the payment details for manual verification
    file_put_contents('cashapp_payments_log.txt', "Transaction: $transactionId - Name: $senderName - Status: $paymentStatus\n", FILE_APPEND);

    echo "Thank you! We have received your payment details. Once verified, you will receive access.";
} else {
    echo "Error: Please enter all required information.";
}
?>
