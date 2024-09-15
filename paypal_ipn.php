<?php
// Step 1: Read POST data
$raw_post_data = file_get_contents('php://input');
$raw_post_array = explode('&', $raw_post_data);
$myPost = array();

foreach ($raw_post_array as $keyval) {
    $keyval = explode('=', $keyval);
    if (count($keyval) == 2) {
        $myPost[$keyval[0]] = urldecode($keyval[1]);
    }
}

// Step 2: Post IPN data back to PayPal to validate
$req = 'cmd=_notify-validate';
foreach ($myPost as $key => $value) {
    $value = urlencode($value);
    $req .= "&$key=$value";
}

$ch = curl_init('https://ipnpb.paypal.com/cgi-bin/webscr');
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));

// Step 3: Handle the response
$res = curl_exec($ch);
if (strcmp($res, "VERIFIED") == 0) {
    // Step 4: Process verified payment
    $payment_status = $_POST['payment_status'];
    $txn_id = $_POST['txn_id'];
    $receiver_email = $_POST['receiver_email'];
    $amount = $_POST['mc_gross'];
    $payer_email = $_POST['payer_email'];
    
    if ($payment_status == 'Completed') {
        // Do something with the successful payment details
        file_put_contents('paypal_log.txt', "Payment Completed: $txn_id\n", FILE_APPEND);
    }
} else if (strcmp($res, "INVALID") == 0) {
    // Log for manual investigation
    file_put_contents('paypal_log.txt', "Invalid IPN: $raw_post_data\n", FILE_APPEND);
}
curl_close($ch);
?>