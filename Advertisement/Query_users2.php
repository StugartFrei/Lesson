<?php

class Query_users {

    private static $connection;

    public function __construct(){
        Query_users::connect();
    }

    public static function connect(){
        if(empty(self::$connection)){
            self::$connection = mysqli_connect("localhost", "root", "", "advertisement");
            if(!self::$connection){
                die("Связь не установлена:" . mysqli_connect_error());
            }
        }
        
    }

    public static function save_into_query($name, $lastname, $phone_number, $email){
        self::query("INSERT INTO `author`(`name`, `lastname`, `phone_number`, `email`) VALUES ('$name','$lastname','$phone_number','$email')");
    }

    public static function load_from_query(){
        $query = self::query("SELECT * FROM author ORDER BY created DESC");
        $users = [];                                          
        while($row = self::fetch($query)){
            $users[] = implode(", ", $row);                   
        };
        return $users;
    }

    public static function load_one_user(){
        $entered_id = $_GET["id"];
        $one_query = self::query("SELECT * FROM `author` WHERE author.id = $entered_id");
        $one_user = [];
        $row = self::fetch($one_query); 
        $one_user = implode(", ", $row);
        return $one_user;
    }

     public function update_the_query($id, $query_fields){    
        self::query("UPDATE `author` SET $query_fields WHERE `id` = '$id';");
    }

    public function delete_from_query($id){
        self::query("DELETE FROM `author` WHERE `id`='$id'");
    }

    private static function query($sqlString){
        return mysqli_query(self::$connection, $sqlString);
    }

    public static function fetch($query){
        return mysqli_fetch_assoc($query);

    }

}

?>