<?php
// Create a connection to the MySQL database
$conn = new mysqli("localhost", "root", "", "test_db");

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert SQL query
$sql = "INSERT INTO users (name, email) VALUES ('John', 'john@example.com')";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Insert Example</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 400px;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }
        .message {
            font-size: 18px;
            padding: 10px;
            border-radius: 5px;
            margin-top: 15px;
        }
        .success {
            background-color: #4caf50;
            color: white;
        }
        .error {
            background-color: #f44336;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Database Insertion</h1>

    <?php
    // Run the query and check if it was successful
    if ($conn->query($sql) === TRUE) {
        echo "<div class='message success'>New record created successfully!</div>";
    } else {
        echo "<div class='message error'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }

    // Close the database connection
    $conn->close();
    ?>
</div>

</body>
</html>
