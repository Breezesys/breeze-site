<?php
if(isset($_POST['amount']) && isset($_POST['date']) && isset($_FILES['screenshot'])) {
    $amount = $_POST['amount'];
    $date = $_POST['date'];
    $transactionId = isset($_POST['transaction-id']) ? $_POST['transaction-id'] : "N/A";

    // Handling the file upload (screenshot)
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["screenshot"]["name"]);
    move_uploaded_file($_FILES["screenshot"]["tmp_name"], $target_file);

    // Log the verification details
    file_put_contents('cashapp_verifications_log.txt', "Amount: $amount - Date: $date - Transaction ID: $transactionId - Screenshot: $target_file\n", FILE_APPEND);

    echo "Thank you! Your payment verification has been submitted.";
} else {
    echo "Error: Please provide all the required information.";
}
?>
