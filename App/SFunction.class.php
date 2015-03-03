<?php
namespace App;
class SFunction {
    public static function real_ip() {
        return time();
    }

    public static function w_Log($logName, $message, $type = "log", $fnName = "main") {
        $logPath = WORKERMAN_ROOT_DIR . "/";
        $logFile = $logName . ".log";
        $time = date("Y-m-d H:i:s");
        $log = "[$type]-[$fnName]-[$time]:" . $message . "\n";
        error_log($log, 3, $logPath . $logFile);
    }

}
