<?php
include('../../connection/connection.php');
$response = array();
$department_id = $_POST['department_id'];
$query = "SELECT `JobName`,`JobTitleId` FROM crm_jobtitle WHERE `DepartmentId` = '$department_id' ";
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