
<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .confirmation-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 500px;
            width: 100%;
            text-align: center;
        }
        h1 {
            color: green;
        }
    </style>
</head>
<body>
    <div class="confirmation-container">
        <h1>Registration Confirmation</h1>
        <p>Your registration number is:</p>
        <h2><?php echo htmlspecialchars($_GET['registration_number']); ?></h2></div>
		
    
</body>
</html>
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .confirmation-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 500px;
            width: 100%;
            text-align: center;
        }
        h1 {
            color: green;
        }
        h2 {
            color: blue;
        }
        .payment-btn {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: green;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 16px;
        }
        .payment-btn:hover {
            background-color: darkgreen;
        }
    </style>
</head>
<body>
    <div class="confirmation-container">
        <h1>Registration Confirmation</h1>
        <p>Your registration number is:</p>
        <h2><?php echo htmlspecialchars($_GET['registration_number']); ?></h2>
        
        <!-- Payment Button -->
        <form action="payment.php" method="post">
            <input type="hidden" name="registration_number" value="<?php echo htmlspecialchars($_GET['registration_number']); ?>">
            <button type="submit" class="payment-btn">Proceed to Payment</button>
        </form>
    </div>
</body>
</html>