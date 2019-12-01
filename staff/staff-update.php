<?php
  include "../assets/mysetup.php";

  $title = "Update Staff";

  htmlStart($title);

  $conn_id = myConnect()
    or exit();

    $query = "select Sno from staff order by Sno";
    $staffquery = mysqli_query ($conn_id, $query)
      or die ("Cannot find staff identifiers");
      $i = 0;
      while ($row = mysqli_fetch_row ($staffquery)) {
        $stafflist[$i] = $row[0];
        $i++;
      }
      mysqli_free_result ($staffquery);
    ?>

    <div class = "title">
      <h1>Which staff do you want to update?<h1>
    </div>

    <div class ="input">
      <form name = "form" method="GET" action="staff-update-details.php">
      Select staff number to update: <select name="sno">
        <?php
        foreach($stafflist as $bid) {
          print ("<option value=\"$bid\"> $bid </option\n>");
        }
        ?>
      </select><p>
      <input type="submit" value="Update">
      </form>
    </div>

<?php
htmlEnd();
?>
