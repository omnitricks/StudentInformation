<?php
    /* Attempt to connect to MySQL database */
    $conn = new mysqli('localhost', 'root', '', 'test');
    
    // Check connection
    if($conn->connect_error){
        die('Connection Failed : ' .$conn->connect_error); 
    }
?>