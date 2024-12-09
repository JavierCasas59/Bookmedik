<?php
class Database {
        private static $db;
        private static $con;

        // Constructor válido
        function __construct(){
        }

        function connect(){
                // Database host
                $host = getenv('DB_HOST');
                // Database user name
                $user = getenv('DB_USER');
                // Database user password
                $pass = getenv('DB_PASSWORD');
                // Database name
                $db = getenv('DB_NAME');

                // check the MySQL connection status
                $con = new mysqli($host, $user, $pass, $db);

                // Check for connection errors
                if ($con->connect_error) {
                    die("Connection failed: " . $con->connect_error);
                }

                // Optionally set sql_mode
                $con->query("SET sql_mode=''");
                
                return $con;
        }

        public static function getCon(){
                if(self::$con === null){
                        self::$db = new self();  // use new self() to call the constructor
                        self::$con = self::$db->connect();
                }
                return self::$con;
        }
}
?>













