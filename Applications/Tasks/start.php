<?php
use \Workerman\WebServer;
use \GatewayWorker\Gateway;
use \GatewayWorker\BusinessWorker;
use \Workerman\Worker;
use \App\SFunction;

$task = new Worker();
// 开启多少个进程运行定时任务，注意多进程并发问题
$task -> name = 'Tasks';
$task -> count = 1;

$task -> onWorkerStart = function($task) {
    $time_interval = 2;
    \Workerman\Lib\Timer::add($time_interval, function() {
        echo SFunction::real_ip() . "\n";
    });
};
