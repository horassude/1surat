<?php

    namespace Core;
    use Core\View;

    class Router
    {

        private function __construct()
        {
            $this->routeToControl($this->path());
        }


        public static function uri()
        {
            return $_SERVER['REQUEST_URI'];
        }
        

        public static function route($path = null) {
            return new Router($path);
        }


        private function routeToControl($path) {
            
            $uri = self::uri();
            
            $foundX = strpos($uri, '?');
            
            if(!array_key_exists($uri, $path)) {
                if(!$foundX) {
                    self::abort();
                } else {
                    $old_key = substr($uri, 0, $foundX);
                    $old_path = $path[$old_key];
                    unset($path[$old_key]);
                    $path[$uri] = $old_path;
                    
                    require_once BASE_DIR . $path[$uri];
                    exit();
                }
            } 
            // dd($uri);
            require_once BASE_DIR . $path[$uri];
            
        }


        private function abort($code = 404) {
            http_response_code($code);
            view('errors/' . $code . '.php');
            die();
        }


        private function path() {

            return  $path = [
                '/' => 'controllers/index.php',
                // '/' => 'research/pdf/generate.php',
                // '/' => 'research/qr_code/index.php',
                // '/' => 'research/dependency/index.php',
                // '/' => 'controllers/research/email/index.php',
                // '/' => 'research/rest-api/pizza/index.php',
                // '/' => 'research/rest-api/movie/index.php',
        
                '/surat' => 'controllers/surat/index.php',
                
                '/register' => 'controllers/register/index.php',
                '/register/create' => 'controllers/register/create.php',
                '/register/update' => 'controllers/register/update.php',
                '/register/delete' => 'controllers/register/delete.php',
        
                '/surat/keluar' => 'controllers/surat/keluar/index.php',
                
                '/preview' => 'controllers/preview/index.php',
        
                '/disposisi' => 'controllers/disposisi/index.php',
                '/disposisi/update' => 'controllers/disposisi/update.php',
                '/disposisi/create' => 'controllers/disposisi/create.php',
                '/disposisi/preview' => 'controllers/disposisi/preview.php',
            
                '/surat/notadinas' => 'controllers/surat/notadinas/index.php',
                '/surat/notadinas/create' => 'controllers/surat/notadinas/create.php',
                '/surat/notadinas/save' => 'controllers/surat/notadinas/save.php',
                '/surat/notadinas/preview' => 'controllers/surat/notadinas/preview.php',
                '/surat/notadinas/update' => 'controllers/surat/notadinas/update.php',
        
                '/user/login' => 'controllers/user/login.php',
                '/user/logout' => 'controllers/user/logout.php',
                '/user/update' => 'controllers/user/update.php',
                '/user/signup' => 'controllers/user/signup.php',
                '/user/activate' => 'controllers/user/activate.php',
        
                '/contact' => 'views/contact.view.php',
                '/about' => 'resources/views/about.view.php'
            ];
        }

    }