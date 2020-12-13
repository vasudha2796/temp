<?php
  include('config.php');
 
   $sqlquery =<<<EOF
      SELECT * from List;
EOF;
   $response = $database->query($sqlquery);
   while($row = $response->fetchArray(SQLITE3_ASSOC) ) {
      echo   $row['Device']." | ".$row['VLANS']." | ".$row['port']." | ".$row['MACS']."\n";
   }   
   $database->close();
?>

