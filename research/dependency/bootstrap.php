<?php

    use Core\Container;
    use Core\Validation;

    $container = new Container();

    $container->bind('Core\Validation', function() {
        return new Validation(USER_TABLE, Input::post(), USER_LOGIN_RULES);
    });

    $db = $container->resolve('Core\Database');
    dd($db);
    // $container->resolve('fdsfdsfd');

?>