<?php
/**
 * @time 10:21 2020/7/22
 * @author loster
 */

namespace aibayanyu\JWT\response;

/**
 * 数据响应返回信息
 * @time 10:21 2020/7/22
 * @author loster
 * Class JWTResponse
 * @package aibayanyu\JWT\response
 */

class JWTResponse
{

    public function __construct()
    {
        $config = config("jwt");

    }

    public function success($data){

    }
}