<?php
function createId(){
    $time = time();
    var_dump($time);
    $time= $time - 515483463;
    var_dump($time);
    $time = $time<<22;
    var_dump($time);
    $idc = rand(1,15);
    var_dump($idc);
    $idc = $idc<<18;
    var_dump($idc);
    $seq = rand(1,10000);
    var_dump($seq);
    $num = $time|$idc|$seq;
    var_dump($num);
    return $num;
}

createId();
