<?php include 'includes/constants.php'; ?>
<?php
    $connection = mysqli_connect(TROJANHOST, DBUSER, DBPASSWORD, DBNAME);

    if (!$connection) {
        die('Failed to connect to database.');
    }
?>