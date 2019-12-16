<?php
/**
 * Created by PhpStorm.
 * User: Slowbro
 * Date: 2019-12-16
 * Time: 14:45
 */

namespace App\Services\Config;


use Illuminate\Support\Arr;

class ConfigService
{
    protected $config;

    protected $configPath;

    public function __construct()
    {
        $this->configPath = __DIR__."/../../../Config/";
        foreach (glob($this->configPath."*.php") as $configFile){
            $this->config[basename($configFile,".php")] = require $configFile;
        }
    }

    public function get($key,$default = null){
        if (is_array($key)){
            return $this->getMany($key);
        }

        return Arr::get($this->config,$key,$default);
    }

    public function getMany($keys)
    {
        $config = [];

        foreach ($keys as $key => $default) {
            if (is_numeric($key)) {
                [$key, $default] = [$default, null];
            }

            $config[$key] = Arr::get($this->config, $key, $default);
        }

        return $config;
    }

    public function set($key, $value = null)
    {
        $keys = is_array($key) ? $key : [$key => $value];

        foreach ($keys as $key => $value) {
            Arr::set($this->config, $key, $value);
        }
    }

    protected function has($key){
        return Arr::has($this->config,$key);
    }

    public function offsetExists($key)
    {
        return $this->has($key);
    }

    public function offsetGet($key)
    {
        return $this->get($key);
    }

    public function offsetSet($key, $value)
    {
        $this->set($key, $value);
    }

    public function offsetUnset($key)
    {
        $this->set($key, null);
    }
}