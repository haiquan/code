<?php
$pattern = "#<tr[^>]*>\s*<td[^>]*>(?P<time>[^<]*)</td[^>]*>\s*<td[^>]*>(?P<none>[^<]*)</td[^>]*>\s*<td[^>]*>(?P<spend>[^<]*)</td[^>]*>\s*<td[^>]*>(?P<remain>[^<]*)</td[^>]*>\s*<td[^>]*>(?P<route>[^<]*)</td[^>]*>\s*<td[^>]*>(?P<station>[^<]*)</td[^>]*>\s*</tr[^>]*>#";
$content = file_get_contents('result.txt');
//var_dump(strlen($content));
//$content = strstr($content, '<TABLE cellSpacing=1');
//var_dump(strlen($content));
//var_dump($content);
$matches = array();
if (preg_match_all($pattern, $content, $matches)) {
	# Successful match
    $index = 0;
    foreach($matches['station'] as $value){
        //var_dump($value);
        if(!strpos($value, '->')){
            $index++;
        }else{
            break;
        }
    }
    var_dump($index);
    
    $time = array_slice($matches['time'],$index, 20);
    $spend = array_slice($matches['spend'],$index, 20);
    $remain = array_slice($matches['remain'],$index, 20);
    $route = array_slice($matches['route'],$index, 20);
    $station = array_slice($matches['station'],$index, 20);
    var_dump($time, $spend, $remain, $route, $station);


} else {
	# Match attempt failed
	echo "fail\n";
}
