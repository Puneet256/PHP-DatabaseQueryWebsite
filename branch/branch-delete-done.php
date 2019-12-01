<?php
  include "../assets/mysetup.php";

  $title = "Branch Successfully Deleted!";

  htmlStart($title);

  $conn_id = myConnect()
    or die("Failed to Connect");

    $bno = $_GET['bno'];
    $query = "DELETE FROM branch WHERE Bno = '$bno'";

    $res = mysqli_query($conn_id, $query)
      or die("Cannot execute");
?>
  <div class ="title">
    <h1>Branch Deleted!</h1>
  </div>
<? php
    htmlEnd();
?>
