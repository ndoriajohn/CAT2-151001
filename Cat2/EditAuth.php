<?php
// Include the database connection file
require_once "configs/DbConn.php";

// Check if the EditId parameter is set in the URL
if (isset($_GET['EditId'])) {
    $authorId = $_GET['EditId'];

    // Fetch the details of the selected author
    $stmt = $pdo->prepare("SELECT * FROM authorstb WHERE AuthorId = ?");
    $stmt->execute([$authorId]);
    $author = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if the author exists
    if (!$author) {
        die("Author not found");
    }
} else {
    die("Invalid request");
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Capture the updated details
    $authorFullName = $_POST["authorFullName"];
    $authorEmail = $_POST["authorEmail"];
    $authorAddress = $_POST["authorAddress"];
    $authorBiography = $_POST["authorBiography"];
    $authorDateOfBirth = $_POST["authorDateOfBirth"];
    $authorSuspended = isset($_POST["authorSuspended"]) ? 1 : 0;

    // Update the details in the database
    $updateStmt = $pdo->prepare("UPDATE authorstb SET AuthorFullName=?, AuthorEmail=?, AuthorAddress=?, AuthorBiography=?, AuthorDateOfBirth=?, AuthorSuspended=? WHERE AuthorId=?");
    $updateStmt->execute([$authorFullName, $authorEmail, $authorAddress, $authorBiography, $authorDateOfBirth, $authorSuspended, $authorId]);

    // Redirect to the ViewAuthors.php page after updating
    header("Location: ViewAuthors.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Author</title>
    <link rel="stylesheet" href="css/css.css" />
</head>
<body>
    <!-- Top navigation -->
    

    <div class="header">
        <h1>Edit Author</h1>
    </div>

    <!-- Edit Author Form -->
    <div class="content">
        <form action="EditAuth.php?EditId=<?= $authorId ?>" method="post">
            <label for="authorFullName">Full Name:</label>
            <input type="text" name="authorFullName" id="authorFullName" value="<?= $author['AuthorFullName'] ?>" required>

            <label for="authorEmail">Email:</label>
            <input type="email" name="authorEmail" id="authorEmail" value="<?= $author['AuthorEmail'] ?>" required>

            <label for="authorAddress">Address:</label>
            <input type="text" name="authorAddress" id="authorAddress" value="<?= $author['AuthorAddress'] ?>">

            <label for="authorBiography">Biography:</label>
            <textarea name="authorBiography" id="authorBiography" rows="5"><?= $author['AuthorBiography'] ?></textarea>

            <label for="authorDateOfBirth">Date of Birth:</label>
            <input type="date" name="authorDateOfBirth" id="authorDateOfBirth" value="<?= $author['AuthorDateOfBirth'] ?>">

            <label for="authorSuspended">Suspended:</label>
            <input type="checkbox" name="authorSuspended" id="authorSuspended" <?= $author['AuthorSuspended'] ? 'checked' : '' ?>>

            <br>

            <input type="submit" value="Update">
        </form>
    </div>

    <!-- Footer -->
    <div class="footer">
        Copyright &copy; 151001 2023
    </div>
</body>
</html>

<?php
// Close the database connection
$pdo = null;
?>
