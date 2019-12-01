<?php
  include "../assets/mysetup.php";

  $title = "Staff Successfully Deleted!";

  htmlStart($title);

  $conn_id = myConnect()
    or die("Failed to Connect");

    $sno = $_GET['sno'];
    $query = "DELETE FROM staff WHERE Sno = '$sno'";

    $res = mysqli_query($conn_id, $query)
      or die("Cannot execute");
?>
  <div class ="title">
    <h1>Staff Deleted!</h1>
  </div>
<? php
    htmlEnd();
?>
