<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order T-Shirt - Sahya</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
          background-image: url('merpaybg.jpg');
        }

        header {
            background-color: #152238;
            color: white;
            text-align: center;
            padding: 20px;
        }

        header h1 {
            margin: 0;
        }

        main {
            padding: 20px;
        }

        .order-form {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
        }

        .order-form h2 {
            margin-top: 0;
            font-size: 24px;
            color: #0056b3;
        }

        .order-form label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        .order-form input, .order-form select, .order-form textarea {
            width: calc(100% - 24px); /* Adjust width to fit padding */
            padding: 12px;
            border-radius: 5px;
            border: 1px solid #ddd;
            margin-bottom: 15px;
            font-size: 16px;
            box-sizing: border-box; /* Ensure padding and border are included in the width */
        }

        .order-form input:focus, .order-form select:focus, .order-form textarea:focus {
            border-color: #0056b3;
            outline: none;
        }

        .order-form textarea {
            resize: vertical;
        }

        .order-form button {
            background-color: #0056b3;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 12px 20px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        .order-form button:hover {
            background-color: #003d7a;
        }

        footer {
            background-color: #152238;
            color: white;
            text-align: center;
            padding: 0px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1>Order T-Shirt - Sahya</h1>
    </header>
    
    <main>
        <section class="order-form">
            <h2>Enter Your Details</h2>
            <form action="payment.php" method="post">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>

                <label for="contact">Contact Number</label>
                <input type="text" id="contact" name="contact" required>

                <label for="size">Size</label>
                <select id="size" name="size" required>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                </select>

                <label for="type">T-Shirt Type</label>
                <select id="type" name="type" required>
                    <option value="Normal">Normal</option>
                    <option value="Oversize">Oversize</option>
                </select>

                <label for="remarks">Remarks</label>
                <textarea id="remarks" name="remarks" rows="4" placeholder="Mention the T-shirt type and size. Include any other relevant information."></textarea>

                <p><strong>Price: For Oversize - ₹399 Only | For Normal - ₹349</strong></p>
                <button type="submit">Proceed to Payment</button>
            </form><br><br><br>
        </section>
    </main>
    <br><br><br> <br><br>
    <footer>
        <p>&copy; 2025 Sahya Fest</p>
    </footer>
</body>
</html>
