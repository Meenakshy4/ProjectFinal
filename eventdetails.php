<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Details</title>
    <style>
    /* General Styles */
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f8ff;
        margin: 0;
        padding: 0;
    }

    h1 {
        text-align: center;
        color: #003366;
        margin: 20px 0;
        font-size: 2.5rem;
        font-weight: bold;
        color: #ff69b4;
        text-shadow: 2px 2px #003366;
    }

    .event-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f0f8ff;
    }

    .events-wrapper {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding-bottom: 20px;
    }

    .event-box {
        width: 90%;
        margin: 20px 0;
        padding: 20px;
        background-color: #e3e1f0;
        border-radius: 10px;
        text-align: center;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .event-box:hover {
        transform: scale(1.05);
    }

    .event-box img {
        max-width: 100%;
        height: 150px;
        object-fit: cover;
        border-radius: 8px;
    }

    .event-box h3 {
        color: #003366;
        font-size: 1.8rem;
        margin: 15px 0 10px 0;
        font-weight: bold;
    }

    .event-box p {
        color: #ff69b4;
        font-size: 1.2rem;
        margin: 5px 0;
    }

    /* Scrollbar Styling */
    .events-wrapper::-webkit-scrollbar {
        height: 10px;
    }

    .events-wrapper::-webkit-scrollbar-thumb {
        background: linear-gradient(90deg, #ff69b4, #003366);
        border-radius: 5px;
    }

    .events-wrapper::-webkit-scrollbar-track {
        background: #f0f8ff;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .event-box {
            width: 100%;
        }

        .event-box h3 {
            font-size: 1.5rem;
        }

        .event-box p {
            font-size: 1rem;
        }
    }
	.logo-link {
    display: inline-block;
    position: absolute;
    top: 1px;
    left: 1px;
	
    z-index: 1001;
   transition: transform 0.3s ease;
    }
 .logo-image {
    width: 180px; /* Adjust as needed */
    height: 190px;
    }
	.logo-link:hover {
    transform: scale(1.5);
    }

    </style>
</head>
<body>
<a href="TestHome.php" class="logo-link">
            <img src="SahyaLogo.png" alt="Sahya Logo" class="logo-image">
        </a> 
    <div class="event-container">
        <h1>Event Details</h1>
        <div class="events-wrapper">
            <div class="event-box">
                <img src="eve1.jpg" alt="Event 1">
                <h3>Webscape</h3>
                <p>Department: BCA</p>
                <p>Date: 06/02/2025</p>
            </div>
            <div class="event-box">
                <img src="eve02.jpg" alt="Event 2">
                <h3>Singularity</h3>
                <p>Department: BCA</p>
                <p>Date: 07/02/2025</p>
            </div>
            <div class="event-box">
                <img src="event04.jpg" alt="Event 3">
                <h3>Dhwani</h3>
                <p>Department: BCA</p>
                <p>Date: 08/02/2025</p>
            </div>
            <!-- Repeat event-box structure for all 10 events -->
        </div>
    </div>
</body>
</html>
