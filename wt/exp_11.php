<?php
// Set the cookie (expires in 1 hour)
setcookie("username", "Vidyadhar", time() + 3600, "/");

// Start the HTML output
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie Example</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .cookie-container {
            background-color: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 350px;
        }
        h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }
        p {
            font-size: 18px;
            color: #666;
        }
        .cookie-value {
            background-color: #2575fc;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-top: 15px;
        }
        .refresh-btn {
            background-color: #6a11cb;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            transition: background-color 0.3s;
        }
        .refresh-btn:hover {
            background-color: #2575fc;
        }
    </style>
</head>
<body>
    <div class="cookie-container">
        <h1>Cookie Example</h1>
        <?php
        // Check if the cookie is set and display the value
        if (isset($_COOKIE["username"])) {
            echo "<p>Cookie Value:</p>";
            echo "<div class='cookie-value'>" . $_COOKIE["username"] . "</div>";
        } else {
            echo "<p>Cookie not set. Please refresh the page to set the cookie.</p>";
        }
        ?>
        <button class="refresh-btn" onclick="window.location.reload();">Refresh Page</button>
    </div>
</body>
</html>
