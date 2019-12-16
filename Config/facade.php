<?php
/**
 * Created by PhpStorm.
 * User: Slowbro
 * Date: 2019-12-16
 * Time: 14:07
 */
return [
    'config' => \App\Services\Config\ConfigService::class,
    'log' => \App\Services\Log\LogService::class,
    'response' => \App\Services\Base\Concretes\ResponseService::class,
];