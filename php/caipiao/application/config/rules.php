<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config = array();
$config[] = array(
            'method' => 'operate', 
            'operand' => array(
                        'Formula'=> '$datas[$i]["red"][6-1] - $datas[$i]["red"][1-1]', 
                        'log' => "一，当期开奖号码大小顺序第一位与第六位的差，计算的结果在下一期有可能不出。（有误）",
                        )
                );
$config[] = array(
            'method' => 'operate', 
            'operand' => array(
                        'Formula'=> '$datas[$i]["red"][3-1] - $datas[$i]["red"][2-1]', 
                        'log' => "二，当期开奖号码大小顺序第二位与第三位的差，计算的结果在下一期有可能不出。（有误）",
                        )
                );
$config[] = array(
            'method' => 'operate', 
            'operand' => array(
                        'Formula'=> '$datas[$i]["red"][5-1] - $datas[$i]["red"][2-1]', 
                        'log' => "三，当期开奖号码大小顺序第二位与第五位的差，计算的结果在下一期有可能不出。（67期错杀21）",
                        )
                );
$config[] = array(
            'method' => 'operate', 
            'operand' => array(
                        'Formula'=> '$datas[$i]["red"][1-1] + 9', 
                        'log' => "六，当期开奖号码大小顺序第一位加09，计算的结果在下一期有可能不出。",
                        )
                );
$config[] = array(
            'method' => 'operate', 
            'operand' => array(
                        'Formula'=> '$datas[$i]["red"][2-1] + 5', 
                        'log' => "七，当期开奖号码大小顺序第二位加05，计算的结果在下一期有可能不出。",
                        )
                );
$config[] = array(
            'method' => 'operate', 
            'operand' => array(
                        'Formula'=> '$datas[$i]["red"][3-1] + 4', 
                        'log' => "八，当期开奖号码大小顺序第三位加04，计算的结果在下一期有可能不出。",
                        )
                );
$config[] = array(
            'method' => 'operate', 
            'operand' => array(
                        'Formula'=> '$datas[$i]["red"][3-1] + 7', 
                        'log' => "九，当期开奖号码大小顺序第三位加07，计算的结果在下一期有可能不出。（67期杀错23）",
                        )
                );
        
$config[] = array(
            'method' => 'operate', 
            'operand' => array(
                        'Formula'=> '$datas[$i]["red"][6-1] + 4', 
                        'log' => "十，当期开奖号码大小顺序第六位加04，计算的结果在下一期有可能不出。",
                        )
                );
        
$config[] = array(
            'method' => 'operate', 
            'operand' => array(
                        'Formula'=> '$datas[$i]["red"][1-1] * 4 - 2', 
                        'log' => "当期开奖号码大小顺序第一位乘4再减掉2，计算的结果在下一期有可能不出。",
                        )
                );
        
$config[] = array(
            'method' => 'operate', 
            'operand' => array(
                        'Formula'=> '($datas[$i]["red"][1-1] + $datas[$i]["blue"])* 3', 
                        'log' => "当期开奖号码大小顺序第一位加当期开奖的兰号，计算的结果再乘3后，所得的号码在下一期有可能不出。",
                        )
                );

$config[] = array(
            'method' => 'operate', 
            'operand' => array(
                        'Formula'=> '$datas[$i]["red"][5-1] - $datas[$i]["red"][4-1] + $datas[$i]["blue"] + 1', 
                        'log' => "当期开奖号码大小顺序第四位与第五位的差，加当期的兰号，再加01，计算的结果在下一期有可能不出。",
                        )
                );
        
$config[] = array(
            'method' => 'operate', 
            'operand' => array(
                        'Formula'=> '$datas[$i]["red"][1-1] + $datas[$i]["red"][2-1]', 
                        'log' => "当期开奖号码出号顺序第一位与第二位的和，计算的结果在下一期有可能不出。",
                        )
                );
        
$config[] = array(
            'method' => 'operate', 
            'operand' => array(
                        'Formula'=> '$datas[$i]["red"][3-1] - $datas[$i]["red"][2-1]', 
                        'log' => "当期开奖号码出号顺序第二位与第三位的差，计算的结果在下一期有可能不出。",
                        )
                );
        
$config[] = array(
            'method' => 'operate', 
            'operand' => array(
                        'Formula'=> '$datas[$i]["red"][6-1] - $datas[$i]["red"][1-1] + $datas[$i]["blue"] - 3', 
                        'log' => "当期开奖号码出号顺序首尾的差，加当期开奖的兰号，再减去03，计算的结果在下一期有可能不出。",
                        )
                );
        
$config[] = array(
            'method' => 'operate', 
            'operand' => array(
                        'Formula'=> '$datas[$i]["red"][3-1] - $datas[$i]["red"][1-1] + $datas[$i]["blue"] + 2', 
                        'log' => "当期开奖号码出号顺序首尾的差，加当期开奖的兰号，再减去03，计算的结果在下一期有可能不出。",
                        )
                );
        
$config[] = array(
            'method' => 'operate', 
            'operand' => array(
                        'Formula'=> '$datas[$i]["red"][1-1] + $datas[$i]["blue"]', 
                        'log' => "十八，当期开奖的兰号，加当期开奖号码大小顺序第一位，计算的结果在下一期有可能不出。（备注：如遇兰号重复，重复的兰号再另外减去01）",
                        )
                );
        
$config[] = array(
            'method' => 'operate', 
            'operand' => array(
                        'Formula'=> '$datas[$i]["red"][2-1] + $datas[$i]["blue"] - 1', 
                        'log' => "十九，当期开奖的兰号，加当期开奖号码大小顺序第二位，再减去01，计算的结果在下一期有可能不出。",
                        )
                );
        
$config[] = array(
            'method' => 'operate', 
            'operand' => array(
                        'Formula'=> '$datas[$i]["blue"] - $datas[$i]["red"][4-1] + 1', 
                        'log' => "二十，当期开奖的兰号，减当期开奖号码大小顺序第四位，再加上01，计算的结果在下一期有可能不出。",
                        )
                );
        
$config[] = array(
            'method' => 'operate', 
            'operand' => array(
                        'Formula'=> '$datas[$i]["blue"] - $datas[$i]["red"][5-1]', 
                        'log' => "二一，当期开奖的兰号，减当期开奖号码大小顺序第五位，计算的结果在下一期有可能不出。",
                        )
                );
        
$config[] = array(
            'method' => 'operate', 
            'operand' => array(
                        'Formula'=> '$datas[$i]["blue"] * $datas[$i]["red"][1-1]', 
                        'log' => "二二，当期开奖的兰号，乘当期开奖号码大小顺序第一位，计算的结果在下一期有可能不出。",
                        )
                );
        
$config[] = array(
            'method' => 'operate', 
            'operand' => array(
                        'Formula'=> '$datas[$i]["blue"] + 7', 
                        'log' => "二三，当期开奖的兰号，加+07，计算的结果在下一期有可能不出。 （68期错杀18）",
                        )
                );
        
$config[] = array(
            'method' => 'operate', 
            'operand' => array(
                        'Formula'=> '$datas[$i]["blue"] + 9', 
                        'log' => "二四，当期开奖的兰号，加+09，计算的结果在下一期有可能不出。（67期杀错17）",
                        )
                );
        
$config[] = array(
            'method' => 'operate', 
            'operand' => array(
                        'Formula'=> '$datas[$i]["blue"] + 9', 
                        'log' => "二四，当期开奖的兰号，加+09，计算的结果在下一期有可能不出。（67期杀错17）",
                        )
                );
