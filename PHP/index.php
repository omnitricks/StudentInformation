<!-- Insert Form Data to Database -->
<?php
    session_start();
    // database connection
    include('config.php');

    $added = false;
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
            $studentMiddleIninital = $_POST['student-middle-initial'];
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
            $query = "INSERT INTO `student-information`(`studentNumber`, `studentSurname`, `studentFirstName`, `studentMiddleIninital`, `studentBirthdate`, `studentGender`, `studentStreet`, `studentTown`, `studentDistrict`, `studentProvincialStreet`, `studentProvincialTown`, `studentProvincialDistrict`, `studentPhoneNumber`, `studentTelephoneNumber`, `studentEmail`, `guardianName`, `guardianPhoneNumber`, `guardianTelephoneNumber`, `studentRemark`, `studentSponsor`, `studentHighSchoolAddress`) VALUES ('$studentNumber',  '$studentSurname', '$studentFirstName', '$studentMiddleIninital', '$studentBirthdate', '$studentGender',  '$studentStreet', '$studentTown', '$studentDistrict', '$studentProvincialStreet', '$studentProvincialTown', '$studentProvincialDistrict', '$studentPhoneNumber',  '$studentTelephoneNumber', '$studentEmail', '$guardianName', '$guardianPhoneNumber', '$guardianTelephoneNumber', '$studentRemark', '$studentSponsor', '$studentHighSchoolAddress')";
  
            $run_data = mysqli_query($conn,$query);

            if($run_data){
                $added = true;

                unset($_POST['student-number'], $_POST['student-surname'],$_POST['student-first-name'], $_POST['student-middle-initial'], $_POST['student-student-birthdate'], $_POST['student-gender'], $_POST['student-street'], $_POST['student-town'], $_POST['student-district'], $_POST['student-provincial-street'], $_POST['student-provincial-town'], $_POST['student-provincial-district'], $_POST['student-phone-number'], $_POST['student-telephone-number'], $_POST['student-email'], $_POST['guardian-name'], $_POST['guardian-phone-number'], $_POST['guardian-telephone-number'], $_POST['student-remark'], $_POST['student-sponsor'], $_POST['student-hs-address']); 
            }else{
                echo "Data not Inserted";
            }
        }

        // $stmt = $conn->prepare("INSERT INTO `student-information`(`studentNumber`, `studentSurname`, `studentFirstName`, `studentMiddleIninital`, `studentBirthdate`, `studentGender`, `studentStreet`, `studentTown`, `studentDistrict`, `studentProvincialStreet`, `studentProvincialTown`, `studentProvincialDistrict`, `studentPhoneNumber`, `studentTelephoneNumber`, `studentEmail`, `guardianName`, `guardianPhoneNumber`, `guardianTelephoneNumber`, `studentRemark`, `studentSponsor`, `studentHighSchoolAddress`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        // $stmt->bind_param("sssssssssssssssssssss", $studentNumber,  $studentSurname, $studentFirstName, $studentMiddleIninital, $studentBirthdate, $studentGender,  $studentStreet, $studentTown, $studentDistrict, $studentProvincialStreet, $studentProvincialTown, $studentProvincialDistrict, $studentPhoneNumber,  $studentTelephoneNumber, $studentEmail, $guardianName, $guardianPhoneNumber, $guardianTelephoneNumber, $studentRemark, $studentSponsor, $studentHighSchoolAddress);
        // $stmt->execute();
        // echo "Registration Successful";

        

    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Student Information</title>
        
        <link rel="stylesheet" href="https://unpkg.com/open-props"/>
        <link rel="stylesheet" href="../ETC/style.css">
        <script src="https://kit.fontawesome.com/072cf49956.js" crossorigin="anonymous"></script>
    </head>
    <body>

        <!-- Search Bar with Drop Down Box for Class Selection -->
        <div class="searchbar">
            <form action="search.php" method="get">
                <select name="data-filter" id="data-filter">
                    <option value="">Select Filter</option>
                    <option value="studentNumber">Student Number</option>
                    <option value="studentSurname">Surname</option>
                    <option value="studentFirstName">First Name</option>
                    <option value="student-provincial-district">Province</option>
                    <option value="student-district">City</option>
                </select>
                <input type="search" name="data-searchbox" id="data-searchbox" oninput="this.value = this.value.toUpperCase()">
                <input type="submit" value="Search">
            </form>    
        </div><br>

        <!-- Alert -->
        <?php
            if($added){
                echo "
                    <div class='alert-success' style='background-color: var(--green-1);
                    border-left: 5px solid var(--green-3);'>
                        <h3 style='padding-left: 5px;'>
                            Student Data has been Successfully Added.
                        </h3>
                    </div><br>
                ";
            }
        ?>


    <a href="#" id="create" class="create">Create</a>


    <div class="bg-modal">
        <div class="modal-contents">

            <div class="close"><i class="fa-solid fa-xmark"></i></div>

            <!-- Registration Form -->
            <form method="post"  enctype="multipart/form-data" id="studentInformation">
                <label for="student-number">Student Number:</label>
                <!--  May show error in VSCode due to return statement not used within a function body -->
                    <input type="tel" name="student-number" id="student-number" onkeypress="return isNumberKey(event);" maxlength="255" value="<?php echo isset($_POST['student-number']) ? $_POST['student-number'] : ''; ?>" require>

                    <span class="error" style="color: var(--red-9);"><?php echo isset($errors['studentNumberError']) ? $errors['studentNumberError'] : ''; ?></span><br>


                <label for="student-name">Student Name:</label>

                <span class="error" style="color: var(--red-9);"><?php echo isset($errors['studentNameError']) ? $errors['studentNameError'] : ''; ?></span><br>
                    <div class="tab student-name">
                        <label for="student-surname">Surname:</label>
                            <input type="text" name="student-surname" id="student-surname" oninput="this.value = this.value.toUpperCase()" maxlength="50" value="<?php echo isset($_POST['student-surname']) ? $_POST['student-surname'] : ''; ?>">

                        <label for="student-first-name">First Name:</label>
                            <input type="text" name="student-first-name" id="student-first-name" oninput="this.value = this.value.toUpperCase()" maxlength="50" value="<?php echo isset($_POST['student-first-name']) ? $_POST['student-first-name'] : ''; ?>">

                        <label for="student-middle-initial">Middle Initial:</label>
                            <input type="text" name="student-middle-initial" id="student-middle-initial" oninput="this.value = this.value.toUpperCase()" maxlength="5" value="<?php echo isset($_POST['student-middle-initial']) ? $_POST['student-middle-initial'] : ''; ?>">
                    </div><br>


                <label for="student-birthdate">Student Birthdate:</label>
                    <input type="date" name="student-birthdate" id="student-birthdate" value="<?php echo isset($_POST['student-birthdate']) ? $_POST['student-birthdate'] : ''; ?>">

                    <span class="error" style="color: var(--red-9);"><?php echo isset($errors['studentBirthdateError']) ? $errors['studentBirthdateError'] : ''; ?></span><br>


                <label for="student-gender">Student Gender:</label>
                    <input type="radio" id="student-gender-male" name="student-gender" value="MALE" <?php if(isset($_POST['student-gender']) && $_POST['student-gender'] == "MALE") { echo ' checked="checked"'; } ?>/>
                    <label for="student-gender-male">MALE</label> 

                    <input type="radio" id="student-gender-female" name="student-gender" value="FEMALE" <?php if(isset($_POST['student-gender']) && $_POST['student-gender'] == "FEMALE") { echo ' checked="checked"'; } ?>/>
                    <label for="student-gender-female">FEMALE</label>

                    <span class="error" style="color: var(--red-9);"><?php echo isset($errors['studentGenderError']) ? $errors['studentGenderError'] : ''; ?></span><br>


                <label for="student-address">Student Current Address:</label>

                <span class="error" style="color: var(--red-9);"><?php echo isset($errors['studentAddressError']) ? $errors['studentAddressError'] : ''; ?></span><br>
                    <div class="tab student-address">
                        <label for="student-street">Street:</label>
                            <input type="text" name="student-street" id="student-street" oninput="this.value = this.value.toUpperCase()" maxlength="255" value="<?php echo isset($_POST['student-street']) ? $_POST['student-street'] : ''; ?>"><br>

                        <label for="student-town">Town:</label>
                            <input type="text" name="student-town" id="student-town" oninput="this.value = this.value.toUpperCase()" maxlength="150" value="<?php echo isset($_POST['student-town']) ? $_POST['student-town'] : ''; ?>"><br>

                        <label for="student-district">District:</label>
                            <input type="text" name="student-district" id="student-district" oninput="this.value = this.value.toUpperCase()" maxlength="255" value="<?php echo isset($_POST['student-district']) ? $_POST['student-district'] : ''; ?>">
                    </div><br>


                <label for="student-provincial-address">Student Provincial Address:</label>

                <span class="error" style="color: var(--red-9);"><?php echo isset($errors['studentProvincialAddressError']) ? $errors['studentProvincialAddressError'] : ''; ?></span><br>
                    <div class="tab student-provincial-address">
                        <input type="checkbox" onclick="SameAsCurrent(this)" name="current-address" id="current-address" value="true">
                        <label for="vehicle1"> Same as Current Address</label><br>

                        <div class="hide" id="hide">
                            <label for="student-provincial-street">Street:</label>
                                <input type="text" name="student-provincial-street" id="student-provincial-street" oninput="this.value = this.value.toUpperCase()" maxlength="255" value="<?php echo isset($_POST['student-provincial-street']) ? $_POST['student-provincial-street'] : ''; ?>"><br>

                            <label for="student-provincial-town">Town:</label>
                                <input type="text" name="student-provincial-town" id="student-provincial-town" oninput="this.value = this.value.toUpperCase()" maxlength="150" value="<?php echo isset($_POST['student-provincial-town']) ? $_POST['student-provincial-town'] : ''; ?>"><br>

                            <label for="student-provincial-district">District:</label>
                                <input type="text" name="student-provincial-district" id="student-provincial-district" oninput="this.value = this.value.toUpperCase()" maxlength="255" value="<?php echo isset($_POST['student-provincial-district']) ? $_POST['student-provincial-district'] : ''; ?>">
                        </div>
                    </div><br>


                <label for="student-phone-number">Student Phone Number:</label>
                    <input type="tel" name="student-phone-number" id="student-phone-number" onkeypress="return isPhone(event);" maxlength="15" value="<?php echo isset($_POST['student-phone-number']) ? $_POST['student-phone-number'] : ''; ?>">

                <label for="student-telephone-number">Student Telephone Number:</label>
                    <input type="tel" name="student-telephone-number" id="student-telephone-number" onkeypress="return isPhone(event);" maxlength="10" value="<?php echo isset($_POST['student-telephone-number']) ? $_POST['student-telephone-number'] : ''; ?>">

                    <span class="error" style="color: var(--red-9);"><?php echo isset($errors['studentPhoneNumberError']) ? $errors['studentPhoneNumberError'] : ''; ?></span><br>
                
                
                <label for="student-email">Student Email Address:</label>
                    <input type="email" name="student-email" id="student-email" maxlength="50" value="<?php echo isset($_POST['student-email']) ? $_POST['student-email'] : ''; ?>">

                    <span class="error" style="color: var(--red-9);"><?php echo isset($errors['studentEmailError']) ? $errors['studentEmailError'] : ''; ?></span><br>
                

                <label for="student-guardian">Student Guardian:</label>

                <span class="error" style="color: var(--red-9);"><?php echo isset($errors['studentGuardianError']) ? $errors['studentGuardianError'] : ''; ?></span><br>
                    <div class="tab student-guardian">
                        <label for="guardian-name">Guardian Name:</label>
                            <input type="text" name="guardian-name" id="guardian-name" oninput="this.value = this.value.toUpperCase()" maxlength="100" value="<?php echo isset($_POST['guardian-name']) ? $_POST['guardian-name'] : ''; ?>"><br>

                        <label for="guardian-phone-number">Guardian Phone Number:</label>
                            <input type="tel" name="guardian-phone-number" id="guardian-phone-number" onkeypress="return isPhone(event);" maxlength="15" value="<?php echo isset($_POST['guardian-phone-number']) ? $_POST['guardian-phone-number'] : ''; ?>">
                        
                        <label for="guardian-telephone-number">Guardian Telephone Number:</label>
                            <input type="tel" name="guardian-telephone-number" id="guardian-telephone-number" onkeypress="return isPhone(event);" maxlength="10" value="<?php echo isset($_POST['guardian-telephone-number']) ? $_POST['guardian-telephone-number'] : ''; ?>"> 
                    </div><br>


                <label for="student-remark">Remark:</label>
                    <!-- <input type="text" name="student-remark" id="student-remark" oninput="this.value = this.value.toUpperCase()"><br> -->
                    <textarea name="student-remark" id="student-remark" cols="30" rows="10" oninput="this.value = this.value.toUpperCase()" maxlength="255" value="<?php echo isset($_POST['student-remark']) ? $_POST['student-remark'] : ''; ?>"></textarea><br>


                <label for="student-sponsor">Sponsor:</label>
                    <input type="text" name="student-sponsor" id="student-sponsor" oninput="this.value = this.value.toUpperCase()" maxlength="100" value="<?php echo isset($_POST['student-sponsor']) ? $_POST['student-sponsor'] : ''; ?>"><br>

                    
                <label for="student-hs-address">Student HighSchool Address:</label>
                    <!-- <input type="text" name="student-hs-address" id="student-hs-address" oninput="this.value = this.value.toUpperCase()"><br> -->
                    <textarea name="student-hs-address" id="student-hs-address" cols="30" rows="10" oninput="this.value = this.value.toUpperCase()" maxlength="255" value="<?php echo isset($_POST['student-hs-address']) ? $_POST['student-hs-address'] : ''; ?>"></textarea><br>

                <input type="submit" name="submit" id="submit" value="Submit">
            </form>
        </div>
    </div>
        <!-- Prevents Modal from closing, when Error is encountered while creating -->
        <?php 
            if ($errors) {
                echo '<script>
                    document.querySelector(".bg-modal").style.display = "flex";
                </script>';
            } else {
                echo '<script>
                    document.querySelector(".bg-modal").style.display = "none";
                </script>';
            }
        ?>


        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="../ETC/script.js"></script>
        <!-- Prevents resubmission of form data when refreshing -->
        <script>
            if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }
        </script>
    </body>
</html>