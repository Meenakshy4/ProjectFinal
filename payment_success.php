<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success</title>
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
        .success-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 400px;
        }
        h1 {
            color: #00bcd4;
        }
        p {
            font-size: 18px;
            color: #333;
        }
        .registration-number {
            font-size: 24px;
            font-weight: bold;
            color: #00bcd4;
        }
    </style>
</head>
<body>
    <div class="success-container">
        <h1>Payment Completed Successfully!</h1>
        <p>Your payment has been successfully Completed. <br>Your Order ID is:</p>
        <p class="registration-number">
            <?php
            if (isset($_GET['reg_no'])) {
                echo htmlspecialchars($_GET['reg_no']);
            } else {
                echo "N/A";
            }
            ?>
        </p>
    </div>
</body>
</html>
