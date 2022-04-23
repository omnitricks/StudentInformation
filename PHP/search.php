<?php
    // database connection
    include('config.php');

    $output = '';
    if(isset($_POST["query"]) && isset($_POST["queryType"])){
        $search = mysqli_real_escape_string($conn, $_POST['query']);
        $searchType = $_POST['queryType'];
        $query = "SELECT * FROM `student-information` WHERE ".$searchType." LIKE '%".$search."%'";
    } else{
        $query = "SELECT * FROM `student-information`";
    }

    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0){
        $output .= '
        <div class="tableContainer">
            <table id="tableView" class="tableView">
                <thead>
                    <tr>
                        <th colspan="2"></th>
                        <th>Student Number</th>
                        <th>Student Name</th>
                        <th>Student Birthdate</th>
                        <th>Student Gender</th>
                        <th>Student Current Address</th>
                        <th>Student Provincial Address</th>
                        <th>Student Phone Number</th>
                        <th>Student Telephone Number</th>
                        <th>Student Email Address</th>
                        <th>Guardian Name</th>
                        <th>Guardian Phone Number</th>
                        <th>Guardian Telephone Number</th>
                        <th>Remark</th>
                        <th>Sponsor</th>
                        <th>Student HighSchool Address</th>
                    </tr>
                </thead>
                <tbody>
        ';

        while($row = mysqli_fetch_array($result)){
             // Combines data
             $studentName = $row['studentSurname'] . ', ' . $row['studentFirstName'] . ' ' . $row['studentMiddleInitial'] . '.';
             $studentAddress = $row['studentStreet'] . ' ' . $row['studentTown'] . ' ' . $row['studentDistrict'];
             $studentProvincialAddress = $row['studentProvincialStreet'] . ' ' . $row['studentProvincialTown'] . ' ' . $row['studentProvincialDistrict'];

             // Conditions for optional fields left blank
             if($row['studentTelephoneNumber'] == ''){
                 $row['studentTelephoneNumber'] = 'N/A';
             }
             if($row['guardianTelephoneNumber'] == ''){
                 $row['guardianTelephoneNumber'] = 'N/A';
             }
             if($row['studentRemark'] == ''){
                 $row['studentRemark'] = 'N/A';
             }
             if($row['studentSponsor'] == ''){
                 $row['studentSponsor'] = 'N/A';
             }
             if($row['studentHighSchoolAddress'] == ''){
                 $row['studentHighSchoolAddress'] = 'N/A';
             }


            $output .= "
            <tr id='$row[id]'>
                 <td><a href='#' id='edit' class='edit'><i class='fa-solid fa-pen-to-square'></i></a></td>
                 <td><a href='#' id='delete' class='delete'><i class='fa-solid fa-trash-can'></i></a></td>
                 <td>" . $row['studentNumber'] . "</td>
                 <td>" . $studentName . "</td>
                 <td>" . $row['studentBirthdate'] . "</td>
                 <td>" . $row['studentGender'] . "</td>
                 <td>" . $studentAddress . "</td>
                 <td>" . $studentProvincialAddress . "</td>
                 <td>" . $row['studentPhoneNumber'] . "</td>
                 <td>" . $row['studentTelephoneNumber'] . "</td>
                 <td>" . $row['studentEmail'] . "</td>
                 <td>" . $row['guardianName'] . "</td>
                 <td>" . $row['guardianPhoneNumber'] . "</td>
                 <td>" . $row['guardianTelephoneNumber'] . "</td>
                 <td>" . $row['studentRemark'] . "</td>
                 <td>" . $row['studentSponsor'] . "</td>
                 <td>" . $row['studentHighSchoolAddress'] . "</td>
             </tr>
            ";
        }

        $output .= "
                </tbody>
            </table>
        </div>
        ";
        
        echo $output;
    } else{
        echo 'Data Not Found';
    }
?>