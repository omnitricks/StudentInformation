<?php
    // database connection
    include('../Config/config.php');

    // Erros Stored in single array
    $errorsregi = array();

    //Register
    $cpassword = $_POST['cpassword'];

    if(empty($_POST['username'])){
        $errorsregi['username'] = "Username required";
    } else{
        $usernameregi = $_POST['username'];
    }

    if(empty($_POST['email'])){
        $errorsregi['email'] = "Email address is invalid";
    } else{
        $email = $_POST['email'];
    }

    if(empty($_POST['password'])){
        $errorsregi['password'] = "Password required";
    } else{
        $password = $_POST['password'];
    }

    if($password !== $cpassword){
        $errorsregi['password'] = "The two password do not match";
    }


    $emailQuery = "SELECT * FROM `users` WHERE `email`= '$email' LIMIT 1";

    $userCount = mysqli_query($conn,$emailQuery);
    
    if(mysqli_num_rows($userCount)>0){
        $errorsregi['email'] = "Email already exists";

    }

    if(empty($errorsregi)){
        $password = password_hash($password, PASSWORD_DEFAULT);
        $token = bin2hex(random_bytes(50));
        // $verified = false;

        $sql = "INSERT INTO `users` (`username`, `email`, `token`, `password`) VALUES ( '$usernameregi', '$email', '$token', '$password')";

        $run_data = mysqli_query($conn,$sql);
        
        if($run_data){
            $user_id = $conn->insert_id;
            $_SESSION['id'] = $user_id;
            $_SESSION['username'] = $usernameregi;
            $_SESSION['email'] = $email;

            // sendVerificationEmail($email, $token);

            // $_SESSION['message'] = "You are now logged in!";
            // $_SESSION['alert-class'] = "alert-success";

            header('Content-Type: application/json');
                echo json_encode(['location'=>'../CRUD/index.php']);
            exit();
        }else{
            $errorsregi['db_error'] = "Database error: failed to register";
        }

    }

?>