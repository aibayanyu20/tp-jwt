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
    "aud"=>env("jwt.aud","")
];
