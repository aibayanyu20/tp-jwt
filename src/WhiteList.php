<?php
/**
 * @time 18:20 2020/7/21
 * @author loster
 */

namespace aibayanyu\JWT;


class WhiteList
{
    private $list;

    public function __construct()
    {
        // 拿到当前白名单的数据
        $this->list = cache("aibayanyu_jwt_white_list");
    }

    public function join($token){
        // 将token写入至白名单
        array_push($this->list,$token);
    }
}