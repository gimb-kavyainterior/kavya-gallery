<!DOCTYPE html>
<html lang="en">


<body>
    <pre>
    <form enctype="multipart/form-data" method="POST">
        Project name:           <input type="text" name="project_name" required/><br>
        Project location:       <input type="text" name="project_location" required/><br>
        Project address:        <input type="text" name="project_address" required/><br>
        Google map:             <input type="text" name="project_google_map"/><br>
        Project classification: <select name="project_classification">
                                    <option value="Residential">Residential</option>
                                    <option value="Commercial">Commercial</option>
                                    <option value="Government Office">Government Office</option>
                                </select><br>
        Project details:        <input type="text" name="project_details"/><br>
        Project plan:           <input type="text" name="project_plan"/><br>
        Project 3D Walkthrough: <input type="text" name="project_3D"/><br>
        Project team size:      <input type="text" name="project_teamsize"/><br>
        Project timeline:       <select name="project_timeline">
                                    <option value="0-3 Months">0-3 Months</option>
                                    <option value="3-6 Months">3-6 Months</option>
                                    <option value="6-12 Months">6-12 Months</option>
                                </select><br>
        Project current status: <select name="project_status">
                                    <option>Planning</option>
                                    <option>Execution</option>
                                    <option>Finishing</option>
                                    <option>Completed</option>
                                </select><br>
        Project budget:         <select name="project_budget">
                                    <option value="5-10 Lacs">5-10 Lacs</option>
                                    <option value="10-15 Lacs">10-15 Lacs</option>
                                    <option value="15-30 Lacs">15-30 Lacs</option>
                                </select><br>
        Project image:          <input type="file" name="filename" />
        
                                <input type="submit" name="btn_create_project"  value="Create" />
    </form>
    </pre>
</body>

</html>


<?php

require_once "./constant.php";
require_once "./database_helper.php";

if (isset($_POST['btn_create_project'])) {

    $conn_obj = establish_connection();

    $project_name = $_POST['project_name'];
    $project_location = $_POST['project_location'];
    $project_address = $_POST['project_address'];
    $project_google_map = $_POST['project_google_map'];
    $project_classification = $_POST['project_classification'];
    $project_details = $_POST['project_details'];
    $project_plan = $_POST['project_plan'];
    $project_3D_walkthrough = $_POST['project_3D'];
    $project_teamsize = $_POST['project_teamsize'];
    $project_timeline = $_POST['project_timeline'];
    $project_status = $_POST['project_status'];
    $project_budget = $_POST['project_budget'];

    $insert_qry = "INSERT INTO projects  VALUES (
                NULL,
                '$project_name',
                '$project_location',
                '$project_address',
                '$project_google_map',
                '$project_classification',
                '$project_details',
                '$project_plan',
                '$project_3D_walkthrough',
                '$project_teamsize',
                '$project_timeline',
                '$project_status',
                '$project_budget'
            )";


    $last_insert_id = insert_data($conn_obj, $insert_qry);

    if ($last_insert_id) {

        $file_name = $_FILES['filename']['name'];
        $temp_name = $_FILES['filename']['tmp_name'];

        $filenameArr = explode(".", $file_name);
        if ($filenameArr[count($filenameArr) - 1] === 'zip') {
            $zip = new ZipArchive();
            if ($zip->open($temp_name)) {
                $zip->extractTo("../" . PROJECT_FOLDER . "/$last_insert_id");
                $zip->close();
            }

        }

        $project_folder = "../".PROJECT_FOLDER."/$last_insert_id";
        $list_images = scandir($project_folder);
        $first_file = $list_images[2];
        $file_extention = explode(".",$first_file)[1];

        rename($project_folder.'/'.$first_file, 
                $project_folder.'/'.$last_insert_id.".$file_extention");

    }

}

?>