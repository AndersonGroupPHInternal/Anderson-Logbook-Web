<?php
    include('../../connection/connection.php');
    $response = array();
    $jobTitleId = $_POST['jobTitleId'];
    $query = "DELETE FROM `crm_jobtitle` WHERE `JobTitleId` = ('$jobTitleId') ";
    
    if(mysqli_query($con, $query)){
        $response['error'] = false;
        $response['message'] = "Job Title Deleted";
    }
    else{
        $response['error'] = true;
        $response['message'] = "Job Title Not Deleted";
    }


    echo json_encode($response);
?>