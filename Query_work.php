<?php
class Query_work{
        
        private static $connection;

        public function __construct(){
            Query_work::connect();
        }

        public static function connect(){
            if(empty(self::$connection)){
                self::$connection = mysqli_connect("localhost", "root", "", "test");
                if(!self::$connection){
                    die("Связь не установлена:" . mysqli_connect_error());
                }
            }
            
        }

        public static function save_into_query($number1, $number2, $operation, $number_result){
            self::query("INSERT INTO `calculating_results`(`first_number`, `second_number`, `operation`, `result`) VALUES ('$number1 ','$number2','$operation','$number_result')");
        }
    
        public static function load_from_query(){
            $query = self::query("SELECT * FROM calculating_results ORDER BY created DESC LIMIT 7");
            $results = [];                                          
            while($row = self::fetch($query)){
                $results[] = implode(", ", $row);                   
            };
            return $results;
        }
    
        public static function load_result_from_query(){
            $query_result1 = self::query("SELECT `result` FROM `calculating_results` ORDER BY created DESC LIMIT 1"); 
            return $query_result1;
        }

        private static function query($sqlString){
            return mysqli_query(self::$connection, $sqlString);
        }

        public static function fetch($query){
            return mysqli_fetch_assoc($query);

        }
    }
?>