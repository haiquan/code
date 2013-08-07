<?php
ob_start();
include_once 'a.php';
$content = ob_get_contents();
ob_clean();
var_dump($content);
?>
