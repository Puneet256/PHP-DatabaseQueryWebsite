<?php
  include "../assets/mysetup.php";

  $title = "Add Branch";

  htmlStart($title);

  $conn_id = myConnect()
    or die("Failed to Connect");

?>
<div class = "title">
  <h1>Add New Branch</h1>
</div>
<div class = "input">
    <form name= "BranchAdd" method="GET" action="branch-add-done.php">
    Branch Number: <input type="text" name="bno"><p>
    Street: <input type="text" name="street"><p>
    Area: <input type="text" name="area"><p>
    City: <input type="text" name="city"><p>
    Pin Code: <input type="text" name="pcode"><p>
    Phone Number: <input type="text" name="telno"><p>
    Fax Number: <input type="text" name="faxno"><p>
    <input type="submit" value="Add Value to DB">
</form>
</div>
<?php

  htmlEnd();

?>
