<?php
// Get the selected payment method
$payment_method = $_POST['payment_method'];

if ($payment_method == 'cashapp') {
    // Redirect to CashApp instructions page
    header("Location: cashapp_payment.php");
} elseif ($payment_method == 'paypal') {
    // Redirect to PayPal payment gateway
    header("Location: paypal_payment.php");
} elseif ($payment_method == 'card') {
    // Redirect to card payment form
    header("Location: card_payment.php");
} else {
    // Redirect to crypto payment form
    header("Location: crypto_payment.php");
}
?>