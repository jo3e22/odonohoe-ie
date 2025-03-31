function performSearch() {
    const searchInput = document.getElementById('searchInput').value;
    if (searchInput) {
        // Here you can handle the search logic, e.g., redirecting to a search results page
        // For demonstration, we'll just log the input to the console
        console.log("Searching for:", searchInput);
        
        // Example: Redirect to a search results page (you can customize this)
        // window.location.href = 'search.php?query=' + encodeURIComponent(searchInput);
    } else {
        alert("Please enter a search term.");
    }
}
