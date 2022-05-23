<?php
    // database connection
    include('config.php');

    $query = "SELECT COUNT(*) as gendercount, `studentGender` FROM `student-information` GROUP BY `studentGender`";
    $query2 = "SELECT COUNT(*) as citycount, `studentTown` FROM `student-information` GROUP BY `studentTown`";
    $query3 = "SELECT COUNT(*) as provincecount, `studentProvincialDistrict` FROM `student-information` GROUP BY `studentProvincialDistrict`";


    $result = mysqli_query($conn, $query);
    $result2 = mysqli_query($conn, $query2);
    $result3 = mysqli_query($conn, $query3);
    // $output = '';
    $data = array();
    $index =0;

    // Color Library
    $genderColor = array(
        'FEMALE' => '#f46a9b',
        'MALE' => '#0bb4ff'
    );

    $retroMetroColor = array(
        "#ea5545",
        "#f46a9b", 
        "#ef9b20",
        "#edbf33", 
        "#ede15b", 
        "#bdcf32", 
        "#87bc45", 
        "#27aeef", 
        "#b33dc6"
    );

    $dutchFieldColor = array(
        "#e60049",
        "#0bb4ff",
        "#50e991",
        "#e6d800", 
        "#9b19f5", 
        "#ffa300", 
        "#dc0ab4", 
        "#b3d4ff", 
        "#00bfa0"
     );


    // Gender
    if($_POST["chartType"] == 'gender'){
        $color = $genderColor;

        foreach($result as $row){
            $data[] = array(
                'gender'		=>	$row['studentGender'],
                'total'			=>	$row['gendercount'],
                'color'			=>	$color[$row['studentGender']]
        
            );
        }

    }

    // City
    if($_POST["chartType"] == 'city'){
        foreach($result2 as $row){
            $color = $retroMetroColor;
            $data[] = array(
                'city'		    =>	$row['studentTown'],
                'total'			=>	$row['citycount'],
                'color'			=>	$color[$index]
            );
            $index++;
            if($index == 8){
                $index = 0;
            }
        }

    }
    
    // Province
    if($_POST["chartType"] == 'province'){
        foreach($result3 as $row){
            $color = $dutchFieldColor;
            $data[] = array(
                'province'		=>	$row['studentProvincialDistrict'],
                'total'			=>	$row['provincecount'],
                'color'			=>	$color[$index]
            );
            $index++;
            if($index == 8){
                $index = 0;
            }
        }

    }

    echo json_encode($data);



    // // Count Gender
    // $output .= '
    //     <div class="tableContainer">
    //         <table id="tableView" class="tableView">
    //             <thead>
    //                 <tr>
    //                     <th>Gender</th>
    //                     <th>Number</th>
    //                 </tr>
    //             </thead>
    //             <tbody>
    // ';

    // foreach($result as $row){
    //     $output .= '
    //         <tr>
    //             <td>' . $row['studentGender'] . '</td>
    //             <td>' . $row['gendercount'] . '</td>
    //         </tr>
    //     ';
    // }

    // // Count City
    // $output .= '
    //     </tbody>
    //     <thead>
    //         <tr>
    //             <th>City</th>
    //             <th>Number</th>
    //         </tr>
    //     </thead>
    //     <tbody>
    // ';

    // while($row = mysqli_fetch_array($result2)){
    //     $output .= '
    //         <tr>
    //             <td>' . $row[1] . '</td>
    //             <td>' . $row[0] . '</td>
    //         </tr>
    //     ';
    // }

    // // Count Province
    // $output .= '
    //     </tbody>
    //     <thead>
    //         <tr>
    //             <th>Province</th>
    //             <th>Number</th>
    //         </tr>
    //     </thead>
    //     <tbody>
    // ';

    // while($row = mysqli_fetch_array($result3)){
    //     $output .= '
    //         <tr>
    //             <td>' . $row[1] . '</td>
    //             <td>' . $row[0] . '</td>
    //         </tr>
    //     ';
    // }

    // $output .= '
    //             </tbody>
    //         </table>
    //     </div>
    // ';
    
    // echo $output;   

   
?>