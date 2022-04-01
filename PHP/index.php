<!-- Insert Form Data to Database -->
<?php
    session_start();
    // database connection
    include('config.php');

    $added = false;

    //Add  new student code 
    if(isset($_POST['submit'])){

        // Form Data
        $studentNumber = $_POST['student-number'];

        $studentSurname = $_POST['student-surname'];
        $studentFirstName = $_POST['student-first-name'];
        $studentMiddleIninital = $_POST['student-middle-initial'];

        $studentBirthdate = $_POST['student-birthdate'];

        $studentGender = $_POST['student-gender'];

        $studentStreet = $_POST['student-street'];
        $studentTown = $_POST['student-town'];
        $studentDistrict = $_POST['student-district'];

        $studentProvincialStreet = $_POST['student-provincial-street'];
        $studentProvincialTown = $_POST['student-provincial-town'];
        $studentProvincialDistrict = $_POST['student-provincial-district'];

        $studentPhoneNumber = $_POST['student-phone-number'];
        $studentTelephoneNumber = $_POST['student-telephone-number'];

        $studentEmail = $_POST['student-email'];

        $guardianName = $_POST['guardian-name'];
        $guardianPhoneNumber = $_POST['guardian-phone-number'];
        $guardianTelephoneNumber = $_POST['guardian-telephone-number'];

        $studentRemark = $_POST['student-remark'];

        $studentSponsor = $_POST['student-sponsor'];

        $studentHighSchoolAddress = $_POST['student-hs-address'];



        $stmt = $conn->prepare("INSERT INTO `student-information`(`studentNumber`, `studentSurname`, `studentFirstName`, `studentMiddleIninital`, `studentBirthdate`, `studentGender`, `studentStreet`, `studentTown`, `studentDistrict`, `studentProvincialStreet`, `studentProvincialTown`, `studentProvincialDistrict`, `studentPhoneNumber`, `studentTelephoneNumber`, `studentEmail`, `guardianName`, `guardianPhoneNumber`, `guardianTelephoneNumber`, `studentRemark`, `studentSponsor`, `studentHighSchoolAddress`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssssssssssssssss", $studentNumber,  $studentSurname, $studentFirstName, $studentMiddleIninital, $studentBirthdate, $studentGender,  $studentStreet, $studentTown, $studentDistrict, $studentProvincialStreet, $studentProvincialTown, $studentProvincialDistrict, $studentPhoneNumber,  $studentTelephoneNumber, $studentEmail, $guardianName, $guardianPhoneNumber, $guardianTelephoneNumber, $studentRemark, $studentSponsor, $studentHighSchoolAddress);
        $stmt->execute();
        echo "Registration Successful";

        if($stmt){
            $added = true;
        }else{
            echo "Data not Inserted";
        }

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
                    <h1>
                        Your Student Data has been Successfully Added.
                    </h1><br>
                ";
            }
        ?>



        <!-- Registration Form -->
        <form method="post"  enctype="multipart/form-data">
            <label for="student-number">Student Number:</label>
            <!--  May show error in VSCode due to return statement not used within a function body -->
                <input type="tel" name="student-number" id="student-number" onkeypress="return isNumberKey(event);"><br>


            <label for="student-name">Student Name:</label><br>
                <div class="tab student-name">
                    <label for="student-surname">Surname:</label>
                        <input type="text" name="student-surname" id="student-surname" oninput="this.value = this.value.toUpperCase()">

                    <label for="student-first-name">First Name:</label>
                        <input type="text" name="student-first-name" id="student-first-name" oninput="this.value = this.value.toUpperCase()">

                    <label for="student-middle-initial">Middle Initial:</label>
                        <input type="text" name="student-middle-initial" id="student-middle-initial" oninput="this.value = this.value.toUpperCase()">
                </div><br>


            <label for="student-birthdate">Student Birthdate:</label>
                <input type="date" name="student-birthdate" id="student-birthdate"><br>


            <label for="student-gender">Student Gender:</label>
                <input type="radio" id="student-gender-male" name="student-gender" value="MALE">
                <label for="student-gender-male">MALE</label> 

                <input type="radio" id="student-gender-female" name="student-gender" value="FEMALE">
                <label for="student-gender-female">FEMALE</label><br>


            <label for="student-address">Student Current Address:</label><br>
                <div class="tab student-address">
                    <label for="student-street">Street:</label>
                        <input type="text" name="student-street" id="student-street" oninput="this.value = this.value.toUpperCase()"><br>

                    <label for="student-town">Town:</label>
                        <input type="text" name="student-town" id="student-town" oninput="this.value = this.value.toUpperCase()"><br>

                    <label for="student-district">District:</label>
                        <input type="text" name="student-district" id="student-district" oninput="this.value = this.value.toUpperCase()">
                </div><br>


            <label for="student-provincial-address">Student Provincial Address:</label><br>
                <div class="tab student-provincial-address">
                    <input type="checkbox" onclick="SameAsCurrent(this)" name="current-address" id="current-address" value="true">
                    <label for="vehicle1"> Same as Current Address</label><br>

                    <div class="hide" id="hide">
                        <label for="student-provincial-street">Street:</label>
                            <input type="text" name="student-provincial-street" id="student-provincial-street" oninput="this.value = this.value.toUpperCase()"><br>

                        <label for="student-provincial-town">Town:</label>
                            <input type="text" name="student-provincial-town" id="student-provincial-town" oninput="this.value = this.value.toUpperCase()"><br>

                        <label for="student-provincial-district">District:</label>
                            <input type="text" name="student-provincial-district" id="student-provincial-district" oninput="this.value = this.value.toUpperCase()">
                    </div>
                </div><br>


            <label for="student-phone-number">Student Phone Number:</label>
                <input type="tel" name="student-phone-number" id="student-phone-number" onkeypress="return isPhone(event);">

            <label for="student-telephone-number">Student Telephone Number:</label>
                <input type="tel" name="student-telephone-number" id="student-telephone-number" onkeypress="return isPhone(event);"><br>
            
            
            <label for="student-email">Student Email Address:</label>
                <input type="email" name="student-email" id="student-email"><br>
            

            <label for="student-guardian">Student Guardian:</label><br>
                <div class="tab student-guardian">
                    <label for="guardian-name">Guardian Name:</label>
                        <input type="text" name="guardian-name" id="guardian-name" oninput="this.value = this.value.toUpperCase()"><br>

                    <label for="guardian-phone-number">Guardian Phone Number:</label>
                        <input type="tel" name="guardian-phone-number" id="guardian-phone-number" onkeypress="return isPhone(event);">
                    
                    <label for="guardian-telephone-number">Guardian Telephone Number:</label>
                        <input type="tel" name="guardian-telephone-number" id="guardian-telephone-number" onkeypress="return isPhone(event);"> 
                </div><br>


            <label for="student-remark">Remark:</label>
                <!-- <input type="text" name="student-remark" id="student-remark" oninput="this.value = this.value.toUpperCase()"><br> -->
                <textarea name="student-remark" id="student-remark" cols="30" rows="10" oninput="this.value = this.value.toUpperCase()"></textarea><br>


            <label for="student-sponsor">Sponsor:</label>
                <input type="text" name="student-sponsor" id="student-sponsor" oninput="this.value = this.value.toUpperCase()"><br>

                
            <label for="student-hs-address">Student HighSchool Address:</label>
                <!-- <input type="text" name="student-hs-address" id="student-hs-address" oninput="this.value = this.value.toUpperCase()"><br> -->
                <textarea name="student-hs-address" id="student-hs-address" cols="30" rows="10" oninput="this.value = this.value.toUpperCase()"></textarea><br>

            <input type="submit" name="submit" value="Submit">
        </form>

        <script src="../ETC/script.js"></script>
    </body>
</html>