<?php
    // database connection
    include('../Config/config.php');

    // Erros Stored in single array
    $errors = array();

    // Form Data - Required
    if (empty($_POST['student-number'])){
        $errors['studentNumberError'] = "Student Number is Required";
    } else{
        $studentNumber = $_POST['student-number'];
    }

    if (empty($_POST['student-course'])){
        $errors['studentCourseError'] = "Student Course is Required";
    } else{
        $studentCourse = $_POST['student-course'];
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

    if (empty($_POST['student-house-number']) || empty($_POST['student-street'])  || empty($_POST['student-barangay']) || empty($_POST['student-town']) || empty($_POST['student-district'])){
        $errors['studentAddressError'] = "Student Address is Required";
    } else{
        $studentHouseNumber = $_POST['student-house-number'];
        $studentStreet = $_POST['student-street'];
        $studentBarangay = $_POST['student-barangay'];
        $studentTown = $_POST['student-town'];
        $studentDistrict = $_POST['student-district'];


        // Test if string contains the word
        $word = "CITY";
        $string = $studentTown;
        if(strpos($string, $word) !== false){
            $studentTown = $string;
        } else{
            $string .= " CITY";
            $studentTown = $string;
        }
    }

    if (empty($_POST['student-provincial-house-number']) || empty($_POST['student-provincial-street'])  || empty($_POST['student-provincial-barangay']) || empty($_POST['student-provincial-town']) || empty($_POST['student-provincial-district'])){
        $errors['studentProvincialAddressError'] = "Student Provincial Address is Required";
    } else{
        $studentProvincialHouseNumber = $_POST['student-provincial-house-number'];
        $studentProvincialStreet = $_POST['student-provincial-street'];
        $studentProvincialBarangay = $_POST['student-provincial-barangay'];
        $studentProvincialTown = $_POST['student-provincial-town'];
        $studentProvincialDistrict = $_POST['student-provincial-district'];

        // Test if string contains the word
        $word2 = "CITY";
        $string2 = $studentProvincialTown;
        if(strpos($string2, $word2) !== false){
            $studentProvincialTown = $string2;
        } else{
            $string2 .= " CITY";
            $studentProvincialTown = $string2;
        }
    }

    if (empty($_POST['student-contact-number'])){
        $errors['studentContactNumberError'] = "Student Contact Number is Required";
    } else{
        $studentContactNumber = $_POST['student-contact-number'];
    }

    if (empty($_POST['student-email'])){
        $errors['studentEmailError'] = "Student Email is Required";
    } else{
        $studentEmail = $_POST['student-email'];
    }

    if (empty($_POST['guardian-name']) || empty($_POST['guardian-contact-number'])){
        $errors['studentGuardianError'] = "Guardian Information is Required";
    } else{
        $guardianName = $_POST['guardian-name'];
        $guardianContactNumber = $_POST['guardian-contact-number'];
    }


    // Form Data - optional
    if(empty($_POST['student-subdivision'])){
        $studentSubdivision = $_POST['student-subdivision'];
    } else{
        $studentSubdivision = '';
    }

    if(empty($_POST['student-provincial-subdivision'])){
        $studentProvincialSubdivision = $_POST['student-provincial-subdivision'];
    } else{
        $studentProvincialSubdivision = '';
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

    if (isset($_POST['student-company-name'])){
        $studentCompanyName = $_POST['student-company-name'];
    } else{
        $studentCompanyName = '';
    }

    if (isset($_POST['student-company-address'])){
        $studentCompanyAddress = $_POST['student-company-address'];
    } else{
        $studentCompanyAddress = '';
    }

    if (isset($_POST['student-company-position'])){
        $studentCompanyPosition = $_POST['student-company-position'];
    } else{
        $studentCompanyPosition = '';
    }

    if (isset($_POST['student-company-contact-number'])){
        $studentCompanyContactNumber = $_POST['student-company-contact-number'];
    } else{
        $studentCompanyContactNumber = '';
    }

    $blank = '';


    if(empty($errors)){

        // Check for Student-Number duplicate in database
        $duplicateQuery = "SELECT * FROM `student-information` WHERE `studentNumber` = '$studentNumber'";
        $duplicate = mysqli_query($conn, $duplicateQuery);

        if(mysqli_num_rows($duplicate)>0){
            $_SESSION['duplicate-insert'] = "Data not Inserted, Student Number already in use";

        } else{

            $query = "INSERT INTO `student-information`(`studentNumber`, `studentCourse`, `studentSurname`, `studentFirstName`, `studentMiddleInitial`, `studentBirthdate`, `studentGender`, `studentHouseNumber`, `studentStreet`, `studentSubdivision`, `studentBarangay`, `studentTown`, `studentDistrict`, `studentProvincialHouseNumber`, `studentProvincialStreet`, `studentProvincialSubdivision`, `studentProvincialBarangay`, `studentProvincialTown`, `studentProvincialDistrict`, `studentContactNumber`, `studentEmail`, `guardianName`, `guardianContactNumber`, `studentRemark`, `studentSponsor`, `studentHighSchoolAddress`, `studentCompanyName`, `studentCompanyAddress`, `studentCompanyPosition`, `studentCompanyContactNumber`) VALUES ('$studentNumber', '$studentCourse', '$studentSurname', '$studentFirstName', '$studentMiddleInitial', '$studentBirthdate', '$studentGender', '$studentHouseNumber',  '$studentStreet', '$studentSubdivision', '$studentBarangay', '$studentTown', '$studentDistrict', '$studentProvincialHouseNumber', '$studentProvincialStreet', '$studentProvincialSubdivision', '$studentProvincialBarangay', '$studentProvincialTown', '$studentProvincialDistrict', '$studentContactNumber', '$studentEmail', '$guardianName', '$guardianContactNumber', '$studentRemark', '$studentSponsor', '$studentHighSchoolAddress', '$studentCompanyName', '$studentCompanyAddress', '$studentCompanyPosition', '$studentCompanyContactNumber')";

            $run_data = mysqli_query($conn,$query);

            if($run_data){
                $_SESSION['insert-success'] = "Data Inserted Succesfully";
            
            }else{ 

            }
        }
    }
?>