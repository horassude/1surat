<?php

    use Core\Input;
    use Core\Database;
    use Core\Email;
    use Core\Token;
    use Core\User;

    if(Input::get('activated')) {
        $token = User::get(['token'], [['id', '=', Input::get('id')]]);
        if(Input::get('token') === $token) {
            User::activated(['activated' => 1], ['id', '=', Input::get('id')]);
            dd('Congratulation.... You now activated');
        }
    } else {
        $email = Input::get('email');
        $id = User::get(['id'], [['email', '=', $email]]);
        $token = Token::get();
        
        User::setToken(['token' => $token], ['id', '=', $id]);

        (new Email($id, $email, $token))->send();
        dd("Open your email.");
    }

?>


<a href="/">Home</a>
<a href="/user/login">Login</a>