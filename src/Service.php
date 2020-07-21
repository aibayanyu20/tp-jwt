<?php
/**
 * @time 17:17 2020/7/21
 * @author loster
 */

namespace aibayanyu\JWT;


use aibayanyu\JWT\command\JWTCommand;

class Service extends \think\Service
{
    public function boot()
    {
        $this->commands(JWTCommand::class);
    }
}