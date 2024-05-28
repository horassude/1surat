<?php

    namespace Core;
    use Core\Database;
    use Core\Validation;
    
    class User
    {
        private static $instance = null,
                       $user_table;
        public static $user, $id, $level, $email;
        
        public function __construct()
        {
            self::$user_table = USER_TABLE;
            if(Input::post()) {
                if(Input::post('email')) {
                    self::$user = self::get([], [['email', '=', Input::post('email')]]) ? 
                                    self::get([], [['email', '=', Input::post('email')]]) : 
                                    self::get([], [['username', '=', Input::post('email')]]);
                }
            }
        }

        
        private static function init()
        {
            if (!isset(self::$instance)) {
                self::$instance = new User();
            }
            return self::$instance;
        }

        public static function login()
        {
            $validation = App::resolve(Validation::class);

            if(!$validation->isValid(Input::post(), USER_SIGNIN_RULES)) {
                view(USER_LOGIN_VIEW, $validation->errors());
                exit();
            }
            
            self::session();
           
            if(!self::isActivated()) {
                Session::delete();
                view(ERROR_402, ['error' => self::$user['email'] . " is not activate.", 'email' => self::$user['email']]);
                die();
            }
            
            if(self::isOnline()) {
                Session::delete();
                view(ERROR_405, ['error' => "User " . self::$email . " is online"]);
                die();
            }
            
            self::createLogin();
            return self::init();
        }


        public static function signup($inputs)
        {
            $validation = App::resolve(Validation::class);
            $user = App::resolve(User::class);

            if(!$validation->isValid($inputs, USER_SIGNUP_RULES)) {
                view(USER_SIGNUP_VIEW, $validation->errors());
                exit();
            } else {
                $inputs['date_register'] = date('Y-m-d H:i:s');
                $inputs['foto'] = file_get_contents(image(ICON_USER_AVATAR));
                $inputs['password'] = Hash::hash($inputs['password']);
                $user_new = $user::create($inputs);
                if($user_new) { return true; }
            }
        }
        

        public static function create($inputs) {
            $database = App::resolve(Database::class);
            $database::insert(self::$user_table, $inputs);
        }


        public static function logout()
        {
            if(Session::exists('user')) {
                Database::update(LOGIN_TABLE, ['logout_time' => date('Y-m-d H:i:s')], ['user_id', '=', Session::get('login')]);
                Session::delete();
            }
        }


        public static function setting()
        {
            self::init();
            if(!Input::files('error')) {
                Input::set('foto', file_get_contents(Input::files('tmp_name')));
            }
            $id = Input::post('user_id');
            Input::delete('user_id');
            return self::update(Input::post(), ['id', '=', $id]);
        }


        public static function setToken($inputs = [], $conditions = [])
        {
            return self::update($inputs, $conditions);
        }


        public static function activated($inputs = [], $conditions = [])
        {
            return self::update($inputs, $conditions);
        }


        private static function update($inputs, $conditions) {
            return Database::update(USER_TABLE, $inputs, $conditions);
        }


        public static function isOnline(array $id = null)
        {
            $isOnline = false;
            if ( ! $id ) {
                $conditions = [['user_id', '=', self::$user['id']], ['logout_time', 'IS', NULL]];
            } else {
                $conditions = [['user_id', '=', $id], ['logout_time', 'IS', NULL]];
            }
            $isOnline = Database::get(LOGIN_TABLE, null, $conditions)->count();
            return $isOnline;
        }


        public static function isActivated($id = null)
        {
            $activated = false;
            if ( ! $id ) {
                $activated = self::$user['activated'] === 1 ?? true;
                // $activated = self::get(['activated'], [['id', '=', $id]]);
            } else {
                $activated = self::$user['activated'] === 1 ?? true;
            }
            return $activated;
        }


        private static function createLogin() 
        {  
            $inputs = [
                'user_id' => self::$user['id'],
                'login_time' => date('Y-m-d H:i:s')
            ];
            Database::insert(LOGIN_TABLE, $inputs);
        }


        private static function session()
        {
            Session::set('login', self::id_login());
            Session::set('user', [
                'id' => self::$user['id'],
                'username' => self::$user['username'],
                'level' => self::$user['level'],
            ]);
        }


        public static function id_login()
        {
            return Database::get(LOGIN_TABLE, ['id'], [['user_id', '=', self::$user['id']], ['logout_time', 'IS', NULL]])->results()[0]['id'];
        }


        public static function get(array $fields = null, array $conditions = null)
        {
            $user = Database::get(USER_TABLE, $fields, $conditions);
            $results = null;
            if($user->count()) {
                if(count($user->results()) === 1) {
                    if(count($fields) === 1) {
                        $results = $user->results()[0][$fields[0]];
                    } else {
                        $results =  $user->results()[0];
                    }
                } else {
                    $results = $user->results();
                }
            } else {
                $results = false;
            }
            return $results;
        }

    }