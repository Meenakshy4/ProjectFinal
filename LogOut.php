<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout Page</title>
    <link rel="stylesheet" href="LogOut.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="#" onclick="goBack()">Back</a></li>
                <li><a href="Homepage.php">Home</a></li>
                <li><a href="dashboard.html">Dashboard</a></li>
                <li><a href="profile.html">Profile</a></li>
                <li><a href="settings.html">Settings</a></li>
            </ul>
        </nav>
    </header>

    <main class="container">
    <div class="box">
        <h1>Are you sure you want to log out?</h1>
        <!--<p>Are you sure you want to log out?</p>-->
        <a href="#" class="btn" onclick="logout()">Logout</a>
        <a href="Homepage.php" class="btn">Cancel</a>
    </div>
    </main>

    <footer>
        <div class="container">
            <nav>
                <ul>
                    <li><a href="support.html">Support</a></li>
                    <li><a href="privacy.html">Privacy Policy</a></li>
                </ul>
            </nav>
            <p>&copy; 2024 Your Company. All rights reserved.</p>
        </div>
    </footer>

    <script>
        function goBack() {
            window.history.back();
        }

        function logout() {
            // Implement your logout logic here
            alert("You have been logged out successfully!");
            // Redirect to login page or home page after logout
            window.location.href = "LoginPageHome.php";
        }
    </script>
</body>

</html>
