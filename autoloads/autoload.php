<?php

    require_once 'include.php';

    auto_required(['config/', 'functions/']);
 
    require_once BASE_DIR . 'vendor/autoload.php';

    spl_autoload_register(function($class) {
        $class = str_replace('\\', '/', $class);
        require_once BASE_DIR . "{$class}.php";
    });

    require_once 'bootstrap.php';

?>