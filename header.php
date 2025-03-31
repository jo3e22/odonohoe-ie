<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>James O'Donohoe - Personal Website</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to CSS file -->
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
