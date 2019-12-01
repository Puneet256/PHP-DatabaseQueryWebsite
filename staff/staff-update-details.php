<?php
  include "../assets/mysetup.php";

  $title = "Update Staff";

  htmlStart($title);

  $conn_id = myConnect()
    or die("Failed to Connect");

  $sno = $_GET['sno'];
  $res = mysqli_query($conn_id, "SELECT * FROM staff Where Sno = '$sno'")
    or die("Cannot Execute");

  while ($row = mysqli_fetch_assoc($res))
  {
    $fname = $row["FName"];
    $lname = $row["LName"];
    $add = $row["Address"];
    $telno = $row["Tel_No"];
    $pos = $row["Position"];
    $sex = $row["Sex"];
    $dob = $row["DOB"];
    $sal = $row["Salary"];
    $nin = $row["NIN"];
    $bno = $row["Bno"];
  }

  $query = "select Bno from branch order by Bno";
  $branchquery = mysqli_query ($conn_id, $query)
    or die ("Cannot find branch identifiers");
    $i = 0;
    while ($row = mysqli_fetch_row ($branchquery)) {
      $branchlist[$i] = $row[0];
      $i++;
    }
    mysqli_free_result ($branchquery);

?>

<div class = "title">
  <h1>Update Staff</h1>
</div>
<div class = "input">
    <form name= "staffAdd" method="GET" action="staff-update-done.php">
    Staff Number: <input type="text" name="sno" value="<?php echo $sno ?>" readonly><p>
      Name: <input type="text" name="fname" placeholder="First Name" value="<?php echo $fname ?>">&nbsp;&nbsp;&nbsp;<input type="text" name="lname" placeholder="Last Name" value="<?php echo $lname ?>"><p>
      Address: <input type="text" name="address" value="<?php echo $add ?>"><p>
      Phone Number: <input type="text" name="telno" value="<?php echo $telno ?>"><p>
      Position: <select name="position">
        <option value="" selected data-default>Select Your Position</option>
        <option value ="Manager">Manager</option>
        <option value ="Snr Asst">Senior Assistant</option>
        <option value ="Deputy">Deputy</option>
        <option value ="Assistant">Assistant</option>
      </select><p>
      Sex: <input type="radio" name="sex" value = "M" checked>Male
            <input type="radio" name="sex" value = "F">Female
            <input type="radio" name="sex" value = "N/A">Other<p>
      Date of Birth: <input type="date" name="dob" value="<?php echo $dob ?>"><p>
      Salary: €&nbsp;<input type="text" name="sal" value="<?php echo $sal ?>"><p>
      NIN: <input type="text" name="nin" value="<?php echo $nin ?>"><p>
      Branch Number: <select name="bno">
        <?php
        foreach($branchlist as $bid) {
          if ($bid == $bno) {
            print ("<option value=\"$bid\" selected> $bid </option\n>");
          }
          else {
              print ("<option value=\"$bid\"> $bid </option\n>");
          }
        }
        ?>
      </select><p>
      <input type="submit" value="Update">
</form>
</div>

<?php
  htmlEnd();
?>
