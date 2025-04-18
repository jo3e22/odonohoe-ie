<?php
$query = isset($_GET['query']) ? htmlspecialchars($_GET['query']) : '';
?>
<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $lang['search-results-title']; ?></title>
    <link rel="stylesheet" href="css/styles.css"> <!-- Link to external CSS if needed -->
</head>
<body>

    <h1><?php echo $lang['search-results-title']; ?>s</h1>
    <p><?php echo $lang['search-results-query']; ?> <strong><?php echo $query; ?></strong></p>

    <div id="results">
        <?php
        // Example: Simulate search results
        // In a real application, you would query your database or search index here
        if ($query) {
            echo $lang['search-results-display'] . " <strong>" . $query . "</strong>...";
            // Here you would loop through your results and display them
        } else {
            echo "<p>" . $lang['search-results-no-results'] . "</p>";
        }
        ?>
    </div>

    <a href="index.php"><?php echo $lang['search-results-back']; ?></a> <!-- Link back to the main page -->
</body>
</html>

<?php include 'footer.php'; ?>