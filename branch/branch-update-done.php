<?php
  include "../assets/mysetup.php";

  $title = "Successfully Updated!";

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
    $query = "UPDATE branch SET Bno = '$bno', Street = '$street', Area = '$area', City = '$city', Pcode = '$pcode', Tel_No = '$telno', Fax_No = '$faxno' WHERE Bno = '$bno'";

    $res = mysqli_query($conn_id, $query)
      or die("Cannot execute");
?>
  <div class ="title">
  <h1>Branch Updated</h1></div>
<? php
    htmlEnd();
?>
