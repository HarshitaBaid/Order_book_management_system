<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>

<h2>ObooK - Order Book Management System</h2>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form method="post" action="./SignupForm.php" onsubmit='return validateForm()'>
			<h1>Create Account</h1>
			<input type="text" placeholder="Username" name="username" id="username" required/>
            <input type="text" placeholder="Company Name" name="company_name" id="company_name" required/>
			<input type="text" placeholder="Address" name="address" id="address" required/>
			<input type="email" placeholder="Email" name="email" id="email" required/>
            <input type="tel" placeholder="Phone" name="phone" id="phone" required/>
			<input type="password" placeholder="Password" name="password" id="password" required/>
			<input type="submit" value="submit" class="button1">
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form method="post" id="signInForm">
			<h1>Sign in</h1>
			<input type="email" placeholder="Email" name="email">
			<input type="password" placeholder="Password" name="password">
			<a href="#" onclick="openRecoveryPopup()">Forgot your password?</a>
			<input type="submit" value="Sign In" id="signInButton" class="button1">
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>

<!-- Password Recovery Popup -->
<div class="popup" id="recoveryPopup" style="display:none;">
<div class="popup-content">
    <form method="post" onsubmit="return validateRecoveryForm()">
        <h1>Password Recovery</h1>
        <input type="text" placeholder="Username" name="recovery_username" required/>
        <input type="email" placeholder="Email" name="recovery_email" required/>
        <input type="password" placeholder="New Password" name="new_password" required/>
        <input type="password" placeholder="Confirm Password" name="confirm_password" required/>
        <input type="submit" value="Submit">
        <a href="#" onclick="closeRecoveryPopup()">Cancel</a>
    </form>
	</div>
</div>

<script type="module" src="../College_project/login.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
		// Function to disable going back to the login page
        function disableBackToLogin() {
            window.history.pushState(null, '', window.location.href);
            window.onpopstate = function (event) {
                window.history.go(1);
            };
        }
        // Attach the AJAX submission to the button click
        $('#signInButton').click(function () {
            var formData = $('#signInForm').serialize();
            
            $.ajax({
                type: 'POST',
                url: 'SigninForm.php',
                data: formData,
                success: function (response) {
                    // Handle successful sign-in
                    console.log('Sign-in successful');
					if(response==2){
						alert("Please fill both email and password.");
					}
					else if(response==0){
						alert("Please fill correct information.");
					}
					else{
						window.location.href="./Dashboard.php";
					}
                    // You can redirect or perform other actions based on the response
                },
                error: function (error) {
                    // Handle errors
                    console.log('Sign-in failed');
                    // You can show an error message or perform other actions
                }
            });
        });

		 // Disable going back to the login page on page load
		 window.onload = function () {
            disableBackToLogin();
        };
    </script>

<script>
    function validateForm() {
		console.log("fkjug");
        var username = document.getElementById("username").value;
        var company_name = document.getElementById("company_name").value;
        var address = document.getElementById("address").value;
        var email = document.getElementById("email").value;
        var phone = document.getElementById("phone").value;
        var password = document.getElementById("password").value;

		if (!isValidUsername(username)) {
            alert("Username should only contain letters.");
            return false;
        }
        else if (!isValidEmail(email)) {
            alert("Please enter a valid email address.");
            return false;
        }

        else if (!isValidPhoneNumber(phone)) {
            alert("Please enter a valid phone number.");
            return false;
        }

        return true; // If all validations pass
    }

    function isValidEmail(email) {
        // Add your email validation logic here
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    function isValidPhoneNumber(phone) {
        // Add your phone number validation logic here
        return /^\d{10}$/.test(phone);
    }

	function isValidUsername(username) {
        // Allow letters and spaces in the username
        return /^[a-zA-Z\s]+$/.test(username);
    }
</script>

<script>
    // Function to open password recovery popup
    function openRecoveryPopup() {
        document.getElementById('recoveryPopup').style.display = 'block';
    }

    // Function to close password recovery popup
    function closeRecoveryPopup() {
        document.getElementById('recoveryPopup').style.display = 'none';
    }

    // Validate username format
    function isValidUsername(recoveryUsername) {
        // Allow letters and spaces in the username
        return /^[a-zA-Z\s]+$/.test(recoveryUsername);
    }

    // Validate password recovery form
    function validateRecoveryForm() {
        var recoveryUsername = document.getElementsByName("recovery_username")[0].value;
        var recoveryEmail = document.getElementsByName("recovery_email")[0].value;
        var newPassword = document.getElementsByName("new_password")[0].value;
        var confirmPassword = document.getElementsByName("confirm_password")[0].value;

        // Validate username
        if (!isValidUsername(recoveryUsername)) {
            alert("Username should only contain letters.");
            return false;
        }

        // Validate other fields as needed

        // Check if passwords match
        if (newPassword !== confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }

        // AJAX submission
        $.ajax({
            type: 'POST',
            url: './forgotpass.php', // Replace with your server-side script
            data: {
                username: recoveryUsername,
                email: recoveryEmail,
                password: newPassword,
            },
            success: function (response) {
                // Handle the response from the server
                if (response) {
                    console.log("hi");
                    alert("Password updated successfully."); // You can customize this based on your server's response
                    closeRecoveryPopup();
                } else {
                    alert("Password not updated successfully.");
                }
            },
            error: function (error) {
                // Handle errors
                console.log('Recovery form submission failed');
                console.log(error);
            }
        });

        return false; // Prevent form submission
    }
</script>

</body>
</html>