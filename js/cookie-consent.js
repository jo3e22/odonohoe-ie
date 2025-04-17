document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('cookie-consent-btn-accept').addEventListener('click', function () {
        const prefersDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
        const userPreference = prefersDarkMode ? 'dark_mode' : 'light_mode';
        const browserLanguage = navigator.language || navigator.userLanguage;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'cookie_consent.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function () {
            if (xhr.status === 200) {
                console.log(JSON.parse(xhr.responseText).message);
                document.getElementById('cookie-consent-banner').style.display = 'none';
            }
        };
        xhr.send(`cookie_consent=accepted&user_preference=${userPreference}&language=${browserLanguage}`);
    });


    document.getElementById('cookie-consent-btn-decline').addEventListener('click', function () {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'cookie_consent.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function () {
            if (xhr.status === 200) {
                console.log(JSON.parse(xhr.responseText).message);
                document.getElementById('cookie-consent-banner').style.display = 'none';
            }
        };
        xhr.send('cookie_consent=declined');
    });
});