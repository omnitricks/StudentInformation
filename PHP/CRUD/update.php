<?php
    // database connection
    include('../Config/config.php');

    //Errors Stored in single array
    $errors = array();

    $id = $_GET['id-edit'];
    // Form Data - Required
    if (empty($_GET['student-number-edit'])){
        $errors['studentNumberError'] = "Student Number is Required";
    } else{
        $studentNumber = $_GET['student-number-edit'];
    }

    if (empty($_GET['student-course-edit'])){
        $errors['studentCourseError'] = "Student Course is Required";
    } else{
        $studentCourse = $_GET['student-course-edit'];
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

    if (empty($_GET['student-house-number-edit']) || empty($_GET['student-street-edit'])  || empty($_GET['student-barangay-edit']) || empty($_GET['student-town-edit']) || empty($_GET['student-district-edit'])){
        $errors['studentAddressError'] = "Student Address is Required";
    } else{
        $studentHouseNumber = $_GET['student-house-number-edit'];
        $studentStreet = $_GET['student-street-edit'];
        $studentBarangay = $_GET['student-barangay-edit'];
        $studentTown = $_GET['student-town-edit'];
        $studentDistrict = $_GET['student-district-edit'];

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

    if (empty($_GET['student-provincial-house-number-edit']) || empty($_GET['student-provincial-street-edit'])  || empty($_GET['student-provincial-barangay-edit']) || empty($_GET['student-provincial-town-edit']) || empty($_GET['student-provincial-district-edit'])){
        $errors['studentProvincialAddressError'] = "Student Provincial Address is Required";
    } else{
        $studentProvincialHouseNumber = $_GET['student-provincial-house-number-edit'];
        $studentProvincialStreet = $_GET['student-provincial-street-edit'];
        $studentProvincialBarangay = $_GET['student-provincial-barangay-edit'];
        $studentProvincialTown = $_GET['student-provincial-town-edit'];
        $studentProvincialDistrict = $_GET['student-provincial-district-edit'];

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

    if (empty($_GET['student-contact-number-edit'])){
        $errors['studentContactNumberError'] = "Student Contact Number is Required";
    } else{
        $studentContactNumber = $_GET['student-contact-number-edit'];
    }

    if (empty($_GET['student-email-edit'])){
        $errors['studentEmailError'] = "Student Email is Required";
    } else{
        $studentEmail = $_GET['student-email-edit'];
    }

    if (empty($_GET['guardian-name-edit']) || empty($_GET['guardian-contact-number-edit'])){
        $errors['studentGuardianError'] = "Guardian Information is Required";
    } else{
        $guardianName = $_GET['guardian-name-edit'];
        $guardianContactNumber = $_GET['guardian-contact-number-edit'];
    }


    // Form Data - optional
    if(isset($_GET['student-subdivision-edit'])){
        $studentSubdivision = $_GET['student-subdivision-edit'];
    } else{
        $studentSubdivision = '';
    }

    if(isset($_GET['student-provincial-subdivision-edit'])){
        $studentProvincialSubdivision = $_GET['student-provincial-subdivision-edit'];
    } else{
        $studentProvincialSubdivision = '';
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

    if (isset($_GET['student-company-name-edit'])){
        $studentCompanyName = $_GET['student-company-name-edit'];
    } else{
        $studentCompanyName = '';
    }

    if (isset($_GET['student-company-address-edit'])){
        $studentCompanyAddress = $_GET['student-company-address-edit'];
    } else{
        $studentCompanyAddress = '';
    }

    if (isset($_GET['student-company-position-edit'])){
        $studentCompanyPosition = $_GET['student-company-position-edit'];
    } else{
        $studentCompanyPosition = '';
    }

    if (isset($_GET['student-company-contact-number-edit'])){
        $studentCompanyContactNumber = $_GET['student-company-contact-number-edit'];
    } else{
        $studentCompanyContactNumber = '';
    }


    $blank = '';


    if(empty($errors)){

        // Check for Student-Number duplicate in database
        $duplicateQuery = "SELECT * FROM `student-information` WHERE `studentNumber`= '$studentNumber'";
        $duplicateCheckQuery = "SELECT * FROM `student-information` WHERE `studentNumber`= '$studentNumber' AND `id`= '$id'";
        $duplicate = mysqli_query($conn, $duplicateQuery);
        $duplicateCheck = mysqli_query($conn, $duplicateCheckQuery);

        if(mysqli_num_rows($duplicate) > 0  &&  mysqli_num_rows($duplicate) !=  mysqli_num_rows($duplicateCheck)){
            $_SESSION['duplicate-edit'] = "Data not Updated, Student Number already in use";

        } else{

            $update = "UPDATE `student-information` SET `studentNumber`='$studentNumber',`studentCourse`='$studentCourse',`studentSurname`='$studentSurname',`studentFirstName`='$studentFirstName',`studentMiddleInitial`='$studentMiddleInitial',`studentBirthdate`='$studentBirthdate',`studentGender`='$studentGender',`studentHouseNumber`='$studentHouseNumber',`studentStreet`='$studentStreet',`studentSubdivision`='$studentSubdivision',`studentBarangay`='$studentBarangay',`studentTown`='$studentTown',`studentDistrict`='$studentDistrict',`studentProvincialHouseNumber`='$studentProvincialHouseNumber',`studentProvincialStreet`='$studentProvincialStreet',`studentProvincialSubdivision`='$studentProvincialSubdivision',`studentProvincialBarangay`='$studentProvincialBarangay',`studentProvincialTown`='$studentProvincialTown',`studentProvincialDistrict`='$studentProvincialDistrict',`studentContactNumber`='$studentContactNumber',`studentEmail`='$studentEmail',`guardianName`='$guardianName',`guardianContactNumber`='$guardianContactNumber',`studentRemark`='$studentRemark',`studentSponsor`='$studentSponsor',`studentHighSchoolAddress`='$studentHighSchoolAddress',`studentCompanyName`='$studentCompanyName',`studentCompanyAddress`='$studentCompanyAddress',`studentCompanyPosition`='$studentCompanyPosition',`studentCompanyContactNumber`='$studentCompanyContactNumber' WHERE `id`= '$id'";

            $run_data = mysqli_query($conn,$update);

            if($run_data){
                $_SESSION['update-success'] = "Data Updated Successfully";

                header('Content-Type: application/json');
                echo json_encode(['location'=>'index.php']);
                
            }
        }
    }
?>