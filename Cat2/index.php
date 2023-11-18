<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
     <h2>Author Details Form</h2>
    <form action="AutRegistration.php" method="post">
        <label for="authorId">Author ID:</label>
        <input type="text" name="authorId" id="authorId" required>

        <label for="authorFullName">Full Name:</label>
        <input type="text" name="authorFullName" id="authorFullName" required>

        <label for="authorEmail">Email:</label>
        <input type="email" name="authorEmail" id="authorEmail" required>

        <label for="authorAddress">Address:</label>
        <input type="text" name="authorAddress" id="authorAddress">

        <label for="authorBiography">Biography:</label>
        <textarea name="authorBiography" id="authorBiography" rows="5"></textarea>

        <label for="authorDateOfBirth">Date of Birth:</label>
        <input type="date" name="authorDateOfBirth" id="authorDateOfBirth">

        <label for="authorSuspended">Suspended:</label>
        <input type="checkbox" name="authorSuspended" id="authorSuspended">

        <br>

        <input type="submit" value="Submit">
    </form>
    </body>
</html>
