<?php
    session_start();
    // database connection
    include('config.php');

    $id = $_GET['id'];
    $delete = "DELETE FROM `student-information` WHERE `id` = '$id'";

    $run_data = mysqli_query($conn,$delete);

    if($run_data){
        $_SESSION['delete'] = "Data Deleted Successfully";
        // $_SESSION['duplicateedit2'] = "Data not Updated, Student Number already in use2";
        // header('location:index.php');
    }else{
        echo "Data not Deleted";
    }

?>