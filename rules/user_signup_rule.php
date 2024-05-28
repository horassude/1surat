<?php
    
    use Core\Input;
    use Core\User;
    
    $rules = [];
    
    $isEmail = User::get(['password'], [['email', '=', Input::post('email')]]);

    if($isEmail) {
        $rules = [
            'email_username_error' => ['field' => 'email', 'value' => Input::post('email'), 'rule' => ['unique']]
        ];
    }

    $isUsername = User::get(['password'], [['username', '=', Input::post('email')]]);

    if($isUsername) {
        $rules = [
            'email_username_error' => ['field' => 'username', 'value' => Input::post('email'), 'rule' => ['unique']]
        ];
    } 
    
    return $rules;
   

?>