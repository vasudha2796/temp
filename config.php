<?php
   class DatabaseConfig extends SQLite3 {
      function __construct() {
         $this->open('tracamac.db');
       }
}

$database = new DatabaseConfig();

$query1 =<<<EOF

   CREATE TABLE IF NOT EXISTS List(Device varchar not null,VLANS varchar not null,port varchar,MACS  varchar);
EOF;

$response1 = $database->exec($query1);

if(!$response1){
  echo $database->lastErrorMsg();
}

$query2 =<<<EOF

     CREATE TABLE IF NOT EXISTS switches (ip varchar not null,port varchar not null,community string not null,version varchar not null,first_probetime varchar null,latest_probetime varchar null,failed_attempts int default 0 not null);

EOF;

   $response2 = $database->exec($query2);

   if(!$response2){
      echo $database->lastErrorMsg();
   }

?>
