<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        /* Basic styles for the contact page */
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .contact-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            flex: 1;
            padding: 20px;
            text-align: center;
        }

        .contact-info h1 {
            color: #ff3366;
            font-size: 36px;
            margin-bottom: 10px;
        }

        .contact-info p {
            color: #999;
            margin-bottom: 20px;
        }

        .contact-form {
            width: 100%;
            max-width: 400px;
        }

        .contact-form input, 
        .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 16px;
        }

        .contact-form button {
            background-color: #ff3366;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
        }

        .contact-form button:hover {
            background-color: #e62e5d;
        }

        .social-media {
            margin-top: 30px;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .social-media a img {
            width: 50px;
            height: 50px;
            transition: transform 0.3s ease;
        }

        .social-media a img:hover {
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <div class="contact-container">
        <div class="contact-info">
            <h1>Contact Us</h1>
            <p>We Love Conversations, Let's Talk</p>
        </div>
        <div class="contact-form">
            <form id="contactForm">
                <input type="text" id="fullName" name="fullName" placeholder="Full Name" required>
                <input type="email" id="email" name="email" placeholder="Enter Your Email" required>
                <input type="tel" id="phone" name="phone" placeholder="Your Number" pattern="[0-9]{10}" required>
                <textarea id="message" name="message" placeholder="Message" rows="4" required></textarea>
                <button type="submit">Message</button>
            </form>
        </div>
        <div class="social-media">
            <a href="https://www.facebook.com" target="_blank">
                <img src="facebook.png" alt="Facebook">
            </a>
            <a href="https://www.whatsapp.com" target="_blank">
                <img src="whatsapp.png" alt="WhatsApp">
            </a>
            <a href="https://www.instagram.com" target="_blank">
                <img src="instagram.png" alt="Instagram">
            </a>
        </div>
    </div>
    <script>
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const fullName = document.getElementById('fullName').value;
            const email = document.getElementById('email').value;
            const phone = document.getElementById('phone').value;
            const message = document.getElementById('message').value;

            if (fullName && email && phone && message) {
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'process_contact.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        alert(xhr.responseText);
                        document.getElementById('contactForm').reset();
                    }
                };
                xhr.send(`fullName=${fullName}&email=${email}&phone=${phone}&message=${message}`);
            } else {
                alert("Please fill in all fields correctly.");
            }
        });
    </script>
</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        /* Basic styles for the contact page */
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            height: 100%;
            display: flex;
            flex-direction: column;
           /* background-color: white;  Set the background to white */
			background-image: url('contpic.jpg');
        }

        .contact-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            flex: 1;
            padding: 20px;
            text-align: center;
        }

        .contact-info h1 {
            color: #ff3366;
            font-size: 36px;
            margin-bottom: 10px;
        }

        .contact-info p {
            color: #333;
            margin-bottom: 20px;
        }

        .contact-form {
            width: 100%;
            max-width: 500px;
            background-color: #f7f7f7; /* Light gray background for the form */
            padding: 40px;
            border-radius: 40px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.15); /* 3D box shadow effect */
            transition: transform 0.3s ease; /* Smooth transition for hover effect */
        }

        .contact-form:hover {
            transform: translateY(-5px); /* Lift the form slightly on hover for 3D effect */
            box-shadow: 0px 15px 25px rgba(0, 0, 0, 0.2); /* Increase shadow on hover */
        }

        .contact-form input, 
        .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 16px;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1); /* Slight inner shadow for 3D effect */
        }

        .contact-form button {
            background-color: #ff3366;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Button shadow for 3D effect */
        }

        .contact-form button:hover {
            background-color: #e62e5d;
            transform: translateY(-2px); /* Lift button slightly on hover */
            box-shadow: 0px 8px 10px rgba(0, 0, 0, 0.2); /* Increase shadow on hover */
        }

        .social-media {
            margin-top: 30px;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .social-media a img {
            width: 50px;
            height: 50px;
            transition: transform 0.3s ease;
        }

        .social-media a img:hover {
            transform: scale(1.1);
        }
		.contact-info h1 {
    font-size: 48px; /* Larger font size */
    color: #ff3366;
    text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.5); /* 3D effect using shadow */
    margin-bottom: 10px;
}

.contact-info p {
    font-size: 26px; /* Larger font size */
    color:#000000;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* 3D effect using shadow */
    margin-bottom: 20px;
}
    </style>
</head>
<body>
    <div class="contact-container">
        <div class="contact-info">
            <h1>Contact Us</h1>
            <p><b>We Love Conversations, Let's Talk</b></p>
        </div>
        <div class="contact-form">
            <form id="contactForm">
                <input type="text" id="fullName" name="fullName" placeholder="Full Name" required>
                <input type="email" id="email" name="email" placeholder="Enter Your Email" required>
                <input type="tel" id="phone" name="phone" placeholder="Your Number" pattern="[0-9]{10}" required>
                <textarea id="message" name="message" placeholder="Message" rows="4" required></textarea>
                <button type="submit">Message</button>
            </form>
        </div>
        <div class="social-media">
            <a href="https://www.facebook.com" target="_blank">
                <img src="facebook.png" alt="Facebook">
            </a>
            <a href="https://www.whatsapp.com" target="_blank">
                <img src="whatsapp.png" alt="WhatsApp">
            </a>
            <a href="https://www.instagram.com" target="_blank">
                <img src="instagram.png" alt="Instagram">
            </a>
        </div>
    </div>
    <script>
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const fullName = document.getElementById('fullName').value;
            const email = document.getElementById('email').value;
            const phone = document.getElementById('phone').value;
            const message = document.getElementById('message').value;

            if (fullName && email && phone && message) {
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'process_contact.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        alert(xhr.responseText);
                        document.getElementById('contactForm').reset();
                    }
                };
                xhr.send(`fullName=${fullName}&email=${email}&phone=${phone}&message=${message}`);
            } else {
                alert("Please fill in all fields correctly.");
            }
        });
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
     /* Basic styles for the contact page */
body, html {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    height: 100%;
    display: flex;
    flex-direction: column;
    background-image: url('contpic.jpg'); /* Background image */
    background-size: cover; /* Cover the entire background */
    background-position: center; /* Center the background image */
}

.contact-container {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    flex: 1;
    padding: 20px;
    text-align: center;
    margin-bottom: 60px; /* Space for footer */
}

.contact-info h1 {
    font-size: 48px; /* Larger font size */
    color: #ff3366;
    text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.5), 0 0 25px rgba(255, 0, 0, 0.6); /* 3D effect using shadow and glowing effect */
    margin-bottom: 10px;
    background: linear-gradient(135deg, #ff3366, #ff99cc); /* Gradient color effect */
    -webkit-background-clip: text; /* Clip background to text */
    -webkit-text-fill-color: transparent; /* Transparent text color */
}

.contact-info p {
    font-size: 26px; /* Larger font size */
    color: #ffffff;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* 3D effect using shadow */
    margin-bottom: 20px;
}

.contact-form {
    width: 100%;
    max-width: 500px;
    background-color: rgba(255, 255, 255, 0); /* Fully transparent background */
    padding: 40px;
    border-radius: 20px; /* Rounded corners */
    box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.80); /* 3D box shadow effect */
    transition: transform 0.3s ease; /* Smooth transition for hover effect */
}

.contact-form:hover {
    transform: translateY(-5px); /* Lift the form slightly on hover for 3D effect */
    box-shadow: 0px 15px 25px rgba(0, 0, 0, 0.2); /* Increase shadow on hover */
}

.contact-form input, 
.contact-form textarea {
    width: 100%;
    padding: 12px; /* Larger padding */
    margin: 10px 0;
    border-radius: 10px; /* Rounded corners */
    border: 1px solid #ddd;
    font-size: 16px;
    box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.5); /* Slight inner shadow for 3D effect */
    background-color: rgba(255, 255, 255, 0.8); /* Slightly transparent background for fields */
}

.contact-form input:focus, 
.contact-form textarea:focus {
    border-color: #ff3366; /* Highlight border color on focus */
    outline: none; /* Remove default outline */
}

.contact-form button {
    background-color: #ff3366;
    color: white;
    padding: 12px;
    border: none;
    border-radius: 10px; /* Rounded corners */
    font-size: 16px;
    cursor: pointer;
    width: 100%;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Button shadow for 3D effect */
}

.contact-form button:hover {
    background-color: #e62e5d;
    transform: translateY(-2px); /* Lift button slightly on hover */
    box-shadow: 0px 8px 10px rgba(0, 0, 0, 0.2); /* Increase shadow on hover */
}

.social-media {
    margin-top: 30px;
    margin-bottom: 40px; /* Space between social media and footer */
    display: flex;
    justify-content: center;
    gap: 20px;
}

.social-media a {
    display: inline-block;
    animation: bounce 2s infinite; /* Apply bouncing animation */
}

.social-media a img {
    width: 50px;
    height: 50px;
    transition: transform 0.3s ease;
}

.social-media a img:hover {
    transform: scale(1.1);
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
        transform: translateY(0);
    }
    40% {
        transform: translateY(-30px);
    }
    60% {
        transform: translateY(-15px);
    }
}

footer {
    background-color: #301934; /* Dark background for footer */
    color: #ffffff;
    text-align: center;
    padding: 0px; /* Added padding */
    width: 100%;
    position: fixed;
    bottom: 0;
}
<!--.interactive-box {
            margin: 20px auto;
            padding: 20px;
            max-width: 800px;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            text-align: center;
            color: #333;
            position: relative;
            z-index: 1;
        }
 .coordinators {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
            margin-top: 20px;
        }
        .coordinator {
            width: 250px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.7);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
            border-radius: 15px;
            text-align: center;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease;
        }
        .coordinator:hover {
            transform: translateY(-10px);
        }
        .coordinator img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
            transition: transform 0.3s ease;
        }
        .coordinator:hover img {
            transform: scale(1.1);
        }
        .coordinator h3 {
            font-size: 1.4em;
            color: #333;
            margin-bottom: 10px;
        }
        .social-media {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 15px;
        }
        .social-media a {
            color: #fff;
            font-size: 1.4em;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #e0aaff;
            transition: background 0.3s ease, transform 0.3s ease;
        }
        .social-media a:hover {
            background: #b689f1;
            transform: scale(1.1);
        }
        .social-media a .icon {
            width: 20px;
            height: 20px;
        }

    </style>
</head>
<body>
    <div class="contact-container">
        <div class="contact-info">
            <h1>Contact Us</h1>
            <p><b>We Love Conversations, Let's Talk</b></p>
        </div>
        <div class="contact-form">
            <form id="contactForm">
                <input type="text" id="fullName" name="fullName" placeholder="Full Name" required>
                <input type="email" id="email" name="email" placeholder="Enter Your Email" required>
                <input type="tel" id="phone" name="phone" placeholder="Your Number" pattern="[0-9]{10}" required>
                <textarea id="message" name="message" placeholder="Message" rows="4" required></textarea>
                <button type="submit">Message</button>
            </form>
        </div>
        <div class="social-media">
            <a href="https://www.facebook.com" target="_blank">
                <img src="facebook1.png" alt="Facebook">
            </a>
            <a href="https://www.whatsapp.com" target="_blank">
                <img src="whatsapp.png" alt="WhatsApp">
            </a>
            <a href="https://www.instagram.com" target="_blank">
                <img src="instagram.png" alt="Instagram">
            </a>
        </div>
    </div>
 <div class="coordinators">
        <div class="coordinator">
            <img src="studcor1.png" alt="Student Coordinator 1">
            <h3>Student Coordinator 1</h3>
            <div class="social-media">
                <a href="tel:+1234567890" target="_blank">
                    <img src="phone-icon.png" alt="Phone" class="icon">
                </a>
                <a href="https://www.facebook.com" target="_blank">
                <img src="facebook.png" alt="Facebook">
            </a>
            <a href="https://www.whatsapp.com" target="_blank">
                <img src="whatsapp.png" alt="WhatsApp">
            </a>
            <a href="https://www.instagram.com" target="_blank">
                <img src="instagram.png" alt="Instagram">
            </a>
            </div>
        </div>
        <div class="coordinator">
            <img src="studcor2.png" alt="Student Coordinator 2">
            <h3>Student Coordinator 2</h3>
            <div class="social-media">
                <a href="tel:+1234567890" target="_blank">
                    <img src="phone-icon.png" alt="Phone" class="icon">
                </a>
                <a href="https://www.facebook.com" target="_blank">
                <img src="facebook.png" alt="Facebook">
            </a>
            <a href="https://www.whatsapp.com" target="_blank">
                <img src="whatsapp.png" alt="WhatsApp">
            </a>
            <a href="https://www.instagram.com" target="_blank">
                <img src="instagram.png" alt="Instagram">
            </a>
            </div>
        </div>
    </div><br><br><br><br><br><br><br><br>
    <footer>
        <p>&copy; 2024 All Rights Reserved</p>
    </footer>
    <script>
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const fullName = document.getElementById('fullName').value;
            const email = document.getElementById('email').value;
            const phone = document.getElementById('phone').value;
            const message = document.getElementById('message').value;

            if (fullName && email && phone && message) {
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'process_contact.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        alert(xhr.responseText);
                        document.getElementById('contactForm').reset();
                    }
                };
                xhr.send(`fullName=${fullName}&email=${email}&phone=${phone}&message=${message}`);
            } else {
                alert("Please fill in all fields correctly.");
            }
        });
    </script>
</body>
</html>-->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
	
    <style>
        /* Basic styles for the contact page */
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            height: 100%;
            display: flex;
            flex-direction: column;
            background-image: url('contpic.jpg'); /* Background image */
            background-size: cover; /* Cover the entire background */
            background-position: center; /* Center the background image */
        }

        .contact-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            flex: 1;
            padding: 20px;
            text-align: center;
            margin-bottom: 60px; /* Space for footer */
        }

        .contact-info h1 {
            font-size: 48px; /* Larger font size */
            color: #ff3366;
            text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.5), 0 0 25px rgba(255, 0, 0, 0.6); /* 3D effect using shadow and glowing effect */
            margin-bottom: 10px;
            background: linear-gradient(135deg, #ff3366, #ff99cc); /* Gradient color effect */
            -webkit-background-clip: text; /* Clip background to text */
            -webkit-text-fill-color: transparent; /* Transparent text color */
        }

        .contact-info p {
            font-size: 26px; /* Larger font size */
            color: #ffffff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* 3D effect using shadow */
            margin-bottom: 20px;
        }

        .contact-form {
            width: 100%;
            max-width: 500px;
            background-color: rgba(255, 255, 255, 0); /* Fully transparent background */
            padding: 40px;
            border-radius: 20px; /* Rounded corners */
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.80); /* 3D box shadow effect */
            transition: transform 0.3s ease; /* Smooth transition for hover effect */
        }

        .contact-form:hover {
            transform: translateY(-5px); /* Lift the form slightly on hover for 3D effect */
            box-shadow: 0px 15px 25px rgba(0, 0, 0, 0.2); /* Increase shadow on hover */
        }

        .contact-form input, 
        .contact-form textarea {
            width: 100%;
            padding: 12px; /* Larger padding */
            margin: 10px 0;
            border-radius: 10px; /* Rounded corners */
            border: 1px solid #ddd;
            font-size: 16px;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.5); /* Slight inner shadow for 3D effect */
            background-color: rgba(255, 255, 255, 0.8); /* Slightly transparent background for fields */
        }

        .contact-form input:focus, 
        .contact-form textarea:focus {
            border-color: #ff3366; /* Highlight border color on focus */
            outline: none; /* Remove default outline */
        }

        .contact-form button {
            background-color: #ff3366;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 10px; /* Rounded corners */
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Button shadow for 3D effect */
        }

        .contact-form button:hover {
            background-color: #e62e5d;
            transform: translateY(-2px); /* Lift button slightly on hover */
            box-shadow: 0px 8px 10px rgba(0, 0, 0, 0.2); /* Increase shadow on hover */
        }

        .social-media {
            margin-top: 30px;
            margin-bottom: 40px; /* Space between social media and footer */
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .social-media a {
            display: inline-block;
            /* Removed bouncing animation */
        }

        .social-media a img {
            width: 50px;
            height: 50px;
            transition: transform 0.3s ease;
        }

        .social-media a img:hover {
            transform: scale(1.1);
        }

        footer {
            background-color: #301934; /* Dark background for footer */
            color: #ffffff;
            text-align: center;
            padding: 0px; /* Added padding */
            width: 100%;
            position: fixed;
            bottom: 0;
        }

        .coordinators {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .coordinator {
            width: 250px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.7);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
            border-radius: 15px;
            text-align: center;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .coordinator:hover {
            transform: translateY(-10px);
        }

        .coordinator img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
            transition: transform 0.3s ease;
        }

        .coordinator:hover img {
            transform: scale(1.1);
        }

        .coordinator h3 {
            font-size: 1.4em;
            color: #333;
            margin-bottom: 10px;
        }

        .social-media-rect {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 15px;
        }

        .social-media-rect a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 40px;
            border-radius: 10px; /* Rectangular shape with rounded corners */
            background: #e0aaff;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .social-media-rect a:hover {
            background: #b689f1;
            transform: scale(1.05); /* Slightly larger on hover */
        }

        .social-media-rect img {
            width: 40px;
            height: 40px;
        }
    </style>
</head>
<body>
    <div class="contact-container">
        <div class="contact-info">
            <h1>Contact Us</h1>
            <p><b>We Love Conversations, Let's Talk</b></p>
        </div>
        <div class="contact-form">
            <form id="contactForm">
                <input type="text" id="fullName" name="fullName" placeholder="Full Name" required>
                <input type="email" id="email" name="email" placeholder="Enter Your Email" required>
                <input type="tel" id="phone" name="phone" placeholder="Your Number" pattern="[0-9]{10}" required>
                <textarea id="message" name="message" placeholder="Message" rows="4" required></textarea>
                <button type="submit">Message</button>
            </form>
        </div>
        <div class="social-media">
            <a href="https://www.facebook.com" target="_blank">
                <img src="facebook1.png" alt="Facebook">
            </a>
            <a href="https://www.whatsapp.com" target="_blank">
                <img src="whatsapp.png" alt="WhatsApp">
            </a>
            <a href="https://www.instagram.com" target="_blank">
                <img src="instagram.png" alt="Instagram">
            </a>
        </div>
    </div>
    
    <div class="coordinators">
        <div class="coordinator">
            <img src="studcor1.png" alt="Student Coordinator 1">
            <h3>Student Coordinator 1</h3>
            <div class="social-media-rect">
                <a href="tel:+1234567890" target="_blank">
                    <img src="phone-icon.png" alt="Phone">
                </a>
                <a href="https://www.facebook.com" target="_blank">
                    <img src="facebook1.png" alt="Facebook">
                </a>
                <a href="https://www.instagram.com" target="_blank">
                    <img src="instagram.png" alt="Instagram">
                </a>
            </div>
        </div>
        <div class="coordinator">
            <img src="studcor2.png" alt="Student Coordinator 2">
            <h3>Student Coordinator 2</h3>
            <div class="social-media-rect">
                <a href="tel:+1234567890" target="_blank">
                    <img src="phone-icon.png" alt="Phone">
                </a>
                <a href="https://www.facebook.com" target="_blank">
                    <img src="facebook1.png" alt="Facebook">
                </a>
                <a href="https://www.instagram.com" target="_blank">
                    <img src="instagram.png" alt="Instagram">
                </a>
            </div>
        </div>
      
        </div>
        <!-- Add more coordinators as needed -->
    </div>
<br><br><br><br><br><br><br><br>
    <footer>
        <p>Address: Kuttikkanam, Idukki, Kerala</p>
    </footer>
	<script>
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const fullName = document.getElementById('fullName').value;
            const email = document.getElementById('email').value;
            const phone = document.getElementById('phone').value;
            const message = document.getElementById('message').value;

            if (fullName && email && phone && message) {
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'process_contact.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        alert(xhr.responseText);
                        document.getElementById('contactForm').reset();
                    }
                };
                xhr.send(`fullName=${fullName}&email=${email}&phone=${phone}&message=${message}`);
            } else {
                alert("Please fill in all fields correctly.");
            }
        });
    </script>
</body>
</html>