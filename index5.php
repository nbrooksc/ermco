<!DOCTYPE html>
<html lang="en">

<?php // check to see if the login has occurred
      // if not go back to the login screen

require_once 'DB_Functions.php';
$db = new DB_Functions();
/*$result = $db->getRecentFirst();


session_start();
if ((!isset($_SESSION['myusername'] )) || $_SESSION['myusername'] == '' ) {
  header("location:login.html");
} else {
;//  $un = $_SESSION['myusername'];
//  echo "Username is $un";
//  $_SESSION['myusername'] = "";
*/
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

    <!-- c3js CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/c3/0.4.14/c3.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Script for including outside HTML -->
    <script src="https://www.w3schools.com/lib/w3.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div id="wrapper">

        <!-- Navigation -->
       <div w3-include-html="header.html"></div>         

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
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tachometer fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge" id="pressureAlert">All Kegs</div>
                                    <div>Out of Pressure Range!</div>
                                </div>
                            </div>
                        </div>
                        <a href="tables2.php?alert=Pressure">
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
                                    <div class="huge" id="temperatureAlert">1 Keg</div>
                                    <div>Out of Temp Range!</div>
                                </div>
                            </div>
                        </div>
                        <a>
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
                                    <div class="huge" id="volumeAlert">14 Kegs</div>
                                    <div>Running Low!</div>
                                </div>
                            </div> 
                        </div>
                        <a>
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
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
                        <a>
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
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body"> <!--
                            <div id="morris-area-chart"></div> --> 
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Inventory Depletion 
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
<div class="panel panel-default" id="live-panel">
<Down>            <div class="panel-heading">Keg Last Drop Nomad Live Information</div>
            <div class="panel-body">
		  <div class="table-responsive">
          </div>
	  <!-- end table div -->
         </div> 
         <!-- ^ end panel body div -->

	</div>
	<!-- ^ End panel div -->
 <!-- /.col-lg-4 -->
<!--
 <div class="col-lg-4">
    -->                 <div class="panel panel-default">
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
		    
		  </div>
		  <!-- ^ end row -->

		      <div class="col-lg-12">
		       <div class="panel panel-default">
			 <div class="panel-heading">
			   Twitter Feed
			 </div>
			 <div class="panel-body">
			  <a class="twitter-timeline" href="https://twitter.com/hashtag/sunking" data-widget-id="881598051969888257">#sunking Tweets</a> 
			 </div>
			 <!-- ^ End panel body -->
		       </div>
		       <!-- ^ End panel -->
		     </div>
	             <!-- ^ end col-lg-6 -->

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
