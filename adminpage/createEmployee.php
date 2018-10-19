<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <?php
  include '../connection/connection.php';
  ?>

  <title>Anderson CRM</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../adminPageCSS/adminpage.css">
  <link rel="stylesheet" href="../adminPageCSS/createEmployee.css">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
  <!-- <script src="../js/adminpage.js"></script> -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="../bower_components/angular-ui-select/dist/select.min.css" />
  <link rel="stylesheet" href="../Content/Site.css" />

</head>

<body>
  <!-- NAV BAR -->
  <div class="navbar fixed-top navbar-toggleable-md navbar-default">
    <div class="container">
      <a class="navbar-brand" href="/adminpage/adminpageindex.php">
        <i class="fa fa-home" aria-hidden="true"></i>
        Home
      </a>
      <div class="navbar-header">
      </div>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li>
            <a class="navbar-link" href="/adminpage/createEmployee.php">
              <i class="fa fa-user icon" aria-hidden="true"></i> Employee
            </a>
          </li>
          <li>
            <a class="navbar-link"  href="/adminpage/createDepartment.php">
              <i class="fa fa-briefcase" aria-hidden="true"></i> Department
            </a>
          </li>
          <li>
          <a class="navbar-link" href="/adminpage/createCompany.php">
              <i class="fa fa-users" aria-hidden="true"></i> Company
            </a>
          </li>
          <li>
          <a class="navbar-link"  href="/adminpage/createJobTitle.php">
              <i class="fa fa-pencil-square" aria-hidden="true"></i> Job Title
            </a>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#"></a></li>
        </ul>
      </div>
    </div>
  </div>
  <hr style="background-color:#2b358a; height:5pt;width=100%;margin-top:2pt;">

  <!-- END OF NAV BAR -->

  <!-- CREATE BUTTOM -->
    <a role="button" class="btn btn-primary" href="#"> CREATE </a>
  <!-- END OF  CREATE BUTTON -->
  <!-- TABLE  -->
  <div class="row">
    <div class="col-sm-12 table-responsive">
      <table class="table table-hover table-sm table-bordered">
        <thead>
          <tr class="">

            <th class="text-center">Employee #</th>
            <th class="text-center">Email</th>
            <th class="text-center">Name</th>
            <!-- <th class="text-center">First Name</th>
            <th class="text-center">Middle Name</th> -->

            <th class="text-center">Company</th>
            <th class="text-center">Department</th>

            <th class="text-center">Job Title</th>
            <th class="text-center">Date Started</th>
            <th class="text-center">Date Hired</th>
          </tr>
        </thead>


    <?php
$query = "SELECT * FROM crm_employee";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        //echo "EMAILS IS: ". $row["Email"];
        echo "<tr>";
          echo '<td align="center" class="small">'. $row["EmployeeNumber"].'</td>';
          echo '<td align="center" class="small">'. $row["Email"].'</td>';
          echo '<td align="center" class="small">'. $row["LastName"].', '.$row["FirstName"].' '.$row["MiddleName"].'</td>';
          // echo '<td align="center" class="small">'. $row["FirstName"].'</td>';
          // echo '<td align="center" class="small">'. $row["MiddleName"].'</td>';
          echo '<td align="center" class="small">'. $row["CompanyName"].'</td>';
          echo '<td align="center" class="small">'. $row["DepartmentName"].'</td>';
          echo '<td align="center" class="small">'. $row["JobTitleName"].'</td>';
          echo '<td align="center" class="small">'. $row["DateStarted"].'</td>';
          echo '<td align="center" class="small">'. $row["DateHired"].'</td>';

        echo "</tr>";
    }
} else {
    echo '<script>console.log("NOT FOUND")</script>';
}

?>

        <!-- END OF TABLE -->
      </body>
      </html>