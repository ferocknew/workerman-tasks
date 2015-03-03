<?php
namespace App;
use \Workerman\Worker;
use \App\SFunction;

class Tasks {
    private static $tasksObjArr = array();
    public static function new_Worker($tName = "main") {
        if (!isset(self::$tasksObjArr[$tName])) {
            $task = new Worker();
            $task -> name = 'Tasks-' . $tName;
            $task -> count = 1;
            $task -> onWorkerStart = function($worker) {
                echo "Worker starting...\n";
            };

            self::$tasksObjArr[$tName] = $task;

        }
        \App\SFunction::w_log("new_Worker", var_dump($task));

    }

}
