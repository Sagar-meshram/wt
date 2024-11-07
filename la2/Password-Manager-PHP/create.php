<!DOCTYPE html>
<html lang="en">
<head>
    <title>Password Generator</title>
    <link rel="icon" href="icon.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Custom CSS -->
    <style>
        /* Body styling */
        body {
            background-color: #f8f9fa; /* Light background color */
            font-family: Arial, sans-serif; /* Basic font */
        }

        /* Container for the password section */
        .password-container {
            margin-top: 100px; /* Space from the top */
            text-align: center; /* Center the content */
        }

        /* Password input field styling */
        #password {
            font-size: 1.5em; /* Larger font size for better readability */
            text-align: center;
            background-color: #e9ecef; /* Light gray background */
            border: none;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            width: 100%; /* Full width */
            max-width: 600px; /* Limit the max width */
            padding: 10px;
            margin-bottom: 20px; /* Space below input */
        }

        /* Button styling */
        #create, #copy {
            font-size: 1.1em; /* Slightly larger font for buttons */
            padding: 10px 20px; /* Padding inside the button */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            transition: background-color 0.3s; /* Smooth background color change on hover */
        }

        /* Hover effect for buttons */
        #create:hover, #copy:hover {
            background-color: #218838; /* Green color on hover */
        }
    </style>
</head>
<body>

    <!-- Navigation Bar (Simplified without Bootstrap) -->
    <div style="background-color: #343a40; padding: 15px; text-align: center; color: white;">
        <i class="fas fa-key"></i> Password Generator
    </div>

    <!-- Main Container for Password Generation -->
    <div class="password-container">
        <div>
            <!-- Password Input Field (Read-Only) -->
            <input type="text" id="password" placeholder="Click 'Generate' to create a password..." readonly>

            <!-- Button to Generate Password -->
            <button id="create" onclick="create()">Generate Password</button>

            <!-- Button to Copy Password -->
            <button id="copy" onclick="copyPassword()">Copy Password</button>
        </div>
    </div>

    <!-- JavaScript for Password Generation and Copying -->
    <script>
        // Function to generate a random password
        function create() {
            const length = 12; // Length of the generated password
            const charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+"; // Characters allowed in the password
            let password = ""; // Initialize an empty string for the password

            // Loop to generate each character of the password
            for (let i = 0; i < length; i++) {
                const randomIndex = Math.floor(Math.random() * charset.length); // Get a random index
                password += charset[randomIndex]; // Add the character at that index to the password
            }

            // Set the generated password in the input field
            document.getElementById("password").value = password;
        }

        // Function to copy the password to the clipboard
        function copyPassword() {
            const passwordField = document.getElementById("password");
            passwordField.select(); // Select the text in the input field
            passwordField.setSelectionRange(0, 99999); // For mobile devices, ensure the selection range is large enough

            // Copy the selected text to the clipboard
            document.execCommand("copy");

            // Optional alert to indicate that the password has been copied
            alert("Password copied to clipboard!");
        }
    </script>

</body>
</html>
