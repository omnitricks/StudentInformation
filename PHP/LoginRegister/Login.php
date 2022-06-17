<?php
    // database connection
    include('../Config/config.php');

    $errorslog = array();

    if(empty($_POST['usernamelogin'])){
        $errorslog['usernamelogin'] = "Username required";
    } else{
        $username = $_POST['usernamelogin'];
    }

    if(empty($_POST['passwordlogin'])){
        $errorslog['passwordlogin'] = "Password required";
    } else{
        $password = $_POST['passwordlogin'];
    }

    if (empty($errorslog)){
        $sql = "SELECT * From users WHERE email=? OR username=? LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $username, $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if($user != null){
            if(password_verify($password, $user['password'])){
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
        
                // $_SESSION['message'] = "You are now logged in!";
                // $_SESSION['alert-class'] = "alert-success";

                header('Content-Type: application/json');
                echo json_encode(['location'=>'../CRUD/index.php']);
                exit();
            }else{
                $errorslog['login_fail'] = "Wrong Credentials";
            }
        }else{
            $errorslog['login_fail'] = "Wrong Credentials";
        }
    }

?>