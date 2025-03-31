<?php
// Start the session
session_start();

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the name from the form
    $name = htmlspecialchars(trim($_POST['name']));
    // Store the name in the session
    $_SESSION['name'] = $name;
} else {
    // If no name is submitted, use a default value
    $name = isset($_SESSION['name']) ? $_SESSION['name'] : 'Guest';
}

// Get the current date and time
$currentDateTime = date('Y-m-d H:i:s');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to My PHP Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            text-align: center;
        }
        h1 {
            color: #333;
        }
        form {
            margin-top: 20px;
        }
        input[type="text"] {
            padding: 10px;
            width: 200px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            padding: 10px 15px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #4cae4c;
        }
        footer {
            margin-top: 20px;
            font-size: 0.8em;
            color: #777;
        }
    </style>
</head>
<body>

    <h1>Welcome to My PHP Page!</h1>
    <p>Hello, <?php echo $name; ?>!</p>
    <p>Current Date and Time: <?php echo $currentDateTime; ?></p>

    <form method="POST" action="">
        <input type="text" name="name" placeholder="Enter your name" required>
        <input type="submit" value="Submit">
    </form>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> My PHP Page. All rights reserved.</p>
    </footer>

</body>
</html>
