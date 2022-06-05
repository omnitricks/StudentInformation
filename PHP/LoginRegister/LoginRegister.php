<?php require_once '../Controllers/authController.php'; ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Central Colleges of the Philippines | CCP - Student Information</title>
    <link rel="icon" type="image/png" href="https://www.ccp.edu.ph/students/CCP_WORLD2/images/fav_icon.png">
    
    <link rel="stylesheet" href="https://unpkg.com/open-props"/>
    <link rel="stylesheet" href="../../CSS/LoginRegisterstyle.css">
    <script src="https://kit.fontawesome.com/072cf49956.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="cont">
      <div class="form sign-in">
        <form action='LoginRegister.php' method='POST'>

          <?php if(count($errorslog)>0): ?>
            <div class = "alert alert-danger">
              <?php foreach($errorslog as $error): ?>
                <li><?php echo $error; ?></li>
              <?php endforeach; ?>
            </div>
          <?php else: ?>
            <h2 class="text-center">
              <?php echo "Sign In" ?>
            </h2>
          <?php endif; ?>


          <label>
            <span>Username or Email</span>
            <input type="text" value="<?php echo $username; ?>" name="username">
          </label>
          <label>
            <span>Password</span>
            <input type="password" name="password">
          </label>
          
          <button type="submit" name="login-btn" class="submit">Sign In</button>

        </form>

        <label>
          <a href="forgot_password.php" class="forgot-pass">Forgot Password ?</a>
        </label>
      </div>

      <div class="sub-cont">

        <div class="img">
            <div class="img-text m-up">
              <h2>New here?</h2>
              <p>Sign up and discover great amount of new opportunities!</p>
            </div>
            <div class="img-text m-in">
              <h2>One of us?</h2>
              <p>If you already has an account, just sign in. We've missed you!</p>
            </div>
            <div class="img-btn">
              <span class="m-up">Sign Up</span>
              <span class="m-in">Sign In</span>
            </div>
        </div>

        <div class="form sign-up">
          <form action='LoginRegister.php' method='POST'>
            
            <?php if(count($errorsregi)>0): ?>
              <div class = "alert alert-danger">
                <?php foreach($errorsregi as $error): ?>
                  <li><?php echo $error; ?></li>
                <?php endforeach; ?>
              </div>
            <?php else: ?>
              <h2 class="text-center">
                <?php echo "Register" ?>
              </h2>
            <?php endif; ?>


            <label>
              <span>Username</span>
              <input type="text" value="<?php echo $usernameregi; ?>" name="username">
            </label>
            <label>
              <span>Email</span>
              <input type="text" value="<?php echo $email; ?>" name="email">
            </label>
            <label>
              <span>Password</span>
              <input type="password" name="password">
            </label>
            <label>
              <span>Confirm Password</span>
              <input type="password" name="cpassword">
            </label>

            <button type="submit" name="signup-btn" class="submit">Sign Up</button>
          </form>
        </div>
      </div>

    </div>

    <script src="../../JS/utils.js"></script>
    <script type="text/javascript" src="../../JS/LoginRegisterscript.js"></script>
  </body>
</html>