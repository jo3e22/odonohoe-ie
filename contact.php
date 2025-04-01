<?php
session_start(); // Start the session to use session variables

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
        die("Invalid email format");
    }

    // Prepare the message to be stored
    $entry = "Email: $email\nMessage: $message\n\n";

    // Store the message in a text file
    $file = '../secure_data/messages.txt'; // Adjust the path as necessary
    if (!file_exists($file)) {
        // Create the file if it doesn't exist
        touch($file);
    }

    // Ensure the file is writable
    if (!is_writable($file)) {
        die("File is not writable");
    }

    // Append the message to the file
    if (file_put_contents($file, $entry, FILE_APPEND | LOCK_EX) === false) {
        die("Error writing to file");
    }

    // Redirect back to the index page with a success message
    header("Location: index.php?success=1");
    exit;
}
?>
