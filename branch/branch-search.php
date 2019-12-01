<?php
  include "../assets/mysetup.php";

  $title = "Search Branch";

  htmlStart($title);

  $conn_id = myConnect()
    or exit();

  $query = "SELECT DISTINCT City FROM branch ORDER BY City";
  $branchquery = mysqli_query ($conn_id, $query)
    or die ("Cannot find branch identifiers");
    $i = 0;
    while ($row = mysqli_fetch_row ($branchquery)) {
      $citylist[$i] = $row[0];
      $i++;
    }
    mysqli_free_result ($branchquery);
?>

  <div class = "title">
    <h1>Look Up Branches</h1>
  </div>
  <div class ="input">
    <form name ="BranchSearch" method="GET" action="branch-search-results.php">
      Look for branches in: <select name="city">
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
