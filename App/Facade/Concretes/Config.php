<?php
/**
 * Created by PhpStorm.
 * User: Slowbro
 * Date: 2019-12-16
 * Time: 14:24
 */

namespace App\Facade\Concretes;


use App\Facade\Contracts\Facade;

/**
 * @method static get($key,$default = null)
 * @method static getMany($keys)
 * @method static set($key, $value = null)
 * @method static offsetExists($key)
 * @method static offsetGet($key)
 * @method static offsetSet($key, $value)
 * @method static offsetUnset($key)
 * */
class Config extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'config';
    }

}