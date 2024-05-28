<?php

    namespace Core;

    class Environment {

        private $directory;

        public function __construct($dir)
        {
            $this->directory = $dir;
            
            $this->define($this->getFileInDirectory());

        }


        private function getFileInDirectory() {

            $files = scandir(BASE_DIR . $this->directory);
            unset($files[0]);
            unset($files[1]);
            return $files;
        }

        
        public function define($environments = array()) {
        
            foreach($environments as $file) {

                $file = file(BASE_DIR . $this->directory . $file);
                
                foreach($file as $key => $value) {
                   
                    $parts = explode("=", $value);

                    #remove empty string
                    $parts = array_filter($parts, function($value) {
                        return trim($value) !== '';
                    });
                    
                    #Remove empty arrays
                    if(count($parts) > 0) {
                        
                        $const = trim($parts[0]);
                        if($const[0] !== '#') {
                            $val = trim($parts[1]);
                            define($const, $val);
                        }
                    }
                }
            }
        }
    }