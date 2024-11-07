<?php 
session_start();
ob_start();

// Unset session variables and destroy session
unset($_SESSION['username']); 
session_destroy(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logged Out - Password Manager</title>
    <link rel="icon" href="icon.png">
    <style>
        body {
            display: flex; /* Aligns the content using flexbox */
            justify-content: center; /* Centers the content horizontally */
            align-items: center; /* Centers the content vertically */
            height: 100vh; /* Sets the height to fill the entire viewport */
            background-color: #f8f9fa; /* Light background color */
            margin: 0; /* Removes the default margin */
            font-family: Arial, sans-serif; /* Sets the font for the page */
        }
        
        .logout-message {
            text-align: center; /* Centers the text within this container */
        }

        .logout-message h1 {
            font-size: 2.5rem; /* Increases the font size for the heading */
            color: #343a40; /* Sets the color of the heading to a dark gray */
        }

        .logout-message p {
            font-size: 1.2rem; /* Sets the font size of the paragraph */
            color: #6c757d; /* Light gray color for the paragraph text */
        }

        .logout-message a {
            margin-top: 20px; /* Adds space above the link */
            text-decoration: none; /* Removes the underline from the link */
            padding: 10px 20px; /* Adds padding inside the button */
            background-color: #007bff; /* Blue background color for the button */
            color: white; /* White text for the button */
            border-radius: 5px; /* Rounds the corners of the button */
            transition: background-color 0.3s; /* Smooth transition when background color changes */
        }

        .logout-message a:hover {
            background-color: #0056b3; /* Darker blue when hovering over the button */
        }
    </style>
</head>
<body>
    <div class="logout-message">
        <h1>You have successfully logged out</h1>
        <p>Thank you for using the Password Manager. See you again soon!</p>
        <a href="index.php">Back to Login</a>
    </div>
</body>
</html>
