<?php
    session_start();
    require 'constants.php';
    /* Attempt to connect to MySQL database */
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    // Check connection
    if($conn->connect_error){
        die('Connection Failed : ' .$conn->connect_error); 
    }
?>