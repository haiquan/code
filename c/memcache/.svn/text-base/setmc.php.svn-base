<?php
$ip = '127.0.0.1';
$port = 12000; 
$key = $argv[1];
var_dump($key);
$start = memory_get_usage();
$value = $argv[2];
$end = memory_get_usage();
var_dump($end - $start);
$expire = $argv[3];

$memcache = new Memcache();
$memcache->connect($ip, $port) or die ("Could not connect");
$strlen = strlen($value);
echo "value length:{$strlen}\n";
//var_dump($longkey);

$result = $memcache->set($key, $value, false, $expire);
var_dump($result);

$memcache->close();
