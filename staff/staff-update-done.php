<?php
  include "../assets/mysetup.php";

  $title = "Successfully Updated!";

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
    $query = "UPDATE staff SET Sno = '$sno', Fname = '$fname', LName = '$lname', Address = '$address', Tel_No = '$telno', Position = '$position', Sex = '$sex', DOB = '$dob', Salary = '$sal', NIN = '$nin', Bno = '$bno' WHERE Sno = '$sno'";

    $res = mysqli_query($conn_id, $query)
      or die("Cannot execute");
?>
  <div class ="title">
    <h1><?php echo $fname," ", $lname, "'s Details Updated"?>!</h1>
  </div>
<? php
    htmlEnd();
?>
