<?php
    // database connection
    include('../Config/config.php');

    if(isset($_POST["query"]) && isset($_POST["queryType"]) && isset($_POST["activityType"])){
        $search = mysqli_real_escape_string($conn, $_POST['query']);
        $searchType = $_POST['queryType'];
        $activityType = $_POST['activityType'];

        $sql = "SELECT * FROM `student-activity-log` WHERE ".$searchType." LIKE '%".$search."%' AND `activityType` = '" .$activityType."'";
        
    } else{
        $sql = "SELECT * FROM `student-activity-log`";

    }

    $res = mysqli_query($conn, $sql);

    // Sets the number of total data in a page
    $results_per_page = 5;
    $number_of_results = mysqli_num_rows($res);
    // Determines number of total pages available
    $number_of_pages = ceil($number_of_results/$results_per_page);

    // Determines which page number user is currently on
    if(!isset( ($_POST["page"]) )){
        $page = 1;

    } else if( isset( ($_POST["page"]) ) ){
        $page =   $_POST["page"];

    }

    // Determines the LIMIT starting number
    $this_page_first_result = ($page - 1) * $results_per_page;


    // Display links to pages
    $pageLink = '';

    //First Page, only shows when page number is more than 2
    if($number_of_pages >= 3){
        if($page != 1){
            $pageLink .=  '<span><a href="indexLog.php?page=1" class="pageprev active" id="pageprev"> <i class="fa-solid fa-angles-left"></i></a></span>';
        }
    }
    
    //Previous Page
    $prevlimit = $page - 1;
    if($prevlimit < 1){
        $prevlimit = 1;
    }
    if($page != $prevlimit){
        $pageLink .=  '<span><a href="indexLog.php?page=' . $prevlimit . '" class="pageprev active" id="pageprev"> <i class="fa-solid fa-chevron-left"></i></a></span>';
    }

    if($number_of_pages >= 5){
        $lowerLimit = $page - 2;

        if($lowerLimit < 1){
            $lowerLimit = 1;

        }

        $upperLimit = $page + 2;

        if($upperLimit > $number_of_pages){
            $upperLimit = $number_of_pages;

        }

        $diff = $upperLimit - $lowerLimit;

        if($diff != 4){
            if($page == 1){
                $upperLimit =  $page + 4;
    
            }else if($page == 2){
                $upperLimit =  $page + 3;

            }

            if($page == $number_of_pages){
                $lowerLimit =  $page - 4;
    
            }else if($page == ($number_of_pages-1)){
                $lowerLimit =  $page - 3;

            }

        }


        for($pages=$lowerLimit; $pages<=$number_of_pages; $pages++){
            
            if($pages <= $upperLimit){
                //Adds active class to the page user is currently on
                if($pages ==  $page){
                    $pageLink .=  '<span><a href="indexLog.php?page=' . $pages . '" class="page' . $pages . ' active" id="page' . $pages . '"> ' . $pages . ' </a></span>';
                } else{
                    $pageLink .=  '<span><a href="indexLog.php?page=' . $pages . '" class="page' . $pages . '" id="page' . $pages . '"> ' . $pages . ' </a></span>';
                }

            }

            
        }
    } else {
        for($pages=1; $pages<=$number_of_pages; $pages++){
            //Adds active class to the page user is currently on
            if($pages ==  $page){
                $pageLink .=  '<span><a href="indexLog.php?page=' . $pages . '" class="page' . $pages . ' active" id="page' . $pages . '"> ' . $pages . ' </a></span>';
            } else{
                $pageLink .=  '<span><a href="indexLog.php?page=' . $pages . '" class="page' . $pages . '" id="page' . $pages . '"> ' . $pages . ' </a></span>';
            }
        };

    }



    //Next Page
    $nextlimit = $page + 1;
    if($nextlimit == $pages){
        $nextlimit = $pages - 1;
    }
    if($page != $nextlimit){
        $pageLink .=  '<span><a href="indexLog.php?page=' . $nextlimit . '" class="pagenext active" id="pagenext"> <i class="fa-solid fa-chevron-right"></i></a></span>';
    }

    //Last Page, only shows when page number is more than 2
    $limit = $pages - 1;
    if($number_of_pages >= 3){
        if($page != $limit){
            $pageLink .=  '<span><a href="indexLog.php?page=' . $limit . '" class="pageprev active" id="pageprev"> <i class="fa-solid fa-angles-right"></i></a></span>';
        }
    }


    // Retrieves selected results according to the limit
    if(isset($_POST["query"]) && isset($_POST["queryType"]) && isset($_POST["activityType"])){
        $search = mysqli_real_escape_string($conn, $_POST['query']);
        $searchType = $_POST['queryType'];
        $activityType = $_POST['activityType'];
        
        $query = "SELECT * FROM `student-activity-log` WHERE ".$searchType." LIKE '%".$search."%' AND `activityType` = '" .$activityType."' ORDER BY `id` DESC";

        $pageLink = '';
    } else{
        $query = "SELECT * FROM `student-activity-log` ORDER BY `id` DESC LIMIT " . $this_page_first_result . "," . $results_per_page;
    }

    $result = mysqli_query($conn, $query);
    $output = '';

    if(mysqli_num_rows($result) > 0){
        $output .= '
        <div class="tableContainer">
            <table id="tableViewLog" class="tableViewLog">
                <thead>
                    <tr>
                        <th></th>
                        <th>Activity Type</th>
                        <th>Student Number</th>
                        <th>Student Name</th>
                        <th>Action Date</th>
                        <th>User</th>
                    </tr>
                </thead>
                <tbody>
        ';

        while($row = mysqli_fetch_array($result)){
            // Combines data
            $studentName = $row['studentSurnameModified'] . ', ' . $row['studentFirstNameModified'] . ' ' . $row['studentMiddleInitialModified'] . '.';

            if($row['activityType'] == "DELETE"){
                $queryArchive= "SELECT * FROM `student-archive` WHERE `rowId` LIKE " . $row['rowId'];
                $archive = mysqli_query($conn, $queryArchive);
                $rowArchive = mysqli_fetch_array($archive);

                $studentName = $rowArchive['studentSurname'] . ', ' . $rowArchive['studentFirstName'] . ' ' . $rowArchive['studentMiddleInitial'] . '.';

            }

            $output .= "
            <tr id='$row[id]'>
                <td><a href='#' id='view' class='view'><i class='fa-solid fa-file-lines'></i></a></td>
                <td>" . $row['activityType'] . "</td>
                <td>" . $row['studentNumber'] . "</td>
                <td>" . $studentName . "</td>
                <td>" . $row['actionDate'] . "</td>
                <td>" . $row['user'] . "</td>
            </tr>
            ";
        }

        $output .= "
                </tbody>
            </table>
            ";

        $output .= "
                <div class='pagination_links'>" . $pageLink . "</div>
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