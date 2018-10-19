<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
  <title>Anderson CRM</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../adminPageCSS/adminpage.css">
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
  <hr style="background-color:#2b358a; height:5pt; margin-top:2pt;">

  <!-- END OF NAV BAR -->

  <!-- MIDDLE ICON / LOGO -->
  <div class="panel panel-flat" style="padding-top:50px; padding-bottom:50px">
    <div class="panel-body container">
      <div class="jumbotron">
        <center><img src="../images/CRMlogo.jpg" class="about-title" style="width: 100%; float: initial"></center>
      </div>
      <br />
    </div>
  </div>
  <!-- END OF MIDDLE ICON / LOGO -->


  <!-- TEXTS -->
  <center>
    <div>
      <!-- <p style="font-size: 20px;">
        <span style="color: #2b358a !important">Anderson Logbook</span> is an internal visitor management system intended for Anderson Group BPO Inc.<br />
        It maximizes log efficiency, secure data log, organizes visitor information, and store files.<br />
        The system implementation prioritizes security of the company.<br />
      </p> -->
      <h3 style="color: #2b358a !important">Developers</h3>
      <p style="font-size:16px;">
        <a class="deverlopers" href="mailto:marloutayao@gmail.com"> Marlou T. Tayao </a>
      </p>
    </div>
  </center>
  <!-- END OF TEXT -->


  <!-- FOOTER -->
  <div>
   <div class="footer">
    <p style="color:black;">&copy; 2018. - Anderson Group BPO Inc. | <a href="#" style="color: #607dff !important">Anderson CRM</a> - Private and Confidential.</p>
  </div>
</div>
<!-- END OF FOOTER -->
</body>
</html>