<?php

    namespace Core;

    class Input {
        public static function post($name = null)
        {
            $result = $_POST;
            if($name) {
                $result = $_POST[$name];
            }
            return $result;
        }


        public static function get($name = null)
        {
            $result = null;
            if(isset($_GET[$name])) {
                if($name === null) {
                    $result = $_GET;
                } else {
                    $result = $_GET[$name];
                }
            }
            return $result;
        }


        public static function clone($old, $new)
        {
            $_POST[$old] = $_POST[$new];
        }


        public static function delete($key)
        {
            unset($_POST[$key]);
        }


        public static function files($param = null)
        {
            $key = array_keys($_FILES)[0];
        
            $files = $_FILES[$key];

            if($param !== null) {
                return $files[$param];
            }
            
            return $files;
        }


        public static function add($key, $value)
        {
            $_POST[$key] = $value;
        }


        public static function set($key, $value)
        {
            $_POST[$key] = $value;
        }

      
    }

?>