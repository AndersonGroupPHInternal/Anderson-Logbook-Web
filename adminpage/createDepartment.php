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
          <h4 class="modal-title">Create Department</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form action="#">
            <div class="form-group">
              <label for="company_name">Company Name</label>
              <!-- <input type="text" class="form-control" id="company_name"> -->
              <select class="select_box form-control">
                <option value="failed" selected disabled> Choose A Company Name.... </option>
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
              <input type="text" class="form-control" id="department_name">
            </div>
            <button type="submit" id="btn_addDepartment" class="btn btn-primary">Submit</button>
          </form>
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

            <th class="text-center">Department ID</th>
            <th class="text-center">Department Name</th>
            <th class="text-center">Created Date</th>
            <th class="text-center" style="width:150pt;">Action</th>
          </tr>
        </thead>


        <?php
        $query = "SELECT * FROM crm_department";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while ($row = mysqli_fetch_assoc($result)) {
            //echo "EMAILS IS: ". $row["Email"];
            echo "<tr>";
            echo '<td align="center" class="small">' . $row["DepartmentId"] . '</td>';
            echo '<td align="center" class="small">' . $row["DepartmentName"] . '</td>';
            echo '<td align="center" class="small">' . $row["CreatedDate"] . '</td>';
            echo '<td align="center" class="small"><button class="delete_btn btn btn-danger btn-sm" id="deleter_btn" value="' . $row['DepartmentId'] . '" ><span class="fa fa-trash"></span> DELETE </button> <button data-toggle="modal" data-target="#editModal"class="updater_btn btn btn-primary btn-sm" id="update" value="' . $row['DepartmentId'] . '" ><span class="fa fa-pencil-square-o"></span> UPDATE </button></td>';

            echo "</tr>";
          }
        } else {
          echo '<script>console.log("NOT FOUND")</script>';
        }

        ?>

        <!-- END OF TABLE -->



        <!-- MODAL FOR EDIT -->
      <!-- The Modal EDIT -->
      <div class="modal" id="editModal">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title" ></h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <div class="container">
                <h2>Update Department Name</h2>
                <form action="#">
                  <div class="form-group">
                    <label>New Department Name:</label>
                    <input type="text" class="form-control"  id="input_company"placeholder="Enter Company Name" >
                  </div>
                  <button type="submit" class="btn btn-primary" id="update_btn">Submit</button>
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
      <!-- END OF MODAL EDIT -->
      </body>

        <script>
    $(document).ready(function(){
      console.log('nc');
      $('#btn_addDepartment').click(function(){
        console.log('submit clicked');
        var companyId = $('.select_box').val();
        var departmentName = $('#department_name').val();
        // console.log(companyId);
        // console.log(departmentName);
        if(companyId == "failed" || departmentName == ""){
          alert("PLEASE COMPLETE THE FORM")
        }else{
          add_department(companyId,departmentName);
        }
        
      });

      $('.delete_btn').click(function(){
        console.log('delete clicked');
        var departmentId = $(this).val();

        if(confirm("Are you sure?") == true){
          delete_department(departmentId);
        }
        else{
          window.location.reload();
        }
        
      });

      $('.updater_btn').click(function(){
        $('#update_btn').val($(this).val());
      });

       $('#update_btn').click(function(){
        // alert(GCompanyId);
        var departmentId = $(this).val();
        //console.log(CompanyId);
        var departmentName = $('#input_company').val();
        if(confirm("Are you sure?") == true){
          update_department(departmentId,departmentName);
          alert("Department Updated");
        }
        else{
          window.location.reload();
        }
      });

    });

    function add_department(companyId,departmentName){
      $.ajax({
        url: "api/addDepartment.php",
        type: "POST",
        data: {
          companyId:companyId,
          departmentName:departmentName
        },
        success: function(response){
          myVar = JSON.parse(response);
          // console.log(response);
          alert(myVar['message']);
          //getCompanyList();
          window.location.reload();
          $("modal").modal("hide");
        }
      })
    }


    function delete_department(departmentId){
      $.ajax({
        url: "api/deleteDepartment.php",
        type: "POST",
        data: {
          departmentId:departmentId
        },
        success: function(response){
          myVar = JSON.parse(response);
          // console.log(response);
          alert(myVar['message']);
          window.location.reload();
        }
      })
    }


    function update_department(departmentId,departmentName){
      $.ajax({
        url: "api/editDepartment.php",
        type: "POST",
        data: {
          departmentId:departmentId,
          departmentName:departmentName
        },
        success: function(response){
          myVar = JSON.parse(response);
          // console.log(response);
          //alert(myVar['message']);
          window.location.reload();
        }
      })
    }






  </script>
      </html>
