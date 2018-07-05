<?php
/**
 * Created by PhpStorm.
 * User: xiequan
 * Date: 2018/7/5
 * Time: 下午6:27
 */

namespace WeCaches\Driver;


class WeRedis
{
    private $_cache;

    public function __construct($config)
    {
        $this->_cache = $this->connect($config);
        if(!$this->_cache) {
            throw new \Exception('redis connet error',2103);
        }
    }

    public function connect($config){
        $redis = new \Redis();
        $redis->connect($config['host'], $config('port'));
        if($config['pass']) {
            $redis->auth($config['pass']);
        }
        if(isset($config['db'])) {
            $redis->select($config['db']);
        }
        return $redis;
    }

    public function set($key,$val,$expire)
    {
        $flag = $this->_cache->set($key,$val);
        $this->_cache->expire($key,$expire);
        return $flag;
    }

    public function get($key)
    {
        return $this->_cache->get($key);
    }

    public function del($key)
    {
        return $this->_cache->del($key);
    }

    public function leftTime($key){
        return $this->_cache->ttl($key);
    }

}