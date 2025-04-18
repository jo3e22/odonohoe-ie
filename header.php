<?php
session_start(); // Start the session to use session variables

// Generate a CSRF token if it doesn't exist
if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32)); // Generate a random token
}

function getVersion($file) {
    return file_exists($file) ? filemtime($file) : time(); // Use the last modified time or current time if the file doesn't exist
}

// Detect if the user is on a mobile device
function isMobile() {
    return preg_match('/Mobi|Android|iPhone|iPad|iPod/i', $_SERVER['HTTP_USER_AGENT']);
}
// Set a variable to determine the layout
$isMobile = isMobile();

include 'analytics.php';
include 'cookie_consent.php';
// Check if cookies have ever been accepted
$cookie_consent = isset($_COOKIE['cookie_consent']) ? $_COOKIE['cookie_consent'] : 'declined';
if ($cookie_consent === 'accepted') {
    echo '<script src="/js/track-user-path.js"></script>';
}

// Set the language based on the cookie or default to English
$language = isset($_COOKIE['language']) ? $_COOKIE['language'] : 'en';
$lang_file = "lang/{$language}.php";
if (file_exists($lang_file)) {
    include $lang_file;
} else {
    include "lang/en.php"; // Fallback to English
}
?>

<!DOCTYPE html>
<html lang="<?php echo htmlspecialchars($language); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>James O'Donohoe - Personal Website</title>
    <link rel="stylesheet" href="css/styles.css?v=<?php echo getVersion('styles.css'); ?>">
</head>
<body class="<?php echo $isMobile ? 'mobile' : 'desktop'; ?>">

<?php
// Dynamically include the appropriate header file
if ($isMobile) {
    include 'header-mobile.php';
} else {
    include 'header-desktop.php';
}
?>
    
<script src="js/search.js?v=<?php echo getVersion('search.js'); ?>"></script>
<script src="js/font-toggle.js?v=<?php echo getVersion('font-toggle.js'); ?>"></script>
<script src="js/language-switcher.js?v=<?php echo getVersion('language-switcher.js'); ?>"></script>
