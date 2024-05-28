<?php

    use Core\User;
    use Core\App;

    require_once __DIR__ . '/autoloads/autoload.php';

    Core\Session::start();

    Core\App::run();
    
?>