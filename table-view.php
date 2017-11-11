<?php # table-view.php
      # pull table out of sql
      # display it for the good people

// need a database connection
require('../../inc/db.php');

$sql = "SELECT * FROM master";

$result = mysql_query($sql) or die(mysql_error());

print("Okay");

echo "<table border='1'>
<tr>
<th>Name</th>
<th>Remaining</th>
<th>Date</th>
<th>Type</th>
<th>Location</th>
<th>Alert</th>
<th>Pressure</th>
<th>Temperature</th>
</tr>";

while($row = mysql_fetch_array($result))
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

echo "</table>";

mysql_close($con);


?>
