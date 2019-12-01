<?php
  include "assets/mysetup.php";

  $title = "Puneet's Dreamhome Project";

  htmlStart($title);

?>
          <div class = "title">
            <h1>DREAMHOME DATABASE</h1>
            <h3>Puneet Verma - 119220500</h3>
          </div>
          <div class = "menu">
            <ul>
            <li>
              Branch
              <ul>
                <li><a href = "branch/branch-search.php">Search</a></li>
                <li><a href = "branch/branch-add.php">Add</a></li>
                <li><a href = "branch/branch-delete.php">Delete</a></li>
                <li><a href = "branch/branch-update.php">Update</a></li>
              </ul>
            </li><li>
              Staff
              <ul>
                <li><a href = "staff/staff-search.php">Search</a></li>
                <li><a href = "staff/staff-add.php">Add</a></li>
                <li><a href = "staff/staff-delete.php">Delete</a></li>
                <li><a href = "staff/staff-update.php">Update</a></li>
              </ul>
            </li><li>
              Property
              <ul>
                <li><a href = "property/property-search.php">Search</a></li>
                <li><a href = "property/property-add.php">Add</a></li>
                <li><a href = "property/property-delete.php">Delete</a></li>
                <li><a href = "property/property-update.php">Update</a></li>
              </ul>
            </li>
          </ul>
        </div>

<? php
  htmlEnd();
?>
