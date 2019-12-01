<?php
  include "../assets/mysetup.php";

  $title = "Successfully Updated!";

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
    $query = "UPDATE property_for_rent SET Pno = '$pno', Street = '$street', Area = '$area', City = '$city', Pcode = '$pcode', Type = '$type', Rooms = '$rooms', Rent = '$rent', Ono = '$ono', Sno = '$sno', Bno = '$bno' WHERE Pno = '$pno'";

    $res = mysqli_query($conn_id, $query)
      or die("Cannot execute");
?>
  <div class ="title">
    <h1>Propery Updated!</h1>
  </div>
<? php
    htmlEnd();
?>
