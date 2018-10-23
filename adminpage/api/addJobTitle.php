<?php
    include('../../connection/connection.php');
    $response = array();
    $jobTitleName = $_POST["jobTitleName"];
    $departmentId = $_POST["departmentId"];
    $query = "INSERT INTO `crm_jobtitle` (`DepartmentId`, `JobName`) VALUES ('$departmentId','$jobTitleName') ";

    if(mysqli_query($con, $query)){
        $response['error'] = false;
        $response['message'] = "Job Title Added";
    }
    else{
        $response['error'] = true;
        $response['message'] = "Job Title Not Added";
    }

    echo json_encode($response);
?>