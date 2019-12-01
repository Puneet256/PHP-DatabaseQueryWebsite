<?php
  include "../assets/mysetup.php";

  $title = "Add Property";

  htmlStart($title);

  $conn_id = myConnect()
    or die("Failed to Connect");

  $query1 = "select Bno from branch order by Bno";
  $branchquery = mysqli_query ($conn_id, $query1)
    or die ("Cannot find branch identifiers");
    $i = 0;
    while ($row = mysqli_fetch_row ($branchquery)) {
      $branchlist[$i] = $row[0];
      $i++;
    }
    mysqli_free_result ($branchquery);

  $query2 = "select Sno from staff order by Sno";
  $staffquery = mysqli_query ($conn_id, $query2)
    or die ("Cannot find branch identifiers");
    $i = 0;
    while ($row = mysqli_fetch_row ($staffquery)) {
      $stafflist[$i] = $row[0];
      $i++;
    }
    mysqli_free_result ($staffquery);

  $query3 = "select Ono from owner order by Ono";
  $ownerquery = mysqli_query ($conn_id, $query3)
    or die ("Cannot find branch identifiers");
    $i = 0;
    while ($row = mysqli_fetch_row ($ownerquery)) {
      $ownerlist[$i] = $row[0];
      $i++;
    }
    mysqli_free_result ($ownerquery);




?>
<div class = "title">
  <h1>Add New Property</h1>
</div>
<div class ="input">
  <form name= "Property Add" method="GET" action="property-add-done.php">
    Property Number: <input type="text" name="pno"><p>
    Street: <input type="text" name="street"><p>
    Area: <input type="text" name="area"><p>
    City: <input type="text" name="city"><p>
    Pin Code: <input type="text" name="pcode"><p>
    Type: <select name="type">
      <option value="" selected data-default>Select type of property</option>
      <option value ="House">House</option>
      <option value ="Flat">Flat</option>
      <option value ="Studio">Studio</option>
      <option value ="Condo">Condo</option>
    </select><p>
    Rooms: <input type="number" name="rooms" min="1"><p>
    Rent: €&nbsp;<input type="number" name="rent" min ="100" step="25"><p>
    Owner: <select name="ono">
      <?php
      foreach($ownerlist as $bid) {
        print ("<option value=\"$bid\"> $bid </option\n>");
      }
      ?>
      </select>
    Staff: <select name="sno">
      <?php
      foreach($stafflist as $bid) {
        print ("<option value=\"$bid\"> $bid </option\n>");
      }
      ?>
      </select>
    Branch Number: <select name="bno">
      <?php
      foreach($branchlist as $bid) {
        print ("<option value=\"$bid\"> $bid </option\n>");
      }
      ?>
    </select><p>
    <input type="submit" value="Add Value to DB">
  </form>
</div>
<?php

  htmlEnd();

?>
