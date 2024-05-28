<?php

    namespace Core;

    class Redirect {

        public static function to($path) {
            header("Location: http://" . $path);
        }


        public static function view($path, $data = []) {
            require_once $_SERVER['DOCUMENT_ROOT'] . '/autoload.php';
            extract($data);
            $path = htmlspecialchars($path, ENT_QUOTES, 'UTF-8');
            $url = 'http://' . HOME . '/resources/views/' . $path;
            // d($url);
            header("Location: " . $url);
            exit();
        }

    }

?>