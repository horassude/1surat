<?php

    namespace Core;

    class Validation {

        private $rules, $table, $post;
        public $errors = [];

        
        public function __construct($table)
        {
            $this->table = $table;
        }


        private function rules($path) {
            return require_once BASE_DIR . $path;
        }


        public function isValid($inputs, $path)
        {   
            // dd($this->rules($path));

            foreach($this->rules($path) as $fields => $values) {
                $title_error = $fields;
                $value = $values['value'];
                $key = $values['field'];
                foreach($values['rule'] as $field => $value1) {
                    
                    $rule = $value1;

                    if($rule === 'unique') {
                        if($this->found($key, $value)) {
                            $this->errors[$title_error] = "{$key} already exists";
                        }
                    }

                    if($rule === 'exists') {
                        if(!$this->found($key, $value)) {
                            $this->errors[$title_error] = "{$key} not found.";
                        }
                    }
                }
            }
            // d($this->errors);
            return empty($this->errors) ? true : false;
        }


        private function found($key, $value)
        {
            // dd($key);
            // dd($value);
            return Database::get($this->table, [], [[$key, '=', $value]])->count() ? true : false;
        }


        public function errors() {
            return $this->errors;
        }
     
    }