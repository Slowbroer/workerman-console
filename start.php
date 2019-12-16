<?php
/**
 * Created by PhpStorm.
 * User: Slowbro
 * Date: 2019-12-16
 * Time: 15:14
 */


require "./vendor/autoload.php";

$dotEnv = Dotenv\Dotenv::create(__DIR__);
$dotEnv->load();

$config = \App\Facade\Concretes\Config::get("console");
$console = new \App\Console\WorkerConsole($config);

$console->register();

\Workerman\Worker::runAll();