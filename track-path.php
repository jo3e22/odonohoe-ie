<?php
// track-path.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $language = isset($_POST['language']) ? $_POST['language'] : 'en'; // Default to English

    if (isset($_POST['clicked_url'])) {
        $clickedUrl = $_POST['clicked_url'];
        $logEntry = date('Y-m-d H:i:s') . " | Language: $language | Clicked URL: $clickedUrl" . PHP_EOL;
        if (file_put_contents('user_path.log', $logEntry, FILE_APPEND) === false) {
            error_log('Error writing to user_path.log file');
        }
    }

    if (isset($_POST['current_url'])) {
        $currentUrl = $_POST['current_url'];
        $logEntry = date('Y-m-d H:i:s') . " | Language: $language | Current URL: $currentUrl" . PHP_EOL;
        if (file_put_contents('user_path.log', $logEntry, FILE_APPEND) === false) {
            error_log('Error writing to user_path.log file');
        }
    }
}
?>