<?php
$stdin = fopen('php://stdin','r');

while(($line = fgets($stdin)) && !feof($stdin) ){
    echo "{$line}\n";
}

