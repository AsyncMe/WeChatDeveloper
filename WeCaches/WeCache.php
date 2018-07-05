<?php
/**
 * Created by PhpStorm.
 * User: xiequan
 * Date: 2018/7/5
 * Time: 下午6:24
 */

namespace WeCaches;

use WeCaches\Driver;
use WeChat\Exceptions\InvalidInstanceException;

class WeCache
{
    /**
     * 内部对象
     * @var null
     */
    private $_cache = null;

    /**
     * WeCache constructor.
     * @param $driver
     * @param $config
     */
    public function __construct($driver, $config)
    {
        $driver_class = 'We' . ucfirst($driver);
        $this->_cache = new $driver_class($config);
        if ($this->_cache) {
            return $driver_class;
        }
        throw new InvalidInstanceException("driver {$driver} not found");
    }

    /**
     * @param $key
     * @param $val
     * @param int $expire
     * @return mixed
     */
    public function setCache($key,$val,$expire=0)
    {
        return $this->_cache->set($key,$val,$expire);
    }

    /**
     * @param $key
     * @return mixed
     */
    public function getCache($key)
    {
        return $this->_cache->get($key);
    }

    /**
     * @param $key
     * @return mixed
     */
    public function delCache($key)
    {
        return $this->_cache->del($key);
    }

    /**
     * @param $key
     * @return mixed
     */
    public function leftTime($key)
    {
        if(method_exists($this->_cache,'leftTime')) {
            return $this->_cache->leftTime($key);
        } else {
            return 0;
        }

    }
}