<?php

function print_asc($str) {
    for ($i=0; $i < strlen($str); $i++) { 
        echo ord($str[$i]) . ' ';
    }
    echo "\n";
}

function str_reverse_utf8($str) {
	return implode('', array_reverse(preg_split('//u', $str)));
}

function str_rev_mb($str) {
    if (!is_string($str) || !mb_check_encoding($str, 'UTF-8')) {
        exit("error");
    }
    $arr_str = array();
    $length = mb_strlen($str, 'UTF-8');
    for ($i=0; $i < $length; $i++) { 
        $arr_str[] = mb_substr($str, $i, 1, 'UTF-8');
    }
    krsort($arr_str);
    return implode($arr_str);
}

function mbsubstr($str, $len) {
    $tmpstr = "";
    $index = 0;
    $str_length = strlen($str);
    for($i = 0; $i < $len && $index < $str_length; $i++) {
        if(ord($str[$index]) > 0xe0) {// 224
            $tmpstr .= substr($str, $index, 3);
            $index+=3;
        } elseif (ord($str[$index]) > 0xc0) {// 192
            $tmpstr .= substr($str, $index, 2);
            $index+=2;
        } else {
            $tmpstr .= substr($str, $index, 1);
            $index+=1;
        }
    }
    //print_asc($tmpstr);
    return $tmpstr;
}

function str_rev_utf8($str) {
    $arr_str = array();
    $length = strlen($str);
    $index = 0;
    while($index < $length) {
        if (ord($str[$index]) > 0xe0) {
            $arr_str[] = substr($str, $index, 3);
            $index+=3;
        } elseif (ord($str[$index]) > 0xc0) {
            $arr_str[] = substr($str, $index, 2);
            $index+=2;
        } else {
            $arr_str[] = substr($str, $index, 1);
            $index+=1;
        }
    }
    return implode(array_reverse($arr_str));
}

$str = "阿斯123打asd打";

for ($i=0; $i < strlen($str); $i++) { 
    echo ord($str[$i]) . ' ';
}
echo "\n";

var_dump($str);
var_dump(mbsubstr($str, 7));
var_dump(str_reverse_utf8($str));
var_dump(str_rev_utf8($str));
var_dump(str_rev_mb($str));