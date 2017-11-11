<?php # tables2.php
      # Altering stock table
      # To reflect custom information from SQL

// need a database connection
require('../../inc/db.php');

require_once 'DB_Functions.php';

$db = new DB_Functions();
$result = $db->getKegs();
$nomad = $db->getRecentFirst();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Talking Keg, a Subsidiary of Last Drop Enterprises</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

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
<!--
<body onload="tableSearch()">
-->

<body>
    <div id="wrapper">

        <!-- Navigation -->
	<div w3-include-html="header.html"></div>	

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">All Kegs</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Talking Keg Analytics
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table  width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID#</th>
                                        <th>Remaining</th>
                                        <th>Date</th>
                                        <th>Type</th>
                                        <th>Location</th>
					<th>Alert</th>
					<th>Pressure</th>
					<th>Temperature</th>
                                    </tr>
                                </thead>
                                <tbody>

<?php 
  // first row will be Nomad - the live sensor
  // First, get the information from the database

  echo "<tr>";
  echo "<td>_Nomad</td>";
  echo "<td>" . $nomad['level'] . "</td>";
  echo "<td>" . $nomad['dateTime'] . "</td>";
  echo "<td>Talking Keg Brew</td>";
  echo "<td>" . $nomad['ip'] . "</td>";
  echo "<td>None</td>";
  echo "<td>" . $nomad['pressure'] . "</td>";
  $avgTemp = ($nomad['temp1'] + $nomad['temp2']) / 2;
  echo "<td>$avgTemp</td>";
  echo "</tr>";

// Now Loop through, print the other kegs

foreach ($result as $row)
{
  echo "<tr>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['remaining'] . "</td>";
  echo "<td>" . $row['date'] . "</td>";
  echo "<td>" . $row['type'] . "</td>";
  echo "<td>" . $row['location'] . "</td>";
  echo "<td>" . $row['alert'] . "</td>";
  echo "<td>" . $row['pressure'] . "</td>";
  echo "<td>" . $row['temperature'] . "</td>";
  echo "</tr>";
}

echo "</tbody>";
echo "</table>"; ?>

                            <!-- /.table-responsive -->
                            
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Javascript Functions -->
    <script src="pie.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>

w3.includeHTML();

    $(document).ready(function() {
        var table = $('#dataTables-example').DataTable({
            responsive: true
        });
        
        var alertType = getUrlVars()["alert"];
       //  alert(alertType);
     
        if (alertType != null) {
	  table.search(alertType).draw();
	} 
    });

   // function to read get variables
   // from URL

  function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
    vars[key] = value;
    });
    return vars;
  }
   
    </script>

</body>

</html>
