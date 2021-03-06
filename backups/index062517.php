<!DOCTYPE html>
<html lang="en">

<?php // check to see if the login has occurred
      // if not go back to the login screen

require_once 'DB_Functions.php';
$db = new DB_Functions();
$result = $db->getRecentFirst();


session_start();
if ((!isset($_SESSION['myusername'] )) || $_SESSION['myusername'] == '' ) {
  header("location:login.html");
} else {
;//  $un = $_SESSION['myusername'];
//  echo "Username is $un";
//  $_SESSION['myusername'] = "";

}
?>




<head>
    <!-- Redirecting to index.php, the new version of this site -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Talking Keg Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body onload="addTitle();updateLive();">
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Talking Keg</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                    <!-- /.dropdown-alerts -->
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                      Logged in as Sun King<br>Logged in as Eric  <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="tables2.php"><i class="fa fa-table fa-fw"></i> Tables</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-beer fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">85</div>
                                    <div>Beers Sold Today!</div>
                                </div>
                            </div>
                        </div>
                        <a href="tables2.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tachometer fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">All Kegs</div>
                                    <div>Within Pressure Range!</div>
                                </div>
                            </div>
                        </div>
                        <a href="tables2.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-thermometer-4 fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">1 Keg</div>
                                    <div>Outside of Temp Range!</div>
                                </div>
                            </div>
                        </div>
                        <a href="tables2.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-flask fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">14 Kegs</div>
                                    <div>Running Low!</div>
                                </div>
                            </div> 
                        </div>
                        <a href="tables2.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Beer Inventory
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Location
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu"> <!--
                                        <li id="percentage"><a href="#" onclick="perc();">Show as Percentage</a>
                                        </li> -->
					<li><a href="#" onclick="lombard();">Lombard</a>
					</li>
					<li><a href="#" onclick="loop();">South Loop</a>
					</li>
					<li><a href="#" onclick="chicago();">Chicago Ave</a>
					</li>
					<li id="percentage"><a href="#" onclick="perc();">Aggregate (as %)</a>	
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body"> <!--
                            <div id="morris-area-chart"></div> --> 
                            <div id="chart"></div> 
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Loss Tracking
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="#">Action</a>
                                        </li>
                                        <li><a href="#">Another action</a>
                                        </li>
                                        <li><a href="#">Something else here</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Beer</th>
                                                    <th>Date of Last Fill</th>
                                                    <th>% Sold</th>
                                                    <th>% Remaining</th>
                                                    <th>Projected Time to Empty</th>
						</tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Pilsner</td>
                                                    <td>4/8/17</td>
                                                    <td>93%</td>
                                                    <td>5%</td>
                                                    <td>1d</td>
						</tr>
                                                <tr>
                                                    <td>IPA</td>
                                                    <td>3/28/17</td>
                                                    <td>62%</td>
                                                    <td>35%</td>
                                                    <td>1w</td>
						</tr>
                                                <tr>
                                                    <td>Stout</td>
                                                    <td>3/28/17</td>
                                                    <td>83%</td>
                                                    <td>15%</td>
                                                    <td>2d 12h</td>
						</tr>
                                                <tr>
                                                    <td>Lager</td>
                                                    <td>4/10/17</td>
                                                    <td>2%</td>
                                                    <td>95%</td>
                                                    <td>3w 4d</td>
						</tr>
                                                <tr>
                                                    <td>Bock</td>
                                                    <td>4/10/17</td>
                                                    <td>65%</td>
                                                    <td>20%</td>
                                                    <td>4d 8h</td>
						</tr>
                                                <tr>
                                                    <td>Porter</td>
                                                    <td>3/15/17</td>
                                                    <td>60%</td>
                                                    <td>40%</td>
						    <td>6d</td>
                                                </tr>
                                                <tr>
                                                    <td>Wheat</td>
                                                    <td>3/22/17</td>
                                                    <td>91%</td>
                                                    <td>8%</td>
						    <td>1d</td>
                                                </tr>
                                                <tr>
                                                    <td>Belgian</td>
                                                    <td>4/8/17</td>
                                                    <td>85%</td>
                                                    <td>15%</td>
						    <td>2d</td>
                                                </tr>
						<tr>
						    <td>Brown Ale</td>
						    <td>4/8/17</td>
						    <td>55%</td>
						    <td>40%</td>
						    <td>1w</td>
						</tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.col-lg-4 (nested) -->
                               <!-- <div class="col-lg-8">
                                    <div id="morris-bar-chart"></div>
                                </div> -->
                                <!-- /.col-lg-8 (nested) -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                 
                 </div>
                                 <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Technical Notifications Panel</div> 
			<div class="panel-heading">Tracking 837 Sensors Across 5 Locations</div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-tasks fa-fw"></i> Settings Changed
                                    <span class="pull-right text-muted small"><em>43 minutes ago</em>
                                    </span>
                                </a>
				<a href="#" class="list-group-item">
				    <i class="glyphicon glyphicon-print"></i>  Hub Installed (South Loop)
				    <span class="pull-right text-muted small"><em>4/5/17</em>
				    </span>
				</a>
                            <!--    <a href="#" class="list-group-item">
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small"><em>4/2/17</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-bolt fa-fw"></i> Server Crashed!
                                    <span class="pull-right text-muted small"><em>4/2/17</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-warning fa-fw"></i> Server Not Responding
                                    <span class="pull-right text-muted small"><em>4/2/17</em>
                                    </span>
                                </a> -->
				<a href="#" class="list-group-item">
				    <i class="glyphicon glyphicon-map-marker"></i> New Location (Lombard)
				    <span class="pull-right text-muted small"><em>3/8/17</em>
				    </span>
 				</a>
                                <a href="#" class="list-group-item">
                                    <i class="glyphicon glyphicon-plus"></i>  85 Sensors Installed
                                    <span class="pull-right text-muted small"><em>3/8/17</em>
                                    </span>
                                </a>
                            </div>
                            <!-- /.list-group -->
                            <a href="#" class="btn btn-default btn-block">View All Alerts</a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                   
<div class="panel panel-default" id="live-panel">
<Down>            <div class="panel-heading">Keg fe000001 Live Information</div>
            <div class="panel-body">
              <div class="row">
		<div class="col-lg-12">
		  <div class="table-responsive">
		    <table class="table table-bordered table-hover table-striped">
		      <thead>
			<tr>
			  <th>Metric</th>
			  <th>Value</th>
			</tr>
		      </thead>
		      <tbody>
			<tr>
			  <td>Last Updated</td>
			  <td><?php echo $result["dateTime"]; ?></td>
			</tr>
			<tr>
			  <td>Level</td>
			  <td><?php echo $result["level"]; ?></td>
			</tr>
			<tr>
			  <td>Battery</td>
			  <td><?php echo $result["battery"]; ?></td>
			</tr>
			<tr>
			  <td>Pressure</td>
			  <td><?php echo $result["pressure"]; ?></td>
			</tr>
			<tr>
			  <td>Temp 1</td>
			  <td><?php echo $result["temp1"]; ?>˚</td>
			</tr>
			<tr>
			  <td>Temp 2</td>
			  <td><?php echo $result["temp2"]; ?>˚</td>
			</tr>
			<tr>
			  <td>ip</td>
			  <td><?php echo $result["ip"]; ?></td>
			</tr>
			<tr>
			  <td>port</td>
			  <td><?php echo $result["port"]; ?></td>
			</tr>
		     </tbody>
		  </table>
          </div>
         </div>

</div>
 <!-- /.col-lg-4 -->

            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>
    
    <!-- Scripts for c3.js here --> 
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.5/d3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/c3/0.4.11/c3.min.js"></script>  
  
    <script src="pie.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
