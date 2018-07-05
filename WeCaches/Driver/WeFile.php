<?php
/**
 * Created by PhpStorm.
 * User: xiequan
 * Date: 2018/7/5
 * Time: 下午7:06
 */

namespace WeCaches\Driver;


class WeFile
{
    private $_cache_path = null;
    private $_crypt = null;


    public function __construct($config)
    {
        $this->_cache_path = $config['cache_path'];
        $this->_crypt = $config['crypt'];
        if (!is_dir($this->_cache_path) || !is_writeable($this->_cache_path)) {
            throw new \Exception('cache_path not found or not writeable',2102);
        }
    }

    public function getCacheName($key)
    {
        $root_path = rtrim($this->_cache_path, '/\\');
        $file_name = $this->_crypt($key);
        $first_path = substr($file_name,0,1);
        $second_path = substr($file_name,1,1);
        $cache_path = $root_path.DIRECTORY_SEPARATOR.$first_path.DIRECTORY_SEPARATOR.$second_path.DIRECTORY_SEPARATOR;

        file_exists($cache_path) || mkdir($cache_path, 0755, true);
        return $cache_path . $file_name;
    }

    public function get($key)
    {
        $cache_file = $this->getCacheName($key);
        if (file_exists($cache_file) && ($content = file_get_contents($cache_file))) {
            $data = unserialize($content);
            if (isset($data['expired']) && (intval($data['expired']) === 0 || intval($data['expired']) >= time())) {
                return $data['value'];
            }
            self::delCache($key);
        }
        return null;
    }

    public function set($key,$val,$expire)
    {
        $cache_file = $this->getCacheName($key);
        $content = serialize(['name' => $key, 'value' => $val, 'expired' => time() + intval($expire)]);
        if (!file_put_contents($cache_file, $content)) {
            throw new \Exception('local cache error.', '0');
        }
        return true;
    }

    public function del($key)
    {
        $cache_file = $this->getCacheName($key);
        return file_exists($cache_file) ? unlink($cache_file) : true;
    }

    public function leftTime($key)
    {
        $cache_file = $this->getCacheName($key);
        if (file_exists($cache_file) && ($content = file_get_contents($cache_file))) {
            $data = unserialize($content);
            if (isset($data['expired']) && (intval($data['expired']) === 0 || intval($data['expired']) >= time())) {
                return $data['expired']-time();
            }
            self::delCache($key);
        }
        return 0;
    }
}