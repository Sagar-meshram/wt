<?php
session_start();

// Check if the user is already logged in
if (isset($_SESSION["username"])) {
    echo "Welcome back, " . $_SESSION["username"] . "!<br>";
    echo '<a href="logout.php">Logout</a>';
    exit;
}

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Simple authentication (username: JohnDoe, password: 1234)
    if ($username == "vidyadhar" && $password == "1234") {
        $_SESSION["username"] = $username;
        echo "Session started. Username is " . $_SESSION["username"] . "<br>";
        echo '<a href="logout.php">Logout</a>';
    } else {
        echo "Invalid username or password.<br>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post" action="">
        Username: <input type="text" name="username" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
