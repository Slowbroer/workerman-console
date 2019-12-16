<?php
/**
 * Created by PhpStorm.
 * User: Slowbro
 * Date: 2019-12-16
 * Time: 13:57
 */

namespace App\Consoles;


use App\Consoles\Contracts\BaseConsole;
use App\Consoles\Exceptions\WorkerNotExistsException;

class WorkerConsole
{

    protected $consoles = array();

    protected $config = array();


    public function __construct($config)
    {
        $this->config = $config;
    }

    /**
     * @param $name
     *
     * @throws
     * */
    public function register($name = null){

        if (isset($name)){
            if (is_string($name)){
                $this->singleConsoleHandle($name);
            }
            else if (is_array($name)){ // 兼容数组启动
                foreach ($name as $index => $item) {
                    $this->singleConsoleHandle($item);
                }
            }

        }
        else{
            foreach ($this->config as $key => $config){
                /**
                 * @var $console BaseConsole
                 * */
                $console = new $config['console_class']($config['worker_config']);
                $this->consoles[$key] = $console->handle();
            }
        }
    }


    /**
     * @param $name
     *
     * @throws
     * */
    protected function singleConsoleHandle($name){
        if (key_exists($name,$this->config)){ // 如果配置存在
            $config = $this->config[$name];
            $class = $config['console_class'];
            $workerConfig = $config['worker_config'];

            /**
             * @var $console BaseConsole
             * */
            $console = new $class($workerConfig);
            $this->consoles[$name] = $console->handle();
        }
        else{
            throw new WorkerNotExistsException();
        }
    }
}