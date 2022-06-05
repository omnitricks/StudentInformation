<?php
    // database connection
    include('../Config/config.php');

    // Erros Stored in single array
    $errors = array();

    // CHecks if Update or Delete
    $activityType = $_POST['activityType'];

    // Modified Form Data - Required
    if (empty($_POST['id-edit'])){
        $errors['rowIdError'] = "Student Number is Required";
    } else{
        $rowId = $_POST['id-edit'];
    }

    if (empty($_POST['student-number-edit'])){
        $errors['studentNumberError'] = "Student Number is Required";
    } else{
        $studentNumberModified = $_POST['student-number-edit'];
    }

    if (empty($_POST['student-course-edit'])){
        $errors['studentCourseError'] = "Student Course is Required";
    } else{
        $studentCourseModified = $_POST['student-course-edit'];
    }

    if (empty($_POST['student-surname-edit']) || empty($_POST['student-first-name-edit']) || empty($_POST['student-middle-initial-edit'])){
        $errors['studentNameError'] = "Student Name is Required";
    } else{
        $studentSurnameModified = $_POST['student-surname-edit'];
        $studentFirstNameModified = $_POST['student-first-name-edit'];
        $studentMiddleInitialModified = $_POST['student-middle-initial-edit'];
    }

    if (empty($_POST['student-birthdate-edit'])){
        $errors['studentBirthdateError'] = "Student Birthdate is Required";
    } else{
        $studentBirthdateModified = $_POST['student-birthdate-edit'];
    }

    if (empty($_POST['student-gender-edit'])){
        $errors['studentGenderError'] = "Student Gender is Required";
    } else{
        $studentGenderModified = $_POST['student-gender-edit'];
    }

    if (empty($_POST['student-house-number-edit']) || empty($_POST['student-street-edit'])  || empty($_POST['student-barangay-edit']) || empty($_POST['student-town-edit']) || empty($_POST['student-district-edit'])){
        $errors['studentAddressError'] = "Student Address is Required";
    } else{
        $studentHouseNumberModified = $_POST['student-house-number-edit'];
        $studentStreetModified = $_POST['student-street-edit'];
        $studentBarangayModified = $_POST['student-barangay-edit'];
        $studentTownModified = $_POST['student-town-edit'];
        $studentDistrictModified = $_POST['student-district-edit'];
    }

    if (empty($_POST['student-provincial-house-number-edit']) || empty($_POST['student-provincial-street-edit'])  || empty($_POST['student-provincial-barangay-edit']) || empty($_POST['student-provincial-town-edit']) || empty($_POST['student-provincial-district-edit'])){
        $errors['studentProvincialAddressError'] = "Student Provincial Address is Required";
    } else{
        $studentProvincialHouseNumberModified = $_POST['student-provincial-house-number-edit'];
        $studentProvincialStreetModified = $_POST['student-provincial-street-edit'];
        $studentProvincialBarangayModified = $_POST['student-provincial-barangay-edit'];
        $studentProvincialTownModified = $_POST['student-provincial-town-edit'];
        $studentProvincialDistrictModified = $_POST['student-provincial-district-edit'];
    }

    if (empty($_POST['student-contact-number-edit'])){
        $errors['studentContactNumberError'] = "Student Contact Number is Required";
    } else{
        $studentContactNumberModified = $_POST['student-contact-number-edit'];
    }

    if (empty($_POST['student-email-edit'])){
        $errors['studentEmailError'] = "Student Email is Required";
    } else{
        $studentEmailModified = $_POST['student-email-edit'];
    }

    if (empty($_POST['guardian-name-edit']) || empty($_POST['guardian-contact-number-edit'])){
        $errors['studentGuardianError'] = "Guardian Information is Required";
    } else{
        $guardianNameModified = $_POST['guardian-name-edit'];
        $guardianContactNumberModified = $_POST['guardian-contact-number-edit'];
    }


    // Modified Form Data - optional
    if(isset($_POST['student-subdivision-edit'])){
        $studentSubdivisionModified = $_POST['student-subdivision-edit'];
    } else{
        $studentSubdivisionModified = '';
    }

    if(isset($_POST['student-provincial-subdivision-edit'])){
        $studentProvincialSubdivisionModified = $_POST['student-provincial-subdivision-edit'];
    } else{
        $studentProvincialSubdivisionModified = '';
    }

    if(isset($_POST['student-remark-edit'])){
        $studentRemarkModified = $_POST['student-remark-edit'];
    } else{
        $studentRemarkModified = '';
    }
    
    if(isset($_POST['student-sponsor-edit'])){
        $studentSponsorModified = $_POST['student-sponsor-edit'];
    } else{
        $studentSponsorModified = '';
    }
    
    if(isset($_POST['student-hs-address-edit'])){
        $studentHighSchoolAddressModified = $_POST['student-hs-address-edit'];
    } else{
        $studentHighSchoolAddressModified = '';
    }

    if (isset($_POST['student-company-name-edit'])){
        $studentCompanyNameModified = $_POST['student-company-name-edit'];
    } else{
        $studentCompanyNameModified = '';
    }

    if (isset($_POST['student-company-address-edit'])){
        $studentCompanyAddressModified = $_POST['student-company-address-edit'];
    } else{
        $studentCompanyAddressModified = '';
    }

    if (isset($_POST['student-company-position-edit'])){
        $studentCompanyPositionModified = $_POST['student-company-position-edit'];
    } else{
        $studentCompanyPositionModified = '';
    }

    if (isset($_POST['student-company-contact-number-edit'])){
        $studentCompanyContactNumberModified = $_POST['student-company-contact-number-edit'];
    } else{
        $studentCompanyContactNumberModified = '';
    }

    $actionDate = date('Y-m-d');
    $user = 'admin';
    $blank = '';


    // Unmodified Form Data - required
    $studentNumber = $_POST['student-number-edit-hidden'];
    $studentCourse = $_POST['student-course-edit-hidden'];
    $studentSurname = $_POST['student-surname-edit-hidden'];
    $studentFirstName = $_POST['student-first-name-edit-hidden'];
    $studentMiddleInitial = $_POST['student-middle-initial-edit-hidden'];
    $studentBirthdate = $_POST['student-birthdate-edit-hidden'];
    $studentGender = $_POST['student-gender-edit-hidden'];
    $studentHouseNumber = $_POST['student-house-number-edit-hidden'];
    $studentStreet = $_POST['student-street-edit-hidden'];
    $studentBarangay = $_POST['student-barangay-edit-hidden'];
    $studentTown = $_POST['student-town-edit-hidden'];
    $studentDistrict = $_POST['student-district-edit-hidden'];
    $studentProvincialHouseNumber = $_POST['student-provincial-house-number-edit-hidden'];
    $studentProvincialStreet = $_POST['student-provincial-street-edit-hidden'];
    $studentProvincialBarangay = $_POST['student-provincial-barangay-edit-hidden'];
    $studentProvincialTown = $_POST['student-provincial-town-edit-hidden'];
    $studentProvincialDistrict = $_POST['student-provincial-district-edit-hidden'];
    $studentContactNumber = $_POST['student-contact-number-edit-hidden'];
    $studentEmail = $_POST['student-email-edit-hidden'];
    $guardianName = $_POST['guardian-name-edit-hidden'];
    $guardianContactNumber = $_POST['guardian-contact-number-edit-hidden'];


    // Unmodified Form Data - optional
    $studentSubdivision = $_POST['student-subdivision-edit-hidden'];
    $studentProvincialSubdivision = $_POST['student-provincial-subdivision-edit-hidden'];
    $studentRemark = $_POST['student-remark-edit-hidden'];
    $studentSponsor = $_POST['student-sponsor-edit-hidden'];
    $studentHighSchoolAddress = $_POST['student-hs-address-edit-hidden'];
    $studentCompanyName = $_POST['student-company-name-edit-hidden'];
    $studentCompanyAddress = $_POST['student-company-address-edit-hidden'];
    $studentCompanyPosition = $_POST['student-company-position-edit-hidden'];
    $studentCompanyContactNumber = $_POST['student-company-contact-number-edit-hidden'];


    if(empty($errors)){

        // if Update
        if($activityType == "UPDATE"){
            $query = "INSERT INTO `student-activity-log`(`activityType`, `rowId`, `studentNumber`, `studentCourse`, `studentSurname`, `studentFirstName`, `studentMiddleInitial`, `studentBirthdate`, `studentGender`, `studentHouseNumber`, `studentStreet`, `studentSubdivision`, `studentBarangay`, `studentTown`, `studentDistrict`, `studentProvincialHouseNumber`, `studentProvincialStreet`, `studentProvincialSubdivision`, `studentProvincialBarangay`, `studentProvincialTown`, `studentProvincialDistrict`, `studentContactNumber`, `studentEmail`, `guardianName`, `guardianContactNumber`, `studentRemark`, `studentSponsor`, `studentHighSchoolAddress`, `studentCompanyName`, `studentCompanyAddress`, `studentCompanyPosition`, `studentCompanyContactNumber`, `studentNumberModified`, `studentCourseModified`, `studentSurnameModified`, `studentFirstNameModified`, `studentMiddleInitialModified`, `studentBirthdateModified`, `studentGenderModified`, `studentHouseNumberModified`, `studentStreetModified`, `studentSubdivisionModified`, `studentBarangayModified`, `studentTownModified`, `studentDistrictModified`, `studentProvincialHouseNumberModified`, `studentProvincialStreetModified`, `studentProvincialSubdivisionModified`, `studentProvincialBarangayModified`, `studentProvincialTownModified`, `studentProvincialDistrictModified`, `studentContactNumberModified`, `studentEmailModified`, `guardianNameModified`, `guardianContactNumberModified`, `studentRemarkModified`, `studentSponsorModified`, `studentHighSchoolAddressModified`, `studentCompanyNameModified`, `studentCompanyAddressModified`, `studentCompanyPositionModified`, `studentCompanyContactNumberModified`, `actionDate`, `user`) VALUES ('$activityType', '$rowId', '$studentNumber', '$studentCourse', '$studentSurname', '$studentFirstName', '$studentMiddleInitial', '$studentBirthdate', '$studentGender', '$studentHouseNumber',  '$studentStreet', '$studentSubdivision', '$studentBarangay', '$studentTown', '$studentDistrict', '$studentProvincialHouseNumber', '$studentProvincialStreet', '$studentProvincialSubdivision', '$studentProvincialBarangay', '$studentProvincialTown', '$studentProvincialDistrict', '$studentContactNumber', '$studentEmail', '$guardianName', '$guardianContactNumber', '$studentRemark', '$studentSponsor', '$studentHighSchoolAddress', '$studentCompanyName', '$studentCompanyAddress', '$studentCompanyPosition', '$studentCompanyContactNumber', '$studentNumberModified', '$studentCourseModified', '$studentSurnameModified', '$studentFirstNameModified', '$studentMiddleInitialModified', '$studentBirthdateModified', '$studentGenderModified', '$studentHouseNumberModified',  '$studentStreetModified', '$studentSubdivisionModified', '$studentBarangayModified', '$studentTownModified', '$studentDistrictModified', '$studentProvincialHouseNumberModified', '$studentProvincialStreetModified', '$studentProvincialSubdivisionModified', '$studentProvincialBarangayModified', '$studentProvincialTownModified', '$studentProvincialDistrictModified', '$studentContactNumberModified', '$studentEmailModified', '$guardianNameModified', '$guardianContactNumberModified', '$studentRemarkModified', '$studentSponsorModified', '$studentHighSchoolAddressModified', '$studentCompanyNameModified', '$studentCompanyAddressModified', '$studentCompanyPositionModified', '$studentCompanyContactNumberModified', '$actionDate', '$user')";

        } else if($activityType == "DELETE"){
            // if Delete
            $query = "INSERT INTO `student-activity-log`(`activityType`, `rowId`, `studentNumber`, `actionDate`, `user`) VALUES ('$activityType', '$rowId', '$studentNumber', '$actionDate', '$user')";

        }
        
        $run_data = mysqli_query($conn,$query);
    }
?>