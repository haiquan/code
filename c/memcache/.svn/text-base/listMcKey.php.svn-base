<?php
$all_options = array('127.0.0.1:12000',);
$result = list_key($all_options);
var_dump($result);

function list_key($all_options){
    $first = $all_options[0];
    $option = explode(':',$first);
    $ip = $option[0]; //'127.0.0.1';
    $port = $option[1]; //'11211';
    var_dump($ip, $port);
    $memcache = new Memcache();
    $memcache->connect($ip, $port) or die ("Could not connect");
    $all_items = $memcache->getExtendedStats('items');
//    exit;
    $keys = array();
    foreach($all_options as $option){
//        foreach($options as $option){
            if(isset($all_items[$option]['items'])){
                $items = $all_items[$option]['items'];
                foreach($items as $number => $item){
                    $str = $memcache->getExtendedStats('cachedump', $number, 0);
                    $line = $str[$option];
                    if(is_array($line) && count($line) > 0){
                        foreach($line as $key => $value){
                            $keys[] = $key;
                        }
                    }
                }
            }
       // }
    }
    return array_unique($keys);
}
