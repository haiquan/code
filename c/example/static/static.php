<?php
class Test  
{  
    public function __construct()  
    {  
        echo '实例化';  
    }  
    public function printInfo()  
    {  
        echo 'Hello world';  
    }  
}  
Test::printInfo();  
