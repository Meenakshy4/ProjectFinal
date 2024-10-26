<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <style>body {
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f0f0f0;
}

.payment-container {
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    width: 400px;
    text-align: center;
}

.input-section {
    margin: 10px 0;
}

input {
    width: 48%;
    padding: 10px;
    margin-right: 4%;
    border: 1px solid #ccc;
    border-radius: 5px;
}

input:last-child {
    margin-right: 0;
}

.submit-section {
    margin-top: 20px;
}

button {
    width: 100%;
    padding: 10px;
    background-color: #7cc03e;
    border: none;
    border-radius: 5px;
    color: white;
    font-size: 16px;
}

button:hover {
    background-color: #6cb030;
}

#paymentMessage {
    margin-top: 20px;
    color: green;
    font-weight: bold;
}

	</style>
</head>
<body>
    <div class="payment-container">
        <form id="paymentForm" action="payment2.php" method="post">
            <div class="total-section">
                <label for="total">Total</label>
                <span>$10.25 USD</span>
            </div>
            <div class="input-section">
                <input type="text" name="firstName" placeholder="First name" required>
                <input type="text" name="lastName" placeholder="Last name" required>
            </div>
            <div class="input-section">
                <input type="text" name="cardNumber" placeholder="Card number" required>
                <input type="text" name="cvv" placeholder="CVV" required>
                <input type="text" name="expiry" placeholder="MM/YY" required>
            </div>
            <div class="payment-icons">
                <img src="card-icons.png" alt="Payment Methods">
            </div>
            <div class="submit-section">
                <button type="submit" id="submitPayment">SUBMIT PAYMENT</button>
            </div>
        </form>
        <p id="paymentMessage"></p>
    </div>
    <script>
	document.getElementById('paymentForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    // Generate Order ID
    const orderId = 'ORD' + Math.floor(1000 + Math.random() * 9000);
    
    // Display payment successful message
    document.getElementById('paymentMessage').innerText = `Payment Successful! Your Order ID is ${orderId}`;
});

	</script>
</body>
</html>
