<?php
/**
 * Created by PhpStorm.
 * User: Slowbro
 * Date: 2019-12-16
 * Time: 14:47
 */

namespace App\Services\Log;


use App\Facade\Concretes\Config;
use App\Services\Log\Exceptions\LoggerNotSet;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;

class LogService
{

    protected $logger = [];

    protected $default;

    protected $loggerConfig;

    public function __construct()
    {
        $config = Config::get("log");
        $this->default = $config['default'];
        $this->loggerConfig = $config['logger'];
    }


    /**
     * @param $name
     * @return Logger
     * @throws
     * */
    protected function getLogger($name = null){
        if (!$name){
            $name = $this->default;
        }
        if (!key_exists($name,$this->logger)){
            if (!key_exists($name,$this->loggerConfig)){
                throw new LoggerNotSet("logger:{$name} is not set in the log config");
            }
            $config = $this->loggerConfig[$name];
            $logger = new Logger($name);
            if ($config['type'] == 'daily'){
                $maxFile = isset($config['max_files'])? $config['max_files']:5;
                $minLevel = isset($config['min_level'])? $config['min_level']:Logger::DEBUG;
                $file = __DIR__."/../../../Storage/Logs/".$config['file_name']; // TODO::路径需要怎么优化
                $handler = new RotatingFileHandler($file,$maxFile,$minLevel);
                $logger->pushHandler($handler);
                $this->logger[$name] = $logger;
            }
        }

        return $this->logger[$name];
    }


    public function info($message,$logger = null){
        $logger = $this->getLogger($logger);
        $logger->info($message);
    }


    public function debug($message,$logger = null){
        $logger = $this->getLogger($logger);
        $logger->debug($message);
    }


    public function error($message,$logger = null){
        $logger = $this->getLogger($logger);
        $logger->error($message);
    }
}