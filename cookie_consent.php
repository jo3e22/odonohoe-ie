<?php
// cookie_consent.php
if (isset($_COOKIE['cookie_consent'])) {
    // User has already made a choice, use that
    $cookie_consent = $_COOKIE['cookie_consent'];
} else {
    // User hasn't made a choice yet, default to declined
    $cookie_consent = 'declined';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cookie_consent'])) {
    // User has made a choice, set a cookie to remember it
    $cookie_consent = $_POST['cookie_consent'];
    setcookie('cookie_consent', $cookie_consent, time() + (86400 * 365), '/'); // Cookie expires in 1 year
}
?>

<div id="cookie-consent-banner" style="position: fixed; bottom: 0; left: 0; width: 100%; background-color: #f1f1f1; padding: 20px; text-align: center;">
    <p>Cookies are optional, and used to enhance your browsing experience.</p>
    <button id="cookie-consent-btn-accept">Accept</button>
    <button id="cookie-consent-btn-decline">Decline</button>
</div>

<script>
document.getElementById('cookie-consent-btn-accept').addEventListener('click', function() {
    // Send a POST request to the server to indicate the user's consent
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'cookie_consent.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send('cookie_consent=accepted');

    // Hide the cookie consent banner
    document.getElementById('cookie-consent-banner').style.display = 'none';
});

document.getElementById('cookie-consent-btn-decline').addEventListener('click', function() {
    // Send a POST request to the server to indicate the user's decline
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'cookie_consent.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send('cookie_consent=declined');

    // Hide the cookie consent banner
    document.getElementById('cookie-consent-banner').style.display = 'none';
});
</script>
