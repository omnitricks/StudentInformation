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
                <form id="Login">

                    <div class="title">
                        <h2 class="text-center login"></h2>
                        <div class = "alert alert-danger alert-login"><ul class="bullet-login"></ul></div>

                    </div>

                    <label class="label">
                        <span>Username or Email</span>
                        <input type="text" name="usernamelogin" id="usernamelogin">
                    </label>

                    <label class="label">
                        <span>Password</span>
                        <input type="password" name="passwordlogin" id="passwordlogin">
                    </label>

                    <button type="submit" name="login-btn" class="login-btn">Sign In</button>
                </form>

                <label class="label">
                    <a href="#" class="forgot-pass">Forgot Password ?</a>
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
                        <span class="m-up">Register</span>
                        <span class="m-in">Sign In</span>
                    </div>
                </div>

                <div class = "form sign-up">
                    <form id = "Register">
                        
                        
                    <div class="title">
                        <h2 class="text-center register"></h2>
                        <div class = "alert alert-danger alert-register"><ul class="bullet"></ul></div>

                    </div>
                        

                        <label class="label">
                            <span>Username</span>
                            <input type="text" name="username" id="username">
                        </label>

                        <label class="label">
                            <span>Email</span>
                            <input type="text" name="email" id="email">
                        </label>

                        <label class="label">
                            <span>Password</span>
                            <input type="password" name="password" id="password">
                        </label>

                        <label class="label">
                            <span>Confirm Password</span>
                            <input type="password" name="cpassword" id="cpassword">
                        </label>

                        <button type="submit" name="register-btn" class="register-btn">Register</button>
                    </form>
                </div>
            </div>
        </div>


        <div class="bg-modal-recover">
            <div class="modal-contents-recover">

                <div class="close"><i class="fa-solid fa-xmark"></i></div>

                <br>
                <h2 class="text-center">Recover your password</h2>
                <br>
                <!-- <form id="Recover"> -->

                    <p>Please enter your email address you used to sign up on this site <br> and we will assist you in recovering your password.</p>

                    <label class="label">
                        <span>Email</span>
                        <input type="email"  name="emailrecover" class="emailrecover">
                    </label>

                    <button type="submit" name="forgot-password" class="forgot-password">Recover your password</button>

                <!-- </form> -->
            </div>
        </div>





        <div class="bg-modal-message">
            <div class="modal-contents-message">

                <p>An email has been sent to your email address <br> with a link to reset your password.</p>

                <button type="submit" name="ok-btn" class="ok-btn">OK</button>

            </div>
        </div>



        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
        <!-- <script src="../../JS/utils.js"></script> -->
        <script src="../../JS/LoginRegisterscript.js"></script>
    </body>
</html>