<?php
    $card_id = $argv[1];
    $ch = curl_init();
    $login_url = 'http://www.bjsuperpass.com/pagecontrol.do?object=ecard&action=query';
//    $login_url = "http://www.1mod.org/member.php?mod=logging&action=login&loginsubmit=yes&infloat=yes&lssubmit=yes&inajax=1";
    $post_field = "card_id={$card_id}";
    curl_setopt($ch, CURLOPT_URL, $login_url);
//    curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
//    curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt'); //读取
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch,CURLOPT_POST,1);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $post_field);
    $ret = curl_exec($ch);
    $filename = "result_{$card_id}.txt";
    $handle = fopen($filename,'w');
    fwrite($handle,$ret);
    fclose($handle);
    var_dump($ret);
    curl_close($ch);
