<?php
// Include the constants file
include 'constants.php';

// Connection options
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    // Create a new PDO instance
    $DbConn = new PDO("mysql:hostname=$hostname;database=$database", $username, $password, $options);

    // Check if the connection is successful
    if ($DbConn) {
        echo "Connected to the database successfully!";
    } else {
        echo "Failed to connect to the database.";
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

