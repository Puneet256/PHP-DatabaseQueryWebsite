<?php
  include "../assets/mysetup.php";

  $title = "Property Successfully Deleted!";

  htmlStart($title);

  $conn_id = myConnect()
    or die("Failed to Connect");

    $pno = $_GET['pno'];
    $query = "DELETE FROM property_for_rent WHERE Pno = '$pno'";

    $res = mysqli_query($conn_id, $query)
      or die("Cannot execute");
?>
  <div class ="title">
    <h1>Property Deleted!</h1>
  </div>
<? php
    htmlEnd();
?>
