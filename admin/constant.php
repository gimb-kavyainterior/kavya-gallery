<?php

define('DATABASE_HOST','localhost');
define('DATABASE_USER','root');
define('DATABASE_PASSWORD','');
define('DATABASE_NAME','kavya_interior');


define("PROJECT_FOLDER", "projects");

/*

-- CREATING TABLE
CREATE TABLE IF NOT EXISTS projects(
  project_id int PRIMARY KEY AUTO_INCREMENT,
  project_name varchar(30),
  project_location varchar(50),
  project_address text,
  google_map text,
  project_type varchar(50),
  project_details text,
  project_plan text,
  3D_walkthrough text,
  project_teamsize text,
  project_timeline text,
  project_cuurent_state text,
  project_budget text);
  */
?>