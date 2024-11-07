<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="icon.png">
    <title>Password Manager</title>
    <style>
        /* Body: Flexbox for centering content */
        body {
            background-color: #f4f4f9; /* Light background */
            font-family: 'Arial', sans-serif; /* Modern font */
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Full viewport height */
        }

        /* Card: White background with rounded corners and shadow */
        .card {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            text-align: center;
            max-width: 400px;
        }

        /* Hover effect for card: Slight zoom */
        .card:hover {
            transform: scale(1.05);
            transition: transform 0.2s;
        }

        /* Header: Large font size with margin */
        h1 {
            margin-bottom: 30px;
            font-size: 2rem;
            color: #343a40;
        }

        /* Buttons: Fixed width with padding and rounded corners */
        .btn {
            width: 200px;
            padding: 10px;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            cursor: pointer;
            margin: 10px 0;
            transition: background-color 0.3s;
        }

        /* Primary button: Blue background */
        .btn-primary {
            background-color: #007bff;
            color: white;
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }

        /* Success button: Green background */
        .btn-success {
            background-color: #28a745;
            color: white;
        }
        .btn-success:hover {
            background-color: #218838; /* Darker green on hover */
        }

        /* Icon: Space between icon and text */
        .btn i {
            margin-right: 8px;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Password Manager</h1>
        <a href="manage-login.php">
            <button class="btn btn-primary">
                <i class="fas fa-tasks"></i> Manage Password
            </button>
        </a>
        <a href="create.php">
            <button class="btn btn-success">
                <i class="fas fa-key"></i> Create Password
            </button>
        </a>
    </div>
</body>
</html>
