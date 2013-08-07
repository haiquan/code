<?php
    function __autoload($className){
        $file = '/home/haiquan/php/example/__autoload/' . $className . '.php';
        if(file_exists($file)){
            echo "OK\n";
            require_once '/home/haiquan/php/example/__autoload/' . $className . '.php';
        }else{
            echo "failed!\n";
        }
    }
    $a = new classa();
