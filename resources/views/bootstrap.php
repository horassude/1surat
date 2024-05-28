<?php

    use Core\Container;
    use Core\Environment;
    use Core\App;

    $container = new Container;

    $container->binding(\Core\Environment::class, function() {

        return new Environment(file(BASE_DIR . '.env'));
        
    });

    App::setContainer($container);