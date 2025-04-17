<?php
// set_language.php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['language'])) {
    $language = $_POST['language'];
    setcookie('language', $language, time() + (86400 * 365), '/'); // Set the language cookie for 1 year
}

// Redirect back to the referring page or the homepage
$redirect_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
header("Location: $redirect_url");
exit;
?>