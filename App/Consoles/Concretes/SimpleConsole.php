<?php
/**
 * Created by PhpStorm.
 * User: Slowbro
 * Date: 2019-12-16
 * Time: 13:57
 */

namespace App\Consoles\Concretes;


use App\Consoles\Contracts\BaseConsole;

class SimpleConsole extends BaseConsole
{

    protected function workerName()
    {
        return 'simple';
    }
}