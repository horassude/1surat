<?php

    namespace Core;

    class Patch {
        public static $sql = null, $values;
        private static $instance = null;

        private function __construct()
        {
            // self::$values1 = [];
        }

        private static function init()
        {
            if (!isset(self::$instance)) {
                self::$instance = new Patch();
            }
            return self::$instance;
        }

        public static function update($table, $fields, $condition)
        {   
            self::$values = [];
            self::$sql = "UPDATE $table SET ";
            $x = 1;
            foreach ($fields as $key => $item) {
                if ($x < count($fields)) {
                    self::$sql .= $key . ' = ' . '?, ';
                } else {
                    self::$sql .= $key . ' = ' . '?';
                }
                array_push(self::$values, $item);
                $x++;
            }
            array_push(self::$values, $condition[2]);
            self::$sql .= "  WHERE $condition[0] $condition[1] ?";
            // dd(self::$values);
            // d(self::$sql);
            return new self;
        }

        public static function insert($table, $inputs) {
            self::$values = [];
            self::$sql = "INSERT INTO $table (";
            $x = 1;  $qm = '(';
            foreach($inputs as $key => $item) {
                if($x < count($inputs)) {
                    self::$sql .= "$key, ";
                    $qm .= '?, ';
                } else {
                    self::$sql .= "$key)";
                    $qm .= '?)';
                }
                array_push(self::$values, $item);
                $x++;
            }
            self::$sql .= " VALUES $qm";
            // dd(self::$values);
            // d(self::$sql);
            return new self;
        }

        public static function get($table, array $fields = null, array $conditions = null, string $options = null) {
            self::$values = [];
            self::$sql = "SELECT ";
            $i = 1;
            if(!$fields) {
                self::$sql .= '*';
            } else {
                foreach($fields as $key => $value) {
                    if($i < count($fields)) {
                        self::$sql .= $value . ', ';
                    } else {
                        self::$sql .= $value;
                    }
                    $i++;
                }
            }

            self::$sql .= " FROM $table";

            if($conditions) {
                self::$sql .= " WHERE "; 
                $i = count($conditions) == 1 ? 0 : 1;
                foreach($conditions as $key => $item) {
                    if($i < count($conditions)) {
                        self::$sql .= "$item[0] $item[1] ?";
                        array_push(self::$values, $item[2]);
                    } else {
                        self::$sql .= " AND $item[0] $item[1] ?";
                        array_push(self::$values, $item[2]);
                    }
                    $i++;
                }
            }

            if($options) { 
                self::$sql .= ' ' . $options;
            }

            // dd(self::$values);
            // d(self::$sql);
            return new self;
        }
    }

?>