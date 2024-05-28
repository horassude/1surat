<?php

    namespace Core;
    use PDO;
    use PDOException;
    use Core\Environment;
    use Core\Patch;


    class Database
    {
        private static $instance = null,
                       $pdo = null,
                       $errors,
                       $count;
        
        public static $results = null;

        public function __construct($username = DB_USERNAME, $password = DB_PASSWORD)
        {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE . ";charset=" . DB_CHARSET;

            try {
                self::$pdo = new PDO($dsn, $username, $password, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                view('errors/401.php', ['error' => $e->getMessage()]);
            }
        }

        private static function init()
        {
            if (!isset(self::$instance)) {
                self::$instance = new Database();
            }
            return self::$instance;
        }

        public static function query($sql, array $params = null)
        {
            $stmt = self::init();
            $stmt = self::$pdo->prepare($sql);
            $x = 1;
            if (!empty($params)) {
                foreach ($params as $key => $value) {
                    $stmt->bindValue($x, $value);
                    $x++;
                }
            }
            try {
                $stmt->execute();
                if ($stmt->rowCount()) {
                    self::$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    self::$count = $stmt->rowCount();
                } else {
                    self::$count = 0;
                }
            } catch (PDOException $e) {
                view('errors/401.php', ['error' => $e->getMessage()]);
                die();
            }
            return new self();
        }

        public static function insert($table, $inputs) 
        {
            Patch::insert($table, $inputs);
            return self::query(Patch::$sql, Patch::$values)->count();
        }

        public static function update($table, array $fields, array $condition) {
            // d(1);
            // self::init();
            Patch::update($table, $fields, $condition);
            return self::query(Patch::$sql, Patch::$values)->count();
        }

        public static function delete($table, $condition)
        {    
            return Database::query("DELETE FROM $table WHERE $condition[0] $condition[1] $condition[2]");
        }

        public static function get($table, array $fields = null, array $conditions = null, string $options = null)
        {
            Patch::get($table, $fields, $conditions, $options);
            return self::query(Patch::$sql, Patch::$values);
        }

        public static function results()
        {
            return self::$results;
        }

        public static function found()
        {
            return self::count() ? true : false;
        }

        public static function count()
        {
            return self::$count;
        }

        public function errors()
        {
            return $this->errors;
        }

    }