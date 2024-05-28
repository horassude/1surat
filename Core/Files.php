<?php

namespace Core;

class Files
{
    private static $instance = null;

    private $key,
        $size,
        $_files = null,
        $error_list,
        $isSet = false;


    private function __construct($files = array())
    {
        $this->_files = $files[array_keys($files)[0]];
        $this->key = array_keys($files);
        if($this->size() > 0) {
            $this->isSet = true;
        }
    }

    public static function file($files = array())
    {
        if (!isset(self::$instance)) {
            self::$instance = new Files($files);
        }
        return self::$instance;
    }
    
    public function isSet() {
        return $this->isSet;
    }

    public function max_size_files()
    {
        return ONE_MEGA_BYTE;
    }


    public function error_list()
    {
        return $this->error_list;
    }

    public function error()
    {
        $this->_files['error'] ? true : false;
    }

    public function size()
    {
        return $this->_files['size'];
    }

    public function set_size()
    {
        return $this->_files['size'] = 0;
    }

    public function name()
    {
        return $this->_files['name'];
    }

    public function type()
    {
        return $this->_files['type'];
    }

    public function tmp_name()
    {
        return $this->_files['tmp_name'];
    }

    public function content()
    {
        return file_get_contents($this->tmp_name());
    }

    public function key()
    {
        return $this->key[0];
    }
}
