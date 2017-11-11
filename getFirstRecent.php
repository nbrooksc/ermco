<?php

require_once 'DB_Functions.php';
$db = new DB_Functions();
$result = $db->getRecentFirst();
$alertsResult = $db->getAlerts();
$toPrint = <<<EOT
<div class='panel-heading'>Keg Last Drop Nomad Live Information</div>

            <div class='panel-body'>
              <div class='row'>
                <div class='col-lg-12'>
                  <div class='table-responsive'>
                    <table class='table table-bordered table-hover table-striped'>
                      <thead>
                        <tr>
                          <th>Metric</th>
                          <th>Value</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Last Updated</td>

                          <td> {$result['dateTime']} </td>
                        </tr>
                        <tr>
                          <td>Level</td>

                          <td> {$result['level']}</td>
                        </tr>
                        <tr>
                          <td>Battery</td>
                          <td>{$result['battery']}</td>
                        </tr>
                        <tr>
                          <td>Pressure</td>
                          <td>{$result['pressure']}</td>
                        </tr>
                        <tr>
                          <td>Temp 1</td>
                          <td>{$result['temp1']}˚</td>
                        </tr>
                        <tr>
                          <td>Temp 2</td>
                          <td>{$result['temp2']}˚</td>
                        </tr>
                        <tr>
                          <td>ip</td>
                          <td>{$result['ip']}</td>
                        </tr>
                        <tr>
                          <td>port</td>
                          <td>{$result['port']}</td>
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
EOT;


//  $toPrint =  htmlspecialchars($toPrint);
// $toPrint = json_encode($toPrint);

// start session, see if the alert
// has been run for this session
// if it has not, run it
session_start();

$hasRun = $_SESSION["hasRun"] == TRUE ? TRUE : FALSE;
//echo $hasRun;

$alertsResult = json_encode($alertsResult);

$toPrint = json_encode(array("panel" => $toPrint, "hasRun" => $hasRun, "alerts" => $alertsResult));


// 
$_SESSION["hasRun"] = TRUE;

echo $toPrint;

?>
