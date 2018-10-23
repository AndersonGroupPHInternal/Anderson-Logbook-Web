<?php
    include('../../connection/connection.php');
    $response = array();
    $employeeId = $_POST['employeeId'];
    $query = "DELETE FROM `crm_employee` WHERE `EmployeeId` = ('$employeeId') ";
    
    if(mysqli_query($con, $query)){
        $response['error'] = false;
        $response['message'] = "Employee Deleted";
    }
    else{
        $response['error'] = true;
        $response['message'] = "Employee Not Deleted";
    }


    echo json_encode($response);
?>