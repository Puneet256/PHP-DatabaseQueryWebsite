<?php
  include "../assets/mysetup.php";

  $title = "Branch Successfully Added!";

  htmlStart($title);

  $conn_id = myConnect()
    or die("Failed to Connect");

    $bno = $_GET['bno'];
    $street = $_GET['street'];
    $area = $_GET['area'];
    $city = $_GET['city'];
    $pcode = $_GET['pcode'];
    $telno = $_GET['telno'];
    $faxno = $_GET['faxno'];
    $query = "INSERT INTO branch VALUES ('$bno', '$street', '$area', '$city', '$pcode', '$telno', '$faxno')";

    $res = mysqli_query($conn_id, $query)
      or die("Cannot execute");
?>
  <div class ="title">
  <h1> Entry Added!</h1></div>
<? php
    htmlEnd();
?>
