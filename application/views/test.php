<?php

include("recommended.php");

$host = "localhost";
$username = "root";
$password = "";
$dbname = "partimee";

// Connection
$db = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}


$algos = mysqli_query($db, "SELECT * FROM algo");
$matrix = array();

while ($algo = mysqli_fetch_array($algos)) {
    $user = mysqli_query($db, "SELECT nama FROM user WHERE id_user=$algo[id_user]");
    $job = mysqli_query($db, "SELECT nama_job FROM jobs WHERE id_job=$algo[id_job]");
    $name = mysqli_fetch_array($user);
    $job_name = mysqli_fetch_array($job);

    $matrix[$name['nama']][$job_name['nama_job']] = $algo['rating'];
}

// echo '
// <pre>';
// var_dump($matrix);
// echo '</pre>';

var_dump(getRecommendations($matrix, "Admin"));
