<?php
  include "../assets/mysetup.php";

  $title = "Delete Property";

  htmlStart($title);

  $conn_id = myConnect()
    or exit();

    $query = "SELECT Pno FROM property_for_rent ORDER BY Pno";
    $propquery = mysqli_query ($conn_id, $query)
      or die ("Cannot find branch identifiers");

      $i = 0;
      while ($row = mysqli_fetch_row ($propquery)) {
        $proplist[$i] = $row[0];
        $i++;
      }
      mysqli_free_result ($propquery);
    ?>

    <div class = "title">
      <h1>Which property do you want to delete?<h1>
    </div>

    <div class ="input">
      <form name = "form" method="GET" action="property-delete-done.php">
      Select property number to delete: <select name="pno">
        <?php
        foreach($proplist as $bid) {
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
