 <!-- <html>
  <head>
  <style>
   /* Coordinators Section Styles */
        .coordinators {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
            margin: 40px 20px;
        }

        .coordinator {
            width: 220px;
            height: 220px;
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background: rgba(255, 255, 255, 0.8);
        }

        .coordinator:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
        }

        .coordinator img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .coordinator:hover img {
            transform: scale(1.1);
        }

        /* Overlay Styles */
        .overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 0;
            background: rgba(48, 25, 52, 0.9);
            color: white;
            overflow: hidden;
            transition: height 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 10px;
            box-sizing: border-box;
        }

        .coordinator:hover .overlay {
            height: 50%; /* Reveal half of the overlay on hover */
        }

        .overlay h3 {
            margin: 5px 0;
            font-size: 1.2em;
        }

        .overlay p {
            margin: 5px 0;
            font-size: 0.9em;
        }

        .social-media {
            display: flex;
            gap: 10px;
            margin-top: 5px;
        }

        .social-media a {
            color: #e0aaff;
            font-size: 1.2em;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .social-media a:hover {
            color: #ffffff;
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
  </style></head>
  <body>
  <div class="coordinators">
        <div class="coordinator">
            <img src="studcor1.png" alt="Student Coordinator 1">
            <div class="overlay">
                <h3>Arunima P.K</h3>
				<p>Event Coordinator</p>
				 <div class="social-media">
                    <a href="https://facebook.com/student1" target="_blank">FB</a>
                    <a href="https://twitter.com/student1" target="_blank">TW</a><br>
                </div>
            </div>
        </div>
        <div class="coordinator">
            <img src="studcor2.png" alt="Student Coordinator 2">
            <div class="overlay">
                <h3>Chris Mathew</h3>
				<p>Technical Coordinator</p>
                <div class="social-media">
                    <a href="https://facebook.com/student2" target="_blank">FB</a>
                    <a href="https://twitter.com/student2" target="_blank">TW</a><br>
                </div>
            </div>
        </div>
        
    </div>
	</body>
	</html>-->
	
	<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Core Team Sahya'25</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-image: url('coretbg.jpg');
            margin: 0;
            padding: 0;
        }

        /* Header Styles */
        header {
            text-align: center;
            padding: 2px;
            background-color: #007bb5;
            color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        header h2 {
            margin: 0;
            font-size: 2em;
            letter-spacing: 1px;
        }

        /* Heading Styles */
        .heading {
            text-align: center;
            margin: 20px 0;
            font-size: 3em;
            color: #003366; /* Dark blue color */
        }

        /* Coordinators Section Styles */
        .coordinators {
            display: flex;
            flex-direction: row;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
            margin: 40px 20px;
        }

        .coordinator {
            width: 300px;
            height: 300px;
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background: rgba(255, 255, 255, 0.8);
        }

        .coordinator:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
        }

        .coordinator img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .coordinator:hover img {
            transform: scale(1.1);
        }

        /* Overlay Styles */
        .overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 0;
            background: rgba(0, 0, 102, 0.9); /* Dark blue background */
            color: white;
            overflow: hidden;
            transition: height 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 10px;
            box-sizing: border-box;
        }

        .coordinator:hover .overlay {
            height: 50%; /* Reveal half of the overlay on hover */
        }

        .overlay h3 {
            margin: 5px 0;
            font-size: 1.2em;
        }

        .overlay p {
            margin: 5px 0;
            font-size: 0.9em;
        }

        .social-media {
            display: flex;
            gap: 10px;
            margin-top: 5px;
        }

        .social-media a {
            color: #add8e6; /* Light blue color */
            font-size: 1.2em;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .social-media a:hover {
            color: #ffffff;
        }

        /* Footer Styles */
        footer {
            background-color: #192841;
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
    </style>
</head>
<body>
    
        <div class="heading">Core Team Sahya'25</div>
 

    <div class="coordinators">
        <div class="coordinator">
            <img src="studcor1.png" alt="Student Coordinator 1">
            <div class="overlay">
                <h3>Arunima P.K</h3>
                <p>Event Coordinator</p>
                <div class="social-media">
                    <a href="https://facebook.com/student1" target="_blank">FB</a>
                    <a href="https://twitter.com/student1" target="_blank">TW</a>
                </div>
            </div>
        </div>
        <div class="coordinator">
            <img src="studcor2.png" alt="Student Coordinator 2">
            <div class="overlay">
                <h3>Chris Mathew</h3>
                <p>Technical Coordinator</p>
                <div class="social-media">
                    <a href="https://facebook.com/student2" target="_blank">FB</a>
                    <a href="https://twitter.com/student2" target="_blank">TW</a>
                </div>
            </div>
        </div>
        <!-- Repeat Coordinator Blocks as needed -->
		 <div class="coordinators">
        <div class="coordinator">
            <img src="studcor1.png" alt="Student Coordinator 1">
            <div class="overlay">
                <h3>Arunima P.K</h3>
                <p>Event Coordinator</p>
                <div class="social-media">
                    <a href="https://facebook.com/student1" target="_blank">FB</a>
                    <a href="https://twitter.com/student1" target="_blank">TW</a>
                </div>
            </div>
        </div>
        <div class="coordinator">
            <img src="studcor2.png" alt="Student Coordinator 2">
            <div class="overlay">
                <h3>Chris Mathew</h3>
                <p>Technical Coordinator</p>
                <div class="social-media">
                    <a href="https://facebook.com/student2" target="_blank">FB</a>
                    <a href="https://twitter.com/student2" target="_blank">TW</a>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 All Rights Reserved | Marian College | Sahya</p>
    </footer>
</body>
</html>
