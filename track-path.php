<?php
// track-path.php
if (isset($_POST['clicked_url'])) {
    $clickedUrl = $_POST['clicked_url'];
    if (file_put_contents('user_path.log', date('Y-m-d H:i:s') . ' | Clicked URL: ' . $clickedUrl . PHP_EOL, FILE_APPEND) === false) {
        error_log('Error writing to user_path.log file');
    }
}

if (isset($_POST['current_url'])) {
    $currentUrl = $_POST['current_url'];
    if (file_put_contents('user_path.log', date('Y-m-d H:i:s') . ' | Current URL: ' . $currentUrl . PHP_EOL, FILE_APPEND) === false) {
        error_log('Error writing to user_path.log file');
    }
}
?>