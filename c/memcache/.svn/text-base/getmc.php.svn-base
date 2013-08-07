<?php
$ip = '127.0.0.1';
$port = 11211; 
$key = $argv[1];

$memcache = new Memcache();
$memcache->connect($ip, $port) or die ("Could not connect");
echo "key length:{$key}\n";

$result = $memcache->get($key);
var_dump($result);

$memcache->close();
