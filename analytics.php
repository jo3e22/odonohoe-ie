<?php
// Set the log file path
$log_file = 'analytics.log';

// Get the visitor's information
$ip_address = $_SERVER['REMOTE_ADDR'];
$referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '-';
$user_agent = $_SERVER['HTTP_USER_AGENT'];

// Parse the user agent string to get the browser and device information
$browser = get_browser_name($user_agent);
$device = get_device_type($user_agent);
$platform = get_platform($user_agent);

// Construct the log entry
$log_entry = date('Y-m-d H:i:s') . " | IP: $ip_address | Referrer: $referrer | Browser: $browser | Device: $device | Platform: $platform" . PHP_EOL;

// Write the log entry to the file
file_put_contents($log_file, $log_entry, FILE_APPEND);

// Functions to parse the user agent string
function get_browser_name($user_agent) {
    // Code to parse the user agent string and determine the browser name
    if (stripos($user_agent, 'Firefox') !== false) {
        return 'Firefox';
    } elseif (stripos($user_agent, 'Chrome') !== false) {
        return 'Chrome';
    } elseif (stripos($user_agent, 'Safari') !== false) {
        return 'Safari';
    } elseif (stripos($user_agent, 'Opera') !== false) {
        return 'Opera';
    } elseif (stripos($user_agent, 'MSIE') !== false || stripos($user_agent, 'Trident/7.0') !== false) {
        return 'Internet Explorer';
    } else {
        return 'Unknown';
    }
}

function get_device_type($user_agent) {
    // Code to parse the user agent string and determine the device type (mobile or desktop)
    if (stripos($user_agent, 'Mobile') !== false || stripos($user_agent, 'Android') !== false) {
        return 'Mobile';
    } else {
        return 'Desktop';
    }
}

function get_platform($user_agent) {
    // Code to parse the user agent string and determine the platform (Windows, macOS, Linux, iOS, Android)
    if (stripos($user_agent, 'Windows') !== false) {
        return 'Windows';
    } elseif (stripos($user_agent, 'Linux') !== false) {
        return 'Linux';
    } elseif (stripos($user_agent, 'Mac OS X') !== false) {
        return 'macOS';
    } elseif (stripos($user_agent, 'iPhone') !== false || stripos($user_agent, 'iPad') !== false) {
        return 'iOS';
    } elseif (stripos($user_agent, 'Android') !== false) {
        return 'Android';
    } else {
        return 'Unknown';
    }
}
?>
