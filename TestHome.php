<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sahya Marian Fest</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Times New Roman', serif;
        }

        body, html {
            height: 100%;
            overflow-x: hidden;
        }

        .hero-section {
            position: relative;
            height: 100vh;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
            overflow: hidden;
        }

        #bg-video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        .hero-content h1 {
            font-size: 3em;
            font-weight: 400;
            transform: translateX(-100%);
            animation: slideIn 1s forwards;
        }

        .hero-content h2 {
            font-size: 14em;
            font-weight: 800;
            margin: 8px 0;
            transform: translateX(100%);
            animation: slideIn 1s forwards 0.5s;
        }

        .hero-content p {
            font-size: 1.9em;
            margin-top: 10px;
            transform: translateX(-100%);
            animation: slideIn 1s forwards 1s;
        }

        @keyframes slideIn {
            to {
                transform: translateX(0);
            }
        }

        .register-now-btn {
            display: inline-block;
            background: linear-gradient(45deg, #f7e1a0, #f4c542, #f8d866);
            color: #4a3b00;
            padding: 15px 30px;
            font-size: 1.6em;
            text-transform: uppercase;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            margin-top: 20px;
            transition: transform 0.3s ease, background-position 0.3s ease, box-shadow 0.3s ease;
            background-size: 200% 200%;
            background-position: 0% 50%;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
        }

        .register-now-btn:hover {
            background-position: 100% 50%;
            color: #4a3b00;
            transform: scale(1.2);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.6);
        }

        .right-side-menu {
            position: fixed;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            display: flex;
            flex-direction: column;
            gap: 15px;
            z-index: 50;
        }

        .right-side-menu a {
            font-size: 1em;
            color: white;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 10px 15px;
            text-align: center;
            border-radius: 10px;
            text-decoration: none;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .right-side-menu a:hover {
            background-color: gold;
            color: black;
        }

        .right-side-menu img {
            width: 24px;
            height: auto;
        }

        .menu-icon {
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            width: 40px;
            height: 40px;
            background-color: #f8d866;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            padding: 10px;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1000;
        }

        .menu-icon:hover {
            background-color: #f4c542;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .menu-icon div {
            width: 100%;
            height: 4px;
            background-color: black;
            transition: background-color 0.3s ease;
        }

        .side-bar {
            position: fixed;
            top: 0;
            right: -250px;
            width: 250px;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            transition: right 0.3s ease;
            z-index: 100;
            display: flex;
            flex-direction: column;
            padding: 20px;
        }

        .side-bar.show {
            right: 0;
        }

        .side-bar .close-btn {
            font-size: 2em;
            color: white;
            align-self: flex-end;
            cursor: pointer;
            margin-bottom: 30px;
        }

        .side-bar .menu-item {
            color: white;
            font-size: 1.2em;
            text-decoration: none;
            margin-bottom: 20px;
            padding: 10px;
            background-color: transparent;
            border: none;
            text-align: left;
            transition: background-color 0.3s ease, color 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .side-bar .menu-item:hover {
            background-color: gold;
            color: black;
        }

        .side-bar img {
            width: 24px;
            height: auto;
        }

        .sahya-logo {
            position: absolute;
            top: 20px;
            left: 80px;
        }

        .sahya-logo img {
            width: 100px;
            height: auto;
        }

        .about-section {
            position: relative;
            height: 800px;
            background-image: url('imgabt1.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .about-content {
            position: relative;
            text-align: center;
            color: white;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            max-width: 850px;
        }

        .about-content h2 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        .about-content p {
            font-size: 1.2em;
        }

        .about-images {
            display: none;
            margin-top: 10px;
        }

        .about-images img {
            width: 100%;
            max-width: 150px;
            margin: 8px;
            border-radius: 8px;
        }

        

       
		* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
}

.event-section {
    position: relative;
    width: 100%;
    height: 130hv;
    overflow: hidden;
}

.background-video {
    position: absolute;
    top: 50%;
    left: 50%;
    min-width: 100%;
    min-height: 100%;
    width: auto;
    height: auto;
    z-index: 1;
    transform: translate(-50%, -50%);
    object-fit: cover;
}

.events-container {
    position: relative;
    z-index: 2;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100%;
    opacity: 0.9; /* Slight transparency */
}

.event {
    display: none; /* Hide events initially */
    background: rgba(255, 255, 255, 0.7); /* Light transparent background */
    padding: 20px;
    margin: 10px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    text-align: center;
    transition: opacity 0.5s ease;
}

.event img {
    max-width: 30%;
    height: auto;
    border-radius: 5px;
}

body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .sponsor-section {
            position: relative;
            width: 100%;
            height: 1200px;
            overflow: hidden;
        }

        /* Background Video */
        .sponsor-section video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        .sponsors-container {
            position: relative;
            z-index: 1;
            padding: 50px 20px;
            text-align: center;
            color: white;
        }

        .sponsors-title {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 40px;
			color:gold;
        }

        .sponsor-box {
            display: inline-block;
            background-color: rgba(255, 255, 255, 0.3);
            border: 2px solid #fff;
            border-radius: 15px;
            padding: 20px;
            margin: 10px;
            width: 250px;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .sponsor-box:hover {
            background-color: rgba(255, 255, 255, 0.6);
            transform: translateY(-10px);
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.3);
        }

        .sponsor-type {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 15px;
            color: #f9d56e;
        }

        .sponsor-box img {
            width: 100%;
            height: 150px;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .sponsor-name {
            font-size: 18px;
            color: white;
        }

        .sponsor-row {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 30px;
        }

        @media only screen and (max-width: 768px) {
            .sponsor-box {
                width: 200px;
            }
        }
		.event h2 {
    font-size: 1.8em;
    color: #333;
    margin-bottom: 15px;
}





.view-events-btn {
    display: inline-block;
    margin-top: 30px;
    padding: 15px 30px;
    font-size: 1.2em;
    text-decoration: none;
    color: #4a3b00;
    background: linear-gradient(45deg, #f7e1a0, #f4c542, #f8d866);
    border-radius: 50px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    text-align: center;
    text-transform: uppercase;
    font-weight: bold;
    letter-spacing: 1px;
}

.view-events-btn:hover {
    transform: scale(1.05);
    box-shadow: 0 5px 15px rgba(248, 216, 102, 0.4);
}
.event h2 {
    font-size: 2.1em;
    color: black;
    margin-bottom: 15px;
}
.event h3 {
    font-size: 2.5em;
    color: gold;
    margin-bottom: 14px;
}
.event p {
    font-size: 1.8em;
    color: #555;
    margin-bottom: 14px;
}

        .scroll-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 50px;
            height: 50px;
            background-color: #f8d866;
            color: #4a3b00;
            border-radius: 50%;
            text-align: center;
            line-height: 50px;
            font-size: 24px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
            z-index: 1000;
            display: none;
        }

        .scroll-to-top:hover {
            background-color: #f4c542;
            transform: scale(1.1);
        }
		
        footer {
            background-color: black;
            color: white;
            padding: 20px 0;
            font-family: Arial, sans-serif;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .footer-address {
            flex: 1;
            max-width: 300px;
        }

        .footer-map {
            flex: 1;
            max-width: 300px;
        }

        .footer-map iframe {
            width: 100%;
            height: 150px;
            border: none;
        }

        .social-media {
            text-align: center;
            margin-top: 20px;
        }

        .social-media img {
            width: 30px;
            height: 30px;
            margin: 0 10px;
        }

        .footer-divider {
            border-top: 1px solid white;
            margin: 20px 0;
        }

        .footer-copyright {
            text-align: center;
            font-size: 14px;
        }

    </style>
</head>
<body>

    <section class="hero-section">
        <video autoplay muted loop id="bg-video">
            <source src="sahyafinalvdo1.mp4" type="video/mp4">
        </video>

        <div class="hero-content">
            <h1>The Marian Fest</h1>
            <h2>Sahya</h2>
            <p>10-14 November 2025</p>
            <br><br><br>
            <a href="Projregistration.php" class="register-now-btn">Register Now</a>
        </div>

        <div class="menu-icon" onclick="toggleSidebar()">
            <div></div>
            <div></div>
            <div></div>
        </div>

        <div class="side-bar" id="sideBar">
            <span class="close-btn" onclick="toggleSidebar()">×</span>
            <a href="LoginPageAdminNew.php" class="menu-item">
                <img src="login.png" alt="Login Icon"> Login
            </a>
            <a href="logout.html" class="menu-item">
                <img src="logout.png" alt="Logout Icon"> Logout
            </a>
            <a href="EventSchedule.php" class="menu-item">
                <img src="eventshedule.png" alt="Event Schedule Icon"> Event Scheduling
            </a>
            <a href="coreteam.php" class="menu-item">
                <img src="coreteam1.png" alt="Core Team Icon"> Core Team
            </a>
            <a href="ContactPage.php" class="menu-item">
                <img src="contactus.jpg" alt="Contact Us Icon"> Contact Us
            </a>
            <a href="Merchandise.php" class="menu-item">
                <img src="merchandise.png" alt="Merchandise Icon"> Merchandise
            </a>
            <a href="map.html" class="menu-item">
                <img src="mapofsahya.png" alt="Map Icon"> Map of Sahya
            </a>
        </div>

        <div class="right-side-menu">
            <a href="EventSchedule.php">
                <img src="eventshedule.png" alt="Event Schedule Icon"> Event Scheduling
            </a>
            <a href="coreteam.php">
                <img src="coreteam1.png" alt="Core Team Icon"> Core Team
            </a>
            <a href="ContactPage.php">
                <img src="contactus.jpg" alt="Contact Us Icon"> Contact Us
            </a>
            <a href="Merchandise.php">
                <img src="merchandise.png" alt="Merchandise Icon"> Merchandise
            </a>
            <a href="map.html">
                <img src="mapofsahya.png" alt="Map Icon"> Map of Sahya
            </a>
        </div>

        <a href="SahyaLogo.png" class="sahya-logo">
            <img src="SahyaLogo.png" alt="Sahya Logo">
        </a>
    </section>

    <section class="about-section" id="about-section">
        <div class="about-content" id="about-content">
            <h2>About Sahya</h2>
            <p id="description">Sahya is an exciting 3-day fest that brings together all departments of our college.
                Each department hosts its own unique events, showcasing talent and fostering competition.
                Sahya is a vibrant and engaging college fest celebrated annually, showcasing a rich blend
                of cultural, educational, and recreational activities. The fest serves as a platform for
                students to exhibit their talents through various events, including competitions, workshops,
                performances, and exhibitions. It typically features activities across multiple disciplines,
                encouraging participation from students of different departments.</p>
            <div class="about-images" id="about-images">
                <img src="news1.png" alt="Image 1">
                <img src="news2.png" alt="Image 2">
                <img src="news3.jpg" alt="Image 3">
                <img src="news4.jpg" alt="Image 4">
            </div>
        </div>
    </section>

 <div class="event-section">
        <video autoplay muted loop class="background-video">
            <source src="eventvdo1.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="events-container">
		<h1 class="events-heading">Sahya Events</h1>
            <div class="event" id="event1">
			<h3>Sahya Events</h3>
                <h2> Webscape - Web Designing</h2>
                <img src="eve1.jpg" alt="Event 1 Image" class="event-image">
                <p>Department: Computer Applications</p>
                <p>Date: On 10th November 2025</p>
            </div>
            <div class="event" id="event2">
			<h3>Sahya Events</h3>
                <h2> Singularity - CTF Hackathon</h2>
                <img src="eve2.jpg" alt="Event 2 Image" class="event-image">
                <p>Department: Computer Applications</p>
                <p>Date: On 11th November 2025</p>
            </div>
            <div class="event" id="event3">
			<h3>Sahya Events</h3>
                <h2> Dhwani - Band War</h2>
                <img src="eve3.jpg" alt="Event 3 Image" class="event-image">
                <p>Department: Music</p>
                <p>Date: On 12th November 2025</p>
            </div>
            <div class="event" id="event4">
			<h3>Sahya Events</h3>
                <h2> AOXO - Game Spot</h2>
                <img src="eve4.jpg" alt="Event 4 Image" class="event-image">
                <p>Department: Computer Applications</p>
                <p>Date: On 13th November 2025</p>
            </div>
			 <a href="eventdetails.php" class="view-events-btn">View Events</a>
        </div>
    </div>
	
	
<!-- Sponsor Section -->
<div class="sponsor-section">
    <video autoplay muted loop>
        <source src="spon1vdo.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <div class="sponsors-container">
        <div class="sponsors-title">Our Sponsors</div>

        <!-- Title Sponsor and Co-Title Sponsor -->
        <div class="sponsor-row">
            <div class="sponsor-box" onclick="window.open('https://r.search.yahoo.com/_ylt=AwrKB2TeYv5m7AEAFwC7HAx.;_ylu=Y29sbwNzZzMEcG9zAzEEdnRpZAMEc2VjA3Ny/RV=2/RE=1729157087/RO=10/RU=https%3a%2f%2fwww.onlinesbi.sbi%2f/RK=2/RS=NQu0uybSXZ03T1RILT8czveTy5E-', '_blank')">
                <div class="sponsor-type">Title Sponsor 2K25</div>
                <img src="spon001.png" alt="Title Sponsor">
                <div class="sponsor-name">State Bank of India</div>
            </div>
            <div class="sponsor-box" onclick="window.open('https://santamonicaedu.in/', '_blank')">
                <div class="sponsor-type">Co-Title Sponsor</div>
                <img src="spon2.jpg" alt="Co-Title Sponsor">
                <div class="sponsor-name">Santa Monica Study Abroad</div>
            </div>
        </div>

        <!-- Partner Sponsors -->
        <div class="sponsor-row">
            <div class="sponsor-box" onclick="window.open('', '_blank')">
                <div class="sponsor-type">Partner Sponsor</div>
                <img src="spon3.png" alt="Partner Sponsor 1">
                <div class="sponsor-name">Etch & Zee</div>
            </div>
            <div class="sponsor-box" onclick="window.open('https://www.partner2.com', '_blank')">
                <div class="sponsor-type">Partner Sponsor</div>
                <img src="spon4.png" alt="Partner Sponsor 2">
                <div class="sponsor-name">INVENTECH</div>
            </div>
            <div class="sponsor-box" onclick="window.open('https://www.partner3.com', '_blank')">
                <div class="sponsor-type">Partner Sponsor</div>
                <img src="spon5.png" alt="Partner Sponsor 3">
                <div class="sponsor-name">SafeExpress</div>
            </div>
        </div>

        <!-- Co-Partners -->
        <div class="sponsor-row">
            <div class="sponsor-box" onclick="window.open('https://www.co-partner1.com', '_blank')">
                <div class="sponsor-type">Co-Partner</div>
                <img src="spon6.png" alt="Co-Partner 1">
                <div class="sponsor-name">Zudio</div>
            </div>
            <div class="sponsor-box" onclick="window.open('https://www.co-partner2.com', '_blank')">
                <div class="sponsor-type">Co-Partner</div>
                <img src="spon7.png" alt="Co-Partner 2">
                <div class="sponsor-name">Spinny</div>
            </div>
        </div>
    </div>
</div>
    
   
<div class="scroll-to-top" id="scrollToTopBtn">↑</div>
<footer>
        <div class="footer-content">
            <div class="footer-address">
                <h3>Marian College Kuttikkanam</h3>
                <p>Kuttikkanam P.O.</p>
                <p>Peermade, Idukki, Kerala</p>
                <p>PIN: 685531</p>
            </div>
            <div class="footer-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3934.3528924203055!2d76.96758731479513!3d9.591168993134587!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b0644c27b12a1af%3A0x4d78e62f8de00c86!2sMarian%20College%20Kuttikkanam!5e0!3m2!1sen!2sin!4v1633504429728!5m2!1sen!2sin" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
        <div class="social-media">
            <a href="https://www.facebook.com/mariancollege" target="_blank"><img src="fb1img.png" alt="Facebook"></a>
            <a href="https://www.instagram.com/mariancollege" target="_blank"><img src="ig1img.png" alt="Instagram"></a>
            <a href="https://www.twitter.com/mariancollege" target="_blank"><img src="tw1img.png" alt="Twitter"></a>
        </div>
        <div class="footer-divider"></div>
        <div class="footer-copyright">
            Sahya &copy; | All rights reserved | 2025
        </div>
    </footer>
    <script>
        function toggleSidebar() {
            var sidebar = document.getElementById('sideBar');
            sidebar.classList.toggle('show');
        }

        // Toggle between description and images
        function toggleAboutContent() {
            var description = document.getElementById('description');
            var images = document.getElementById('about-images');
            setInterval(function() {
                if (description.style.display === 'none') {
                    description.style.display = 'block';
                    images.style.display = 'none';
                } else {
                    description.style.display = 'none';
                    images.style.display = 'flex';
                }
            }, 2000);
        }

               // Scroll to top functionality
        var scrollToTopBtn = document.getElementById("scrollToTopBtn");

        window.onscroll = function() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                scrollToTopBtn.style.display = "block";
            } else {
                scrollToTopBtn.style.display = "none";
            }
        };

        scrollToTopBtn.onclick = function() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        };

        toggleAboutContent();
		
		let currentEvent = 0;
const events = document.querySelectorAll('.event');

function showEvent() {
    // Hide all events
    events.forEach(event => {
        event.style.display = 'none';
    });

    // Show the current event
    events[currentEvent].style.display = 'block';

    // Update currentEvent index
    currentEvent = (currentEvent + 1) % events.length;

    // Set timeout for the next event
    setTimeout(showEvent, 1000);
}

// Start showing events
showEvent();

    </script>

</body>
</html>