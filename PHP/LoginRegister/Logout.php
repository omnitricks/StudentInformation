<?php
    // database connection
    include('../Config/config.php');

    unset($_SESSION['id']);
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    session_destroy();
    // unset($_SESSION['verified']);
    // header('location: LoginRegister.php');
    header('Content-Type: application/json');
    echo json_encode(['location'=>'../LoginRegister/LoginRegister.php']);
    exit();


?>