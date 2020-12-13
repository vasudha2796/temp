<?php

include_once('config.php');

if (empty($_GET)) {
    echo "FALSE";
    }
else {
    $addr = htmlspecialchars($_GET["mac"]);
    $sql = <<<EOF
              SELECT * FROM List WHERE MACS LIKE "%$addr%" ORDER BY MACS;
EOF;
    $find = $database->query($sql);
    $arr = array(); 
    while($row = $find->fetchArray(SQLITE3_ASSOC) ){
         $arr[] = $row['Device']. " | " . $row['VLANS'] . " | " . $row['port'] . " | " . "$addr";
     
    }

$totnum = count($arr);
if ($totnum ==0){
    $count = $database->query('SELECT count(*) FROM switches');
    while($row1 = $count->fetchArray(SQLITE3_ASSOC)) {
        $noDevices = $row1['count(*)'];
        echo "Not Found in $noDevices devices"."\n";
     }
}

$res = array_unique($arr);
$len = count($res);
for($i = 0; $i < $len; $i++){
    echo $res[$i]. "\n";
    }
}
$database->close();

?>
