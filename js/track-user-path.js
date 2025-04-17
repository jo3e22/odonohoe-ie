// track-user-path.js
document.addEventListener('click', function(event) {
    // Check if the clicked element is a link
    if (event.target.tagName.toLowerCase() === 'a') {
        // Get the URL of the clicked link
        var clickedUrl = event.target.href;
        var language = getCookie('language') || 'en'; // Default to English if no cookie

        // Send the clicked URL and language to the server using AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../track-path.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('clicked_url=' + encodeURIComponent(clickedUrl) + '&language=' + encodeURIComponent(language));
    }
});

document.addEventListener('pageshow', function(event) {
    // Get the current URL
    var currentUrl = window.location.href;
    var language = getCookie('language') || 'en'; // Default to English if no cookie

    // Send the current URL and language to the server using AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../track-path.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send('current_url=' + encodeURIComponent(currentUrl) + '&language=' + encodeURIComponent(language));
});

function getCookie(name) {
    var value = "; " + document.cookie;
    var parts = value.split("; " + name + "=");
    if (parts.length === 2) return parts.pop().split(";").shift();
}