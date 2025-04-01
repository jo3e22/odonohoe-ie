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
    <link rel="stylesheet" href="css/styles.css?v=<?php echo getVersion('styles.css'); ?>">
</head>
<body>
    <header>
        <nav>
            <div class="left-items">
                <ul>
                    <li><a href="#cv">CV</a></li>
                    <li><a href="#about">About Me</a></li>
                    <li><a href="#contact">Contact Me</a></li>
                </ul>
            </div>
            <<div class="logo">
                <a href="index.php"><img src="images/logo-122620-fffef9.png" alt="My Website Logo" style="height:100px;"></a>
            </div>
            <div class="right-items">
                <button id="font-toggle">Toggle Font</button> <!-- Button to toggle fonts -->
                <!-- Search Section -->
                <section id="searchSection">
                    <div class="search-container">
                        <input type="text" id="searchInput" placeholder="Search..." required>
                        <button id="searchButton" onclick="performSearch()">Search</button>
                    </div>
                    <div id="feedback"></div>
                </section>
            </div>
        </nav>
    </header>
    
    <script src="js/search.js?v=<?php echo getVersion('search.js'); ?>"></script>
    <script src="js/font-toggle.js?v=<?php echo getVersion('font-toggle.js'); ?>"></script>
