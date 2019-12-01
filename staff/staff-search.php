<?php
  include "../assets/mysetup.php";

  $title = "Search Staff";

  htmlStart($title);

  $conn_id = myConnect()
    or exit();

  $query = "SELECT DISTINCT City FROM branch ORDER BY City";
  $staffquery = mysqli_query ($conn_id, $query)
    or die ("Cannot find branch identifiers");
    $i = 0;
    while ($row = mysqli_fetch_row ($staffquery)) {
      $citylist[$i] = $row[0];
      $i++;
    }
    mysqli_free_result ($staffquery);
?>

  <div class = "title">
    <h1>Look Up Staff</h1>
  </div>
  <div class ="input">
    <form name ="StaffSearch" method="GET" action="staff-search-results.php">
      Look for staff from: <select name="city">
        <?php
        foreach($citylist as $bid) {
          print ("<option value=\"$bid\"> $bid </option\n>");
        }
        ?>
      </select><p>
      <input type="submit" value="Search">
    </form>
  </div>

<?php

  htmlEnd();

?>
