<?php
/**
 * Created by PhpStorm.
 * User: Slowbro
 * Date: 2019-12-16
 * Time: 14:22
 */

namespace App\Facade\Contracts;


use App\Facade\Exceptions\FacadeNotSet;
use App\Facade\Exceptions\RuntimeException;

class Facade
{
    public static $instances = array();

    public static $config;

    public static function __callStatic($name, $arguments)
    {
        if (!isset(static::$config)){
            static::$config = require __DIR__ . "/../../../Config/facade.php";
        }

        $type = static::getFacadeAccessor();


        if (!key_exists($type,static::$instances)){
            if (!key_exists($type,static::$config)){
                throw new FacadeNotSet();
            }
            static::$instances[$type] = new static::$config[$type]();
        }

        if ($type == 'realtime_data_deal'){

        }

        return static::$instances[$type]->$name(...$arguments);
    }



    /**
     * @return string
     * @throws
     *
     * */
    protected static function getFacadeAccessor()
    {
        throw new RuntimeException('Facade does not implement getFacadeAccessor method.');
    }
}