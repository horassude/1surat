<?php

    use Core\User;
    use Core\Redirect;

    if(!$_POST) {
        view(USER_LOGOUT_VIEW);
    } else {
        if($_POST['button'] === 'Yes') {
            User::logout();
        }
        Redirect::to(HOME);
    }

?>