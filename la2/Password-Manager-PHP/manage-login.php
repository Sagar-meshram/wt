<?php 
session_start(); // Start session for user authentication
ob_start(); // Start output buffering
if (isset($_SESSION['username'])) { // Check if the user is already logged in
    header("Location: manage.php"); // Redirect to the manage page if logged in
    exit; // Exit the script to prevent further execution
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Password Manager</title>
    <link rel="icon" href="icon.png">
    <style>
        /* Body: Center the content using Flexbox */
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Full viewport height */
            margin: 0;
        }

        /* Login container: White background, rounded corners, and box shadow */
        .login-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); /* Subtle shadow effect */
            padding: 30px;
            width: 100%;
            max-width: 400px; /* Max width of the login form */
        }

        /* Header: Centered title with margin */
        .login-container h1 {
            margin-bottom: 30px;
            font-size: 2rem;
            color: #343a40;
            text-align: center;
        }

        /* Input fields: Full-width and styled with padding and border-radius */
        .form-group {
            margin-bottom: 15px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px; /* Rounded corners */
            font-size: 1rem;
        }

        /* Button: Full-width with a green background and hover effect */
        .btn {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 8px; /* Rounded corners */
            font-size: 1rem;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #218838; /* Darker green on hover */
        }

        /* Error message: Red color for wrong username or password */
        .error-message {
            color: #e74c3c; /* Red for error */
            margin-top: 20px;
            text-align: center; /* Center align the error message */
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h1>Login</h1>
        <!-- Login form -->
        <form action="process.php" method="POST">
            <div class="form-group">
                <input type="text" name="username" required placeholder="Username">
            </div>
            <div class="form-group">
                <input type="password" name="password" required placeholder="Password">
            </div>
            <button class="btn" name="login">Login</button>
            
            <!-- Display error message if login fails -->
            <?php 
                if (isset($_GET["login"]) && $_GET["login"] == "error") { ?>
                    <div class="error-message">Wrong Username or Password</div>
            <?php } ?>
        </form>
    </div>

</body>
</html>
