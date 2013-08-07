<?php
$pattern = "#<tr[^>]*>\s*<td[^>]*>(?P<time>[^<]*)</td[^>]*>\s*<td[^>]*>(?P<none>[^<]*)</td[^>]*>\s*<td[^>]*>(?P<spend>[^<]*)</td[^>]*>\s*<td[^>]*>(?P<remain>[^<]*)</td[^>]*>\s*<td[^>]*>(?P<route>[^<]*)</td[^>]*>\s*<td[^>]*>(?P<station>[^<]*)</td[^>]*>\s*</tr[^>]*>#";
$content = file_get_contents('page.html');
//var_dump(strlen($content));
//$content = strstr($content, '<TABLE cellSpacing=1');
//var_dump(strlen($content));
//var_dump($content);
$matches = array();
if (preg_match_all($pattern, $content, $matches)) {
	# Successful match
    $data = json_encode($matches);
    file_put_contents('data.log', $data);
} else {
	# Match attempt failed
	echo "fail\n";
}
