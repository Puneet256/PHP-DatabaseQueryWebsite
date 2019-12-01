<?php
  include "../assets/mysetup.php";

  $title = "Delete Branch";

  htmlStart($title);

  $conn_id = myConnect()
    or exit();

  $query = "select Bno from branch order by Bno";
  $branchquery = mysqli_query ($conn_id, $query)
    or die ("Cannot find branch identifiers");
    $i = 0;
    while ($row = mysqli_fetch_row ($branchquery)) {
      $branchlist[$i] = $row[0];
      $i++;
    }
    mysqli_free_result ($branchquery);
?>

  <div class = "title">
    <h1>Which branch do you want to delete?<h1>
  </div>

  <div class ="input">
    <form name = "form" method="GET" action="branch-delete-done.php">
    Select branch number to delete: <select name="bno">
      <?php
      foreach($branchlist as $bid) {
        print ("<option value=\"$bid\"> $bid </option\n>");
      }
      ?>
    </select><p>
    <input type="submit" value="Delete">
    </form>
  </div>

<?php
  htmlEnd();
?>
