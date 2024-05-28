<?php

    use Core\User;
    use Core\Input;
    use Core\Redirect;

    
    if(!Input::post()) {
       
        view(USER_SETTING_VIEW);

    } else {
       
        User::setting();
            
        Redirect::to(HOME);

    }