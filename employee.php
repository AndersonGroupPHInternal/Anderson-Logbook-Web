<!DOCTYPE html>
<html>
<head>
    <?php
    include('connection/connection.php');
    ?>
    <title> Logbook </title>
    <link rel="stylesheet"  href="css/index.css"/>
    <script src="js/employeeTimer.js"></script>

    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="Content/Site.css" />
    <link href="Content/cosmo.css" rel="stylesheet" type="text/css" />
    <link href="Content/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="Content/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="bower_components/angular-ui-select/dist/select.min.css" />

    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/tether/dist/js/tether.js"></script>
    <script src="bower_components/angular/angular.min.js"></script>
    <script src="Scripts/bootstrap.min.js"></script>
    <script src="bower_components/angular-ui-select/dist/select.min.js"></script>
    <script src="Scripts/Angular/app.module.js"></script>
    <script src="Scripts/Angular/Service/VisitorService.js"></script>
    <script src="Scripts/Angular/Controller/VisitorController.js"></script>
    <script src="Scripts/Angular/Controller/EmployeeLogController.js"></script>
    <script src="Scripts/Angular/Service/EmployeeLogService.js"></script>
    <script src="Scripts/Angular/Controller/EmployeeController.js"></script>
    <script src="Scripts/Angular/Service/EmployeeService.js"></script>

</head>
<body>
    <div class="navbar navbar-default navbar-fixed-top navDiv">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <i class="icon-bar"></i>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse navbar-fixed-top">
                <ul class="nav navbar-nav" style="display: inline">
                    <li id="logo"><a class="navbar-brand" href="index.php"><img src="Content/Images/logo.png" height="60" /></a></li>
                    <li><a href="#Visitor"><br />Visitor/Applicant</a></li>
                    <li><a href="employee.php"><br />Employee</a></li>
                    <li><a href="about.php"><br />About</a></li>

                </ul>
            </div>
        </div>
        <hr style="height:5pt; background-color: #2b358a;margin-top:70pt;">
    </div>
    <br/><br/><br/><br/><br/><br/>
    <div id="MainContainer" class="body-content" ng-app="App">

        <div class="col-sm-12">
            <form action="#" method="post">
                <div class="form-group">
                    <div class="row">
                        <!-- Start of Employee Number/Pin input field and buttons -->
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" align="center">
                            <img id="logo-full" src="Content/Images/logo2.jpg" class="about-title">
                            <div class="form-group">
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label align-right" for="EmployeeNumber">EmployeeNumber</label>
                                <div class="col-md-5">
                                    <input class="form-control" id="EmployeeNumber" name="EmployeeNumber" type="text" value="" /><br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label align-right" for="Pin">Pin</label>
                                <div class="col-md-5">
                                    <input class="form-control" id="Pin" maxlength="5" name="Pin" type="password" />
                                </div>
                            </div>
                            <div class="col-md-11" id="time">
                                &nbsp &nbsp &nbsp   <button name="LogTypeId" type="submit" value="1" class="btn btn-success">Time In</button>
                                <button name="LogTypeId" type="submit" value="2" class="btn btn-danger">Time Out</button>
                            </div>
                            <div id="logIn">
                            </div>

                        </div>
                        <!-- End of Employee Number/Pin input field and buttons. -->
                        <!-- Right side Time / Date -->
                        <br/><br/><br/><br/><br/>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" align="center">
                            <div class="form-group" id="ctime">
                                <br />
                                <span id="CurrentTime"></span>
                            </div>
                            <!-- <canvas id ="canvas" style="border: 5px solid; object-fit: fill;" height="225" width="275"></canvas> -->
                            <div class="form-group">
                                <div class="col-md-12">
                                    <span id="CurrentDate"></span>
                                </div>
                                <br/><br/><br/><br/>
                                <div>
                                    <h2>.......        ......</h2>
                                </div>     
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <body>
     </body>
 </div>
</body>
</html>
