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

  <!-- TABLE  -->
  <div class="row">
    <div class="col-sm-12 table-responsive">
      <table class="table table-hover table-sm table-bordered">
        <thead>
          <tr class="">

            <th class="text-center">Company ID</th>
            <th class="text-center">Company Name</th>
            <th class="text-center">Created Date</th>
            <th class="text-center" style="width:150pt;">Action</th>
          </tr>
        </thead>
        <!-- ** REMOVE THIS COMMENT IF YOU WANT TO SHOW THE DATA'S WITHOUT RELOADING THE PAGE **
          <tbody id="myCompanyTable">
        </tbody> -->

          <tbody>
							<?php
include '../connection/connection.php';
$sql = "SELECT * FROM crm_company ORDER BY CompanyId";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {?>
								<tr>
									<td class="table-sm"><?php echo $row['CompanyId']; ?></td>
									<td class="table-sm"><?php echo $row['CompanyName']; ?></td>
									<td class="table-sm"><?php echo $row['CreatedDate']; ?></td>
									<td class="table-sm"><?php echo '<button class="delete_btn btn btn-danger btn-sm" id="deleter_btn" value="' . $row['CompanyId'] . '" ><span class="fa fa-trash"></span> DELETE </button> <button data-toggle="modal" data-target="#editModal"class="updater_btn btn btn-primary btn-sm" id="update" value="' . $row['CompanyId'] . '" ><span class="fa fa-pencil-square-o"></span> UPDATE </button> '; ?></td>
								</tr>
							<?php
}
}
$con->close();?>
						</tbody>
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
  <h2>Update Company Name</h2>
  <form action="#">
    <div class="form-group">
      <label>New Company Name:</label>
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
      $('#btn_addCompany').click(function(){
        console.log('submit clicked');
        var companyName = $('#txtCompany').val();
        if(companyName == ""){
          alert("Please input text in the field first");
        }
        else{
          add_company(companyName);
        }

      });

      $('.delete_btn').click(function(){
        console.log('btn delete clicked');
        var CompanyId = $(this).val();
        //alert(CompanyId);

        if(confirm("Are you sure?") == true){
          delete_company(CompanyId);
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
        var CompanyId = $(this).val();
        //console.log(CompanyId);
        var CompanyName = $('#input_company').val();
        if(confirm("Are you sure?") == true){
          update_company(CompanyId,CompanyName);
          alert("Company Updated");
        }
        else{
          window.location.reload();
        }
      });

      //getCompanyList();
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
            //getCompanyList();
            window.location.reload();
            $("modal").modal("hide");
          }
        })
    }

    function delete_company(CompanyId){
        $.ajax({
          url: "api/deleteCompany.php",
          type: "POST",
          data: {
            CompanyId:CompanyId
          },
          success: function(response){
            myVar = JSON.parse(response);
            // console.log(response);
            alert(myVar['message']);
            window.location.reload();
          }
        })
    }

    function update_company(CompanyId,CompanyName){
        $.ajax({
          url: "api/editcompany.php",
          type: "POST",
          data: {
            CompanyId:CompanyId,
            CompanyName:CompanyName
          },
          success: function(response){
            myVar = JSON.parse(response);
            // console.log(response);
            //alert(myVar['message']);
            window.location.reload();
          }
        })
    }

    //  ** NOTE IF YOU WANT TO SHOW LIST WITHOUT RELOADING THE PAGE USE THIS CODES BELOW **
    // function getCompanyList(){
    //     $.ajax({
    //       url: "api/getCompanyList.php",
    //       type: "GET",
    //       success: function(response){
    //         $("#myCompanyTable").html("");
    //         myVar = JSON.parse(response);
    //         var output = "";
    //         console.log(myVar);
    //         //alert(myVar['message']);
    //         for(var i=0; i <= myVar.length-1; i++){
    //           // console.log(myVar[i]);

    //           output += "<tr><td>"+myVar[i]["CompanyId"]+"</td>" + "<td>"+myVar[i]["CompanyName"]+"</td>" + "<td>"+myVar[i]["CreatedDate"]+"</td>"+"<td>"+"<a id='deleteCompany' class='btn btn-danger fa fa-trash-o'> Delete</a> <a id='deleteCompany' class='btn btn-primary fa fa-pencil-square-o'> Edit </a>"+"</td></tr>"
    //         }
    //         $("#myCompanyTable").append(output);
    //       }
    //     })
    // }

</script>
      </html>