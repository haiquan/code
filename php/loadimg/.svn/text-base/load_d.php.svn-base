<?php
 $url = "http://www.tianqiyubao.org/images/weather/"; //n03.gif
 for($i=1;$i<100;$i++){
     $tmp = sprintf("%02d", $i);
     $img = "d{$tmp}.gif";
     //echo $tmp . "\n";
     $tmp_url = $url . $img;
     $re = file_put_contents($img, file_get_contents($tmp_url));
     var_dump($re);
     sleep(1);
 }
