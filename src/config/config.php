<?php

return [
    // 加密密钥
    "secret"=>env("jwt.secret",""),
    // 过期时间
    "ttl"=>env("jwt.ttl",7200),
    // 延迟生效时间
    "delay"=>env("jwt.delay",0),
    // 签发者
    "iss"=>env("jwt.iss",""),
    //面向用户
    "aud"=>env("jwt.aud",""),
    // 是否默认请求一次刷新一次token
    "is_refresh"=>env("jwt.refresh",false),
    // 刷新token以什么方式返回默认是在header头中返回
    "response_type"=>env("jwt.response_type","header"),
    // 返回的键的形式
    "response_key"=>env("jwt.response_key","token"),
    // 请求返回的键的形式
    "request_key"=>env("jwt.request_key","token")
];
