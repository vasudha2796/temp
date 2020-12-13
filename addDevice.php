<?php

include_once('config.php');

$ip = $_GET['ip'];
$port = $_GET['port'];
$community = $_GET['community'];
$version = $_GET['version'];

if(empty($ip) || empty($port)||empty($community) || empty($version)) {
    echo "FALSE";
}

else {
    $output = $db->query('SELECT * FROM switches');
    $count = 0;
    foreach ($output as $output) {
        if($output['ip']==$ip && $output['port']==$port && $output['community']==$community && $output['version']==$version){
            $count = $count+1;
        }
    }

    if ($count ==0){
        $db->exec("INSERT INTO switches (ip,port,community,version) VALUES ('$ip','$port','$community','$version')");
        echo "OK";
    }
    else {
        echo "FALSE";
    }
}

$db->close();

?>
