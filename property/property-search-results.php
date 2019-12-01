<?php
  include "../assets/mysetup.php";

  $title = "Search Results";

  htmlStart($title);

  $city = $_GET['city'];
  $type = $_GET['type'] ?: "flat', 'house', 'condo', 'Studio";
  $minrooms = $_GET['minrooms'] ?: '1';
  $maxrooms = $_GET['maxrooms'] ?: '50';
  $minrent = $_GET['minrent'] ?: '100';
  $maxrent = $_GET['maxrent'] ?: '10000';

  $conn_id = myConnect()
    or exit();

  $query = "SELECT CONCAT_WS(', ', Street, Area, City, Pcode) AS Address, Type, Rooms, Rent FROM property_for_rent WHERE City = '$city' AND Type IN ('$type') AND Rooms BETWEEN $minrooms AND $maxrooms AND Rent BETWEEN $minrent AND $maxrent ORDER BY Type DESC";

  $res = mysqli_query($conn_id, $query)
    or die("Cannot execute");

  print("
    <div class =\"title\">
      <h1>Search Results</h1>
    </div>
    <div class = \"input\">");

    print ("<table>\n");
    print ("<tr><th>Address</th><th>Property Type</th><th># of Rooms</th><th>Rent</th></tr>");
    while ($row = mysqli_fetch_row ($res)) {
      print ("<tr>\n");
      for ($i = 0; $i < mysqli_num_fields ($res); $i++) {
        printf ("<td>%s</td>\n", htmlspecialchars ($row[$i]));
      }
    }
    print ("</tr>\n");
    print ("</table><br><br><br>\n");
    print ("</div>\n");
    mysqli_free_result ($res);

  htmlEnd();

?>
