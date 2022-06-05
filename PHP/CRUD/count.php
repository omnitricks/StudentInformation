<?php
    // database connection
    include('../Config/config.php');

    $query = "SELECT COUNT(*) as gendercount, `studentGender` FROM `student-information` GROUP BY `studentGender`";
    $query2 = "SELECT COUNT(*) as citycount, `studentTown` FROM `student-information` GROUP BY `studentTown`";
    $query3 = "SELECT COUNT(*) as provincecount, `studentProvincialDistrict` FROM `student-information` GROUP BY `studentProvincialDistrict`";


    $result = mysqli_query($conn, $query);
    $result2 = mysqli_query($conn, $query2);
    $result3 = mysqli_query($conn, $query3);
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
   
?>