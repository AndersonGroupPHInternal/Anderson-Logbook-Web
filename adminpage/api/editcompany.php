<?php
    include('../../connection/connection.php');
    $response = array();
    $CompanyId = $_POST['CompanyId'];
    $CompanyName = $_POST['CompanyName'];
    $query = "UPDATE `crm_company` SET `CompanyName`= ('$CompanyName') WHERE `CompanyId` = ('$CompanyId') ";
    
    if(mysqli_query($con, $query)){
        $response['error'] = false;
        $response['message'] = "Company Upated";
    }
    else{
        $response['error'] = true;
        $response['message'] = "Company Not Updated";
    }

    echo json_encode($response);
?>