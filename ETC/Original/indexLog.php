<?php
    // database connection
    include('../Config/config.php');
?>

<?php
    // Session
    if(!isset($_SESSION['id'])){
        header('location: ../LoginRegister/LoginRegister.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Central Colleges of the Philippines | CCP - Student Information</title>
        <link rel="icon" type="image/png" href="https://www.ccp.edu.ph/students/CCP_WORLD2/images/fav_icon.png">
        
        <link rel="stylesheet" href="https://unpkg.com/open-props"/>
        <link rel="stylesheet" href="../../CSS/style.css">
        <script src="https://kit.fontawesome.com/072cf49956.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <button type="submit" name="logout-btn" class="logout-btn" id=<?php echo $_SESSION['id']; ?>>Logout</button>

        <!-- Search Bar with Drop Down Box -->
        <div class="searchbar">
            <form>
                <select name="data-filter" id="data-filter" class="data-filter">
                    <option value="">Select Filter</option>
                    <option value="studentNumber">Student Number</option>
                    <option value="studentSurnameModified">Surname</option>
                    <option value="studentFirstNameModified">First Name</option>
                    <option value="actionDate">Action Date</option>
                    <option value="user">User</option>
                </select>

                <select name="method-filter" id="method-filter" class="method-filter">
                    <option value="">Select Method</option>
                    <option value="UPDATE">UPDATE</option>
                    <option value="DELETE">DELETE</option>
                </select>

                <input type="search" name="data-searchbox" id="data-searchbox" class="data-searchbox" oninput="this.value = this.value.toUpperCase()">
                <button type="submit" id="searchbtn" class="searchbtn"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>    
        </div><br>

        <!-- Table View via search.php -->
        <div id="result"></div>

        <!-- Popup Modal Read/ View -->
        <div class="bg-modal-view">
            <div class="modal-contents-view">

                <div class="close"><i class="fa-solid fa-xmark"></i></div>

                <h1 class="student-action-type"></h1>

                <form id="studentInformationView">

                    <input type="hidden" name="id-view" id="id-view">

                    <div class="green-text">

                        <label for="student-number-view" class="student-number-view-label"><b>Student Number:</b></label>
                            <div class="tab student-number-view"></div><br>


                        <label for="student-course-view" class="student-course-view-label"><b>Student Course:</b></label>
                            <div class="tab student-course-view"></div><br>


                        <label for="student-name-view" class="student-name-view-label"><b>Student Name:</b></label>
                            <div class="tab student-name-view"></div><br>


                        <label for="student-birthdate-view" class="student-birthdate-view-label"><b>Student Birthdate:</b></label>
                            <div class="tab student-birthdate-view"></div><br>


                        <label for="student-gender-view" class="student-gender-view-label"><b>Student Gender:</b></label>
                            <div class="tab student-gender-view"></div><br>


                        <label for="student-address-view" class="student-address-view-label"><b>Student Current Address:</b></label>
                            <div class="tab student-address-view"></div><br>


                        <label for="student-provincial-address-view" class="student-provincial-address-view-label"><b>Student Provincial Address:</b></label>
                            <div class="tab student-provincial-address-view"></div><br>


                        <label for="student-contact-number-view" class="student-contact-number-view-label"><b>Student Contact Number:</b></label>
                            <div class="tab student-contact-number-view"></div><br>


                        <label for="student-email-view" class="student-email-view-label"><b>Student Email Address:</b></label>
                            <div class="tab student-email-view"></div><br>


                        <label for="student-guardian-view" class="student-guardian-view-label"><b>Student Guardian:</b></label>
                            <div class="tab student-guardian-view"></div><br>

                        <label for="guardian-contact-number-view" class="guardian-contact-number-view-label"><b>Guardian Contact Number:</b></label>
                            <div class="tab guardian-contact-number-view"></div><br>             


                        <label for="student-remark-view" class="student-remark-view-label"><b>Remark:</b></label>
                            <div class="tab student-remark-view"></div><br>


                        <label for="student-sponsor-view" class="student-sponsor-view-label"><b>Sponsor:</b></label>
                            <div class="tab student-sponsor-view"></div><br>

                            
                        <label for="student-hs-address-view" class="student-hs-address-view-label"><b>Student HighSchool Address:</b></label>
                            <div class="tab student-hs-address-view"></div><br>

                        

                        <label for="student-company-name-view" class="student-company-name-view-label"><b>Student Company Name:</b></label>
                            <div class="tab student-company-name-view"></div><br>
                            
                        <label for="student-company-address-view" class="student-company-address-view-label"><b>Student Company Address:</b></label>
                            <div class="tab student-company-address-view"></div><br>

                        <label for="student-company-position-view" class="student-company-position-view-label"><b>Student Company Position:</b></label>
                            <div class="tab student-company-position-view"></div><br>

                        <label for="student-company-contact-number-view" class="student-company-contact-number-view-label"><b>Student Company Contact Number:</b></label>
                            <div class="tab student-company-contact-number-view"></div><br>
                    </div>
                    
                    <div class="viewport-wrapper">
                        <a href="#" id="restore" class="restore">Restore</a>
                    </div>

                </form>
            </div>
        </div>



        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="../../JS/scriptLog.js"></script>
        <!-- Prevents resubmission of form data when refreshing -->
        <script>
            // jQuery Version of Prevent Resubmission of Form Data when Refreshing
            $(document).ready(function(){
                window.history.replaceState("","",window.location.href)
            });
        </script>
    </body>
</html>