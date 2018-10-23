<?php
    include('../../connection/connection.php');
    $response = array();
    $departmentId = $_POST['departmentId'];
    $departmentName = $_POST['departmentName'];
    $query = "UPDATE `crm_department` SET `DepartmentName`= ('$departmentName') WHERE `DepartmentId` = ('$departmentId') ";
    
    if(mysqli_query($con, $query)){
        $response['error'] = false;
        $response['message'] = "Department Upated";
    }
    else{
        $response['error'] = true;
        $response['message'] = "Department Not Updated";
    }

    echo json_encode($response);
?>