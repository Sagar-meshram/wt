<?php 
include 'connect.php'; // Include database connection
session_start(); // Start session for user authentication
ob_start(); // Start output buffering

// Query to fetch passwords for the logged-in user, ordered by ID in descending order
$save = $database->prepare("SELECT * FROM passwords WHERE user=:user ORDER BY id DESC");
$save->execute(array('user' => $_SESSION['username'])); // Execute the query with the username session variable
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Panel - Password Manager</title>
    <link rel="icon" href="icon.png">
    <style>
        /* Body: Set background color and basic styles */
        body {
            background-color: #f4f4f9;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Container: Centers the content with max-width */
        .container {
            margin: 50px auto;
            width: 90%;
            max-width: 1200px;
        }

        /* Heading: Centered title for managing passwords */
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Table styling: Full-width table with padding and borders */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        /* Table header: Dark background with white text */
        th {
            background-color: #343a40;
            color: white;
        }

        /* Action buttons: Styled links for Edit and Delete */
        .action-btns a {
            padding: 6px 12px;
            margin-right: 10px;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn-primary {
            background-color: #007bff;
            color: white;
        }
        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        /* Button hover effect */
        .btn-primary:hover, .btn-danger:hover {
            opacity: 0.8;
        }

        /* Form container: For adding new passwords */
        .form-container {
            margin-top: 30px;
        }
        .form-container .card {
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Card shadow effect */
        }

        /* Input fields in the form */
        .form-container input {
            margin-bottom: 10px;
            padding: 8px;
            width: 100%;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        /* Submit button styling */
        .form-container button {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
        }
        
        /* Button hover effect */
        .form-container button:hover {
            opacity: 0.8;
        }

        /* Alert messages: Success or error alerts for different actions */
        .alert {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .alert-success {
            background-color: #28a745;
            color: white;
        }
        .alert-danger {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>
<body>

    <!-- Include navigation bar (if any) -->
    <?php include 'nav.php'; ?>

    <div class="container">
        <!-- Heading: Manage your passwords -->
        <h2>Manage Your Passwords</h2>
        
        <!-- Passwords Table: Displays list of passwords stored in the database -->
        <table>
            <thead>
                <tr>
                    <th>Password</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through each password entry and display in table rows -->
                <?php while ($show = $save->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($show['password']); ?></td>
                    <td><?php echo htmlspecialchars($show['name']); ?></td>
                    <td class="action-btns">
                        <!-- Edit button: Link to edit password -->
                        <a href="password-edit.php?id=<?php echo $show['id']; ?>" class="btn-primary">
                            Edit
                        </a>
                        <!-- Delete button: Link to delete password -->
                        <a href="process.php?delete=ok&id=<?php echo $show['id']; ?>&token=<?php echo $_SESSION['token']; ?>" class="btn-danger">
                            Delete
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Alert messages: Display success or failure messages for actions -->
        <div class="text-center">
            <?php if (isset($_GET['save']) && $_GET['save'] == "success") { ?>
                <div class="alert alert-success">Password Saved Successfully</div>
            <?php } ?>
            <?php if (isset($_GET['deleted']) && $_GET['deleted'] == "ok") { ?>
                <div class="alert alert-success">Password Deleted Successfully</div>
            <?php } ?>
            <?php if (isset($_GET['deleted']) && $_GET['deleted'] == "no") { ?>
                <div class="alert alert-danger">Couldn't Delete Password</div>
            <?php } ?>
            <?php if (isset($_GET['edited']) && $_GET['edited'] == "ok") { ?>
                <div class="alert alert-success">Password Edited Successfully</div>
            <?php } ?>
            <?php if (isset($_GET['edited']) && $_GET['edited'] == "no") { ?>
                <div class="alert alert-danger">Couldn't Edit Password</div>
            <?php } ?>
        </div>

        <!-- Form to add a new password -->
        <div class="form-container">
            <div class="card">
                <h4 class="text-center">Add New Password</h4>
                <form action="process.php" method="POST">
                    <!-- Input fields for password and name -->
                    <input type="text" name="password" id="password" placeholder="Enter a new password" required>
                    <input type="text" name="name" id="name" placeholder="Website URL" required>
                    <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>"> <!-- CSRF Token -->
                    <button type="submit" name="save">Save Password</button>
                </form>
                <!-- Button to generate password -->
                <button id="create" onclick="create()">Generate Password</button>
            </div>
        </div>
    </div>

    <!-- External Script for password generation -->
    <script src="create.js"></script>

</body>
</html>
