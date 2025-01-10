<!DOCTYPE html>
<html lang="en">
<body>
<pre>
    <form method="post">
        Enter Username: <input type="text" name="username"><br>
        Enter Password: <input type="text" name="password">

                    <input type="submit" value="login" name="login_btn">
    </form>
</pre>
</body>
</html>

<?php

require_once "database_helper.php";
require_once "constant.php";

$username = $_POST['username'];
$password = $_POST['password'];

$conn = establish_connection();

$check_qry = "SELECT * FROM admin WHERE username = '$username' and password = '$password'";

$result = get_table_data($conn, $check_qry);
if($result)
{
    session_start();
    $_SESSION['username'] = $username;
    header('location: admin.php');
}