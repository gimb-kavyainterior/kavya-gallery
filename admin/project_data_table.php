
<?php
session_start();
if(!isset($_SESSION['username']))
{
    header('location: index.php');
}

require_once "./database_helper.php";
require_once "./constant.php";

$conn = establish_connection();
$select_qry = "SELECT project_id, project_name, project_location from projects ";

$result = get_table_data($conn, $select_qry);

?>


<!DOCTYPE html>
<html lang="en">

<body>
    <h3>Delete Projects</h3>
<table border="1px">
    <tr>
        <th>Project_ID</th>
        <th>Project Name</th>
        <th>Project Location</th>
        <th>Action(Delete)</th>
    </tr>
    <?php
        foreach($result as $data)
        {
             echo "<tr>
                <td>$data[0]</td>
                <td>$data[1]</td>
                <td>$data[2]</td>
                <td><a href='delete_project.php?id=$data[0]'>Delete Project</a></td>
            </tr>";
        }
        
    ?>
</table>

</body>
</html>

