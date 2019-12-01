<?php
  include "../assets/mysetup.php";


  $title = "Staff";

  htmlStart($title);

  $city = $_GET['city'];
  $conn_id = myConnect()
    or die("Failed to Connect");


    $query = "SELECT staff.Bno, CONCAT_WS(' ', FName, LName) AS Name, Address, staff.Tel_No, Position, Sex, DOB, Salary, NIN FROM staff JOIN branch ON staff.Bno = branch.Bno WHERE City = '$city'";

    $res = mysqli_query($conn_id, $query)
      or die("Cannot execute");

    print("
      <div class =\"title\">
        <h1>Our $city Staff</h1>
      </div>
      <div class = \"input\">");

      print ("<table>\n");
      print ("<tr><th>Branch ID</th><th>Name</th><th>Address</th><th>Phone Number</th><th>Designation</th><th>Sex</th><th>DOB</th><th>Salary</th><th>NIN</th></tr>");
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
