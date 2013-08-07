<?php
error_reporting(777);
function microtime_float()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}
class t{
    static $start_time;
    static $end_time;
    static $start_memory;
    static $end_memory;

    public static function start()
    {
        self::$start_memory = memory_get_usage();
        self::$start_time = microtime_float();
        echo '<br/>Start @'.self::$start_time.'('.self::$start_memory.')|------->';
//        echo "\n";
    }

    public static function end()
    {
        self::$end_time = microtime_float();
        self::$end_memory = memory_get_usage();
        echo 'End @'.self::$end_time.'('.self::$end_memory.') :';
        echo "\n";
        echo '|======= 共耗时：'.(self::$end_time-self::$start_time).'，共用内存：'.(self::$end_memory-self::$start_memory);
        echo "\n";
    }
}

class baseA{
    static function sprint(){
        echo "hahaA";
    }
}

class baseB{
    function sprint(){
        echo "hahaB";
    }
}

t::start();t::end(); //消除t类首次加载的影响
t::start();
baseA::sprint();
t::end();

t::start();
$model = new baseB();
$model->sprint();
t::end();
