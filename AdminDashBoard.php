
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sahya Admin Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    background-color: #f4f4f9;
    color: #333;
}

.container {
    width: 90%;
    margin: 20px auto;
}

header {
    background-color: #006d77;
    color: #fff;
    padding: 20px;
    text-align: center;
    border-radius: 8px;
    box-shadow: 0px 5px 8px rgba(0, 0, 0, 0.1);
}

h1 {
    font-size: 28px;
    font-weight: bold;
}

.dashboard {
    margin-top: 20px;
    display: grid;
    grid-template-columns: 1fr;
    grid-gap: 20px;
}

.participant-stats {
    grid-column: 1 / -1;
    background-color: #264653;
    color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.dashboard-boxes {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    grid-gap: 20px;
}

.box {
    padding: 20px;
    border-radius: 10px;
    color: #fff;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s, background-color 0.3s;
}

.box:hover {
    transform: translateY(-5px);
    background-color: #333;
    color: #fff;
}

.department-management {
    background-color: #2a9d8f;
}

.sponsorship-management {
    background-color: #e76f51;
}

h2 {
    font-size: 22px;
    margin-bottom: 15px;
}

p {
    margin-bottom: 20px;
    font-size: 16px;
}

button {
    padding: 10px 15px;
    background-color: #fff;
    color: #333;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
    transition: background-color 0.3s, color 0.3s;
}

button:hover {
    background-color: #006d77;
    color: #fff;
}

#participantChart {
    width: 60%;
    height: 250px;
    margin: 0 auto; /* Center the chart */
}

@media (max-width: 768px) {
    .dashboard-boxes {
        grid-template-columns: 1fr;
    }
}
</style>
<body>
    <div class="container">
        <header>
            <h1>Admin Dashboard - Sahya Fest</h1>
        </header>

        <section class="dashboard">
            <!-- Participant Statistics Box (Full Width) -->
            <div class="participant-stats">
                <h2>Participant Statistics</h2>
                <canvas id="participantChart"></canvas>
            </div>

            <!-- Dashboard Boxes (Two smaller boxes under the graph) -->
            <div class="dashboard-boxes">
               
                <!-- Department Management Box -->
<div class="box department-management">
    <h2>Department Management</h2>
    <p>Manage departments, approve sign-ups, assign roles, and more.</p>
    <button class="view-details" onclick="window.location.href='AdminDashBoardDepartment.php'">View Details</button>
</div>


                <!-- Sponsorship Management Box -->
                <div class="box sponsorship-management">
                    <h2>Sponsorship Management</h2>
                    <p>Manage sponsorships, add/edit/delete sponsorships, and upload sponsor images.</p>
                    <button class="view-details">View Details</button>
                </div>
            </div>
        </section>
    </div>

    <script>
        // Chart.js for Participant Statistics
        const ctx = document.getElementById('participantChart').getContext('2d');
        const participantChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['BCA', 'BBA', 'MCOM', 'MCA'], // Departments
                datasets: [{
                    label: 'Participants',
                    data: [120, 90, 60, 150], // Number of participants for each department
                    backgroundColor: [
                        '#1d3557',
                        '#457b9d',
                        '#a8dadc',
                        '#e63946'
                    ],
                    borderColor: [
                        '#1d3557',
                        '#457b9d',
                        '#a8dadc',
                        '#e63946'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>