<?php
    // database connection
    include('../Config/config.php');

    $id = $_GET['id'];
    $get_data = "SELECT `activityType`, `rowId` FROM `student-activity-log` WHERE `id` = '$id'";
    
    $run_data = mysqli_query($conn,$get_data);

    $result = mysqli_fetch_assoc($run_data);

    $rowid = $result['rowId'];

    if($result['activityType'] == "UPDATE"){
        $get_data2 = "SELECT * FROM `student-activity-log` WHERE `id` = '$id'";

    } else if ($result['activityType'] == "DELETE"){
        $get_data2 = "SELECT `id`, 'DELETE' `activityType`, `rowId`, `studentNumber`, `studentCourse`, `studentSurname`, `studentFirstName`, `studentMiddleInitial`, `studentBirthdate`, `studentGender`, `studentHouseNumber`, `studentStreet`, `studentSubdivision`, `studentBarangay`, `studentTown`, `studentDistrict`, `studentProvincialHouseNumber`, `studentProvincialStreet`, `studentProvincialSubdivision`, `studentProvincialBarangay`, `studentProvincialTown`, `studentProvincialDistrict`, `studentContactNumber`, `studentEmail`, `guardianName`, `guardianContactNumber`, `studentRemark`, `studentSponsor`, `studentHighSchoolAddress`, `studentCompanyName`, `studentCompanyAddress`, `studentCompanyPosition`, `studentCompanyContactNumber`, `archivedDate`, `user` FROM `student-archive` WHERE `rowId` = '$rowid'";

    }
    
    $run_data2 = mysqli_query($conn,$get_data2);


    while($row = mysqli_fetch_array($run_data2)){
        echo json_encode($row);
        
    }
?>