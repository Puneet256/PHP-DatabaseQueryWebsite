<?php

  include "../assets/mysetup.php";


  $title = "Branches";

  htmlStart($title);

  $city = $_GET['city'];
  $conn_id = myConnect()
    or die("Failed to Connect");


    $query = "SELECT CONCAT_WS(', ',Street, Area, City, Pcode) AS Address, Tel_No, Fax_No FROM branch WHERE City = '$city'";

    $res = mysqli_query($conn_id, $query)
      or die("Cannot execute");

    print("
      <div class =\"title\">
        <h1>Our $city Branches</h1>
      </div>
      <div class = \"input\">");

      print ("<table>\n");
      print ("<tr><th>Address</th><th>Phone Number</th><th>Fax Number</th></tr>");
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
