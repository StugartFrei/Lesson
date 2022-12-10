<?php
    require_once("Query_users2.php");
        
    $query_work = new Query_users();
    
    class Query_advt {

        public static function save_into_advt($heading, $text, $price, $author_id){
            Query_users::query("INSERT INTO `advt`(`heading`, `text`,  `price`, `author_id`) VALUES ('$heading','$text', '$price', '$author_id')");
        }

        public static function load_from_advt(){
            $advt = Query_users::query("SELECT * FROM advt ORDER BY created DESC");
            $users_advt = [];                                          
            while($row = Query_users::fetch($advt)){
                $users_advt[] = implode(", ", $row);                   
            };
            return $users_advt;
        }

        public static function load_one_advt(){
            $entered_id = $_GET["id"];
            $one_query = Query_users::query("SELECT * FROM `advt` WHERE advt.id = $entered_id");
            $one_advt = [];
            $row = Query_users::fetch($one_query); 
            $one_advt = implode(", ", $row);
            return $one_advt;
        }

        public function update_the_advt($id, $advt_fields){    
            Query_users::query("UPDATE `advt` SET $advt_fields WHERE `id` = '$id'");
        }

        public function delete_advt($id){
            Query_users::query("DELETE FROM `advt` WHERE `id`='$id'");
        }

    }   

?>