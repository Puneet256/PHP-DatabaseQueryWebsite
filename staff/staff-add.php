<?php
  include "../assets/mysetup.php";

  $title = "Add Staff";

  htmlStart($title);

  $conn_id = myConnect()
    or die("Failed to Connect");
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
    <h1>Add New Staff</h1>
  </div>

  <div class = "input">
  <form name= "BranchIdentify" method="GET" action="staff-add-done.php">
    Staff Number: <input type="text" name="sno"><p>
    Name: <input type="text" name="fname" placeholder="First Name">&nbsp;&nbsp;&nbsp;<input type="text" name="lname" placeholder="Last Name"><p>
    Address: <input type="text" name="address"><p>
    Phone Number: <input type="text" name="telno"><p>
    Position: <select name="position">
      <option value="" selected data-default>Select Your Position</option>
      <option value ="Manager">Manager</option>
      <option value ="Snr Asst">Senior Assistant</option>
      <option value ="Deputy">Deputy</option>
      <option value ="Assistant">Assistant</option>
    </select><p>
    Sex: <input type="radio" name="sex" value = "M">Male
          <input type="radio" name="sex" value = "F">Female
          <input type="radio" name="sex" value = "N/A">Other<p>
    Date of Birth: <input type="date" name="dob"><p>
    Salary: €&nbsp;<input type="text" name="sal"><p>
    NIN: <input type="text" name="nin"><p>
    Branch Number: <select name="bno">
      <?php
      foreach($branchlist as $bid) {
        print ("<option value=\"$bid\"> $bid </option\n>");
      }
      ?>
</select><p>
    <input type="submit" value="Add Value to DB">
  </form>
  </div>

<?php

  htmlEnd();

?>
