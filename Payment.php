

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e9f5f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            width: 450px; /* Increased width size */
            max-height: 70vh; /* Limits height to 70% of viewport */
            overflow-y: auto; /* Enables scrolling */
        }
        h1 {
            text-align: center;
            color: #00bcd4;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin: 10px 0 5px;
            color: #333;
        }
        input[type="text"],
        input[type="email"],
        select {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 5px 0 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .payment-methods {
            display: flex;
            justify-content: space-between;
        }
        .payment-methods button {
            width: 48%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #00bcd4;
            color: white;
        }
        .payment-methods button.selected {
            background-color: #0097a7; /* Darker shade for selected */
        }
        .submit-btn, .clear-all-btn {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #00bcd4;
            color: white;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Payment Form</h1>
        <form id="paymentForm" action="process_payment.php" method="post" onsubmit="return validateForm()">
            <label for="full_name">Full Name</label>
            <input type="text" id="full_name" name="full_name" required>
            
            <label for="card_name">Name on Card</label>
            <input type="text" id="card_name" name="card_name" required onkeyup="validateCardName()">
            <p id="card_name_error" style="color:red;font-size:12px"></p>

            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" required>
            
            <label for="contact-number">Contact Number:</label>
            <input type="text" id="contact-number" name="contact_number" onkeyup='phnerror()' required>
            <p id='cont_error' style='color:red;font-size:12px'></p>
            
            <label>Payment Method</label>
            <div class="payment-methods">
                <button type="button" id="creditCardBtn" onclick="selectPaymentMethod('creditCard')">Credit Card</button>
                <button type="button" id="paypalBtn" onclick="selectPaymentMethod('paypal')">Paypal</button>
            </div>
            
            <label for="card_number">Card Number</label>
            <input type="text" id="card_number" name="card_number" placeholder="1111-2222-3333-4444" onkeyup="validateCardNumber()" required>
            <p id="card_number_error" style="color:red;font-size:12px"></p>

            <label for="card_cvc">Card CVC</label>
            <input type="text" id="card_cvc" name="card_cvc" placeholder="CVC" onkeyup="validateCVC()" required>
            <p id="card_cvc_error" style="color:red;font-size:12px"></p>

            <label for="exp_month">Exp Month</label>
            <input type="text" id="exp_month" name="exp_month" placeholder="MM" required>
            <p id="exp_month_error" style="color:red;font-size:12px"></p>
            
            <label for="exp_year">Exp Year</label>
            <input type="text" id="exp_year" name="exp_year" placeholder="YYYY" required>
            <p id="exp_year_error" style="color:red;font-size:12px"></p>
            
            <button type="submit" class="submit-btn">Pay Now</button>
            <button type="button" class="clear-all-btn" onclick="clearAllFields()">Clear All</button>
        </form>
    </div>

    <script>
        function phnerror() {
            var num = document.getElementById('contact-number').value;
            if (num.length < 10) {
                document.getElementById('cont_error').innerHTML = 'Contact Number must be Ten Digits';
            } else if (num.length == 10) {
                document.getElementById('cont_error').innerHTML = '';
            } else if (num.length > 10) {
                document.getElementById('cont_error').innerHTML = 'Invalid Contact Number';
            }
        }

        function validateCardName() {
            var cardName = document.getElementById('card_name').value;
            if (cardName !== cardName.toUpperCase()) {
                document.getElementById('card_name_error').innerHTML = 'Name on card must be in capital letters';
            } else {
                document.getElementById('card_name_error').innerHTML = '';
            }
        }

        function validateCardNumber() {
            var cardNumber = document.getElementById('card_number').value.replace(/-/g, '');
            if (cardNumber.length < 16) {
                document.getElementById('card_number_error').innerHTML = 'Card Number must be 16 digits';
            } else if (cardNumber.length == 16) {
                document.getElementById('card_number_error').innerHTML = '';
            } else {
                document.getElementById('card_number_error').innerHTML = 'Invalid Card Number';
            }
        }

        function validateCVC() {
            var cvc = document.getElementById('card_cvc').value;
            if (cvc.length < 3) {
                document.getElementById('card_cvc_error').innerHTML = 'CVC must be 3 digits';
            } else if (cvc.length == 3) {
                document.getElementById('card_cvc_error').innerHTML = '';
            } else {
                document.getElementById('card_cvc_error').innerHTML = 'Invalid CVC';
            }
        }

        function validateExpiryDate(month, year) {
            const currentDate = new Date();
            const currentYear = currentDate.getFullYear();
            const currentMonth = currentDate.getMonth() + 1; // Months are 0-based

            if (year < currentYear || (year === currentYear && month < currentMonth)) {
                return 'Expiry date must be in the present or future.';
            }
            return '';
        }

        function validateForm() {
            let valid = true;

            // Validate expiry month and year
            const expMonth = parseInt(document.getElementById('exp_month').value, 10);
            const expYear = parseInt(document.getElementById('exp_year').value, 10);
            const expiryError = validateExpiryDate(expMonth, expYear);

            if (expiryError) {
                document.getElementById('exp_month_error').innerHTML = expiryError;
                document.getElementById('exp_year_error').innerHTML = expiryError;
                valid = false;
            } else {
                document.getElementById('exp_month_error').innerHTML = '';
                document.getElementById('exp_year_error').innerHTML = '';
            }

            return valid;
        }

        function selectPaymentMethod(method) {
            var creditCardBtn = document.getElementById('creditCardBtn');
            var paypalBtn = document.getElementById('paypalBtn');

            if (method === 'creditCard') {
                creditCardBtn.classList.add('selected');
                paypalBtn.classList.remove('selected');
            } else {
                paypalBtn.classList.add('selected');
                creditCardBtn.classList.remove('selected');
            }
        }

        function clearField(fieldId) {
            document.getElementById(fieldId).value = '';
        }

        function clearAllFields() {
            document.getElementById('paymentForm').reset();
            document.getElementById('cont_error').innerHTML = '';
            document.getElementById('card_name_error').innerHTML = '';
            document.getElementById('card_number_error').innerHTML = '';
            document.getElementById('card_cvc_error').innerHTML = '';
            document.getElementById('exp_month_error').innerHTML = '';
            document.getElementById('exp_year_error').innerHTML = '';
        }
    </script>
</body>
</html>
