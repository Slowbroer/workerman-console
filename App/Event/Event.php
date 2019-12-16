<?php
/**
 * Created by PhpStorm.
 * User: Slowbro
 * Date: 2019-12-16
 * Time: 14:03
 */

namespace App\Event;


class Event
{

    public static function onWorkerStart($worker){

    }

    public static function onMessage($connection,$data){

    }

    public static function onError($worker){

    }

    public static function onConnect($connection){

    }

    public static function onClose($worker){

    }

}