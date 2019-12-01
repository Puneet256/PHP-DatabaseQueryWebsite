<?php
  include "../assets/mysetup.php";

  $title = "Update Branch";

  htmlStart($title);

  $conn_id = myConnect()
    or die("Failed to Connect");

  $bno = $_GET['bno'];
  $res = mysqli_query($conn_id, "SELECT * FROM branch Where Bno = '$bno'")
    or die("Cannot Execute");

  while ($row = mysqli_fetch_assoc($res))
  {
    $street = $row["Street"];
    $area =  $row["Area"];
    $city =  $row["City"];
    $pcode =  $row["Pcode"];
    $telno =  $row["Tel_No"];
    $faxno =  $row["Fax_No"];
  }
?>

<div class = "title">
  <h1>Update</h1>
</div>
<div class = "input">
    <form name= "BranchAdd" method="GET" action="branch-update-done.php">
    Branch Number: <input type="text" name="bno" value="<?php echo $bno ?>" readonly><p>
    Street: <input type="text" name="street" value="<?php echo $street ?>"><p>
    Area: <input type="text" name="area" value="<?php echo $area ?>"><p>
    City: <input type="text" name="city" value="<?php echo $city ?>"><p>
    Pin Code: <input type="text" name="pcode" value="<?php echo $pcode ?>"><p>
    Phone Number: <input type="text" name="telno" value="<?php echo $telno ?>"><p>
    Fax Number: <input type="text" name="faxno" value="<?php echo $faxno ?>"><p>
    <input type="submit" value="Update">
</form>
</div>
<?php

  htmlEnd();

?>
