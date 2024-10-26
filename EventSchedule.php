<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sahya Events Schedule</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('imgabt.jpg'); /* Background image */
            background-size: cover; /* Cover the entire background */
            background-position: center; /* Center the background image */
        }

        header {
            background-color: black;
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

        #schedule {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
        }

        .day-buttons {
            text-align: center;
            margin-bottom: 20px;
        }

        .day-buttons button {
            background-color: gold;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            margin: 0 5px;
            transition: background-color 0.3s ease;
        }

        .day-buttons button:hover {
            background-color: #003d7a;
        }

        .event {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: box-shadow 0.3s ease;
        }

        .event:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .event .details {
            flex: 1;
        }

        .event .time {
            text-align: right;
        }

        .event h3 {
            margin: 0 0 10px;
        }

        .event p {
            margin: 5px 0;
        }

        .view-location {
            background-color: black;
            color: gold;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            cursor: pointer;
            text-decoration: none;
            font-size: 16px;
        }

        .view-location:hover {
            background-color: #003d7a;
        }

        footer {
            background-color: black;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

    </style>
</head>
<body>
    <header>
        <h1>Sahya Events Schedule - 2025</h1>
    </header>
    
    <main>
        <div class="day-buttons">
            <button onclick="showDay('day1')">Day 1</button>
            <button onclick="showDay('day2')">Day 2</button>
            <button onclick="showDay('day3')">Day 3</button>
        </div>
        
        <section id="schedule">
            <h2>Event Schedule</h2>
            <div class="event day1">
                <div class="details">
                    <h3>Opening Ceremony</h3>
                    <p>Date: August 28, 2025</p>
                    <p>Location: College Main Auditorium</p>
                </div>
                <div class="time">
                    <p>Time: 10:00 AM - 11:00 AM</p><br>
                    <a href="https://maps.google.com/?q=Vattakuzhi+Block" class="view-location" target="_blank">View Location</a>
                </div>
            </div>
            
            <div class="event day1">
                <div class="details">
                    <h3>Event 1</h3>
                    <p>Date: August 28, 2025</p>
                    <p>Location: Vattakuzhi Block</p>
                </div>
                <div class="time">
                    <p>Time: 11:30 PM - 3:00 PM</p><br>
                    <a href="https://maps.google.com/?q=Vattakuzhi+Block" class="view-location" target="_blank">View Location</a>
                </div>
            </div>
            
            <div class="event day2">
                <div class="details">
                    <h3>Event 2</h3>
                    <p>Date: August 31, 2025</p>
                    <p>Location: Vattakuzhi Block</p>
                </div>
                <div class="time">
                    <p>Time: 12:00 PM - 2:00 PM</p><br>
                    <a href="https://maps.google.com/?q=Vattakuzhi+Block" class="view-location" target="_blank">View Location</a>
                </div>
            </div>
     <div class="event day3">
                <div class="details">
                    <h3>Event 6</h3>
                    <p>Date: August 30, 2025</p>
                    <p>Location: Vattakuzhi Block(1)</p>
                </div>
                <div class="time">
                    <p>Time: 12:30 PM - 3:00 PM</p><br>
                    <a href="https://maps.google.com/?q=Vattakuzhi+Block" class="view-location" target="_blank">View Location</a>
                </div>
            </div>
            <!-- Repeat for each event with appropriate day class -->
        </section>
    </main>
    
    <footer>
        <p>&copy; 2025 Sahya Fest</p>
    </footer>
    <script>
        function showDay(day) {
            const events = document.querySelectorAll('.event');
            events.forEach(event => {
                if (event.classList.contains(day)) {
                    event.style.display = 'flex';
                } else {
                    event.style.display = 'none';
                }
            });
        }

        // Show Day 1 events by default
        document.addEventListener('DOMContentLoaded', function () {
            showDay('day1');
        });
    </script>
</body>
</html>
