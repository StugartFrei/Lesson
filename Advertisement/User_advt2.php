<?php

class Advt_data{
    public static function advt_data(){
        $heading = $_REQUEST['heading'];
        $text = $_REQUEST['text'];
        $price = $_REQUEST['price'];
        $author_id = $_REQUEST['author_id'];
        $advt_data = [$heading, $text, $price, $author_id];
        return $advt_data;
    }
}

?>