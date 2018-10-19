<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <title>Anderson Logbook</title>
    <link rel="stylesheet"  href="css/index.css"/>   
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="Content/Site.css" />
    <link href="Content/cosmo.css" rel="stylesheet" type="text/css" />
    <link href="Content/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="Content/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="bower_components/angular-ui-select/dist/select.min.css" />

    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    
    <script src="bower_components/angular/angular.min.js"></script>
    <script src="Scripts/bootstrap.min.js"></script>
    <script src="bower_components/angular-ui-select/dist/select.min.js"></script>
    <script src="Scripts/Angular/app.module.js"></script>


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
    <br /> <br /><br />

    <div id="MainContainer" class="body-content" ng-app="App">

        <div class="container" style="padding:20px;">
            <div class="panel panel-flat" style="padding-top:50px; padding-bottom:50px">
                <div class="panel-body container">
                    <div class="jumbotron">
                        <center><img src="Content/Images/logo2.jpg" class="about-title" style="width: 100%; float: initial"></center>
                    </div>
                    <br />

                </div>
            </div>
            <div class="footer text-muted">
                &copy; 2018. - Anderson Group BPO Inc. | <a href="#">Anderson.Logbook</a> - Private and Confidential.
            </div>
        </div>
    </div>
</body>
</html>