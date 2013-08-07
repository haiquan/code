<?php
$ip = '127.0.0.1';
$port = 12000; 
$time = 60;

$memcache = new Memcache();
$memcache->connect($ip, $port) or die ("Could not connect");
$key = 'test_';
for($i=1; $i <=64; $i++){
    $tmp = $key . $i;
    $value = str_repeat('1', $time);
    $result = $memcache->set($tmp, $value, false);
    var_dump($result);
    $result = $memcache->get($tmp);
    //var_dump($result);
    $time *= 1.25;
}

$memcache->close();
