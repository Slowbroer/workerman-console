<?php
/**
 * Created by PhpStorm.
 * User: Slowbro
 * Date: 2019-12-16
 * Time: 14:48
 */

namespace App\Services\Base\Concretes;


use App\Helper\Constant\ResponseConstant;

class ResponseService
{
    /**
     * 返回成功
     *
     * @return string
     * */
    public function success(){
        return $this->responseEncode(
            ResponseConstant::CODE_SUCCESS,
            ResponseConstant::MSG_SUCCESS
        );
    }

    /**
     * 返回操作失败
     *
     * @return string
     * */
    public function operationError(){
        return $this->responseEncode(
            ResponseConstant::CODE_OPERATION_ERROR,
            ResponseConstant::MSG_OPERATION_ERROR
        );
    }

    /**
     * 生成响应的字符串
     *
     * @param $code
     * @param $message
     * @param $data
     * @return string
     * */
    public function encode($code,$message,$data = []){
        return $this->responseEncode(
            $code,$message,$data
        );
    }

    public function paraError($message){
        return $this->responseEncode(
            ResponseConstant::CODE_PARA_ERROR,
            $message
        );
    }

    protected function responseEncode($code,$message,$data = []){
        return service_response(
            $code,$message,$data
        );
    }
}