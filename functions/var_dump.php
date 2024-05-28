<?php

    function dd($x)
    {
        echo '<pre>';
        echo var_dump($x);
        echo '</pre>';
    }

    function d($x)
    {
        echo '<pre>';
        echo var_dump($x);
        echo '</pre>';
        die();
    }

?>