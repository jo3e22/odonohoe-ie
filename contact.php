<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    $file = 'messages.txt'; // Make sure this file is writable
    file_put_contents($file, $entry, FILE_APPEND | LOCK_EX);

    // Redirect back to the contact page with a success message
    header("Location: index.php?success=1");
    exit;
}
?>
