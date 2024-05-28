<?php

    namespace Core;

    class Session
    {

        public static function set($name, $value)
        {
            $_SESSION[$name] = $value;
        }

        
        public static function exists($name)
        {
            return isset($_SESSION[$name]) ? true : false;
        }


        public static function get($name = null)
        {
            if($name === null) {
                $session =  $_SESSION;
            } else {
                $session = self::exists($name) ? $_SESSION[$name] : null;
            }
            return $session;
        }


        public static function delete($name = null)
        {
            if($name === null) {
                foreach(Session::get() as $key => $session) {
                    Session::delete($key);
                }
            }
            if (self::exists($name)) {
                unset($_SESSION[$name]);
            }
        }


        public static function start() {
            session_start();
        }


        public static function login($email, $date) 
        {
            $login_id = Database::db()->query("SELECT id FROM login_logout ORDER BY id DESC LIMIT 1");

            if($login_id->count()) {
                self::set('login', $login_id->results()[0]['id']);
            }
        }

    }

?>