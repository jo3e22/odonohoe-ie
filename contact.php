<?php
if(!defined('MAIN_INCLUDED'))
    exit(1);
session_start(); // Start the session to use session variables

// Include the database connection details
require_once '../secure_config/config.php';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check the CSRF token
    if (!hash_equals($_SESSION['token'], $_POST['token'])) {
        die("Invalid CSRF token");
    }

    // Get the email and message from the form
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = filter_var(trim($_POST["message"]), FILTER_SANITIZE_STRING);

    // Validate the email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    // Connect to the database
    $conn = new mysqli($host, $username, $password, $database);
    if ($conn->connect_error) {
        echo "Database connection failed: " . $conn->connect_error;
        exit;
    }

    // Prepare the SQL query
    $stmt = $conn->prepare("INSERT INTO $table (email, message, created_at, session_token) VALUES (?, ?, ?, ?)");
    if (!$stmt) {
        echo "Error preparing SQL statement: " . $conn->error;
        exit;
    }

    $created_at = date('Y-m-d H:i:s');
    $stmt->bind_param("ssss", $email, $message, $created_at, $_SESSION['token']);

    // Execute the query
    if ($stmt->execute()) {
        // Redirect back to the index page with a success message
        header("Location: index.php?success=1");
        exit;
    } else {
        echo "Error storing message: " . $stmt->error;
        exit;
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}

// Generate a new CSRF token
$_SESSION['token'] = bin2hex(random_bytes(32));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
</head>
<body>
    <h1>Contact Us</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Email: <input type="email" name="email"><br>
        Message: <textarea name="message"></textarea><br>
        <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>

