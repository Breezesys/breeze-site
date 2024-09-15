<?php
$transactionId = $_GET['transaction-id'] ?? null;

if ($transactionId) {
    $log = file_get_contents('cashapp_payments_log.txt');
    if (strpos($log, $transactionId) !== false) {
        echo "Transaction: $transactionId has been processed.";
    } else {
        echo "Transaction: $transactionId is still pending verification.";
    }
} else {
    echo "No transaction ID provided.";
}
?>0