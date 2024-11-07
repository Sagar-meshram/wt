<?php 
try {
    // Database connection
    $database = new PDO("mysql:host=localhost;dbname=password_manager;charset=utf8", 'root', '');

    // Set the PDO error mode to exception
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    // Handle connection error
    echo "Connection failed: " . $e->getMessage();
    exit; // Stop script execution
}
?>
