<?php
// Include the database connection file
require_once"../configs/DbConn.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $authorFullName = $_POST["authorFullName"];
    $authorEmail = $_POST["authorEmail"];
    $authorAddress = $_POST["authorAddress"];
    $authorBiography = $_POST["authorBiography"];
    $authorDateOfBirth = $_POST["authorDateOfBirth"];
    $authorSuspended = isset($_POST["authorSuspended"]) ? 1 : 0;

    // Insert data into the authors table
     $stmt = $pdo->prepare("INSERT INTO authorstb (authorFullName, authorEmail, authorAddress, authorBiography, authorDateOfBirth, authorSuspended) 
            VALUES (?,?,?,?,?,?)");
    //$stmt->bind_param("sssssi", $authorFullName, $authorEmail, $authorAddress, $authorBiography, $authorDateOfBirth, $authorSuspended);

   /* $stmt->bindParam(1, $authorFullName);
    $stmt->bindParam(2, $authorEmail);
    $stmt->bindParam(3, $authorAddress);
    $stmt->bindParam(4, $authorBiography);
    $stmt->bindParam(5, $authorDateOfBirth);
    $stmt->bindParam(6, $authorSuspended);*/
   try {
    $stmt->execute([$authorFullName, $authorEmail, $authorAddress, $authorBiography, $authorDateOfBirth, $authorSuspended]);
    header("Location: ../ViewAuthors.php");
    exit();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

    exit();
      
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Author Registration</title>
    <link rel="stylesheet" href="../css/css.css" />
</head>
<body>
    <h2>Author Registration</h2>
    <form action="AutRegistration.php" method="post">
        <!-- Include your form fields here -->
        <label for="authorFullName">Full Name:</label>
        <input type="text" name="authorFullName" id="authorFullName" required><br>

        <label for="authorEmail">Email:</label>
        <input type="email" name="authorEmail" id="authorEmail" required><br>
        
        <label for="authorAddress">Address:</label>
        <input type="text" name="authorAddress" id="authorAddress"><br>

        <label for="authorBiography">Biography:</label>
        <textarea name="authorBiography" id="authorBiography" rows="5"></textarea><br>

        <label for="authorDateOfBirth">Date of Birth:</label>
        <input type="date" name="authorDateOfBirth" id="authorDateOfBirth"><br>

        <label for="authorSuspended">Suspended:</label>
        <input type="checkbox" name="authorSuspended" id="authorSuspended"><br>

        <br>


        <input type="submit" value="Submit">
    </form>
    <br
        <h3><center> VIEW REGISTERED AUTHORS</center></h3>
    <br>
    
<center> <a href="../ViewAuthors.php">CLICK HERE</a></center>
</body>
</html>
