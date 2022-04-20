<?php
    // database connection
    include('config.php');

    //Erros Stored in single array
    $errors = array();

            $id = $_GET['id-edit'];
    //Add  new student code 
    // Form Data - Required
    if (empty($_GET['student-number-edit'])){
        $errors['studentNumberError'] = "Student Number is Required";
    } else{
        $studentNumber = $_GET['student-number-edit'];
    }

    if (empty($_GET['student-surname-edit']) || empty($_GET['student-first-name-edit']) || empty($_GET['student-middle-initial-edit'])){
        $errors['studentNameError'] = "Student Name is Required";
    } else{
        $studentSurname = $_GET['student-surname-edit'];
        $studentFirstName = $_GET['student-first-name-edit'];
        $studentMiddleInitial = $_GET['student-middle-initial-edit'];
    }

    if (empty($_GET['student-birthdate-edit'])){
        $errors['studentBirthdateError'] = "Student Birthdate is Required";
    } else{
        $studentBirthdate = $_GET['student-birthdate-edit'];
    }

    if (empty($_GET['student-gender-edit'])){
        $errors['studentGenderError'] = "Student Gender is Required";
    } else{
        $studentGender = $_GET['student-gender-edit'];
    }

    if (empty($_GET['student-street-edit']) || empty($_GET['student-town-edit']) || empty($_GET['student-district-edit'])){
        $errors['studentAddressError'] = "Student Address is Required";
    } else{
        $studentStreet = $_GET['student-street-edit'];
        $studentTown = $_GET['student-town-edit'];
        $studentDistrict = $_GET['student-district-edit'];
    }

    if (empty($_GET['student-provincial-street-edit']) || empty($_GET['student-provincial-town-edit']) || empty($_GET['student-provincial-district-edit'])){
        $errors['studentProvincialAddressError'] = "Student Provincial Address is Required";
    } else{
        $studentProvincialStreet = $_GET['student-provincial-street-edit'];
        $studentProvincialTown = $_GET['student-provincial-town-edit'];
        $studentProvincialDistrict = $_GET['student-provincial-district-edit'];
    }

    if (empty($_GET['student-phone-number-edit'])){
        $errors['studentPhoneNumberError'] = "Student Phone Number is Required";
    } else{
        $studentPhoneNumber = $_GET['student-phone-number-edit'];
    }

    if (empty($_GET['student-email-edit'])){
        $errors['studentEmailError'] = "Student Email is Required";
    } else{
        $studentEmail = $_GET['student-email-edit'];
    }

    if (empty($_GET['guardian-name-edit']) || empty($_GET['guardian-phone-number-edit'])){
        $errors['studentGuardianError'] = "Guardian Information is Required";
    } else{
        $guardianName = $_GET['guardian-name-edit'];
        $guardianPhoneNumber = $_GET['guardian-phone-number-edit'];
    }





    // Form Data - optional
    if (isset($_GET['student-telephone-number'])){
        $studentTelephoneNumber = $_GET['student-telephone-number-edit'];
    } else{
        $studentTelephoneNumber = '';
    }
    
    if (isset($_GET['guardian-telephone-number-edit'])){
        $guardianTelephoneNumber = $_GET['guardian-telephone-number-edit'];
    } else{
        $guardianTelephoneNumber = '';
    }
    
    if (isset($_GET['student-remark-edit'])){
        $studentRemark = $_GET['student-remark-edit'];
    } else{
        $studentRemark = '';
    }
    
    if (isset($_GET['student-sponsor-edit'])){
        $studentSponsor = $_GET['student-sponsor-edit'];
    } else{
        $studentSponsor = '';
    }
    
    if (isset($_GET['student-hs-address-edit'])){
        $studentHighSchoolAddress = $_GET['student-hs-address-edit'];
    } else{
        $studentHighSchoolAddress = '';
    }


    if(empty($errors)){

        // Check for Student-Number duplicate in database
        $dup = mysqli_query($conn, "SELECT * FROM `student-information` WHERE `studentNumber`='$studentNumber'");
        $dupcheck = mysqli_query($conn, "SELECT * FROM `student-information` WHERE `studentNumber`='$studentNumber' AND `id`='$id'");

        if(mysqli_num_rows($dup) > 0  &&  mysqli_num_rows($dup) !=  mysqli_num_rows($dupcheck)){

            $_SESSION['duplicateedit'] = "Data not Updated, Student Number already in use";
            header('location:index.php');

        } else{

            $update = "UPDATE `student-information` SET `studentNumber`= '$studentNumber',`studentSurname`= '$studentSurname',`studentFirstName`= '$studentFirstName',`studentMiddleInitial`= '$studentMiddleInitial',`studentBirthdate`= '$studentBirthdate',`studentGender`= '$studentGender',`studentStreet`= '$studentStreet',`studentTown`= '$studentTown',`studentDistrict`= '$studentDistrict',`studentProvincialStreet`= '$studentProvincialStreet',`studentProvincialTown`= '$studentProvincialTown',`studentProvincialDistrict`= '$studentProvincialDistrict',`studentPhoneNumber`= '$studentPhoneNumber',`studentTelephoneNumber`= '$studentTelephoneNumber',`studentEmail`= '$studentEmail',`guardianName`= '$guardianName',`guardianPhoneNumber`= '$guardianPhoneNumber',`guardianTelephoneNumber`= '$guardianTelephoneNumber',`studentRemark`= '$studentRemark',`studentSponsor`= '$studentSponsor',`studentHighSchoolAddress`= '$studentHighSchoolAddress' WHERE `id`= '$id'";

            $run_data = mysqli_query($conn,$update);

            if($run_data){
                $_SESSION['status'] = "Data Updated Successfully";
                header('location:index.php');
            }else{

            }
        }
    }
?>