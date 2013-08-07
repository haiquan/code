<?php
$rules = 'min,0;max,30';
$rules = preg_split('#(?<!min);#', $rules);
var_dump($rules);

/**
 * 格式化链接
 *
 * @param string $text
 *
 * @return string
 */
function formatUrl($text) {
    $link_grep='!http\:\/\/[a-zA-Z0-9\$\-\_\.\+\!\*\'\,\{\}\\\^\~\]\`\<\%\>\/\?\:\@\&\=(\&amp\;)\#\|]+!is';
    $text = preg_replace($link_grep, '<a target="_blank" href="$0">$0</a>', $text);
    return $text;
}

$text = '12312323http://asdaaaaaaaad.com大加好';
$result = formatUrl($text);
var_dump($result);
