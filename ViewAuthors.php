<?php
// Include the database connection file
require_once "configs/DbConn.php";

// Fetch all authors in ascending order by AuthorFullName using prepared statement
$sql = "SELECT * FROM authorstb ORDER BY AuthorFullName ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$authors = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Authors</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <!-- Top navigation -->
   

    <div class="header">
        <h1>Authors</h1>
    </div>

    <!-- Main content section -->
    <div class="row">
        <div class="content">
            <h3>Registered Authors</h3>

            <?php if ($authors): ?>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Address</th>
                            <th scope="col">Biography</th>
                            <th scope="col">Date of Birth</th>
                            <th scope="col">Suspended</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sn = 1;
                        foreach ($authors as $author):
                        ?>
                        <tr>
                            <th scope="row"><?= $sn; $sn++; ?></th>
                            <td><?= $author["AuthorFullName"]; ?></td>
                            <td><?= $author["AuthorEmail"]; ?></td>
                            <td><?= $author["AuthorAddress"]; ?></td>
                            <td><?= $author["AuthorBiography"]; ?></td>
                            <td><?= date("Y-M-d", strtotime($author["AuthorDateOfBirth"])); ?></td>
                            <td><?= $author["AuthorSuspended"] ? 'Yes' : 'No'; ?></td>
                            <td>
                                <a href="EditAuth.php?EditId=<?= $author['AuthorId']; ?>">Edit</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No authors found.</p>
            <?php endif; ?>
        </div>
<!--
        <div class="sidebar">
            <h3>Side Bar</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
    </div>
-->
    <!-- Footer -->
    <div class="footer">
        Copyright &copy; 151001 2023
    </div>
</body>
</html>

<!---
    
-->