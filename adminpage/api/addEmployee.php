<?php
    include('../../connection/connection.php');
    $response = array();
    $DateHired = $_POST["DateHired"];
    $DateStarted = $_POST["DateStarted"];
    $CompanyId = $_POST["CompanyId"];
    $DepartmentId = $_POST["DepartmentId"];
    $JobTitleId = $_POST["JobTitleId"];
    $Email = $_POST["Email"];
    $FirstName = $_POST["FirstName"];
    $LastName = $_POST["LastName"];
    $MiddleName = $_POST["MiddleName"];
    $EmployeeNumber = $_POST["EmployeeNumber"];
    $EmployeePin = $_POST["EmployeePin"];

    $query = "INSERT INTO `crm_employee`(`DateHired`, `DateStarted`, `CompanyId`, `DepartmentId`, `JobTitleId`, `Email`, `FirstName`, `LastName`, `MiddleName`, `EmployeeNumber`, `EmployeePin`) 
    VALUES ('$DateHired','$DateStarted','$CompanyId','$DepartmentId','$JobTitleId','$Email','$FirstName','$LastName','$MiddleName','$EmployeeNumber','$EmployeePin')";

    if(mysqli_query($con, $query)){
        $response['error'] = false;
        $response['message'] = "Employee Added";
    }
    else{
        $response['error'] = true;
        $response['message'] = "Employee Not Added";
    }

    echo json_encode($response);
?>