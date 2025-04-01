// track_user_path.js
document.addEventListener('click', function(event) {
    // Check if the clicked element is a link
    if (event.target.tagName.toLowerCase() === 'a') {
        // Get the URL of the clicked link
        var clickedUrl = event.target.href;

        // Send the clicked URL to the server using AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'track_path.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('clicked_url=' + encodeURIComponent(clickedUrl));
    }
});

document.addEventListener('pageshow', function(event) {
    // Get the current URL
    var currentUrl = window.location.href;

    // Send the current URL to the server using AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'track_path.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send('current_url=' + encodeURIComponent(currentUrl));
});
