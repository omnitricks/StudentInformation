<?php
    // database connection
    include('../Config/config.php');

    $id = $_GET['id'];
    $get_data = "SELECT * FROM `student-information` WHERE `id` = '$id'";
    $run_data = mysqli_query($conn,$get_data);

    while($row = mysqli_fetch_array($run_data)){
        echo json_encode($row);
    }
?>