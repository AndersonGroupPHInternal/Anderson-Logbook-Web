<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>

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

  <!-- CREATE BUTTOM -->
    <a role="button" class="btn btn-primary" href="#"> CREATE </a>
  <!-- END OF  CREATE BUTTON -->
  <!-- TABLE  -->
  <div class="row">
    <div class="col-sm-12 table-responsive">
      <table class="table table-hover table-sm table-bordered">
        <thead>
          <tr class="">

            <th class="text-center">Company ID</th>
            <th class="text-center">Company Name</th>
            <th class="text-center">Created Date</th>
            <th class="t">Action</th>
            <!-- <th class="text-center">First Name</th>
            <th class="text-center">Middle Name</th> -->

            <!-- <th class="text-center">Company</th>
            <th class="text-center">Department</th>

            <th class="text-center">Job Title</th>
            <th class="text-center">Date Started</th>
            <th class="text-center">Date Hired</th> -->
          </tr>
        </thead>
        <tbody id="myCompanyTable">
        </tbody>

  
        <!-- END OF TABLE -->

        <!-- MODAL START -->
        <div class="container">
  <!-- Button to Open the Modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    CREATE
  </button>

<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog modal-md">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Company</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="#">
          <div class="form-group">
            <label for="email">Company Name:</label>
            <input type="text" class="form-control" id="txtCompany">
          </div>          
          <button type="button" class="btn btn-primary" id="btn_addCompany">Submit</button>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

</div>

<!-- END OF MODAL -->
      </body>
<script>
    $(document).ready(function(){
      console.log('nc');
      $('#btn_addCompany').click(function(){
        console.log('gumagana');
        var companyName = $('#txtCompany').val();
        add_company(companyName);
      });
      getCompanyList();
    });

    function add_company(companyName){
        $.ajax({
          url: "api/addcompany.php",
          type: "POST",
          data: {
            companyName:companyName
          },
          success: function(response){
            myVar = JSON.parse(response);
            // console.log(response);
            alert(myVar['message']);
            getCompanyList();
            $("modal").modal("hide");
          }
        })
    }

    function delete_company(companyId){
      $.ajax({

      })
    }

    function getCompanyList(){
        $.ajax({
          url: "api/getCompanyList.php",
          type: "GET",
          success: function(response){
            $("#myCompanyTable").html("");
            myVar = JSON.parse(response);
            var output = "";
            console.log(myVar);
            //alert(myVar['message']);
            for(var i=0; i <= myVar.length-1; i++){
              // console.log(myVar[i]);
              
              output += "<tr><td>"+myVar[i]["CompanyId"]+"</td>" + "<td>"+myVar[i]["CompanyName"]+"</td>" + "<td>"+myVar[i]["CreatedDate"]+"</td>"+"<td>"+"<a id='deleteCompany' class='btn btn-danger fa fa-trash-o'> Delete</a>"+"</td></tr>"
            }
            $("#myCompanyTable").append(output);
          }
        })
    }
</script>
      </html>