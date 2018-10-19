<?php
    include('../../connection/connection.php');
    $response = array();
    $companyName = $_POST["companyName"];
    $query = "INSERT INTO `crm_company` (`CompanyName`) VALUES ('$companyName') ";

    if(mysqli_query($con, $query)){
        $response['error'] = false;
        $response['message'] = "Company Added";
    }
    else{
        $response['error'] = true;
        $response['message'] = "Company Not Added";
    }

    echo json_encode($response);
?>