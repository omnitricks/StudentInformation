<?php
    // database connection
    include('config.php');

    //Erros Stored in single array
    $errors = array();

    //Add  new student code 
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


    if(empty($errors)){

        //Check for Student-Number duplicate in database
        $dup = mysqli_query($conn, "SELECT * FROM `student-information` WHERE `studentNumber`='$studentNumber'");

        if(mysqli_num_rows($dup)>0){
            $_SESSION['duplicate'] = "Data not Inserted, Student Number already in use";
            // header('location:index.php');
        } else{

            $query = "INSERT INTO `student-information`(`studentNumber`, `studentSurname`, `studentFirstName`, `studentMiddleInitial`, `studentBirthdate`, `studentGender`, `studentStreet`, `studentTown`, `studentDistrict`, `studentProvincialStreet`, `studentProvincialTown`, `studentProvincialDistrict`, `studentPhoneNumber`, `studentTelephoneNumber`, `studentEmail`, `guardianName`, `guardianPhoneNumber`, `guardianTelephoneNumber`, `studentRemark`, `studentSponsor`, `studentHighSchoolAddress`) VALUES ('$studentNumber',  '$studentSurname', '$studentFirstName', '$studentMiddleInitial', '$studentBirthdate', '$studentGender',  '$studentStreet', '$studentTown', '$studentDistrict', '$studentProvincialStreet', '$studentProvincialTown', '$studentProvincialDistrict', '$studentPhoneNumber',  '$studentTelephoneNumber', '$studentEmail', '$guardianName', '$guardianPhoneNumber', '$guardianTelephoneNumber', '$studentRemark', '$studentSponsor', '$studentHighSchoolAddress')";

            $run_data = mysqli_query($conn,$query);

            if($run_data){
                $_SESSION['insert'] = "Data Inserted Succesfully";
            
            }else{ 

            }
        }
    }
?>