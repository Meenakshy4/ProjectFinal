<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Sahya Marian Fest 2024-2025</title>
    <style>
        /* Reset and Base Styles */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #e0f7fa;
            background-image: url('blue1.png');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            position: relative;
            padding-bottom: 60px; /* Space for the fixed footer */
        }

        /* Header Styles */
        header {
            text-align: center;
            padding: 20px;
            background-color: #007bb5;
            color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        header h2 {
            margin: 0;
            font-size: 2em;
            letter-spacing: 1px;
        }

        /* Reduced-Size YouTube Video */
        .video-container {
            position: relative;
            padding-bottom: 28.125%; /* 16:9 Aspect Ratio, but reduced by half */
            height: 0;
            overflow: hidden;
            max-width: 100%; /* Reduced to half width */
            margin: 0 auto; /* Center the video */
            background-color: #000;
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }

        /* Interactive Box Styles */
        .interactive-box {
            margin: 30px auto;
            padding: 30px;
            max-width: 800px;
            background: rgba(255, 255, 255, 0.3); /* Transparent background */
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            text-align: center;
            color: #333;
        }

        .interactive-box h2 {
            font-size: 1.8em;
            color: #0288d1;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            margin-bottom: 20px;
        }

        .interactive-box p {
            font-size: 1.1em;
            color: #333;
            line-height: 1.6;
            text-align: justify;
        }

        /* Social Media Section Styles */
        .social-media {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }

        .social-media a {
            margin: 0 10px;
            animation: bounce 2s infinite; /* Continuous bouncing */
        }

        .social-media img {
            width: 40px;
            height: 40px;
        }

        /* Bouncing Animation */
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-20px);
            }
            60% {
                transform: translateY(-10px);
            }
        }

        /* Map Iframe Styles */
        .map-container {
            display: block;
            margin: 40px auto;
            width: 80%;
            max-width: 800px;
            height: 300px;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .map-container iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        /* Footer Styles */
        footer {
            background-color: #007bb5;
            color: #ffffff;
            text-align: center;
            padding: 15px 10px;
            width: 100%;
            position: fixed;
            bottom: 0;
            left: 0;
            box-shadow: 0 -4px 6px rgba(0, 0, 0, 0.1);
            font-size: 0.9em;
        }

        footer p {
            margin: 0;
        }

        /* Responsive Design */
        @media (max-width: 600px) {
            .social-media {
                flex-direction: column;
                align-items: center;
            }

            .map-container {
                width: 95%;
            }

            .video-container {
                max-width: 80%; /* Slightly wider on small screens */
            }
        }
    </style>
</head>
<body>

    <header>
        <h2>Sahya, The Marian Fest 2024-2025</h2>
    </header>

    <!-- Reduced-Size YouTube Video -->
    <div class="video-container">
        <iframe src="https://www.youtube.com/embed/VIDEO_ID" title="Previous Year Sahya Videos" allowfullscreen></iframe>
    </div>

    <div class="interactive-box">
        <h2>Welcome to Marian College</h2>
        <p>Experience the vibrant and dynamic spirit of Marian College through Sahya, our annual fest that celebrates talent, creativity, and community spirit. Join us for an unforgettable experience filled with fun, learning, and excitement!</p>
    </div>

    <div class="social-media">
        <a href="https://facebook.com" target="_blank">
            <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" alt="Facebook">
        </a>
        <a href="https://twitter.com" target="_blank">
            <img src="https://upload.wikimedia.org/wikipedia/commons/6/6f/Logo_of_Twitter.svg" alt="Twitter">
        </a>
        <a href="https://instagram.com" target="_blank">
            <img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png" alt="Instagram">
        </a>
    </div>

    <div class="map-container">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3925.326014002333!2d76.95443217575786!3d9.565488189231953!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b0636f3d6eb56d5%3A0x4c5119570d9e62b3!2sKuttikkanam%2C%20Kerala%20685531!5e0!3m2!1sen!2sin!4v1692884866809!5m2!1sen!2sin"
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>

    <footer>
        <p>&copy; 2024 All Rights Reserved | Marian College | Sahya</p>
    </footer>
    
</body>
</html>
