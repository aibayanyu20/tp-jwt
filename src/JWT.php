<?php
/**
 * @time 18:04 2020/7/21
 * @author loster
 */

namespace aibayanyu\JWT;

use Firebase\JWT\BeforeValidException;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT as JWTFirebase;
use Firebase\JWT\SignatureInvalidException;
use think\Exception;
use aibayanyu\JWT\exception\JWTListException;

class JWT
{
    // 密钥
    private $secret ;

    // 签发者
    private  $iss ;

    // 延迟生效时间
    private $delay;

    // 过期时间
    private $ttl;

    // 面向用户
    private $aud;

    public function __construct()
    {
        // 获取config
        $config = config("jwt");
        if (empty($config['secret'])) throw new Exception("请先通过php think jwt:init 初始化secret");
        $this->secret = $config['secret'];
        $this->delay = array_key_exists("delay",$config) ? $config['delay'] : 0;
        $this->iss = array_key_exists("iss",$config) ? $config['iss'] : "";
        $this->ttl = array_key_exists("ttl",$config) ? $config['ttl'] : 7200;
        $this->aud = array_key_exists("aud",$config) ? $config['aud'] : "";
    }

    /**
     * @time 9:58 2020/7/22
     * @param array $payload
     * @return string
     * @throws JWTListException
     * @author loster
     */
    public function encode($payload = []){
        $data = [
            'iss'=>$this->iss,
            'aud'=>$this->aud,
            'iat'=>time(), // 签发时间
            'nbf'=>time()+$this->delay, //生效时间
            'exp'=>time()+$this->ttl, // 过期时间
            'data'=>$payload
        ];
        // 创建一个加密token
        $token = JWTFirebase::encode($data,$this->secret,"HS256");
        // 把当前的token加入白名单
        $whiteList = new WhiteList($data);
        // 将加入白名单的格式回传过去
        $whiteList->join($token);
        // 加入白名单并返回数据
        return $token;
    }

    public function decode($token){
        try {
            $data = JWTFirebase::decode($token,$this->secret,array("HS256"));
            // 获取到数据直接返回数据
            if (isset($data->data)) return (array) $data->data;
        }catch (SignatureInvalidException $exception){
            // 签名不正确

        }catch (BeforeValidException $exception){
            // 签名还未生效

        }catch (ExpiredException $exception){
            // token已过期

        }catch (\Exception $exception){
            // 暂时未知的错误
        }
    }

}