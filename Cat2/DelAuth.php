<?php
// Include the database connection file
require_once "configs/DbConn.php";

// Check if the AuthorId parameter is set in the URL
if (isset($_GET['DeleteId'])) {
    $authorId = $_GET['DeleteId'];

    // Delete the author from the database
    $deleteStmt = $pdo->prepare("DELETE FROM authorstb WHERE AuthorId = ?");
    $deleteStmt->execute([$authorId]);

    // Redirect back to the ViewAuthors.php page after deletion
    header("Location: ViewAuthors.php");
    exit();
} else {
    die("Invalid request");
}

// Close the database connection
$pdo = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Authors</title>
    <link rel="stylesheet" href="css/css.css" />
</head>
