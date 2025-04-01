<?php
session_start(); // Start the session to use session variables

// Generate a CSRF token if it doesn't exist
if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32)); // Generate a random token
}

function getVersion($file) {
    return file_exists($file) ? filemtime($file) : time(); // Use the last modified time or current time if the file doesn't exist
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>James O'Donohoe - Personal Website</title>
    <link rel="stylesheet" href="styles.css?v=<?php echo getVersion('styles.css'); ?>">
    <script src="script.js?v=<?php echo getVersion('script.js'); ?>"></script>
</head>
<body>
    <header>
        <h1>James O'Donohoe</h1>
        <nav>
            <ul>
                <li><a href="#cv">CV</a></li>
                <li><a href="#about">About Me</a></li>
                <li><a href="#contact">Contact Me</a></li>
            </ul>
            <div class="search-container">
                <input type="text" id="searchInput" placeholder="Search..." required>
                <button id="searchButton" onclick="performSearch()">Search</button>
            </div>
        </nav>
    </header>
    <script src="script.js"></script>
