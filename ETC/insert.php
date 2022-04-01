<?php

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


    // Database Connection
    $conn = new mysqli('localhost', 'root', '', 'test');
    if($conn->connect_error){
        die('Connection Failed : ' .$conn->connect_error); 
    } else{
        $stmt = $conn->prepare("INSERT INTO `student-information`(`studentNumber`, `studentSurname`, `studentFirstName`, `studentMiddleIninital`, `studentBirthdate`, `studentGender`, `studentStreet`, `studentTown`, `studentDistrict`, `studentProvincialStreet`, `studentProvincialTown`, `studentProvincialDistrict`, `studentPhoneNumber`, `studentTelephoneNumber`, `studentEmail`, `guardianName`, `guardianPhoneNumber`, `guardianTelephoneNumber`, `studentRemark`, `studentSponsor`, `studentHighSchoolAddress`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssssssssssssssss", $studentNumber,  $studentSurname, $studentFirstName, $studentMiddleIninital, $studentBirthdate, $studentGender,  $studentStreet, $studentTown, $studentDistrict, $studentProvincialStreet, $studentProvincialTown, $studentProvincialDistrict, $studentPhoneNumber,  $studentTelephoneNumber, $studentEmail, $guardianName, $guardianPhoneNumber, $guardianTelephoneNumber, $studentRemark, $studentSponsor, $studentHighSchoolAddress);
        $stmt->execute();
        echo "Registration Successful";
        $stmt->close();
        $conn->close();
    }

?>