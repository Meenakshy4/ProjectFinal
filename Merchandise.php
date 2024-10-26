<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sahya Merchandise</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #192841;
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

        #merchandise {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .merch-item {
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            padding: 15px;
            transition: box-shadow 0.3s ease;
        }

        .merch-item:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .merch-item img {
            max-width: 150px;
            border-radius: 8px;
            margin-right: 20px;
        }

        .merch-item .info {
            flex: 1;
        }

        .merch-item h3 {
            margin: 0;
        }

        .merch-item p {
            margin: 5px 0;
        }

        .merch-item .price {
            font-size: 18px;
            font-weight: bold;
            margin-top: 10px;
        }

        .buy-button {
            background-color: #0056b3;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            cursor: pointer;
            text-decoration: none;
            font-size: 16px;
            margin-top: 10px;
            display: inline-block;
        }

        .buy-button:hover {
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
        <h1>Sahya Merchandise</h1>
    </header>
    
    <main>
        <section id="merchandise">
            <h2>Available Merchandise</h2>
            <div class="merch-item">
                <img src="tshirt.jpeg" alt="Merch Item 1">
                <div class="info">
                    <h3>T-Shirt</h3>
                    <pre><p>
Available Sizes : S, L, M, XL for both types

Payment will be done by SBI I-collect. Click on order now to direct to SBI I-collect.
Agree to the terms and conditions and proceed further
Select "Sahya, MCKA" in the "Select Payment Category" dropdown menu.
Enter your personal details (as shown here ):
1)Mention the price of T-shirt in the Sahya T-shirt field.
2)Mention the T-shirt type and Size in Remarks.
3)Proceed to the next page and make sure your details are filled in correctly.
4)Proceed to make payment and take a screenshot of the receipt.
5)Collect your T-shirt from III BCA(A) in Old Academic Block, MCKA.
For any queries, contact- Adhil Raj | 8302712663</p></pre>
                    <p class="price">Price : For Oversize - ₹399 Only | For Normal - ₹349
</p>
                    <a href="merchandisepayment.php" class="buy-button">Buy Now</a>
                </div>
            </div>

          
            
            <!-- Repeat for each merchandise item -->
        </section>
    </main>
    <br><br><br>
    <footer>
        <p>&copy; 2025 Sahya Fest</p>
    </footer>
</body>
</html>
