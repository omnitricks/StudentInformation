<!-- Insert Form Data to Database -->
<?php
?>
<!-- <?php
    session_start();
    // database connection
    include('config.php');

    //Flag for Alerts refer to line 168
    $added = false;
    $duplicate = false;

    //Erros Stored in single array
    $errors = array();

    //Add  new student code 
    if(isset($_POST['submit'])){

        // Form Data - Required
        if (empty($_POST['student-number'])){
            $errors['studentNumberError'] = "Student Number is Required";
        } else{
            $studentNumber = $_POST['student-number'];
        }

        if (empty($_POST['student-surname']) || empty($_POST['student-first-name']) || empty($_POST['student-middle-initial'])){
            $errors['studentNameError'] = "Student Name is Required";
        } else{
            $studentSurname = $_POST['student-surname'];
            $studentFirstName = $_POST['student-first-name'];
            $studentMiddleInitial = $_POST['student-middle-initial'];
        }

        if (empty($_POST['student-birthdate'])){
            $errors['studentBirthdateError'] = "Student Birthdate is Required";
        } else{
            $studentBirthdate = $_POST['student-birthdate'];
        }

        if (empty($_POST['student-gender'])){
            $errors['studentGenderError'] = "Student Gender is Required";
        } else{
            $studentGender = $_POST['student-gender'];
        }

        if (empty($_POST['student-street']) || empty($_POST['student-town']) || empty($_POST['student-district'])){
            $errors['studentAddressError'] = "Student Address is Required";
        } else{
            $studentStreet = $_POST['student-street'];
            $studentTown = $_POST['student-town'];
            $studentDistrict = $_POST['student-district'];
        }

        if (empty($_POST['student-provincial-street']) || empty($_POST['student-provincial-town']) || empty($_POST['student-provincial-district'])){
            $errors['studentProvincialAddressError'] = "Student Provincial Address is Required";
        } else{
            $studentProvincialStreet = $_POST['student-provincial-street'];
            $studentProvincialTown = $_POST['student-provincial-town'];
            $studentProvincialDistrict = $_POST['student-provincial-district'];
        }

        if (empty($_POST['student-phone-number'])){
            $errors['studentPhoneNumberError'] = "Student Phone Number is Required";
        } else{
            $studentPhoneNumber = $_POST['student-phone-number'];
        }

        if (empty($_POST['student-email'])){
            $errors['studentEmailError'] = "Student Email is Required";
        } else{
            $studentEmail = $_POST['student-email'];
        }

        if (empty($_POST['guardian-name']) || empty($_POST['guardian-phone-number'])){
            $errors['studentGuardianError'] = "Guardian Information is Required";
        } else{
            $guardianName = $_POST['guardian-name'];
            $guardianPhoneNumber = $_POST['guardian-phone-number'];
        }


        // Form Data - optional
        if (isset($_POST['student-telephone-number'])){
            $studentTelephoneNumber = $_POST['student-telephone-number'];
        } else{
            $studentTelephoneNumber = '';
        }
        
        if (isset($_POST['guardian-telephone-number'])){
            $guardianTelephoneNumber = $_POST['guardian-telephone-number'];
        } else{
            $guardianTelephoneNumber = '';
        }
        
        if (isset($_POST['student-remark'])){
            $studentRemark = $_POST['student-remark'];
        } else{
            $studentRemark = '';
        }
        
        if (isset($_POST['student-sponsor'])){
            $studentSponsor = $_POST['student-sponsor'];
        } else{
            $studentSponsor = '';
        }
        
        if (isset($_POST['student-hs-address'])){
            $studentHighSchoolAddress = $_POST['student-hs-address'];
        } else{
            $studentHighSchoolAddress = '';
        }


        if(isset($_POST['submit']) && empty($errors)){

            //Check for Student-Number duplicate in database
            $dup = mysqli_query($conn, "SELECT * FROM `student-information` WHERE `studentNumber`='$studentNumber'");

            if(mysqli_num_rows($dup)>0){
                $duplicate = true;
            } else{

                $query = "INSERT INTO `student-information`(`studentNumber`, `studentSurname`, `studentFirstName`, `studentMiddleInitial`, `studentBirthdate`, `studentGender`, `studentStreet`, `studentTown`, `studentDistrict`, `studentProvincialStreet`, `studentProvincialTown`, `studentProvincialDistrict`, `studentPhoneNumber`, `studentTelephoneNumber`, `studentEmail`, `guardianName`, `guardianPhoneNumber`, `guardianTelephoneNumber`, `studentRemark`, `studentSponsor`, `studentHighSchoolAddress`) VALUES ('$studentNumber',  '$studentSurname', '$studentFirstName', '$studentMiddleInitial', '$studentBirthdate', '$studentGender',  '$studentStreet', '$studentTown', '$studentDistrict', '$studentProvincialStreet', '$studentProvincialTown', '$studentProvincialDistrict', '$studentPhoneNumber',  '$studentTelephoneNumber', '$studentEmail', '$guardianName', '$guardianPhoneNumber', '$guardianTelephoneNumber', '$studentRemark', '$studentSponsor', '$studentHighSchoolAddress')";
  
                $run_data = mysqli_query($conn,$query);

                if($run_data){
                    $added = true;

                    // Removes values in TextBox when form is successful
                    unset($_POST['student-number'], $_POST['student-surname'],$_POST['student-first-name'], $_POST['student-middle-initial'], $_POST['student-student-birthdate'], $_POST['student-gender'], $_POST['student-street'], $_POST['student-town'], $_POST['student-district'], $_POST['student-provincial-street'], $_POST['student-provincial-town'], $_POST['student-provincial-district'], $_POST['student-phone-number'], $_POST['student-telephone-number'], $_POST['student-email'], $_POST['guardian-name'], $_POST['guardian-phone-number'], $_POST['guardian-telephone-number'], $_POST['student-remark'], $_POST['student-sponsor'], $_POST['student-hs-address']); 

                    
                }else{
                    echo "Data not Inserted";
                }

            }
        }
    }
?> -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Student Information</title>
        
        <link rel="stylesheet" href="https://unpkg.com/open-props"/>
        <link rel="stylesheet" href="../CSS/style.css">
        <script src="https://kit.fontawesome.com/072cf49956.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <!-- Search Bar with Drop Down Box for Class Selection -->
        <div class="searchbar">
            <form action="search.php" method="get">
                <select name="data-filter" id="data-filter" class="data-filter">
                    <option value="">Select Filter</option>
                    <option value="studentNumber">Student Number</option>
                    <option value="studentSurname">Surname</option>
                    <option value="studentFirstName">First Name</option>
                    <option value="student-provincial-district">Province</option>
                    <option value="student-district">City</option>
                </select>
                <input type="search" name="data-searchbox" id="data-searchbox" class="data-searchbox" oninput="this.value = this.value.toUpperCase()">
                <button type="submit" id="searchbtn" class="searchbtn"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>    
        </div><br>


        <!-- Alert -->
        <div>
            <?php
                if(isset($_SESSION['status'])){
                    echo 
                    "<div class='alert-success' style='background-color: var(--green-1); border-left: 5px solid var(--green-3);'>
                        <h3 style='padding-left: 5px;'>"
                            . $_SESSION['status'] .
                        "</h3>
                    </div><br>";
                    unset($_SESSION['status']);
                }
            ?>

            <?php
                if(isset($_SESSION['insert'])){
                    echo 
                    "<div class='alert-success' style='background-color: var(--green-1); border-left: 5px solid var(--green-3);'>
                        <h3 style='padding-left: 5px;'>"
                            . $_SESSION['insert'] .
                        "</h3>
                    </div><br>";
                    unset($_SESSION['insert']);
                }
            ?>

            <?php
                if(isset($_SESSION['duplicateedit'])){
                    echo 
                    "<div class='alert-error' style='background-color: var(--red-1); border-left: 5px solid var(--red-3);'>
                        <h3 style='padding-left: 5px;'>"
                            . $_SESSION['duplicateedit'] .
                        "</h3>
                    </div><br>";
                    unset($_SESSION['duplicateedit']);
                }
            ?>

            <?php
                if(isset($_SESSION['duplicate'])){
                    echo 
                    "<div class='alert-error' style='background-color: var(--red-1); border-left: 5px solid var(--red-3);'>
                        <h3 style='padding-left: 5px;'>"
                            . $_SESSION['duplicate'] .
                        "</h3>
                    </div><br>";
                    unset($_SESSION['duplicate']);
                }
            ?>

            <?php
                if(isset($_SESSION['delete'])){
                    echo 
                    "<div class='alert-error' style='background-color: var(--red-1); border-top: 100px; border-left: 5px solid var(--red-3);'>
                        <h3 style='padding-left: 5px;'>"
                            . $_SESSION['delete'] .
                        "</h3>
                    </div><br>";
                    unset($_SESSION['delete']);
                }
            ?>    
        </div>
        


        <!-- Insert student information via popup modal -->
        <a href="#" id="create" class="create">Create</a>


        <!-- Insert Modal -->
        <div class="bg-modal">
            <div class="modal-contents">

                <div class="close"><i class="fa-solid fa-xmark"></i></div>
                
                <!-- Registration Form -->
                <form id="studentInformationCreate">
                    <label for="student-number">Student Number:</label>
                        <!--  May show error in VSCode due to return statement not used within a function body -->
                        <input type="tel" name="student-number" id="student-number" onkeypress="return isNumberKey(event);" maxlength="255"><br>


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
                            <label for="student-street">Street:</label>
                                <input type="text" name="student-street" id="student-street" oninput="this.value = this.value.toUpperCase()" maxlength="255"><br>

                            <label for="student-town">Town:</label>
                                <input type="text" name="student-town" id="student-town" oninput="this.value = this.value.toUpperCase()" maxlength="150"><br>

                            <label for="student-district">District:</label>
                                <input type="text" name="student-district" id="student-district" oninput="this.value = this.value.toUpperCase()" maxlength="255">
                        </div><br>


                    <label class="student-provincial-address-label" for="student-provincial-address">Student Provincial Address:</label>

                        <div class="tab student-provincial-address">
                            <input type="checkbox" onclick="SameAsCurrent(this)" name="current-address" id="current-address" value="true">
                            <label for="current-address"> Same as Current Address</label><br>

                            <!-- <div class="hide" id="hide"> -->
                                <label for="student-provincial-street">Street:</label>
                                    <input type="text" name="student-provincial-street" id="student-provincial-street" oninput="this.value = this.value.toUpperCase()" maxlength="255"><br>

                                <label for="student-provincial-town">Town:</label>
                                    <input type="text" name="student-provincial-town" id="student-provincial-town" oninput="this.value = this.value.toUpperCase()" maxlength="150"><br>

                                <label for="student-provincial-district">District:</label>
                                    <input type="text" name="student-provincial-district" id="student-provincial-district" oninput="this.value = this.value.toUpperCase()" maxlength="255">
                            <!-- </div> -->
                        </div><br>


                    <label for="student-phone-number">Student Phone Number:</label>
                        <input type="tel" name="student-phone-number" id="student-phone-number" onkeypress="return isPhone(event);" maxlength="15">

                    <label for="student-telephone-number">Student Telephone Number:</label>
                        <input type="tel" name="student-telephone-number" id="student-telephone-number" onkeypress="return isPhone(event);" maxlength="10"><br>
                    
                    
                    <label for="student-email">Student Email Address:</label>
                        <input type="email" name="student-email" id="student-email" maxlength="50"><br>
                    

                    <label class="student-guardian-label" for="student-guardian">Student Guardian:</label>

                        <div class="tab student-guardian">
                            <label class="guardian-name-label" for="guardian-name">Guardian Name:</label>
                                <input type="text" name="guardian-name" id="guardian-name" oninput="this.value = this.value.toUpperCase()" maxlength="100"><br>


                            <label for="guardian-phone-number">Guardian Phone Number:</label>
                                <input type="tel" name="guardian-phone-number" id="guardian-phone-number" onkeypress="return isPhone(event);" maxlength="15">
                            
                            <label for="guardian-telephone-number">Guardian Telephone Number:</label>
                                <input type="tel" name="guardian-telephone-number" id="guardian-telephone-number" onkeypress="return isPhone(event);" maxlength="10"> 
                        </div><br>


                    <label for="student-remark">Remark:</label>
                        <textarea name="student-remark" id="student-remark" cols="30" rows="10" oninput="this.value = this.value.toUpperCase()" maxlength="255"></textarea><br>


                    <label for="student-sponsor">Sponsor:</label>
                        <input type="text" name="student-sponsor" id="student-sponsor" oninput="this.value = this.value.toUpperCase()" maxlength="100"><br>

                        
                    <label for="student-hs-address">Student HighSchool Address:</label>
                        <textarea name="student-hs-address" id="student-hs-address" cols="30" rows="10" oninput="this.value = this.value.toUpperCase()" maxlength="255"></textarea><br>

                    <!-- <input type="submit" name="submit" id="submit" value="Submit"> -->
                    <button type="submit" id="submit" class="submit">Submit</button>
                </form>
            </div>
        </div>


        <!-- Table View -->
        <div class="tableContainer">
            <table id="tableView" class="tableView">
                <thead>
                    <tr>
                        <th colspan="2"></th>
                        <th>Student Number</th>
                        <th>Student Name</th>
                        <th>Student Birthdate</th>
                        <th>Student Gender</th>
                        <th>Student Current Address</th>
                        <th>Student Provincial Address</th>
                        <th>Student Phone Number</th>
                        <th>Student Telephone Number</th>
                        <th>Student Email Address</th>
                        <th>Guardian Name</th>
                        <th>Guardian Phone Number</th>
                        <th>Guardian Telephone Number</th>
                        <th>Remark</th>
                        <th>Sponsor</th>
                        <th>Student HighSchool Address</th>
                    </tr>
                </thead>
                <tbody>


                <!-- View Data in Table -->
                <?php
                    $get_data = "SELECT * FROM `student-information`";
                    $run_data = mysqli_query($conn,$get_data);

                    while($row = mysqli_fetch_array($run_data)){
                        // Combines data
                        $studentName = $row['studentSurname'] . ', ' . $row['studentFirstName'] . ' ' . $row['studentMiddleInitial'] . '.';
                        $studentAddress = $row['studentStreet'] . ' ' . $row['studentTown'] . ' ' . $row['studentDistrict'];
                        $studentProvincialAddress = $row['studentProvincialStreet'] . ' ' . $row['studentProvincialTown'] . ' ' . $row['studentProvincialDistrict'];

                        // Conditions for optional fields left blank
                        if($row['studentTelephoneNumber'] == ''){
                            $row['studentTelephoneNumber'] = 'N/A';
                        }
                        if($row['guardianTelephoneNumber'] == ''){
                            $row['guardianTelephoneNumber'] = 'N/A';
                        }
                        if($row['studentRemark'] == ''){
                            $row['studentRemark'] = 'N/A';
                        }
                        if($row['studentSponsor'] == ''){
                            $row['studentSponsor'] = 'N/A';
                        }
                        if($row['studentHighSchoolAddress'] == ''){
                            $row['studentHighSchoolAddress'] = 'N/A';
                        }

                        echo "<tr id='$row[id]'>";
                            echo '<td><a href="#" id="edit" class="edit"><i class="fa-solid fa-pen-to-square"></i></a></td>';
                            echo '<td><a href="#" id="delete" class="delete"><i class="fa-solid fa-trash-can"></i></a></td>';
                            echo '<td>' . $row['studentNumber'] . '</td>';
                            echo '<td>' . $studentName . '</td>';
                            echo '<td>' . $row['studentBirthdate'] . '</td>';
                            echo '<td>' . $row['studentGender'] . '</td>';
                            echo '<td>' . $studentAddress . '</td>';
                            echo '<td>' . $studentProvincialAddress . '</td>';
                            echo '<td>' . $row['studentPhoneNumber'] . '</td>';
                            echo '<td>' . $row['studentTelephoneNumber'] . '</td>';
                            echo '<td>' . $row['studentEmail'] . '</td>';
                            echo '<td>' . $row['guardianName'] . '</td>';
                            echo '<td>' . $row['guardianPhoneNumber'] . '</td>';
                            echo '<td>' . $row['guardianTelephoneNumber'] . '</td>';
                            echo '<td>' . $row['studentRemark'] . '</td>';
                            echo '<td>' . $row['studentSponsor'] . '</td>';
                            echo '<td>' . $row['studentHighSchoolAddress'] . '</td>';
                        echo '</tr>';
                    }


                ?>
                </tbody>
            </table>
        </div>
        

        <!-- Popup Modal Delete Confirmation -->
        <div class="bg-modal-delete">
            <div class="modal-contents-delete">
                <table class="popdel" id="popdel">
                    <thead>
                        <tr>
                            <td colspan="2">Are you sure?</td>
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



        <!-- Edit Modal -->
        <div class="bg-modal-edit">
            <div class="modal-contents-edit">

                <div class="close"><i class="fa-solid fa-xmark"></i></div>

                <h1>Update</h1>
                <!-- Registration Form -->
                <form id="studentInformationEdit">

                    <input type="hidden" name="id-edit" id="id-edit">

                    <label for="student-number-edit">Student Number:</label>
                        <!--  May show error in VSCode due to return statement not used within a function body -->
                        <input type="tel" name="student-number-edit" id="student-number-edit" onkeypress="return isNumberKey(event);" maxlength="255"><br>


                    <label class="student-name-label-edit" for="student-name-edit">Student Name:</label>

                        <div class="tab student-name-edit">
                            <label for="student-surname-edit">Surname:</label>
                                <input type="text" name="student-surname-edit" id="student-surname-edit" oninput="this.value = this.value.toUpperCase()" maxlength="50">

                            <label for="student-first-name-edit">First Name:</label>
                                <input type="text" name="student-first-name-edit" id="student-first-name-edit" oninput="this.value = this.value.toUpperCase()" maxlength="50">

                            <label for="student-middle-initial-edit">Middle Initial:</label>
                                <input type="text" name="student-middle-initial-edit" id="student-middle-initial-edit" oninput="this.value = this.value.toUpperCase()" maxlength="5">
                        </div><br>


                    <label for="student-birthdate-edit">Student Birthdate:</label>
                        <input type="date" name="student-birthdate-edit" id="student-birthdate-edit"><br>


                    <label for="student-gender-edit">Student Gender:</label>
                        <input type="radio" id="student-gender-male-edit" name="student-gender-edit" value="MALE"/>
                        <label for="student-gender-male-edit">MALE</label> 

                        <input type="radio" id="student-gender-female-edit" name="student-gender-edit" value="FEMALE"/>
                        <label class="student-gender-label-edit" for="student-gender-female-edit">FEMALE</label><br>


                    <label class="student-address-label-edit" for="student-address-edit">Student Current Address:</label>

                        <div class="tab student-address-edit">
                            <label for="student-street-edit">Street:</label>
                                <input type="text" name="student-street-edit" id="student-street-edit" oninput="this.value = this.value.toUpperCase()" maxlength="255"><br>

                            <label for="student-town-edit">Town:</label>
                                <input type="text" name="student-town-edit" id="student-town-edit" oninput="this.value = this.value.toUpperCase()" maxlength="150"><br>

                            <label for="student-district-edit">District:</label>
                                <input type="text" name="student-district-edit" id="student-district-edit" oninput="this.value = this.value.toUpperCase()" maxlength="255">
                        </div><br>


                    <label class="student-provincial-address-label-edit" for="student-provincial-address-edit">Student Provincial Address:</label>

                        <div class="tab student-provincial-address-edit">
                            <input type="checkbox" onclick="SameAsCurrent(this)" name="current-address-edit" id="current-address-edit" value="true">
                            <label for="current-address-edit"> Same as Current Address</label><br>

                            <!-- <div class="hide" id="hide"> -->
                                <label for="student-provincial-street-edit">Street:</label>
                                    <input type="text" name="student-provincial-street-edit" id="student-provincial-street-edit" oninput="this.value = this.value.toUpperCase()" maxlength="255"><br>

                                <label for="student-provincial-town-edit">Town:</label>
                                    <input type="text" name="student-provincial-town-edit" id="student-provincial-town-edit" oninput="this.value = this.value.toUpperCase()" maxlength="150"><br>

                                <label for="student-provincial-district-edit">District:</label>
                                    <input type="text" name="student-provincial-district-edit" id="student-provincial-district-edit" oninput="this.value = this.value.toUpperCase()" maxlength="255">
                            <!-- </div> -->
                        </div><br>


                    <label for="student-phone-number-edit">Student Phone Number:</label>
                        <input type="tel" name="student-phone-number-edit" id="student-phone-number-edit" onkeypress="return isPhone(event);" maxlength="15">

                    <label for="student-telephone-number-edit">Student Telephone Number:</label>
                        <input type="tel" name="student-telephone-number-edit" id="student-telephone-number-edit" onkeypress="return isPhone(event);" maxlength="10"><br>
                    
                    
                    <label for="student-email-edit">Student Email Address:</label>
                        <input type="email" name="student-email-edit" id="student-email-edit" maxlength="50"><br>
                    

                    <label class="student-guardian-label-edit" for="student-guardian-edit">Student Guardian:</label>

                        <div class="tab student-guardian-edit">
                            <label class="guardian-name-label-edit" for="guardian-name-edit">Guardian Name:</label>
                                <input type="text" name="guardian-name-edit" id="guardian-name-edit" oninput="this.value = this.value.toUpperCase()" maxlength="100"><br>


                            <label for="guardian-phone-number-edit">Guardian Phone Number:</label>
                                <input type="tel" name="guardian-phone-number-edit" id="guardian-phone-number-edit" onkeypress="return isPhone(event);" maxlength="15">
                            
                            <label for="guardian-telephone-number-edit">Guardian Telephone Number:</label>
                                <input type="tel" name="guardian-telephone-number-edit" id="guardian-telephone-number-edit" onkeypress="return isPhone(event);" maxlength="10"> 
                        </div><br>


                    <label for="student-remark-edit">Remark:</label>
                        <textarea name="student-remark-edit" id="student-remark-edit" cols="30" rows="10" oninput="this.value = this.value.toUpperCase()" maxlength="255"></textarea><br>


                    <label for="student-sponsor-edit">Sponsor:</label>
                        <input type="text" name="student-sponsor-edit" id="student-sponsor-edit" oninput="this.value = this.value.toUpperCase()" maxlength="100"><br>

                        
                    <label for="student-hs-address-edit">Student HighSchool Address:</label>
                        <textarea name="student-hs-address-edit" id="student-hs-address-edit" cols="30" rows="10" oninput="this.value = this.value.toUpperCase()" maxlength="255"></textarea><br>

                    <!-- <input type="update" name="update" id="update" value="Update"> -->
                    <button type="update" id="update" class="update">Update</button>
                </form>
            </div>
        </div>



        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
        <script src="../JS/script.js"></script>
        <!-- Prevents resubmission of form data when refreshing -->
        <script>
            // jQuery Version of Prevent Resubmission of Form Data when Refreshing
            $(document).ready(function(){
                window.history.replaceState("","",window.location.href)
            });
        </script>
    </body>
</html>