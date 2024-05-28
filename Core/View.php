<?php

    namespace Core;

    class View {

        public static function show($path, $heading = []) {
            // d(BASE_DIR . 'resources/views/' . $path);
            extract($heading);
            require BASE_DIR . 'resources/views/' . $path;

        }

    }