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
                    <option value="studentSurname">Surname</option>
                    <option value="studentFirstName">First Name</option>
                    <option value="studentProvincialDistrict">Province</option>
                    <option value="studentTown">City</option>
                </select>
                <input type="search" name="data-searchbox" id="data-searchbox" class="data-searchbox" oninput="this.value = this.value.toUpperCase()">
                <button type="submit" id="searchbtn" class="searchbtn"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>    
        </div><br>



        <!-- Alert Messages -->
        <div class="alerts">
            <?php
                // Create/ Insert Alerts
                if(isset($_SESSION['insert-success'])){
                    echo 
                    "<div class='alert-success'>
                        <h3>"
                            . $_SESSION['insert-success'] .
                        "</h3>
                    </div><br>";
                    unset($_SESSION['insert-success']);
                }

                if(isset($_SESSION['duplicate-insert'])){
                    echo 
                    "<div class='alert-error'>
                        <h3>"
                            . $_SESSION['duplicate-insert'] .
                        "</h3>
                    </div><br>";
                    unset($_SESSION['duplicate-insert']);
                }

                // Update/ Edit Alerts
                if(isset($_SESSION['update-success'])){
                    echo 
                    "<div class='alert-success'>
                        <h3>"
                            . $_SESSION['update-success'] .
                        "</h3>
                    </div><br>";
                    unset($_SESSION['update-success']);
                }

                if(isset($_SESSION['duplicate-edit'])){
                    echo 
                    "<div class='alert-error'>
                        <h3>"
                            . $_SESSION['duplicate-edit'] .
                        "</h3>
                    </div><br>";
                    unset($_SESSION['duplicate-edit']);
                }

                // Delete Alert
                if(isset($_SESSION['delete-success'])){
                    echo 
                    "<div class='alert-error'>
                        <h3>"
                            . $_SESSION['delete-success'] .
                        "</h3>
                    </div><br>";
                    unset($_SESSION['delete-success']);
                }
            ?>
        </div>
        


        <!-- Show Popup Modal Create/ Insert -->
        <a href="#" id="create" class="create">Create</a>



        <!-- Table View via search.php -->
        <div id="result"></div>



        <!-- Chart View -->
        <div class="row">

            <div class="chart-container">
                <h1>GENDER</h1>
                <div class="chartBar">
                    <canvas id="gender_chart"></canvas>
                </div>
            </div>

            <div class="chart-container">
                <h1>CITY</h1>
                <div class="chartDonut">
                    <canvas id="city_chart"></canvas>
                </div>
            </div>
            
            <div class="chart-container">
                <h1>PROVINCE</h1>
                <div class="chartDonut">
                    <canvas id="province_chart"></canvas>
                </div>
            </div>
            
        </div>
        

        <!-- Popup Modal Delete Confirmation -->
        <div class="bg-modal-delete">
            <div class="modal-contents-delete">
                <table class="popdel" id="popdel">
                    <thead>
                        <tr>
                            <td colspan="2">Are you sure you want to delete this row?</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="#" id="cancel" class="cancel">No</a></td>
                            <td><a href="#" id="" class="confirm">Yes</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Popup Modal Create/ Insert -->
        <div class="bg-modal">
            <div class="modal-contents">

                <div class="close"><i class="fa-solid fa-xmark"></i></div>
                
                <h1>Create</h1>
                <!-- Registration Form -->
                <form id="studentInformationCreate">
                    <label for="student-number">Student Number:</label>
                        <!--  May show error in VSCode due to return statement not used within a function body -->
                        <input type="tel" name="student-number" id="student-number" onkeypress="return isNumberKey(event);" maxlength="50"><br>


                    <label for="student-course">Course:</label>
                        <input type="text" name="student-course" id="student-course" oninput="this.value = this.value.toUpperCase()" maxlength="100"><br>


                    <label class="student-name-label" for="student-name">Student Name:</label>

                        <div class="tab student-name">
                            <label for="student-surname">Surname:</label>
                                <input type="text" name="student-surname" id="student-surname" oninput="this.value = this.value.toUpperCase()" maxlength="50">

                            <label for="student-first-name">First Name:</label>
                                <input type="text" name="student-first-name" id="student-first-name" oninput="this.value = this.value.toUpperCase()" maxlength="50">

                            <label for="student-middle-initial">Middle Initial:</label>
                                <input type="text" name="student-middle-initial" id="student-middle-initial" oninput="this.value = this.value.toUpperCase()" maxlength="5">
                        </div><br>


                    <label for="student-birthdate">Student Birthdate:</label>
                        <input type="date" name="student-birthdate" id="student-birthdate"><br>


                    <label for="student-gender">Student Gender:</label>
                        <input type="radio" id="student-gender-male" name="student-gender" value="MALE"/>
                        <label for="student-gender-male">MALE</label> 

                        <input type="radio" id="student-gender-female" name="student-gender" value="FEMALE"/>
                        <label class="student-gender-label" for="student-gender-female">FEMALE</label><br>


                    <label class="student-address-label" for="student-address">Student Current Address:</label>

                        <div class="tab student-address">
                            <label for="student-house-number">House Number:</label>
                                <input type="text" name="student-house-number" id="student-house-number" onkeypress="return isHouseNumber(event);" maxlength="10"><br>

                            <label for="student-street">Street:</label>
                                <input type="text" name="student-street" id="student-street" oninput="this.value = this.value.toUpperCase()" maxlength="100"><br>

                            <label for="student-subdivision">Subdivision:</label>
                                <input type="text" name="student-subdivision" id="student-subdivision" oninput="this.value = this.value.toUpperCase()" maxlength="100"><br>

                            <label for="student-barangay">Barangay:</label>
                                <input type="text" name="student-barangay" id="student-barangay" oninput="this.value = this.value.toUpperCase()" maxlength="100"><br>

                            <label for="student-town">Town:</label>
                                <input type="text" name="student-town" id="student-town" oninput="this.value = this.value.toUpperCase()" maxlength="100"><br>

                            <label for="student-district">District:</label>
                                <input type="text" name="student-district" id="student-district" oninput="this.value = this.value.toUpperCase()" maxlength="100">
                        </div><br>


                    <label class="student-provincial-address-label" for="student-provincial-address">Student Provincial Address:</label>

                        <div class="tab student-provincial-address">
                            <input type="checkbox" onclick="SameAsCurrentCreate(this)" name="current-address" id="current-address" value="true">
                            <label for="current-address"> Same as Current Address</label><br>

                            <label for="student-provincial-house-number">House Number:</label>
                                <input type="text" name="student-provincial-house-number" id="student-provincial-house-number" onkeypress="return isHouseNumber(event);" maxlength="10"><br>

                            <label for="student-provincial-street">Street:</label>
                                <input type="text" name="student-provincial-street" id="student-provincial-street" oninput="this.value = this.value.toUpperCase()" maxlength="100"><br>

                            <label for="student-provincial-subdivision">Subdivision:</label>
                                <input type="text" name="student-provincial-subdivision" id="student-provincial-subdivision" oninput="this.value = this.value.toUpperCase()" maxlength="100"><br>

                            <label for="student-provincial-barangay">Barangay:</label>
                                <input type="text" name="student-provincial-barangay" id="student-provincial-barangay" oninput="this.value = this.value.toUpperCase()" maxlength="100"><br>

                            <label for="student-provincial-town">Town:</label>
                                <input type="text" name="student-provincial-town" id="student-provincial-town" oninput="this.value = this.value.toUpperCase()" maxlength="100"><br>

                            <label for="student-provincial-district">District:</label>
                                <input type="text" name="student-provincial-district" id="student-provincial-district" oninput="this.value = this.value.toUpperCase()" maxlength="100">

                        </div><br>


                    <label for="student-contact-number">Student Contact Number:</label>
                        <input type="tel" name="student-contact-number" id="student-contact-number" onkeypress="return isPhone(event);" maxlength="15"><br>
                    
                    
                    <label for="student-email">Student Email Address:</label>
                        <input type="email" name="student-email" id="student-email" maxlength="50"><br>
                    

                    <label class="student-guardian-label" for="student-guardian">Student Guardian:</label>

                        <div class="tab student-guardian">
                            <label for="guardian-name">Guardian Name:</label>
                                <input type="text" name="guardian-name" id="guardian-name" oninput="this.value = this.value.toUpperCase()" maxlength="100"><br>


                            <label for="guardian-contact-number">Guardian Contact Number:</label>
                                <input type="tel" name="guardian-contact-number" id="guardian-contact-number" onkeypress="return isPhone(event);" maxlength="15">
                        </div><br>


                    <label for="student-remark">Remark:</label>
                        <textarea name="student-remark" id="student-remark" cols="30" rows="10" oninput="this.value = this.value.toUpperCase()" maxlength="255"></textarea><br>

                            <input type="checkbox" onclick="AddressNotFoundCreate(this)" name="address-not-found" id="address-not-found" value="true">
                                <label for="address-not-found"> Address not found</label><br>

                            <input type="checkbox" onclick="UnableToReachCreate(this)" name="unable-to-reach" id="unable-to-reach" value="true">
                                <label for="unable-to-reach"> Unable to reach Contact Number</label><br>


                    <label for="student-sponsor">Sponsor:</label>
                        <input type="text" name="student-sponsor" id="student-sponsor" oninput="this.value = this.value.toUpperCase()" maxlength="50"><br>

                        
                    <label for="student-hs-address">Student HighSchool Address:</label>
                        <textarea name="student-hs-address" id="student-hs-address" cols="30" rows="10" oninput="this.value = this.value.toUpperCase()" maxlength="255"></textarea><br>


                    <label for="student-company-name">Student Company Name:</label>
                        <input type="text" name="student-company-name" id="student-company-name" oninput="this.value = this.value.toUpperCase()" maxlength="50"><br>

                        
                    <label for="student-company-address">Student Company Address:</label>
                        <textarea name="student-company-address" id="student-company-address" cols="30" rows="10" oninput="this.value = this.value.toUpperCase()" maxlength="255"></textarea><br>


                    <label for="student-company-position">Student Company Position:</label>
                        <input type="text" name="student-company-position" id="student-company-position" oninput="this.value = this.value.toUpperCase()" maxlength="50"><br>

                        
                    <label for="student-company-contact-number">Student Company Contact Number:</label>
                        <input type="tel" name="student-company-contact-number" id="student-company-contact-number" onkeypress="return isPhone(event);" maxlength="15"><br>

                    <button type="submit" id="submit" class="submit">Submit</button>

                </form>
            </div>
        </div>

        <!-- Popup Modal Update/ Edit -->
        <div class="bg-modal-edit">
            <div class="modal-contents-edit">

                <div class="close"><i class="fa-solid fa-xmark"></i></div>

                <h1>Update</h1>
                <!-- Registration Form -->
                <form id="studentInformationEdit">

                    <input type="hidden" name="id-edit" id="id-edit">

                    <label for="student-number-edit">Student Number:</label>
                    <input type="hidden" name="student-number-edit-hidden" id="student-number-edit-hidden">
                        <!--  May show error in VSCode due to return statement not used within a function body -->
                        <input type="tel" name="student-number-edit" id="student-number-edit" onkeypress="return isNumberKey(event);" maxlength="50"><br>


                    <label for="student-course-edit">Course:</label>
                    <input type="hidden" name="student-course-edit-hidden" id="student-course-edit-hidden">
                        <input type="text" name="student-course-edit" id="student-course-edit" oninput="this.value = this.value.toUpperCase()" maxlength="100"><br>


                    <label class="student-name-label-edit" for="student-name-edit">Student Name:</label>

                        <div class="tab student-name-edit">
                            <label for="student-surname-edit">Surname:</label>
                            <input type="hidden" name="student-surname-edit-hidden" id="student-surname-edit-hidden">
                                <input type="text" name="student-surname-edit" id="student-surname-edit" oninput="this.value = this.value.toUpperCase()" maxlength="50">

                            <label for="student-first-name-edit">First Name:</label>
                            <input type="hidden" name="student-first-name-edit-hidden" id="student-first-name-edit-hidden">
                                <input type="text" name="student-first-name-edit" id="student-first-name-edit" oninput="this.value = this.value.toUpperCase()" maxlength="50">

                            <label for="student-middle-initial-edit">Middle Initial:</label>
                            <input type="hidden" name="student-middle-initial-edit-hidden" id="student-middle-initial-edit-hidden">
                                <input type="text" name="student-middle-initial-edit" id="student-middle-initial-edit" oninput="this.value = this.value.toUpperCase()" maxlength="5">
                        </div><br>


                    <label for="student-birthdate-edit">Student Birthdate:</label>
                    <input type="hidden" name="student-birthdate-edit-hidden" id="student-birthdate-edit-hidden">
                        <input type="date" name="student-birthdate-edit" id="student-birthdate-edit"><br>


                    <label for="student-gender-edit">Student Gender:</label>
                    <input type="hidden" name="student-gender-edit-hidden" id="student-gender-edit-hidden">
                        <input type="radio" id="student-gender-male-edit" name="student-gender-edit" value="MALE"/>
                        <label for="student-gender-male-edit">MALE</label> 

                        <input type="radio" id="student-gender-female-edit" name="student-gender-edit" value="FEMALE"/>
                        <label class="student-gender-label-edit" for="student-gender-female-edit">FEMALE</label><br>


                    <label class="student-address-label-edit" for="student-address-edit">Student Current Address:</label>

                        <div class="tab student-address-edit">
                            <label for="student-house-number-edit">House Number:</label>
                            <input type="hidden" name="student-house-number-edit-hidden" id="student-house-number-edit-hidden">
                                <input type="text" name="student-house-number-edit" id="student-house-number-edit" onkeypress="return isHouseNumber(event);" maxlength="10"><br>

                            <label for="student-street-edit">Street:</label>
                            <input type="hidden" name="student-street-edit-hidden" id="student-street-edit-hidden">
                                <input type="text" name="student-street-edit" id="student-street-edit" oninput="this.value = this.value.toUpperCase()" maxlength="100"><br>

                            <label for="student-subdivision-edit">Subdivision:</label>
                            <input type="hidden" name="student-subdivision-edit-hidden" id="student-subdivision-edit-hidden">
                                <input type="text" name="student-subdivision-edit" id="student-subdivision-edit" oninput="this.value = this.value.toUpperCase()" maxlength="100"><br>

                            <label for="student-barangay-edit">Barangay:</label>
                            <input type="hidden" name="student-barangay-edit-hidden" id="student-barangay-edit-hidden">
                                <input type="text" name="student-barangay-edit" id="student-barangay-edit" oninput="this.value = this.value.toUpperCase()" maxlength="100"><br>

                            <label for="student-town-edit">Town:</label>
                            <input type="hidden" name="student-town-edit-hidden" id="student-town-edit-hidden">
                                <input type="text" name="student-town-edit" id="student-town-edit" oninput="this.value = this.value.toUpperCase()" maxlength="100"><br>

                            <label for="student-district-edit">District:</label>
                            <input type="hidden" name="student-district-edit-hidden" id="student-district-edit-hidden">
                                <input type="text" name="student-district-edit" id="student-district-edit" oninput="this.value = this.value.toUpperCase()" maxlength="100">
                        </div><br>


                    <label class="student-provincial-address-label-edit" for="student-provincial-address-edit">Student Provincial Address:</label>

                        <div class="tab student-provincial-address-edit">
                            <input type="checkbox" onclick="SameAsCurrentEdit(this)" name="current-address-edit" id="current-address-edit" value="true">

                            <label for="current-address-edit"> Same as Current Address</label><br>

                            <label for="student-provincial-house-number-edit">House Number:</label>
                            <input type="hidden" name="student-provincial-house-number-edit-hidden" id="student-provincial-house-number-edit-hidden">
                                <input type="text" name="student-provincial-house-number-edit" id="student-provincial-house-number-edit" onkeypress="return isHouseNumber(event);" maxlength="10"><br>

                            <label for="student-provincial-street-edit">Street:</label>
                            <input type="hidden" name="student-provincial-street-edit-hidden" id="student-provincial-street-edit-hidden">
                                <input type="text" name="student-provincial-street-edit" id="student-provincial-street-edit" oninput="this.value = this.value.toUpperCase()" maxlength="100"><br>

                            <label for="student-provincial-subdivision-edit">Subdivision:</label>
                            <input type="hidden" name="student-provincial-subdivision-edit-hidden" id="student-provincial-subdivision-edit-hidden">
                                <input type="text" name="student-provincial-subdivision-edit" id="student-provincial-subdivision-edit" oninput="this.value = this.value.toUpperCase()" maxlength="100"><br>

                            <label for="student-provincial-barangay-edit">Barangay:</label>
                            <input type="hidden" name="student-provincial-barangay-edit-hidden" id="student-provincial-barangay-edit-hidden">
                                <input type="text" name="student-provincial-barangay-edit" id="student-provincial-barangay-edit" oninput="this.value = this.value.toUpperCase()" maxlength="100"><br>

                            <label for="student-provincial-town-edit">Town:</label>
                            <input type="hidden" name="student-provincial-town-edit-hidden" id="student-provincial-town-edit-hidden">
                                <input type="text" name="student-provincial-town-edit" id="student-provincial-town-edit" oninput="this.value = this.value.toUpperCase()" maxlength="100"><br>

                            <label for="student-provincial-district-edit">District:</label>
                            <input type="hidden" name="student-provincial-district-edit-hidden" id="student-provincial-district-edit-hidden">
                                <input type="text" name="student-provincial-district-edit" id="student-provincial-district-edit" oninput="this.value = this.value.toUpperCase()" maxlength="100">

                        </div><br>


                    <label for="student-contact-number-edit">Student Contact Number:</label>
                    <input type="hidden" name="student-contact-number-edit-hidden" id="student-contact-number-edit-hidden">
                        <input type="tel" name="student-contact-number-edit" id="student-contact-number-edit" onkeypress="return isPhone(event);" maxlength="15"><br>
                    
                    
                    <label for="student-email-edit">Student Email Address:</label>
                    <input type="hidden" name="student-email-edit-hidden" id="student-email-edit-hidden">
                        <input type="email" name="student-email-edit" id="student-email-edit" maxlength="50"><br>
                    

                    <label class="student-guardian-label-edit" for="student-guardian-edit">Student Guardian:</label>

                        <div class="tab student-guardian-edit">
                            <label for="guardian-name-edit">Guardian Name:</label>
                            <input type="hidden" name="guardian-name-edit-hidden" id="guardian-name-edit-hidden">
                                <input type="text" name="guardian-name-edit" id="guardian-name-edit" oninput="this.value = this.value.toUpperCase()" maxlength="100"><br>


                            <label for="guardian-contact-number-edit">Guardian Contact Number:</label>
                            <input type="hidden" name="guardian-contact-number-edit-hidden" id="guardian-contact-number-edit-hidden">
                                <input type="tel" name="guardian-contact-number-edit" id="guardian-contact-number-edit" onkeypress="return isPhone(event);" maxlength="15">
                        </div><br>


                    <label for="student-remark-edit">Remark:</label>
                    <input type="hidden" name="student-remark-edit-hidden" id="student-remark-edit-hidden">
                        <textarea name="student-remark-edit" id="student-remark-edit" cols="30" rows="10" oninput="this.value = this.value.toUpperCase()" maxlength="255"></textarea><br>

                            <input type="checkbox" onclick="AddressNotFoundEdit(this)" name="address-not-found" id="address-not-found" value="true">
                                <label for="address-not-found"> Address not found</label><br>

                            <input type="checkbox" onclick="UnableToReachEdit(this)" name="unable-to-reach" id="unable-to-reach" value="true">
                                <label for="unable-to-reach"> Unable to reach Contact Number</label><br>


                    <label for="student-sponsor-edit">Sponsor:</label>
                    <input type="hidden" name="student-sponsor-edit-hidden" id="student-sponsor-edit-hidden">
                        <input type="text" name="student-sponsor-edit" id="student-sponsor-edit" oninput="this.value = this.value.toUpperCase()" maxlength="50"><br>

                        
                    <label for="student-hs-address-edit">Student HighSchool Address:</label>
                    <input type="hidden" name="student-hs-address-edit-hidden" id="student-hs-address-edit-hidden">
                        <textarea name="student-hs-address-edit" id="student-hs-address-edit" cols="30" rows="10" oninput="this.value = this.value.toUpperCase()" maxlength="255"></textarea><br>


                    <label for="student-company-name">Student Company Name:</label>
                    <input type="hidden" name="student-company-name-edit-hidden" id="student-company-name-edit-hidden">
                        <input type="text" name="student-company-name-edit" id="student-company-name-edit" oninput="this.value = this.value.toUpperCase()" maxlength="50"><br>


                    <label for="student-company-address">Student Company Address:</label>
                    <input type="hidden" name="student-company-address-edit-hidden" id="student-company-address-edit-hidden">
                        <textarea name="student-company-address-edit" id="student-company-address-edit" cols="30" rows="10" oninput="this.value = this.value.toUpperCase()" maxlength="255"></textarea><br>


                    <label for="student-company-position">Student Company Position:</label>
                    <input type="hidden" name="student-company-position-edit-hidden" id="student-company-position-edit-hidden">
                        <input type="text" name="student-company-position-edit" id="student-company-position-edit" oninput="this.value = this.value.toUpperCase()" maxlength="50"><br>


                    <label for="student-company-contact-number">Student Company Contact Number:</label>
                    <input type="hidden" name="student-company-contact-number-edit-hidden" id="student-company-contact-number-edit-hidden">
                        <input type="tel" name="student-company-contact-number-edit" id="student-company-contact-number-edit" onkeypress="return isPhone(event);" maxlength="15"><br>
                    
                        <br>
                        <br>

                    <div class="viewport-wrapper">
                        <button type="update" id="update" class="update">Update</button>
                        <a href='#' id='delete' class='delete'>DELETE</a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Popup Modal Read/ View -->
        <div class="bg-modal-view">
            <div class="modal-contents-view">

                <div class="close"><i class="fa-solid fa-xmark"></i></div>

                <h1>View</h1>
                <!-- Registration Form -->
                <form id="studentInformationView">

                    <input type="hidden" name="id-view" id="id-view">

                    <label for="student-number-view"><b>Student Number:</b></label>
                        <div class="tab student-number-view"></div><br>


                    <label for="student-course-view"><b>Student Number:</b></label>
                        <div class="tab student-course-view"></div><br>


                    <label for="student-name-view"><b>Student Name:</b></label>
                        <div class="tab student-name-view"></div><br>


                    <label for="student-birthdate-view"><b>Student Birthdate:</b></label>
                        <div class="tab student-birthdate-view"></div><br>


                    <label for="student-gender-view"><b>Student Gender:</b></label>
                        <div class="tab student-gender-view"></div><br>


                    <label for="student-address-view"><b>Student Current Address:</b></label>
                        <div class="tab student-address-view"></div><br>


                    <label for="student-provincial-address-view"><b>Student Provincial Address:</b></label>
                        <div class="tab student-provincial-address-view"></div><br>


                    <label for="student-contact-number-view"><b>Student Contact Number:</b></label>
                        <div class="tab student-contact-number-view"></div><br>
                    
                    
                    <label for="student-email-view"><b>Student Email Address:</b></label>
                        <div class="tab student-email-view"></div><br>
                    

                    <label for="student-guardian-view"><b>Student Guardian:</b></label>
                        <div class="tab student-guardian-view"></div><br>

                    <label for="guardian-contact-number-view"><b>Guardian Contact Number:</b></label>
                        <div class="tab guardian-contact-number-view"></div><br>             


                    <label for="student-remark-view"><b>Remark:</b></label>
                        <div class="tab student-remark-view"></div><br>


                    <label for="student-sponsor-view"><b>Sponsor:</b></label>
                        <div class="tab student-sponsor-view"></div><br>

                        
                    <label for="student-hs-address-view"><b>Student HighSchool Address:</b></label>
                        <div class="tab student-hs-address-view"></div><br>


                    <label for="student-company-name-view"><b>Student Company Name:</b></label>
                        <div class="tab student-company-name-view"></div><br>


                    <label for="student-company-address-view"><b>Student Company Address:</b></label>
                        <div class="tab student-company-address-view"></div><br>


                    <label for="student-company-position-view"><b>Student Company Position:</b></label>
                        <div class="tab student-company-position-view"></div><br>


                    <label for="student-company-contact-number-view"><b>Student Company Contact Number:</b></label>
                        <div class="tab student-company-contact-number-view"></div><br>
                </form>
            </div>
        </div>



        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="../../JS/script.js"></script>
        <!-- Prevents resubmission of form data when refreshing -->
        <script>
            // jQuery Version of Prevent Resubmission of Form Data when Refreshing
            $(document).ready(function(){
                window.history.replaceState("","",window.location.href)
            });
        </script>
    </body>
</html>