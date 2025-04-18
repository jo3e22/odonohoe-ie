<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $lang['portfolio-title']; ?></title>
    <link rel="stylesheet" href="css/styles.css"> <!-- Link to external CSS if needed -->
</head>
<body>

    <h1><?php echo $lang['portfolio-title']; ?>s</h1>
    <p><?php echo $lang['portfolio-intro']; ?> <strong><?php echo htmlspecialchars($query); ?></strong></p>

    <a href="index.php"><?php echo $lang['return-home']; ?></a> <!-- Link back to the main page -->
</body>
</html>

<?php include 'footer.php'; ?>