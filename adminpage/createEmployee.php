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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
 <!--  -->
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

  <!-- Button to Open the Modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    CREATE
  </button>

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Create Employee</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="col-md-12">
            <form action="#">
              <div class="form-group">
                <label for="employee_number">Employee Number</label>
                <input type="text" class="form-control" id="employee_number" placeholder="Enter Employee Number" required>
              </div>
              <div class="form-group">
                <label for="employee_pin">Employee Pin</label>
                <input type="text" class="form-control" id="employee_pin" placeholder="Enter Employee PIN" required>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter Email" required>
              </div>
              <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" id="first_name" placeholder="Enter First Name" required>
              </div>
              <div class="form-group">
                <label for="middle_name">Middle Name</label>
                <input type="text" class="form-control" id="middle_name" placeholder="Enter Middle Name" required>
              </div>
              <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" id="last_name" placeholder="Enter Last Name" required>
              </div>
              <div class="form-group">
                <label for="company_name">Company Name</label>
                <select class="company_select form-control">
                  <option selected disabled>CHOOSE A COMPANY NAME</option>
                  <?php
                  $sql = "SELECT * FROM crm_company ORDER BY CompanyId";
                  $result = $con->query($sql);
                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      echo '<option id="company_txt" value="'.$row['CompanyId'].'">'.$row['CompanyName'].'</option>';

                    }
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="department_name">Department Name</label>
                <select class="department_select form-control" disabled required>
                  <option selected disabled>CHOOSE A DEPARTMENT NAME</option>
                </select>
              </div>
              <div class="form-group">
                <label for="job_name">Job Name</label>
                <select class="job_select form-control" disabled required>
                  <option selected disabled>CHOOSE A JOB NAME</option>
                </select>
              </div>
              <div class="form-group">
                <label for="date_started">Date Started</label>
                <input type="date" class="form-control" id="date_started"placeholder="Enter Date" required>
              </div>
              <div class="form-group">
                <label for="date_hired">Date Hired</label>
                <input type="date" class="form-control" id="date_hired" required>
              </div>
              <button type="submit" id="btn_addEmployee" class="btn btn-primary">Submit</button>
            </form>
          </div>

        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
  <!-- END OF CREATE MODAL -->



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
            <th class="text-center" style="width:150pt;">Action</th>
          </tr>
        </thead>


        <?php
        $query = "SELECT `crm_employee`.`EmployeeNumber` as 'EmployeeNumber',
        `crm_employee`.`EmployeeId` as 'EmployeeId',
        `crm_employee`.`Email` as 'Email',
        `crm_employee`.`LastName` as 'LastName' ,
        `crm_employee`.`FirstName` as 'FirstName',
        `crm_employee`.`MiddleName` as 'MiddleName',
        `crm_company`.`CompanyName` as 'CompanyName',
        `crm_department`.`DepartmentName` as 'DepartmentName',
        `crm_jobtitle`.`JobName` as 'JobName',
        `crm_employee`.`DateStarted` as 'DateStarted',
        `crm_employee`.`DateHired` as 'DateHired'
        FROM `crm_employee`
        INNER JOIN `crm_company` ON `crm_employee`.`CompanyId` = `crm_company`.`CompanyId`
        INNER JOIN `crm_department` ON `crm_employee`.`DepartmentId` = `crm_department`.`DepartmentId`
        INNER JOIN `crm_jobtitle` ON `crm_employee`.`JobTitleId` = `crm_jobtitle`.`JobTitleId`
        GROUP BY `crm_employee`.`EmployeeId`";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while ($row = mysqli_fetch_assoc($result)) {
            //echo "EMAILS IS: ". $row["Email"];
            echo "<tr>";
            echo '<td align="center" class="small">'. $row["EmployeeNumber"].'</td>';
            echo '<td align="center" class="small">'. $row["Email"].'</td>';
            echo '<td align="center" class="small">'. $row["LastName"].', '.$row["FirstName"].' '.$row["MiddleName"].'</td>';
            echo '<td align="center" class="small">'. $row["CompanyName"].'</td>';
            echo '<td align="center" class="small">'. $row["DepartmentName"].'</td>';
            echo '<td align="center" class="small">'. $row["JobName"].'</td>';
            echo '<td align="center" class="small">'. $row["DateStarted"].'</td>';
            echo '<td align="center" class="small">'. $row["DateHired"].'</td>';
            echo '<td align="center" class="small"><button class="delete_btn btn btn-danger btn-sm" id="deleter_btn" value="' . $row['EmployeeId'] . '" ><span class="fa fa-trash"></span> DELETE </button> <button data-toggle="modal" data-target="#editModal"class="updater_btn btn btn-primary btn-sm" id="update" value="' . $row['EmployeeNumber'] . '" ><span class="fa fa-pencil-square-o"></span> UPDATE </button></td>';


            echo "</tr>";
          }
        } else {
          echo '<script>console.log("NOT FOUND")</script>';
        }

        ?>

        <!-- END OF TABLE -->
      </body>

      <script>
      $(document).ready(function() {
        console.log('nc');
        $('.company_select').change(function(){
          $(".job_select").html("");
          $(".job_select").val("");
          $(".department_select").val("");
          console.log('company select change');
          var company_id = $(this).val();
          //console.log(company_id);
          department_name_change(company_id);
          if(company_id != ""){
            $('.department_select').attr({
              disabled:false
            })
          }
          else{
            $('.department_select').attr({
              disabled:true
            })
          }
        });

        $('.department_select').change(function(){
          console.log('department select change');
          var department_id = $(this).val();
          //console.log(company_id);
          job_name_change(department_id);
          if(department_id != ""){
            $('.job_select').attr({
              disabled:false
            })
          }
          else{
            $('.job_select').attr({
              disabled:true
            })
          }
        });


        $('#btn_addEmployee').click(function(){
          var DateHired = $('#date_hired').val();
          var DateStarted = $('#date_started').val();
          var CompanyId = $('.company_select').val();
          var DepartmentId = $('.department_select').val();
          var JobTitleId =  $('.job_select').val();
          var Email = $('#email').val();
          var FirstName = $('#first_name').val();
          var LastName = $('#last_name').val();
          var MiddleName = $('#middle_name').val();
          var EmployeeNumber = $('#employee_number').val();
          var EmployeePin = $('#employee_pin').val();
          //  console.log(DateHired);
          //  console.log(DateStarted);
          //  console.log(CompanyId);
          //  console.log(DepartmentId);
          //  console.log(JobTitleId);
          //  console.log(Email);
          //  console.log(FirstName);
          //  console.log(LastName);
          //  console.log(MiddleName);
          //  console.log(EmployeeNumber);
          //  console.log(EmployeePin);
          add_employee(DateHired,DateStarted,CompanyId,DepartmentId,JobTitleId,Email,FirstName,LastName,MiddleName,EmployeeNumber,EmployeePin);
          alert("EMPLOYEE ADDED");
          window.location.reload();
        });


        $('.delete_btn').click(function(){
          console.log('delete clicked');
          var employeeId = $(this).val();

          if(confirm("Are you sure?") == true){
            delete_employee(employeeId);
          }
          else{
            window.location.reload();
          }

        });


      });


      function department_name_change(company_id){
        $.ajax({
          url: "api/autoChangeDepartment.php",
          type: "POST",
          data:{
            company_id:company_id
          },
          success: function(response){
            $(".department_select").html("");
            var output = "";
            var myVar = JSON.parse(response);
            for(var i=0; i <= myVar.length-1; i++){
              console.log(myVar[i]);
              output += "<option value='"+myVar[i]["DepartmentId"]+"'>"+myVar[i]["DepartmentName"]+"</option>";
            }
            $(".department_select").append(output);

          }
        })
      }

      function job_name_change(department_id){
        $.ajax({
          url: "api/autoChangeJob.php",
          type: "POST",
          data:{
            department_id:department_id
          },
          success: function(response){
            $(".job_select").html("");
            var output = "";
            var myVar = JSON.parse(response);
            for(var i=0; i <= myVar.length-1; i++){
              console.log(myVar[i]);
              output += "<option value='"+myVar[i]["JobTitleId"]+"'>"+myVar[i]["JobName"]+"</option>";
            }
            $(".job_select").append(output);

          }
        })
      }


      function add_employee(DateHired,DateStarted,CompanyId,DepartmentId,JobTitleId,Email,FirstName,LastName,MiddleName,EmployeeNumber,EmployeePin){

        $.ajax({
          url: "api/addEmployee.php",
          type: "POST",
          data:{
            DateHired:DateHired,
            DateStarted:DateStarted,
            CompanyId:CompanyId,
            DepartmentId:DepartmentId,
            JobTitleId:JobTitleId,
            Email:Email,
            FirstName:FirstName,
            LastName:LastName,
            MiddleName:MiddleName,
            EmployeeNumber:EmployeeNumber,
            EmployeePin:EmployeePin
          },
          success: function(response){

          }
        })

      }

      function delete_employee(employeeId){
        $.ajax({
          url: "api/deleteEmployee.php",
          type: "POST",
          data: {
            employeeId:employeeId
          },
          success: function(response){
            myVar = JSON.parse(response);
            // console.log(response);
            alert(myVar['message']);
            window.location.reload();
          }
        })
      }

      </script>
      </html>
