<?php
    include('../../connection/connection.php');
    $response = array();
    $jobTitleId = $_POST['jobTitleId'];
    $jobTitleName = $_POST['jobTitleName'];
    $query = "UPDATE `crm_jobtitle` SET `JobName`= ('$jobTitleName') WHERE `JobTitleId` = ('$jobTitleId') ";
    
    if(mysqli_query($con, $query)){
        $response['error'] = false;
        $response['message'] = "Job Name Upated";
    }
    else{
        $response['error'] = true;
        $response['message'] = "Job Name Not Updated";
    }

    echo json_encode($response);
?>