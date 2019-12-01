<?php

function myConnect() {
  $server = "cs1.ucc.ie";
  $username = "prv1";
  $password = "ohdah";
  $database = "DREAMHOME_prv1";

  $connect = mysqli_connect($server,$username,$password,$database);

  if($connect)
    return($connect);

  return(FALSE);
}

function htmlStart ($title) {
  print ("<html>\n");
  print ("<head>\n<link rel=\"stylesheet\" href=\"assets/styles.css\" />\n");
  print ("<head>\n<link rel=\"stylesheet\" href=\"../assets/styles.css\" />\n");
  print ("<head>\n<link rel=\"stylesheet\" href=\"../../assets/styles.css\" />\n");

  if ($title != "")
    print ("<title>$title</title>\n");
  print ("<head>\n");
  print ("<body bgcolor=\"#282C34\">\n");
}


function htmlEnd() {
  print("</body></html>\n");
}


?>
