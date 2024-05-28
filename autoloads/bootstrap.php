<?php

    use Core\Container;
    use Core\Database;
    use Core\Validation;
    use Core\App;
use Core\Disposisi;
use Core\Satker;
    use Core\User;

    $container = new Container();

    $container->bind('Core\Database', function() {
        return new Database();
    });

    $container->bind('Core\Satker', function() {
        return new Satker();
    });

    $container->bind('Core\User', function() {
        return new User();
    });

    $container->bind('Core\Validation', function() {
        return new Validation(USER_TABLE);
    });

    $container->bind('Core\Disposisi', function() {
        return new Disposisi(SURAT_MASUK_TABLE);
    });
    
    App::setContainer($container);

?>