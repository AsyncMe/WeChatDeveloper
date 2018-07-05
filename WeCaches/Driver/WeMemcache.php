<?php
/**
 * Created by PhpStorm.
 * User: xiequan
 * Date: 2018/7/5
 * Time: 下午6:27
 */

namespace WeCaches\Driver;


class WeMemcache
{
    private $_cache;

    public function __construct($config)
    {
        $this->_cache = $this->connect($config);
        if(!$this->_cache) {
            throw new \Exception('memcache connet error',2104);
        }
    }

    public function connect($config){
        $mc = new \Memcache();
        $mc->connect($config['host'], $config('port'));
        return $mc;
    }

    public function set($key,$val,$expire)
    {
        $flag = $this->_cache->set($key,$val,MEMCACHE_COMPRESSED,$expire);
        return $flag;
    }

    public function get($key)
    {
        return $this->_cache->get($key);
    }

    public function del($key)
    {
        return $this->_cache->delete($key);
    }

    public function leftTime($key){
        return 0;
    }

}