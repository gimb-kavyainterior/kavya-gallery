<?php
session_start();
if(!isset($_SESSION['username']))
{
    header('location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h4>Welcome to kavya interior</h4>
    <br>
    <a href="./create_project.php">create proejct</a><br>
    <a href="./project_data_table.php">List of project</a><br>
    <a href="logout.php">Logout</a>
</body>
</html>