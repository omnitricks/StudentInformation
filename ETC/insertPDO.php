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


    // Database Connect
    $host = 'localhost';
    $db = 'test';
    $user = 'root';
    $pass = '';

    try{
        $dsn = "mysql:host=" . $host . ";dbname=" . $db;
        $pdo = new PDO($dsn, $user, $pass);
        echo 'Connection Succesful';
    } catch(PDOException $e) {
        echo "DB Connection Failed: " .$e->getMessage();
    }

    //insert new user
   $sql = "INSERT INTO `student-information`(`studentNumber`, `studentSurname`, `studentFirstName`, `studentMiddleIninital`, `studentBirthdate`, `studentGender`, `studentStreet`, `studentTown`, `studentDistrict`, `studentProvincialStreet`, `studentProvincialTown`, `studentProvincialDistrict`, `studentPhoneNumber`, `studentTelephoneNumber`, `studentEmail`, `guardianName`, `guardianPhoneNumber`, `guardianTelephoneNumber`, `studentRemark`, `studentSponsor`, `studentHighSchoolAddress`) VALUES (:studentNumber, :studentSurname, :studentFirstName, :studentMiddleIninital, :studentBirthdate, :studentGender, :studentStreet, :studentTown, :studentDistrict, :studentProvincialStreet, :studentProvincialTown, :studentProvincialDistrict, :studentPhoneNumber, :studentTelephoneNumber, :studentEmail, :guardianName, :guardianPhoneNumber, :guardianTelephoneNumber, :studentRemark, :studentSponsor, :studentHighSchoolAddress)";


   $stmt = $pdo->prepare($sql);
   $stmt->bindParam(':studentNumber',  $studentNumber);
   $stmt->bindParam(':studentSurname',  $studentSurname);
   $stmt->bindParam(':studentFirstName',  $studentFirstName);
   $stmt->bindParam(':studentMiddleIninital',  $studentMiddleIninital);
   $stmt->bindParam(':studentBirthdate',  $studentBirthdate);
   $stmt->bindParam(':studentGender',  $studentGender);
   $stmt->bindParam(':studentStreet',  $studentStreet);
   $stmt->bindParam(':studentTown',  $studentTown);
   $stmt->bindParam(':studentDistrict',  $studentDistrict);
   $stmt->bindParam(':studentProvincialStreet',  $studentProvincialStreet);
   $stmt->bindParam(':studentProvincialTown',  $studentProvincialTown);
   $stmt->bindParam(':studentProvincialDistrict',  $studentProvincialDistrict);
   $stmt->bindParam(':studentPhoneNumber',  $studentPhoneNumber);
   $stmt->bindParam(':studentTelephoneNumber',  $studentTelephoneNumber);
   $stmt->bindParam(':studentEmail',  $studentEmail);
   $stmt->bindParam(':guardianName',  $guardianName);
   $stmt->bindParam(':guardianPhoneNumber',  $guardianPhoneNumber);
   $stmt->bindParam(':guardianTelephoneNumber',  $guardianTelephoneNumber);
   $stmt->bindParam(':studentRemark',  $studentRemark);
   $stmt->bindParam(':studentSponsor',  $studentSponsor);
   $stmt->bindParam(':studentHighSchoolAddress',  $studentHighSchoolAddress);


    // $stmt->execute([
    //     ':studentNumber' => $studentNumber, 
    //     ':studentSurname' => $studentSurname, 
    //     ':studentFirstName' => $studentFirstName, 
    //     ':studentMiddleIninital' => $studentMiddleIninital, 
    //     ':studentBirthdate' => $studentBirthdate, 
    //     ':studentGender' => $studentGender, 
    //     ':studentStreet' => $studentStreet, 
    //     ':studentTown' => $studentTown, 
    //     ':studentDistrict' => $studentDistrict, 
    //     ':studentProvincialStreet' => $studentProvincialStreet, 
    //     ':studentProvincialTown' => $studentProvincialTown, 
    //     ':studentProvincialDistrict' => $studentProvincialDistrict, 
    //     ':studentPhoneNumber' => $studentPhoneNumber, 
    //     ':studentTelephoneNumber' => $studentTelephoneNumber, 
    //     ':studentEmail' => $studentEmail, 
    //     ':guardianName' => $guardianName, 
    //     ':guardianPhoneNumber' => $guardianPhoneNumber, 
    //     ':guardianTelephoneNumber' => $guardianTelephoneNumber, 
    //     ':studentRemark' => $studentRemark, 
    //     ':studentSponsor' => $studentSponsor, 
    //     ':studentHighSchoolAddress' => $studentHighSchoolAddress
    // ]);


   $stmt->execute();

    echo "Registration Successful";
?>