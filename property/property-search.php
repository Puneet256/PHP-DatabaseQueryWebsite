<?php
  include "../assets/mysetup.php";

  $title = "Search Property";

  htmlStart($title);

  $conn_id = myConnect()
    or exit();

  $query = "SELECT DISTINCT City FROM branch ORDER BY City";
  $propquery = mysqli_query ($conn_id, $query)
    or die ("Cannot find branch identifiers");
    $i = 0;
    while ($row = mysqli_fetch_row ($propquery)) {
      $citylist[$i] = $row[0];
      $i++;
    }
    mysqli_free_result ($propquery);

?>

    <div class = "title">
      <h1>Look up properties<h1>
    </div>

    <div class ="input">
      <form name = "form" method="GET" action="property-search-results.php">
      City: <select name="city" required>
        <option value="" selected data-default>Select City</option>
        <?php
        foreach($citylist as $bid) {
          print ("<option value=\"$bid\"> $bid </option\n>");
        }
        ?>
      </select><p>
        Type: <select name="type">
          <option value="" selected data-default>Leave unselected if all types wanted</option>
          <option value ="House">House</option>
          <option value ="Flat">Flat</option>
          <option value ="Studio">Studio</option>
          <option value ="Condo">Condo</option>
        </select><p>
        # of Rooms: <input type="number" name = "minrooms" placeholder="Min" min="0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" name = "maxrooms" placeholder="Max" min="1"><i style="color: #555; font-size: 12px">   (optional)</i><p>
        Rent: €&nbsp;<input type="number" name = "minrent" placeholder="Min" min="0" step="25">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;€&nbsp;<input type="number" name = "maxrent" placeholder="Max" min="100" step ="25"><i style="color: #555; font-size: 12px">   (optional)</i><p>
      <input type="submit" value="Search">
      </form>
    </div>

<?php
htmlEnd();
?>
