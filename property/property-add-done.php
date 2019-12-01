<?php
  include "../assets/mysetup.php";

  $title = "Property Successfully Added!";

  htmlStart($title);

  $conn_id = myConnect()
    or die("Failed to Connect");

    $pno = $_GET['pno'];
    $street = $_GET['street'];
    $area = $_GET['area'];
    $city = $_GET['city'];
    $pcode = $_GET['pcode'];
    $type = $_GET['type'];
    $rooms = $_GET['rooms'];
    $rent = $_GET['rent'];
    $ono = $_GET['ono'];
    $sno = $_GET['sno'];
    $bno = $_GET['bno'];
    $query = "INSERT INTO property_for_rent VALUES ('$pno', '$street', '$area', '$city', '$pcode', '$type', '$rooms', '$rent', '$ono', '$sno', '$bno')";

    $res = mysqli_query($conn_id, $query)
      or die("Cannot execute\n $pno, $street, $area, $city, $pcode, $type, $rooms, $rent, $ono, $sno, $bno");
?>
  <div class ="title">
    <h1>Entry Added!</h1>
  </div>
<? php
    htmlEnd();
?>
