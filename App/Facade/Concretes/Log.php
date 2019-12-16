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
 * @method static info($message,$logger = null)
 * @method static debug($message,$logger = null)
 * @method static error($message,$logger = null)
 * */
class Log extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'log';
    }
}