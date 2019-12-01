<?php
  include "../assets/mysetup.php";

  $title = "Update Property";

  htmlStart($title);

  $conn_id = myConnect()
    or die("Failed to Connect");

  $pno = $_GET['pno'];
  $res = mysqli_query($conn_id, "SELECT * FROM property_for_rent Where Pno = '$pno'")
    or die("Cannot Execute");

  while ($row = mysqli_fetch_assoc($res))
  {
    $street = $row['Street'];
    $area = $row['Area'];
    $city = $row['City'];
    $pcode = $row['Pcode'];
    $type = $row['Type'];
    $rooms = $row['Rooms'];
    $rent = $row['Rent'];
    $ono = $row['Ono'];
    $sno = $row['Sno'];
    $bno = $row['Bno'];
  }

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
  <h1>Update</h1>
</div>
<div class = "input">
    <form name= "propertyAdd" method="GET" action="property-update-done.php">
      Property Number: <input type="text" name="pno" value="<?php echo $pno ?>" readonly><p>
      Street: <input type="text" name="street" value="<?php echo $street ?>"><p>
      Area: <input type="text" name="area" value="<?php echo $area ?>"><p>
      City: <input type="text" name="city" value="<?php echo $city ?>"><p>
      Pin Code: <input type="text" name="pcode" value="<?php echo $pcode ?>"><p>
      Type: <select name="type">
        <option value="" selected data-default>Select type of property</option>
        <option value ="House">House</option>
        <option value ="Flat">Flat</option>
        <option value ="Studio">Studio</option>
        <option value ="Condo">Condo</option>
      </select><p>
      Rooms: <input type="number" name="rooms" min="1" value="<?php echo $rooms ?>"><p>
      Rent: €&nbsp;<input type="number" name="rent" min ="100" step="25" value="<?php echo $rent ?>"><p>
      Owner: <select name="ono">
        <?php
        foreach($ownerlist as $bid) {
          if ($bid == $ono) {
            print ("<option value=\"$bid\" selected> $bid </option\n>");
          }
          else {
              print ("<option value=\"$bid\"> $bid </option\n>");
          }
        }
        ?>
        </select>
      Staff: <select name="sno">
        <?php
        foreach($stafflist as $bid) {
          if ($bid == $sno) {
            print ("<option value=\"$bid\" selected> $bid </option\n>");
          }
          else {
              print ("<option value=\"$bid\"> $bid </option\n>");
          }
        }
        ?>
        </select>
      Branch Number: <select name="bno">
        <?php
        foreach($branchlist as $bid) {
          if ($bid == $bno) {
            print ("<option value=\"$bid\" selected> $bid </option\n>");
          }
          else {
              print ("<option value=\"$bid\"> $bid </option\n>");
          }
        }
        ?>
      </select><p>
      <p>
      <input type="submit" value="Update">
</form>
</div>

<?php
  htmlEnd();
?>
