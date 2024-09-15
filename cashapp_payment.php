<h2>CashApp Payment</h2>
<p>Send your payment to the CashApp tag: <strong>$YourCashAppTag</strong></p>
<p>Once the payment is complete, please include your CashApp transaction ID in the form below for confirmation.</p>

<form action="confirm_cashapp_payment.php" method="POST">
    <label for="cashapp-txid">CashApp Transaction ID:</label>
    <input type="text" id="cashapp-txid" name="cashapp_txid" required>
    <button type="submit">Confirm Payment</button>
</form>