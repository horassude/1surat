<?php

    namespace Core;

    use Core\Register;
    use Core\Database;


    class Disposisi {
        private static $instance = null,
                       $table;
        private $file, $rules, $view, $validate = false;

        
        public function __construct($table) 
        {
            self::$table = $table;
        }


        public static function create(array $inputs) {
            if($inputs) {
                $id = $inputs['disposisi_id'];
                unset($inputs['disposisi_id']);
            }

            $inputs= static::patch($inputs);
            
            return static::update($inputs, ['id', '=', $id]);
        }


        private static function patch($inputs) {
            if (!in_array('on', $inputs)) {
                $inputs['disposisi_kepada'] = '';
            } else {
                $checklist = '';
                foreach ($inputs as $inputs_key => $value) {
                    if($value === 'on') {
                        $checklist .= '-' . $inputs_key;
                        unset($inputs[$inputs_key]);
                    }
                }
                $inputs['disposisi_kepada'] = $checklist;
            }
            return $inputs;
        }


        public static function update(array $inputs, array $conditions)
        {
            $DB = App::resolve(Database::class);
            return $DB::update(static::$table, $inputs, $conditions);
        }


        public function preview() {

        }
    }

?>