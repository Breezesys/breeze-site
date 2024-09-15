<?php
if(isset($_POST['transaction-id'])) {
    $transactionId = $_POST['transaction-id'];

    // Manual PayPal verification logic here.
    $paymentStatus = "Pending"; // You manually verify this in PayPal later.

    echo "Transaction ID: $transactionId has been submitted. Payment Status: $paymentStatus.";
}
?>