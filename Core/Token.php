<?php

    namespace Core;

    class Token {
        public static function get() {
            $length = 50;
            return bin2hex(random_bytes($length));
        }
    }
    
?>