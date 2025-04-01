function performSearch() {
    const searchInput = document.getElementById('searchInput').value.trim(); // Trim whitespace
    const feedback = document.getElementById('feedback');
    feedback.textContent = ''; // Clear previous feedback

    if (searchInput) {
        console.log("Searching for:", searchInput);
        
        // Redirect to a search results page
        window.location.href = 'search_results.php?query=' + encodeURIComponent(searchInput);
        
        // Optionally, clear the input field after search
        document.getElementById('searchInput').value = '';
    } else {
        feedback.textContent = "Please enter a search term.";
    }
}
