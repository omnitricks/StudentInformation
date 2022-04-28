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
                        <th>Student Course</th>
                    </tr>
                </thead>
                <tbody>
        ';

        while($row = mysqli_fetch_array($result)){
            // Combines data
            $studentName = $row['studentSurname'] . ', ' . $row['studentFirstName'] . ' ' . $row['studentMiddleInitial'] . '.';
            // $studentAddress = $row['studentStreet'] . ' ' . $row['studentTown'] . ' ' . $row['studentDistrict'];

            // if($row['studentProvincialStreet']=='N/A' && $row['studentProvincialTown'] =='N/A' && $row['studentProvincialDistrict']=='N/A'){
            //     $studentProvincialAddress = 'N/A';
            // }else{
            //     $studentProvincialAddress = $row['studentProvincialStreet'] . ' ' . $row['studentProvincialTown'] . ' ' . $row['studentProvincialDistrict'];
            // }

            // Conditions for optional fields left blank
            // if($row['studentTelephoneNumber'] == ''){
            //     $row['studentTelephoneNumber'] = 'N/A';
            // }
            // if($row['guardianTelephoneNumber'] == ''){
            //     $row['guardianTelephoneNumber'] = 'N/A';
            // }
            // if($row['studentRemark'] == ''){
            //     $row['studentRemark'] = 'N/A';
            // }
            // if($row['studentSponsor'] == ''){
            //     $row['studentSponsor'] = 'N/A';
            // }
            // if($row['studentHighSchoolAddress'] == ''){
            //     $row['studentHighSchoolAddress'] = 'N/A';
            // }

            //  Changes format of date from YYYY-MM-DD to Month Day, Year
            // $birthdate = date('M j, Y',strtotime($row['studentBirthdate']));

            $output .= "
            <tr id='$row[id]'>
                <td><a href='#' id='view' class='view'><i class='fa-solid fa-file-lines'></i></a></td>
                <td><a href='#' id='edit' class='edit'><i class='fa-solid fa-pen-to-square'></i></a></td>
                <td>" . $row['studentNumber'] . "</td>
                <td>" . $studentName . "</td>
                <td>" . $row['studentCourse'] . "</td>
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
        echo '
            <br><div class="alert-error">
                <h3>Data Not Found</h3>
            </div> 
        ';
    }
?>