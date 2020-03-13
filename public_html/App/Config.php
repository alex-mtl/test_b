<?php
namespace App;

/**
 * Description of Config
 *
 * @author Alex
 */
class Config {
    
    public static function getConfig($cfg)
    {
        $fileName = __DIR__.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.$cfg.'.php';
        if (file_exists($fileName)) {
            $cfg = include($fileName);
            return $cfg;
        } else {
            throw new Exception('Config file: '.$fileName.' not found!');
        }
    }
    
     public static function getConfigValue($config, $key)
    {
        $cfg = self::getConfig($config);
        if (is_array($cfg) && key_exists($key, $cfg)) {
            return $cfg[$key];
        } else {
            return null;
        }
    }
}
