<?php
// cookie_consent.php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cookie_consent'])) {
    $cookie_consent = $_POST['cookie_consent'];
    setcookie('cookie_consent', $cookie_consent, time() + (86400 * 365), '/'); // Cookie expires in 1 year
    
    if ($cookie_consent === 'accepted') {
        $user_preference = isset($_POST['user_preference']) ? $_POST['user_preference'] : 'light_mode';
        $language = isset($_POST['language']) ? $_POST['language'] : 'en';
        setcookie('user_preference', $user_preference, time() + (86400 * 30), '/'); // Expires in 30 days
        setcookie('language', $language, time() + (86400 * 30), '/'); // Expires in 30 days
    }

    echo json_encode(['status' => 'success', 'message' => 'Cookie preference saved.']);
    exit;
}

if (isset($_COOKIE['cookie_consent'])) {
    $cookie_consent = $_COOKIE['cookie_consent'];
} else {
    $cookie_consent = 'declined';
}
?>

<?php if (!isset($_COOKIE['cookie_consent'])): ?>
<div id="cookie-consent-banner" style="position: fixed; bottom: 0; left: 0; width: 100%; background-color: #f1f1f1; padding: 20px; text-align: center;">
    <p>Cookies are optional, and used to enhance your browsing experience.</p>
    <button id="cookie-consent-btn-accept">Accept</button>
    <button id="cookie-consent-btn-decline">Decline</button>
</div>
<?php endif; ?>

<script src="js/cookie-consent.js"></script>