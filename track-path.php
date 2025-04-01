<?php
// track_path.php
if (isset($_POST['clicked_url'])) {
    $clickedUrl = $_POST['clicked_url'];
    // Log the clicked URL to a file or database
    file_put_contents('user_path.log', date('Y-m-d H:i:s') . ' | Clicked URL: ' . $clickedUrl . PHP_EOL, FILE_APPEND);
}

if (isset($_POST['current_url'])) {
    $currentUrl = $_POST['current_url'];
    // Log the current URL to a file or database
    file_put_contents('user_path.log', date('Y-m-d H:i:s') . ' | Current URL: ' . $currentUrl . PHP_EOL, FILE_APPEND);
}
?>