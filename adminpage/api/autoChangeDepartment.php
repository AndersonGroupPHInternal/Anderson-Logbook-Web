<?php
include('../../connection/connection.php');
$response = array();
$company_id = $_POST['company_id'];
$query = "SELECT `DepartmentName`,`DepartmentId` FROM crm_department WHERE `CompanyId` = '$company_id' ";
$result = mysqli_query($con, $query);
$temp = array();

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $temp[] = $row;
    }
}

 echo json_encode($temp);

?>