<?php

# Form Validation
return 
    $rules = [

        'first_name' => [
            'value' => $_POST['first_name'], 
            'rule' => ['required'=> $_POST['first_name'], 'min' => 5, 'max' => 25]
        ],

        'last_name' => [
            'value' => $_POST['last_name'], 
            'rule' => ['required'=> $_POST['last_name'], 'min' => 5, 'max' => 25]
        ],

        'username' => [
            'value' => $_POST['username'],
            'rule' => ['required' => $_POST['username'], 'min' => 5, 'max' => 25]
        ],

        'email' => [
            'value' => $_POST['email'], 
            'rule' => [
                        'required' => $_POST['email'], 
                        'email' => $_POST['email'],
                    ]
        ],

        'phone_number' => [
            'value' => $_POST['phone_number'], 
            'rule' => ['required' => $_POST['phone_number']]
        ]
    
    ];

?>