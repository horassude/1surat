<?php

    define('BASE_DIR',              $_SERVER['DOCUMENT_ROOT'] . '/');
   
    function auto_required(array $paths) {
        foreach($paths as $path) {
            $directory = BASE_DIR . $path;
            $files = scandir($directory);
            foreach ($files as $file) {
                if ($file != "." && $file != "..") {
                    if(pathinfo($file, PATHINFO_EXTENSION) === 'php') {
                        require_once $directory . $file;
                    }
                }
            }
        }
    }

?>