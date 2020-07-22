<?php
/**
 * @time 18:20 2020/7/21
 * @author loster
 */

namespace aibayanyu\JWT;


class WhiteList
{
    private $list;

    private $key;

    private $exp;

    /**
     * WhiteList constructor.
     * @param $data
     * @throws exception\JWTListException
     */
    public function __construct($data)
    {
        $this->exp = isset($data['exp'])?$data['exp'] : exception_jwt("传入参数有误");
        $this->key = 'aibayanyu_jwt_white_list_'.md5(json_encode($data['data']));
        // 拿到当前白名单的数据
        $this->forCheckList(cache($this->key));
    }

    /**
     * 将当前的token加入至白名单
     * @param $token
     * @author: aibayanyu
     * Time: 2020/7/21 22:01
     */
    public function join($token){
        // 将token写入至白名单
        array_push($this->list,['exp'=>$this->exp,'token'=>$token]);
        $this->list = cache($this->key,$this->list);
    }

    /**
     * 过滤掉过期的时间
     * @time 9:48 2020/7/22
     * @param $data
     * @author loster
     */
    private function forCheckList($data){
        $newList = [];
        foreach ($data as $item=>$value){
            if ($value['exp'] > time()){
                // 生效时间大于当前的时间戳
                $newList[] = $value;
            }
        }
        $this->list = $newList;
    }

    /**
     * 需要移除白名单的token信息
     * @time 9:53 2020/7/22
     * @param $token
     * @return bool
     * @author loster
     */
    public function remove($token){
        // 获取token
        $data = array_column($this->list,'token');
        // 查找当前的index
        $index = array_search($token,$data);
        // 删除当前的token
        if (!$index) return true;
        // 拿到数据开始删除
        array_splice($this->list,$index,1);
        cache($this->key,$this->list);
        return true;
    }

    /**
     * 判断当前的token是否存在
     * @time 10:02 2020/7/22
     * @param $token
     * @return bool
     * @author loster
     */
    public function has($token){
        // 判断当前的token是否存在在白名单中
        $data = array_column($this->list,"token");
        if (in_array($token,$data)) return true;
        return false;
    }

    /**
     * 清空当前的白名单列表
     */
    public function clear(){
        cache($this->key,NULL);
        return true;
    }

}