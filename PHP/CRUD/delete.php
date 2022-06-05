<?php
    // database connection
    include('../Config/config.php');

    $id = $_GET['id'];
    $delete = "DELETE FROM `student-information` WHERE `id` = '$id'";

    $run_data = mysqli_query($conn,$delete);

    if($run_data){
        $_SESSION['delete-success'] = "Data Deleted Successfully";
    }else{

    }

?>