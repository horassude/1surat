<?php

    namespace Core;
    use Core\Database;

    class Satker {
        private $satker;

        public function __construct()
        {
            // $this->satker = Database::get(SATKER_TABLE)->results();
        }

         // $x = $satker->get();
        // $x = $satker->get([], [['pejabat', '=', 'Karosdm']]);
        // $x = $satker->get(['pejabat']);
        // $x = $satker->get(['pejabat, alias, nama_satker']);
        // $x = $satker->get(['nama_satker'], [['pejabat', '=', 'Irwasda']]);
        // $x = $satker->get(['pejabat', 'name'], [['pejabat', '=', 'Irwasda']]);
    
        public function get(array $fields = null, array $conditions = null, string $options = null) {
            $satker = Database::get(SATKER_TABLE, $fields, $conditions, $options);
            $results = null;
            if($satker->count()) {
                if(count($satker->results()) === 1) {
                    if(count($fields) === 1) {
                        $results = $satker->results()[0][$fields[0]];
                    } else {
                        $results =  $satker->results()[0];
                    }
                } else {
                    $results = $satker->results();
                }
            } else {
                $results = false;
            }
            return $results;
        }

        public function get1(string $fields = null, string $conditions = null) {
            $results = $this->satker;
            $field = $this->patch($fields, $conditions)[0];
            $condition = $this->patch($fields, $conditions)[1];
    
            if ( $field === null && $condition === null) {
                d('all null');
                $results = $this->satker;
            }

            if ( $field !== null && $condition === null) {
                $x1 = []; $x2 = [];
                foreach($this->satker as $key => $value) {
                    foreach($field as $item) {
                        array_push($x1, $value[$item]);
                    }
                    array_push($x2, $x1);
                    $x1 = [];
                }
                return $results = $x2;
            }

            if ( $field === null && $condition !== null) {
                $results = [];
                // dd($condition);
                foreach($this->satker as $key => $value) {
                    if($value[$condition[0]] === $condition[2]) {
                        array_push($results, $value[$condition[0]]);
                    }
                }
                return $results;
            }

            if ( $field !== null && $condition !== null) {
                dd($field);
                d($condition);
                $results = $this->satker;
            }
           
            return $results;

        }

        private function patch(string $fields = null, string $conditions = null) {
            $patch = [];

            if ( $fields ) {
                $x = null;
                $sign = ',';
                $field = preg_replace('/\s+/', '', $fields);
                if(strpos($field, $sign)) {
                    $x = explode(',', $field);
                    array_push($patch, $x);
                } else {
                    array_push($patch, [$field]);
                }
            } else {
                array_push($patch, null);
            }

            if ( $conditions ) {
                $conditions = preg_replace('/\s+/', '', $conditions);
                if(strpos($conditions, '&')) {
                    $conditions = explode('&', $conditions);
                    $condition = [];
                    foreach($conditions as $cond) {
                        $sign = '=';
                        $x1 =  explode($sign, $cond);
                        array_splice($x1, 1, 0, $sign);
                        array_push($condition, $x1);
                    }
                    array_splice($condition, 1, 0, '&');
                    array_push($patch, $condition);
                } else {
                    $sign = '=';
                    $conditions = explode($sign, $conditions);
                    array_splice($conditions, 1, 0, $sign);
                    array_push($patch, $conditions);
                }
            } else {
                array_push($patch, null);
            }
            return $patch;
        }

    }

?>