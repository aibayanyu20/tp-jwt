<?php
/**
 * @time 17:56 2020/7/21
 * @author loster
 */

use aibayanyu\JWT\exception\JWTListException;

if (function_exists("jwt_encode")){
    /**
     * 加密
     * @time 17:57 2020/7/21
     * @author loster
     */
    function jwt_encode(){

    }
}elseif (function_exists("jwt_decode")){
    /**
     * 解密
     * @time 17:59 2020/7/21
     * @author loster
     */
    function jwt_decode(){

    }
}elseif (function_exists("jwt_verify")){
    /**
     * 验证数据
     * @time 17:59 2020/7/21
     * @author loster
     */
    function jwt_verify(){

    }
}elseif (function_exists("exception_jwt")){
    function exception_jwt($message,$code = 500){
        throw new JWTListException($message,$code);
    }
}