<?php
/**
 * Created by PhpStorm.
 * User: Slowbro
 * Date: 2019-12-16
 * Time: 13:57
 */

namespace App\Console\Contracts;


use Workerman\Worker;

abstract class BaseConsole
{

    protected $socketName;

    /**
     * @var $worker Worker
     * */
    protected $worker;

    protected $contextOption;

    protected $workerName;

    protected $messageDealer;

    protected $workerCount = 1;

    public function __construct($config)
    {
        $this->socketName = isset($config['socket_name'])? $config['socket_name']:'';
        $this->contextOption = isset($config['context_option'])? $config['context_option']:[];
        $this->workerCount = isset($config['worker_count'])? $config['worker_count']:1;
        $this->workerName = isset($config['worker_name'])? $config['worker_name']:$this->workerName();
    }


    protected function workerType(){
        return Worker::class;
    }


    public function handle(){
        if (!isset($this->worker)){
            $workerType = $this->workerType();
            $worker = $this->createWorker($workerType);
            $worker->name = $this->workerName;
            $worker->count = $this->workerCount;
        }

        return $this->worker;
    }


    protected function createWorker($workerType){
        $worker = new $workerType($this->socketName,$this->contextOption);
        return $worker;
    }

    protected function initWorkerAction($worker){

    }


    protected abstract function workerName();
}