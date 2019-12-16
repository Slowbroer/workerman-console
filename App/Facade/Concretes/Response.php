<?php
/**
 * Created by PhpStorm.
 * User: Slowbro
 * Date: 2019-12-16
 * Time: 14:26
 */

namespace App\Facade\Concretes;


use App\Facade\Contracts\Facade;

/**
 * @method static string success()
 * @method static string operationError()
 * @method static string encode($code,$message,$data = [])
 * @method static string paraError()
 * */
class Response extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'response';
    }

}