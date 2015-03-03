<?php
use \Workerman\WebServer;
use \GatewayWorker\Gateway;
use \GatewayWorker\BusinessWorker;
use \Workerman\Worker;
use \App\SFunction;
use \App\Tasks;

$task = new Worker();
// 开启多少个进程运行定时任务，注意多进程并发问题
$task -> name = 'Tasks';
$task -> count = 1;

$task -> onWorkerStart = function($task) {
    $time_interval = 2;
    \Workerman\Lib\Timer::add($time_interval, function() {
        \App\Tasks::new_Worker("aaa");
    });
};
