<?php

    namespace Core;
    
    class Hash {
        # $algo = [PASSWORD_DEFAULT, PASSWORD_BCRYPT, PASSWORD_ARGON2ID, PASSWORD_ARGON2I];

        public static function hash($password, $option = PASSWORD_DEFAULT) {
            return password_hash($password, $option);
        }

        public static function verify($password, $hashed_password) {
            return password_verify($password, $hashed_password);
        }
    }