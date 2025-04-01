<?php
$query = isset($_GET['query']) ? htmlspecialchars($_GET['query']) : '';
?>
<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="css/styles.css"> <!-- Link to external CSS if needed -->
</head>
<body>

    <h1>Search Results</h1>
    <p>Results for: <strong><?php echo $query; ?></strong></p>

    <div id="results">
        <?php
        // Example: Simulate search results
        // In a real application, you would query your database or search index here
        if ($query) {
            echo "<p>Displaying results for <strong>" . $query . "</strong>...</p>";
            // Here you would loop through your results and display them
        } else {
            echo "<p>No results found.</p>";
        }
        ?>
    </div>

    <a href="index.php">Back to Search</a> <!-- Link back to the main page -->
</body>
</html>

<?php include 'footer.php'; ?>