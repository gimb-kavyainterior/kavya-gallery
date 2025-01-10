<?php

require_once "./admin/constant.php";
require_once "./admin/database_helper.php";

$conn_obj = establish_connection();
$project_id = $_GET['id'];
$project_folder_path = PROJECT_FOLDER . "/" . $project_id;

$select_qry = " SELECT * FROM projects WHERE project_id = $project_id ";
$project_details = get_table_data(
    $conn_obj,
    $select_qry
);
$project_details = $project_details[0];
$list_image = scandir($project_folder_path);

?>



<?php
require_once "./include/header.php";
require_once "./include/nav.php";
?>

<main class="main">
    <section id="gallery-details" class="gallery-details section">
        <div class="container" data-aos="fade-up">
            <h2 class="text-center"> <?= $project_details['project_name']; ?>'s details</h2>
            <br>
            <div class="row justify-content gy-3 mt-3">
                <div class="col-lg-4">
                    <div class="portfolio-info">

                        <ul>
                            <li><strong>Location</strong> <?= $project_details['project_location']; ?></li>
                            <li><strong>Address</strong> <?= $project_details['project_address']; ?></li>

                            <!-- <li><strong>Google Map</strong> <?= $project_details['google_map']; ?></li> -->

                            <li><strong>Type</strong> <?= $project_details['project_type']; ?></li>

                            <li><strong>Details</strong> <?= $project_details['project_details']; ?></li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="portfolio-info">

                        <ul>
                            <!-- <li><strong>Project Plan</strong> <?= $project_details['project_plan']; ?></li> -->
                            <!-- <li><strong>3D walkthrough </strong> <?= $project_details['3D_walkthrough']; ?></li> -->
                            <li><strong>Team size</strong> <?= $project_details['project_teamsize']; ?></li>
                            <li><strong>Timeline</strong> <?= $project_details['project_timeline']; ?></li>
                            <li><strong>Cuurent state</strong> <?= $project_details['project_cuurent_state']; ?></li>
                            <li><strong>Budget</strong> <?= $project_details['project_budget']; ?></li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="portfolio-info">
                        <ul>
                            <li><a href="https://www.youtube.com/watch?v=dOUQiRifTHw&t=1s"
                                    class="btn-visit  glightbox align-self-start">Project Walkthrough</a></li>
                            <li> <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2990.274257380938!2d-70.56068388481569!3d41.45496659976631!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e52963ac45bbcb%3A0xf05e8d125e82af10!2sDos%20Mas!5e0!3m2!1sen!2sus!4v1671220374408!5m2!1sen!2sus"
                                    width="400" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Page Title -->
    <!-- End Page Title -->

    <div class="container">
        <hr>
    </div>

    <section id="gallery" class="gallery section">

        <div class="container">

            <div class="row gy-4 justify-content-center">
                <?php
                // style='min-height:200px;max-height:200px;min-width:300px;max-width:300px;'
                foreach ($list_image as $image) {
                    if ($image != "." && $image != "..") {
                        echo "
                            <div class='col-xs-12 col-sm-12 col-md-3'>
                            <div class='gallery-item'>
                                <img src='$project_folder_path/$image' class='img-fluid image-resize'>
                            
                                <div class='gallery-links d-flex align-items-center justify-content-center'>
                                    <a href='$project_folder_path/$image' class='glightbox preview-link'><i class='bi bi-arrows-angle-expand'></i></a>
                                </div>
                            </div>
                            
                            </div><!-- End Gallery Item -->
                            ";
                    }
                }
                ?>
            </div>

        </div>

    </section><!-- /Gallery Section -->


</main>




<?php
require_once "./include/footer.php";
?>