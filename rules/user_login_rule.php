<?php
    
    use Core\Hash;
    use Core\Input;
    use Core\User;


    function crack($password) {
        if(Hash::verify(Input::post('password'), $password)){
            return $password;
        } else {
            return Input::post('password');
        }
    }
    

    $rules = [];

    $isEmail = User::get(['password'], [['email', '=', Input::post('email')]]);
    $isUsername = User::get(['password'], [['username', '=', Input::post('email')]]);

    if($isEmail) {
        $rules = [
            'email_username_error' => ['field' => 'email', 'value' => Input::post('email'), 'rule' => ['exists']],
            'password_error' => ['field' => 'password', 'value' => crack($isEmail), 'rule' => ['exists']]
        ];
    } else if($isUsername) {
        $rules = [
            'email_username_error' => ['field' => 'username', 'value' => Input::post('email'), 'rule' => ['exists']],
            'password_error' => ['field' => 'password', 'value' => crack($isUsername), 'rule' => ['exists']]
        ];
    } else {
        $rules = [
            'email_username_error' => ['field' => 'email', 'value' => Input::post('email'), 'rule' => ['exists']],
            'password_error' => ['field' => 'password', 'value' => Input::post('password'), 'rule' => ['exists']]
        ];
    }

    // d($rules);

    return $rules;


?>