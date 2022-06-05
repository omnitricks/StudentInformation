<?php
    // database connection
    include('../Config/config.php');

    // Erros Stored in single array
    $errors = array();

    // Form Data - Required
    if (empty($_POST['id-edit'])){
        $errors['rowIdError'] = "Student Number is Required";
    } else{
        $rowId = $_POST['id-edit'];
    }

    if (empty($_POST['student-number-edit'])){
        $errors['studentNumberError'] = "Student Number is Required";
    } else{
        $studentNumber = $_POST['student-number-edit'];
    }

    if (empty($_POST['student-course-edit'])){
        $errors['studentCourseError'] = "Student Course is Required";
    } else{
        $studentCourse = $_POST['student-course-edit'];
    }

    if (empty($_POST['student-surname-edit']) || empty($_POST['student-first-name-edit']) || empty($_POST['student-middle-initial-edit'])){
        $errors['studentNameError'] = "Student Name is Required";
    } else{
        $studentSurname = $_POST['student-surname-edit'];
        $studentFirstName = $_POST['student-first-name-edit'];
        $studentMiddleInitial = $_POST['student-middle-initial-edit'];
    }

    if (empty($_POST['student-birthdate-edit'])){
        $errors['studentBirthdateError'] = "Student Birthdate is Required";
    } else{
        $studentBirthdate = $_POST['student-birthdate-edit'];
    }

    if (empty($_POST['student-gender-edit'])){
        $errors['studentGenderError'] = "Student Gender is Required";
    } else{
        $studentGender = $_POST['student-gender-edit'];
    }

    if (empty($_POST['student-house-number-edit']) || empty($_POST['student-street-edit'])  || empty($_POST['student-barangay-edit']) || empty($_POST['student-town-edit']) || empty($_POST['student-district-edit'])){
        $errors['studentAddressError'] = "Student Address is Required";
    } else{
        $studentHouseNumber = $_POST['student-house-number-edit'];
        $studentStreet = $_POST['student-street-edit'];
        $studentBarangay = $_POST['student-barangay-edit'];
        $studentTown = $_POST['student-town-edit'];
        $studentDistrict = $_POST['student-district-edit'];
    }

    if (empty($_POST['student-provincial-house-number-edit']) || empty($_POST['student-provincial-street-edit'])  || empty($_POST['student-provincial-barangay-edit']) || empty($_POST['student-provincial-town-edit']) || empty($_POST['student-provincial-district-edit'])){
        $errors['studentProvincialAddressError'] = "Student Provincial Address is Required";
    } else{
        $studentProvincialHouseNumber = $_POST['student-provincial-house-number-edit'];
        $studentProvincialStreet = $_POST['student-provincial-street-edit'];
        $studentProvincialBarangay = $_POST['student-provincial-barangay-edit'];
        $studentProvincialTown = $_POST['student-provincial-town-edit'];
        $studentProvincialDistrict = $_POST['student-provincial-district-edit'];
    }

    if (empty($_POST['student-contact-number-edit'])){
        $errors['studentContactNumberError'] = "Student Contact Number is Required";
    } else{
        $studentContactNumber = $_POST['student-contact-number-edit'];
    }

    if (empty($_POST['student-email-edit'])){
        $errors['studentEmailError'] = "Student Email is Required";
    } else{
        $studentEmail = $_POST['student-email-edit'];
    }

    if (empty($_POST['guardian-name-edit']) || empty($_POST['guardian-contact-number-edit'])){
        $errors['studentGuardianError'] = "Guardian Information is Required";
    } else{
        $guardianName = $_POST['guardian-name-edit'];
        $guardianContactNumber = $_POST['guardian-contact-number-edit'];
    }


    // Form Data - optional
    if(empty($_POST['student-subdivision-edit'])){
        $studentSubdivision = $_POST['student-subdivision-edit'];
    } else{
        $studentSubdivision = '';
    }

    if(empty($_POST['student-provincial-subdivision-edit'])){
        $studentProvincialSubdivision = $_POST['student-provincial-subdivision-edit'];
    } else{
        $studentProvincialSubdivision = '';
    }

    if (isset($_POST['student-remark-edit'])){
        $studentRemark = $_POST['student-remark-edit'];
    } else{
        $studentRemark = '';
    }
    
    if (isset($_POST['student-sponsor-edit'])){
        $studentSponsor = $_POST['student-sponsor-edit'];
    } else{
        $studentSponsor = '';
    }
    
    if (isset($_POST['student-hs-address-edit'])){
        $studentHighSchoolAddress = $_POST['student-hs-address-edit'];
    } else{
        $studentHighSchoolAddress = '';
    }

    if (isset($_POST['student-company-name-edit'])){
        $studentCompanyName = $_POST['student-company-name-edit'];
    } else{
        $studentCompanyName = '';
    }

    if (isset($_POST['student-company-address-edit'])){
        $studentCompanyAddress = $_POST['student-company-address-edit'];
    } else{
        $studentCompanyAddress = '';
    }

    if (isset($_POST['student-company-position-edit'])){
        $studentCompanyPosition = $_POST['student-company-position-edit'];
    } else{
        $studentCompanyPosition = '';
    }

    if (isset($_POST['student-company-contact-number-edit'])){
        $studentCompanyContactNumber = $_POST['student-company-contact-number-edit'];
    } else{
        $studentCompanyContactNumber = '';
    }

    $archivedDate = date('Y-m-d');

    $blank = '';
    $user = 'admin';


    if(empty($errors)){
        $query = "INSERT INTO `student-archive`(`rowId`, `studentNumber`, `studentCourse`, `studentSurname`, `studentFirstName`, `studentMiddleInitial`, `studentBirthdate`, `studentGender`, `studentHouseNumber`, `studentStreet`, `studentSubdivision`, `studentBarangay`, `studentTown`, `studentDistrict`, `studentProvincialHouseNumber`, `studentProvincialStreet`, `studentProvincialSubdivision`, `studentProvincialBarangay`, `studentProvincialTown`, `studentProvincialDistrict`, `studentContactNumber`, `studentEmail`, `guardianName`, `guardianContactNumber`, `studentRemark`, `studentSponsor`, `studentHighSchoolAddress`, `studentCompanyName`, `studentCompanyAddress`, `studentCompanyPosition`, `studentCompanyContactNumber`, `archivedDate`, `user`) VALUES ('$rowId', '$studentNumber', '$studentCourse', '$studentSurname', '$studentFirstName', '$studentMiddleInitial', '$studentBirthdate', '$studentGender', '$studentHouseNumber',  '$studentStreet', '$studentSubdivision', '$studentBarangay', '$studentTown', '$studentDistrict', '$studentProvincialHouseNumber', '$studentProvincialStreet', '$studentProvincialSubdivision', '$studentProvincialBarangay', '$studentProvincialTown', '$studentProvincialDistrict', '$studentContactNumber', '$studentEmail', '$guardianName', '$guardianContactNumber', '$studentRemark', '$studentSponsor', '$studentHighSchoolAddress', '$studentCompanyName', '$studentCompanyAddress', '$studentCompanyPosition', '$studentCompanyContactNumber', '$archivedDate', '$user')";

        $run_data = mysqli_query($conn,$query);
        
    }
?>