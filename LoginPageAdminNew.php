
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sahya Login</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <link rel="stylesheet" href="LoginNewCss.css">
    <script src="LoginNewScript.js" defer></script>

    <style>
        .form-box.forgot-password {
            display: none;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar">
            <span class="hamburger-btn material-symbols-rounded">menu</span>
            <a href="#" class="logo">
                <img src="SahyaLogo.png" alt="logo">
                <h2>Sahya</h2>
            </a>
            <ul class="links">
                <span class="close-btn material-symbols-rounded">close</span>
                <li><a href="#">Home</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="#">Schedule</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <button class="login-btn">LOG IN</button>
        </nav>
    </header>

    <div class="blur-bg-overlay"></div>
    <div class="form-popup">
        <span class="close-btn material-symbols-rounded">close</span>
        <div class="form-box login">
            <div class="form-details">
                <h2>Welcome to Sahya</h2>
                <p>Please log in using your credentials to access the Marian Fest system.</p>
            </div>
            <div class="form-content">
                <h2>LOGIN</h2>
                <form id="loginForm" method="POST">
                    <div class="input-field">
                        <input type="text" id="username" name="username" required>
                        <label>Username</label>
                    </div>
                    <div class="input-field">
                        <input type="password" id="password" name="password" required>
                        <label>Password</label>
                    </div>
                    <button type="submit">Log In</button>
                </form>
                <div id="formMessage"></div>
                <div class="bottom-link">
                    <a href="#" id="forgotPasswordLink">Forgot Password?</a>
                </div>
                <div class="bottom-link">
                    New user? 
                    <a href="SignInForm.php">Sign up</a>
                </div>
            </div>
        </div>
        <div class="form-box forgot-password">
            <div class="form-details">
                <h2>Reset Password</h2>
                <p>Enter your username and new password to reset.</p>
            </div>
            <div class="form-content">
                <h2>RESET PASSWORD</h2>
                <form id="forgotPasswordForm" method="POST">
                    <div class="input-field">
                        <input type="text" id="resetUsername" name="resetUsername" required>
                        <label>Username</label>
                    </div>
                    <div class="input-field">
                        <input type="password" id="newPassword" name="newPassword" required>
                        <label>New Password</label>
                    </div>
                    <button type="submit">Reset Password</button>
                </form>
                <div id="resetFormMessage"></div>
                <div class="bottom-link">
                    <a href="#" id="backToLoginLink">Back to Login</a>
                </div>
            </div>
        </div>
    </div>

    <main class="hero-section">
    <div class="hero-content">
        <h1>Welcome to Sahya</h1>
        <p>Experience the Marian Fest like never before</p>
        <button class="cta-button" onclick="window.location.href='AboutInstitution.php'">Learn More</button>
    </div>
    </main>
    <footer>
        <p>&copy; 2024 Sahya Marian Fest. All rights reserved.</p>
    </footer>

    <script>
        // JavaScript for handling the Learn More button click
        function showAbout() {
            var aboutSection = document.getElementById('aboutSection');
            if (aboutSection.style.display === 'none' || aboutSection.style.display === '') {
                aboutSection.style.display = 'block';
            } else {
                aboutSection.style.display = 'none';
            }
        }

        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault();
            
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'LoginPageValidation.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            
            xhr.onload = function() {
                if (xhr.status === 200) {
                    try {
                        var response = JSON.parse(xhr.responseText);
                        document.getElementById('formMessage').textContent = response.message;
                        if (response.success) {
                            if (response.redirect) {
                                window.location.href = response.redirect;
                            } else {
                                window.location.href = 'Homepage.php';
                            }
                        }
                    } catch (e) {
                        console.error('Invalid JSON:', xhr.responseText);
                        document.getElementById('formMessage').textContent = 'An error occurred during the login process.';
                    }
                } else {
                    document.getElementById('formMessage').textContent = 'An error occurred during the login process.';
                }
            };

            xhr.onerror = function() {
                document.getElementById('formMessage').textContent = 'A network error occurred during the login process.';
            };

            var params = 'username=' + encodeURIComponent(username) + '&password=' + encodeURIComponent(password);
            xhr.send(params);
        });

        document.getElementById('forgotPasswordLink').addEventListener('click', function(event) {
            event.preventDefault();
            document.querySelector('.form-box.login').style.display = 'none';
            document.querySelector('.form-box.forgot-password').style.display = 'block';
        });

        document.getElementById('backToLoginLink').addEventListener('click', function(event) {
            event.preventDefault();
            document.querySelector('.form-box.forgot-password').style.display = 'none';
            document.querySelector('.form-box.login').style.display = 'block';
        });

        document.getElementById('forgotPasswordForm').addEventListener('submit', function(event) {
            event.preventDefault();
            
            var username = document.getElementById('resetUsername').value;
            var newPassword = document.getElementById('newPassword').value;

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'ResetPassword.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            
            xhr.onload = function() {
                if (xhr.status === 200) {
                    try {
                        var response = JSON.parse(xhr.responseText);
                        document.getElementById('resetFormMessage').textContent = response.message;
                        if (response.success) {
                            setTimeout(function() {
                                document.querySelector('.form-box.forgot-password').style.display = 'none';
                                document.querySelector('.form-box.login').style.display = 'block';
                            }, 2000);
                        }
                    } catch (e) {
                        console.error('Invalid JSON:', xhr.responseText);
                        document.getElementById('resetFormMessage').textContent = 'An error occurred during the password reset process.';
                    }
                } else {
                    document.getElementById('resetFormMessage').textContent = 'An error occurred during the password reset process.';
                }
            };

            xhr.onerror = function() {
                document.getElementById('resetFormMessage').textContent = 'A network error occurred during the password reset process.';
            };

            var params = 'username=' + encodeURIComponent(username) + '&newPassword=' + encodeURIComponent(newPassword);
            xhr.send(params);
        });

    </script>
</body>
</html>