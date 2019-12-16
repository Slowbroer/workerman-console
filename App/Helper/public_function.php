<?php
/**
 * Created by PhpStorm.
 * User: Slowbro
 * Date: 2019-12-16
 * Time: 14:27
 */

/**
 * @param $errCode
 * @param $errMsg
 * @param $data
 *
 * @return string
 * */
function service_response($errCode,$errMsg,$data = []){
    return json_encode(array(
        'errCode' => $errCode,
        'errMsg' => $errMsg,
        'data' => $data
    ));
}