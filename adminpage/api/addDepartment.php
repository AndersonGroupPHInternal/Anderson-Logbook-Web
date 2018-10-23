<?php
    include('../../connection/connection.php');
    $response = array();
    $departmentName = $_POST["departmentName"];
    $companyId = $_POST["companyId"];
    $query = "INSERT INTO `crm_department`(`CompanyId`, `DepartmentName`) VALUES ('$companyId','$departmentName') ";

    if(mysqli_query($con, $query)){
        $response['error'] = false;
        $response['message'] = "Department Added";
    }
    else{
        $response['error'] = true;
        $response['message'] = "Department Not Added";
    }

    echo json_encode($response);
?>