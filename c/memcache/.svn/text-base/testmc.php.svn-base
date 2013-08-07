<?php
$ip = '127.0.0.1';
$port = 12000; 
$alias_mcq = 'weikan';
$value = 'test';
//if(isset($args[0])){
if(0){
    $flag = $argv[0];
}else{
    $flag = 1;
    $key = $argv[1];
//    $value = $argv[2];
    $length = $argv[2];
    $expire = $argv[3];
}
/* 函数方式调用memcache
$memcache_obj = memcache_connect($ip, $port,300);
var_dump($memcache_obj);
$mcqResult = memcache_set($memcache_obj, $alias_mcq, $value);
var_dump($mcqResult);
$mcqResult = memcache_get($memcache_obj, $alias_mcq);
var_dump($mcqResult);
memcache_close($memcache_obj);
*/
// normal use 对象方式调用memcache

$memcache = new Memcache();
$memcache->connect($ip, $port) or die ("Could not connect");
/*
$result = $memcache->set('weikan', '123');
var_dump($result);
$result = $memcache->get('weikan');
var_dump($result);
//$memcache->close();
*/
// test key
if($flag == 1){
    $longkey = '';
    for($i=1;$i<=$length;$i++){
        $longkey.= $key;
    }
    $value = $longkey;
}else{
    $longkey = $key;
}
$strlen = strlen($longkey);
echo "key length:{$strlen}\n";
//var_dump($longkey);

$result = $memcache->set($longkey, $value, false, $expire);
var_dump($result);
$result = $memcache->get($longkey);
var_dump($result);

$memcache->close();
