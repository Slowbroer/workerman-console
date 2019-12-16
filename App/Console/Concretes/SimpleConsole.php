<?php
/**
 * Created by PhpStorm.
 * User: Slowbro
 * Date: 2019-12-16
 * Time: 13:57
 */

namespace App\Console\Concretes;


use App\Console\Contracts\BaseConsole;

class SimpleConsole extends BaseConsole
{

    protected function workerName()
    {
        return 'simple';
    }
}