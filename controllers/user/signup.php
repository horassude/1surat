<?php

    use Core\User;
    use Core\Input;
    use Core\Redirect;
    use Core\App;

    $user = App::resolve(User::class);
   
    if(!Input::post()) {

        view(USER_SIGNUP_VIEW);

    } else {

        $user::signup(Input::post());
        Redirect::to(HOME);
        exit();

    }
    
?>