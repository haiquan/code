<?php
$a='sdasdasda"dasdasd"d"da""dasd';
function convert($str) {
	return str_replace('"', '\"', $str);
}

echo convert($a). "\n";

