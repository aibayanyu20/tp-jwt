<?php
/**
 * @time 17:13 2020/7/21
 * @author aibayanyu
 */

namespace aibayanyu\JWT\middleware;


use aibayanyu\JWT\JWT;
use think\Request;

class CheckAuth
{
    /**
     * 处理请求
     *
     * @param \think\Request $request
     * @param \Closure $next
     * @return Response
     * @throws \Exception
     */
    public function handle($request, \Closure $next)
    {
        $token = $this->getToken($request);
        // 获取到token开始解析token
        $jwt = new JWT();
        $data = $jwt->decode($token);
        $request->userToken = $token;
        $request->userInfo = $data;
        return  $next($request);
    }

    public function getToken(Request $request){
        $key = config("jwt.request_key");
        // 验证token是否存在
        $key = empty($key)?'token':$key;
        // 先去参数中获取token是否存在
        $token = $request->param($key);
        // 存在即返回，不存在再进行查找请求头
        if (empty($token)){
            // 先判断一下key是什么类型的
            if ($key == "Authorization"){
                $token = $request->header($key);
                if (empty($token)) throw new \Exception("授权失败");
                // 判断是否存在Bearer
                if (strpos($token,"Bearer")) return $token;
                $tokenArr = explode("Bearer ",$token);
                if (!isset($tokenArr[1])) throw new \Exception("token获取失败");
                return $tokenArr[1];
            }
        }
    }
}