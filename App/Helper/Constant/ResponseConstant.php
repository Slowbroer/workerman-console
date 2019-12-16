<?php
/**
 * Created by PhpStorm.
 * User: Slowbro
 * Date: 2019-12-16
 * Time: 14:27
 */

namespace App\Helper\Constant;


class ResponseConstant
{
    const CODE_SUCCESS = 0;
    const CODE_CONFIG_ERROR = 401;
    const CODE_NOT_FOUND = 404;
    const CODE_PARA_ERROR = 405;
    const CODE_OPERATION_ERROR = 500;



    const MSG_SUCCESS = 'Success';
    const MSG_OPERATION_ERROR = "OperationError";
    const MSG_PARA_ERROR = 'ParaError';
    const MSG_PARA_ERROR_TOPIC = 'ParaErrorTopic';
}