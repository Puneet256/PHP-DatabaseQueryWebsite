<?php
  include "../assets/mysetup.php";

  $title = "Staff Successfully Added!";

  htmlStart($title);

  $conn_id = myConnect()
    or die("Failed to Connect");

    $sno = $_GET['sno'];
    $fname = $_GET['fname'];
    $lname = $_GET['lname'];
    $address = $_GET['address'];
    $telno = $_GET['telno'];
    $position = $_GET['position'];
    $sex = $_GET['sex'];
    $dob = $_GET['dob'];
    $sal = $_GET['sal'];
    $nin = $_GET['nin'];
    $bno = $_GET['bno'];
    $query = "INSERT INTO staff VALUES ('$sno', '$fname', '$lname', '$address', '$telno', '$position', '$sex', '$dob', '$sal', '$nin', '$bno')";

    $res = mysqli_query($conn_id, $query)
      or die("Cannot execute");
?>
  <div class ="title">
    <h1>Entry Added!</h1>
  </div>
<? php
    htmlEnd();
?>
