<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignIn - Sahya</title>
    <link rel="stylesheet" href="signInTrailCSS.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <a href="#" class="logo">
                <img src="SahyaLogo.png" alt="logo">
                <h2>Sahya</h2>
            </a>
        </nav>
    </header>

    <div class="form-container">
        <div class="form-box">
            <div class="form-content">
            <h2>Sign In</h2>
            <form id="signupForm" method="POST" action="SignUpDatabaseEntry.php">
            <div class="input-field">
                <input type="text" id="full_name" name="full_name" placeholder=" "required>
                <label for="full_name">Full Name:</label>
                <span id="full_nameError" class="error"></span>
            </div>

            <div class="input-field">
                <input type="text" id="username" name="username" placeholder=" "required>
                <label for="username">Username:</label>
                <span id="usernameError" class="error"></span>
            </div>

            <div class="input-field">
                <input type="email" id="email" name="email" placeholder=" "required>
                <label for="email">Email Address:</label>
                <span id="emailError" class="error"></span>
            </div>

            <div class="input-field">
                <input type="password" id="password" name="password" placeholder=" "required>
                <label for="password">Password:</label>
                <span id="passwordError" class="error"></span>
            </div>

            <div class="input-field">
                <input type="password" id="confirm_password" name="confirm_password" placeholder=" "required>
                <label for="confirm_password">Confirm Password:</label>
                <span id="confirm_passwordError" class="error"></span>
            </div>

            <div class="input-field">
                <input type="text" id="phone_number" name="phone_number" placeholder=" "required>
                <label for="phone_number">Phone Number:</label>
                <span id="phone_numberError" class="error"></span>
            </div>

            <div class="input-field">
                <select id="role" name="role" required>
                <option value="" disabled selected>Select Role</option>
                    <option value="admin">Admin</option>
                    <option value="departmentHead">Department Head</option>
                </select>
                <span id="roleError" class="error"></span>
            </div>

            <div class="input-field" id="departmentGroup" style="display: none;">
            <select id="department" name="department">
            <option value="" disabled selected>Select Department</option>
                <option value="1">BCA</option>
                <option value="2">BBA</option>
                <option value="3">MCA</option>
                <option value="4">MCOM</option>
            </select>
            </div>
            <span id="departmentError" class="error"></span>
            </div>

            <button type="submit">Sign In</button>
            <span id="formMessage" class="message"></span>
            </form>
            <div id="approvalMessage" class="approval-message"></div>
            <div class="bottom-link">
                    Already have an account? 
                    <a href="LoginPageAdminNew.php">Log in</a>
            </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const roleSelect = document.getElementById('role');
        const departmentGroup = document.getElementById('departmentGroup');

        roleSelect.addEventListener('change', function() {
            if (this.value === 'departmentHead') {
                departmentGroup.style.display = 'block';
            } else {
                departmentGroup.style.display = 'none';
            }
        });
    });

    const fieldsToValidate = ['username', 'password', 'confirm_password', 'email', 'phone_number', 'role', 'department'];

    fieldsToValidate.forEach(field => {
        document.getElementById(field).addEventListener('input', function(event) {
            validateField(event.target);
        });
    });


    function validateField(field) {
        const fieldId = field.id;
        const errorElement = document.getElementById(`${fieldId}Error`);
        if (errorElement) {
            errorElement.textContent = 'Error message';
        } else {
        console.error(`Element with ID "${fieldId}Error" not found.`);
        }
        let valid = true;

        switch (fieldId) {
            case 'username':
                if (field.value.length < 3 || field.value.length > 15) {
                    errorElement.textContent = 'Username must be between 3 and 15 characters.';
                    valid = false;
                } else {
                    checkUsernameAvailability(field.value, errorElement);
                }
                break;

            case 'password':
                const password = field.value;
                const confirmPassword = document.getElementById('confirm_password').value;
                if (password.length < 8 || !/[A-Z]/.test(password) || !/[a-z]/.test(password) || !/\d/.test(password) || !/[!@#$%^&*]/.test(password)) {
                    errorElement.textContent = 'Password must be at least 8 characters long and include uppercase, lowercase, number, and special character.';
                    valid = false;
                } else {
                    errorElement.textContent = '';
                }
                break;

            case 'confirm_password':
                const originalPassword = document.getElementById('password').value;
                if (field.value !== originalPassword) {
                    errorElement.textContent = 'Passwords do not match.';
                    valid = false;
                } else {
                    errorElement.textContent = '';
                }
                break;

            case 'email':
                if (!/\S+@\S+\.\S+/.test(field.value)) {
                    errorElement.textContent = 'Invalid email format.';
                    valid = false;
                } else {
                    errorElement.textContent = '';
                }
                break;

            case 'phone_number':
                if (!/^\d{10}$/.test(field.value)) {
                    errorElement.textContent = 'Invalid phone number format.';
                    valid = false;
                } else {
                    errorElement.textContent = '';
                }
                break;

            case 'role':
                if (field.value === '') {
                    errorElement.textContent = 'Role is required.';
                    valid = false;
                } else {
                    errorElement.textContent = '';
                }
                break;

            case 'department':
                if (roleSelect.value === 'departmentHead' && field.value === '') {
                    errorElement.textContent = 'Department is required for Department Heads.';
                    valid = false;
                } else {
                    errorElement.textContent = '';
                }
                break;

            default:
                break;
        }
        return valid;
    }


    document.getElementById('signupForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(this);

        // Remove department if role is not department_head
        if (formData.get('role') !== 'department_head') {
        formData.delete('department');
        }

        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'SignUpDatabaseEntry.php', true);

        xhr.onload = function() {
            if (xhr.status === 200) {
            try{
                const response = JSON.parse(xhr.responseText);
                if (response.success) {
                    alert(response.message);
                    document.getElementById('approvalMessage').textContent = response.message;
                    document.getElementById('signupForm').reset();
                } else {
                    // Display server-side validation errors
                    document.getElementById('usernameError').textContent = response.usernameError || '';
                    document.getElementById('passwordError').textContent = response.passwordError || '';
                    document.getElementById('confirmPasswordError').textContent = response.confirmPasswordError || '';
                    document.getElementById('emailError').textContent = response.emailError || '';
                    document.getElementById('phoneNumberError').textContent = response.phoneNumberError || '';
                    document.getElementById('roleError').textContent = response.roleError || '';
                    document.getElementById('departmentError').textContent = response.departmentError || '';
                }
            }catch(e){
                console.error("Error parsing JSON response:", e);
                alert("An error occurred during signup. Please try again.");
            }
        }
    };
        xhr.send(formData);
    });

    
    function checkUsernameAvailability(username, errorElement) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'UsernameValidation.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status === 200) {
                console.log(xhr.responseText);
                    //const response = JSON.parse(xhr.responseText);
                    if (xhr.responseText ==="username exists" ) {
                        errorElement.textContent = 'Username is already taken.';
                    } else {
                        errorElement.textContent = '';
                    }
            }
        };
        xhr.send('checkUsername=true&username=' + encodeURIComponent(username));
    }
</script>
</body>
</html>

