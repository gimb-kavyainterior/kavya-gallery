<?php

include "config.php";

$conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);

$sql = "SELECT * FROM projects";

$result = $conn->query($sql);

$data = $result->fetch_all();
print_r($data);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

</body>
</html>