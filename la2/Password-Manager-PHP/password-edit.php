<?php 
include 'connect.php';
session_start();
ob_start();

$save = $database->prepare("SELECT * FROM passwords WHERE id = :id");
$save->execute(array('id' => $_GET['id']));

$show = $save->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Password</title>
    <link rel="icon" href="icon.png">
    <style>
        /* Body styling */
        body {
            background-color: #f3f4f6; /* Light background color */
            font-family: 'Arial', sans-serif; /* Font family for text */
        }
        
        /* Container that holds the form */
        .container {
            max-width: 500px; /* Maximum width of the container */
            margin: 50px auto; /* Centers the container and adds margin from the top */
            background-color: #fff; /* White background for the container */
            padding: 30px; /* Padding inside the container */
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1); /* Adds shadow to the container */
            border-radius: 10px; /* Rounded corners for the container */
        }

        /* Heading styles */
        h1 {
            font-size: 1.8em; /* Font size for the heading */
            margin-bottom: 20px; /* Margin below the heading */
            color: #343a40; /* Dark color for the heading */
            text-align: center; /* Centers the heading */
        }

        /* Label styling for form fields */
        .form-group label {
            font-weight: bold; /* Makes the label text bold */
            color: #495057; /* Dark gray color for the labels */
        }

        /* Input field styling */
        .form-control {
            border-radius: 8px; /* Rounded corners for input fields */
            font-size: 1.1em; /* Slightly larger font size for better readability */
            padding: 10px; /* Padding inside input fields */
            border: 1px solid #ced4da; /* Light border color for the input fields */
        }

        /* Button styles */
        .btn {
            padding: 10px; /* Padding inside the button */
            font-size: 1.1em; /* Font size for the button text */
            border-radius: 8px; /* Rounded corners for the button */
        }

        /* Success button (Save Changes) */
        .btn-success {
            background-color: #28a745; /* Green background color for success */
            border-color: #28a745; /* Same green color for the button border */
        }

        /* Success button hover effect */
        .btn-success:hover {
            background-color: #218838; /* Darker green when hovering */
        }

        /* Back link styling */
        .back-link {
            display: block; /* Makes the link block-level (centered) */
            text-align: center; /* Centers the text */
            margin-top: 15px; /* Margin from the form */
            color: #007bff; /* Blue color for the link */
            font-weight: bold; /* Makes the link bold */
        }

        /* Back link hover effect */
        .back-link:hover {
            color: #0056b3; /* Darker blue when hovering */
            text-decoration: underline; /* Underline the link on hover */
        }

        /* Navbar styles */
        .navbar {
            padding: 0.5rem 1rem; /* Padding for the navbar */
            background-color: #343a40; /* Dark background for the navbar */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Shadow effect for the navbar */
        }

        .navbar-brand {
            font-size: 1.5em; /* Larger font size for the brand */
            font-weight: bold; /* Bold font for the brand name */
            color: #fff; /* White color for the brand text */
        }

        .navbar-brand i {
            margin-right: 5px; /* Adds some space between the icon and the text */
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-dark">
        <a href="#" class="navbar-brand"><i class="fas fa-key"></i> Password Manager</a>
    </nav>

    <!-- Container for the form -->
    <div class="container">
        <h1>Edit Password</h1>
        <form action="process.php?id=<?php echo $show['id'] ?>" method="POST">
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" name="password" id="password" class="form-control" value="<?php echo htmlspecialchars($show['password']); ?>" required>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="<?php echo htmlspecialchars($show['name']); ?>" required>
            </div>
            <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
            <button type="submit" name="edit" class="btn btn-success btn-block">Save Changes</button>
        </form>
        <a href="manage.php" class="back-link"><i class="fas fa-arrow-left"></i> Back to Passwords</a>
    </div>
</body>
</html>
