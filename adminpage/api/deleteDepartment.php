<?php
    include('../../connection/connection.php');
    $response = array();
    $departmentId = $_POST['departmentId'];
    $query = "DELETE FROM `crm_department` WHERE `departmentId` = ('$departmentId') ";
    
    if(mysqli_query($con, $query)){
        $response['error'] = false;
        $response['message'] = "Department Deleted";
    }
    else{
        $response['error'] = true;
        $response['message'] = "Department Not Deleted";
    }


    echo json_encode($response);
?>