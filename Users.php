<?php

class Users_data{
    public static function method(){
        $method = $_SERVER["REQUEST_METHOD"];
        return $method;
    }
    public static function entered_data(){
        $id = $_REQUEST['id'];
        $name = $_REQUEST['name'];
        $lastname = $_REQUEST['lastname'];
        $phone_number = $_REQUEST['phone_number'];
        $email = $_REQUEST['email'];
        $entered_data = [$id, $name, $lastname, $phone_number, $email];
        return $entered_data;
    }
}

?>