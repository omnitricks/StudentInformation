<?php
    // database connection
    include('../Config/config.php');

    // Erros Stored in single array
    $errors = array();

    // Add  new student code 
    // Form Data - Required
    if (empty($_POST['id'])){
        $errors['idError'] = "id is Required";
    } else{
        $id = $_POST['id'];
    }

    if (empty($_POST['studentNumber'])){
        $errors['studentNumberError'] = "Student Number is Required";
    } else{
        $studentNumber = $_POST['studentNumber'];
    }

    if (empty($_POST['studentCourse'])){
        $errors['studentCourseError'] = "Student Course is Required";
    } else{
        $studentCourse = $_POST['studentCourse'];
    }

    if (empty($_POST['studentSurname']) || empty($_POST['studentFirstName']) || empty($_POST['studentMiddleInitial'])){
        $errors['studentNameError'] = "Student Name is Required";
    } else{
        $studentSurname = $_POST['studentSurname'];
        $studentFirstName = $_POST['studentFirstName'];
        $studentMiddleInitial = $_POST['studentMiddleInitial'];
    }

    if (empty($_POST['studentBirthdate'])){
        $errors['studentBirthdateError'] = "Student Birthdate is Required";
    } else{
        $studentBirthdate = $_POST['studentBirthdate'];
    }

    if (empty($_POST['studentGender'])){
        $errors['studentGenderError'] = "Student Gender is Required";
    } else{
        $studentGender = $_POST['studentGender'];
    }

    if (empty($_POST['studentHouseNumber']) || empty($_POST['studentStreet'])  || empty($_POST['studentBarangay']) || empty($_POST['studentTown']) || empty($_POST['studentDistrict'])){
        $errors['studentAddressError'] = "Student Address is Required";
    } else{
        $studentHouseNumber = $_POST['studentHouseNumber'];
        $studentStreet = $_POST['studentStreet'];
        $studentBarangay = $_POST['studentBarangay'];
        $studentTown = $_POST['studentTown'];
        $studentDistrict = $_POST['studentDistrict'];


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

    if (empty($_POST['studentProvincialHouseNumber']) || empty($_POST['studentProvincialStreet'])  || empty($_POST['studentProvincialBarangay']) || empty($_POST['studentProvincialTown']) || empty($_POST['studentProvincialDistrict'])){
        $errors['studentProvincialAddressError'] = "Student Provincial Address is Required";
    } else{
        $studentProvincialHouseNumber = $_POST['studentProvincialHouseNumber'];
        $studentProvincialStreet = $_POST['studentProvincialStreet'];
        $studentProvincialBarangay = $_POST['studentProvincialBarangay'];
        $studentProvincialTown = $_POST['studentProvincialTown'];
        $studentProvincialDistrict = $_POST['studentProvincialDistrict'];

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

    if (empty($_POST['studentContactNumber'])){
        $errors['studentContactNumberError'] = "Student Contact Number is Required";
    } else{
        $studentContactNumber = $_POST['studentContactNumber'];
    }

    if (empty($_POST['studentEmail'])){
        $errors['studentEmailError'] = "Student Email is Required";
    } else{
        $studentEmail = $_POST['studentEmail'];
    }

    if (empty($_POST['guardianName']) || empty($_POST['guardianContactNumber'])){
        $errors['studentGuardianError'] = "Guardian Information is Required";
    } else{
        $guardianName = $_POST['guardianName'];
        $guardianContactNumber = $_POST['guardianContactNumber'];
    }


    // Form Data - optional
    if(empty($_POST['studentSubdivision'])){
        $studentSubdivision = $_POST['studentSubdivision'];
    } else{
        $studentSubdivision = '';
    }

    if(empty($_POST['studentProvincialSubdivision'])){
        $studentProvincialSubdivision = $_POST['studentProvincialSubdivision'];
    } else{
        $studentProvincialSubdivision = '';
    }

    if (isset($_POST['studentRemark'])){
        $studentRemark = $_POST['studentRemark'];
    } else{
        $studentRemark = '';
    }
    
    if (isset($_POST['studentSponsor'])){
        $studentSponsor = $_POST['studentSponsor'];
    } else{
        $studentSponsor = '';
    }
    
    if (isset($_POST['studentHighSchoolAddress'])){
        $studentHighSchoolAddress = $_POST['studentHighSchoolAddress'];
    } else{
        $studentHighSchoolAddress = '';
    }



    if (isset($_POST['studentCompanyName'])){
        $studentCompanyName = $_POST['studentCompanyName'];
    } else{
        $studentCompanyName = '';
    }
    
    if (isset($_POST['studentCompanyAddress'])){
        $studentCompanyAddress = $_POST['studentCompanyAddress'];
    } else{
        $studentCompanyAddress = '';
    }
    
    if (isset($_POST['studentCompanyPosition'])){
        $studentCompanyPosition = $_POST['studentCompanyPosition'];
    } else{
        $studentCompanyPosition = '';
    }

    if (isset($_POST['studentCompanyContactNumber'])){
        $studentCompanyContactNumber = $_POST['studentCompanyContactNumber'];
    } else{
        $studentCompanyContactNumber = '';
    }


    if(empty($errors)){

        // Check for Student-Number duplicate in database
        $duplicateQuery = "SELECT * FROM `student-information` WHERE `studentNumber` = '$studentNumber'";
        $duplicate = mysqli_query($conn, $duplicateQuery);

        if(mysqli_num_rows($duplicate)>0){
            // $_SESSION['duplicate-insert'] = "Data not Inserted, Student Number already in use";

        } else{

            $query = "INSERT INTO `student-information`(`id`, `studentNumber`, `studentCourse`, `studentSurname`, `studentFirstName`, `studentMiddleInitial`, `studentBirthdate`, `studentGender`, `studentHouseNumber`, `studentStreet`, `studentSubdivision`, `studentBarangay`, `studentTown`, `studentDistrict`, `studentProvincialHouseNumber`, `studentProvincialStreet`, `studentProvincialSubdivision`, `studentProvincialBarangay`, `studentProvincialTown`, `studentProvincialDistrict`, `studentContactNumber`, `studentEmail`, `guardianName`, `guardianContactNumber`, `studentRemark`, `studentSponsor`, `studentHighSchoolAddress`, `studentCompanyName`, `studentCompanyAddress`, `studentCompanyPosition`, `studentCompanyContactNumber`) VALUES ('$id', '$studentNumber', '$studentCourse', '$studentSurname', '$studentFirstName', '$studentMiddleInitial', '$studentBirthdate', '$studentGender', '$studentHouseNumber',  '$studentStreet', '$studentSubdivision', '$studentBarangay', '$studentTown', '$studentDistrict', '$studentProvincialHouseNumber', '$studentProvincialStreet', '$studentProvincialSubdivision', '$studentProvincialBarangay', '$studentProvincialTown', '$studentProvincialDistrict', '$studentContactNumber', '$studentEmail', '$guardianName', '$guardianContactNumber', '$studentRemark', '$studentSponsor', '$studentHighSchoolAddress', '$studentCompanyName', '$studentCompanyAddress', '$studentCompanyPosition', '$studentCompanyContactNumber')";

            $run_data = mysqli_query($conn,$query);

            if($run_data){
                // $_SESSION['insert-success'] = "Data Inserted Succesfully";
            
            }else{ 

            }
        }
    }
?>