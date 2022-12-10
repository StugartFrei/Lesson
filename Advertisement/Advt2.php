<?php
    require_once("Query_users2.php");
    require_once("Users2.php");
    require_once("Query_advt2.php");
    require_once("User_advt2.php");

    $query_users    = new Query_users();
    $users_data     = new Users_data();
    $advt_data      = new Advt_data();
    $query_advt     = new Query_advt();

    $ads_list = [];
    $entered_data = [];
    if($users_data -> method() == "GET"){
        if(isset($_GET["id"])){
            $ads_list = $query_advt -> load_one_advt();
        }
        else {
            $ads_list = $query_advt -> load_from_advt();
        }
    }

    else if($users_data -> method() == "POST"){
        $advt_data_new = $advt_data -> advt_data();
        if(isset($advt_data_new[0], $advt_data_new[1], $advt_data_new[2], $advt_data_new[3])){
            $query_advt -> save_into_advt($advt_data_new[0], $advt_data_new[1], $advt_data_new[2], $advt_data_new[3]);
            echo json_encode(["result" => true, "message" => "Advt is added"]);
            $ads_list = $query_advt -> load_from_advt();
        }
        else{
            echo json_encode(["result" => false, "message" => "Fill all entry fields"]);
        }

    }

    else if($users_data -> method() == "PUT"){
        parse_str(file_get_contents('php://input'), $_PUT);
        if(!empty($_PUT["id"])){
            $advt_id = $_PUT["id"];
            $advt_fields_changed =[];
            $i = 0;
            if(!empty($_PUT["heading"])){
                $advt_fields_changed[$i] = "`heading` = '". $_PUT["heading"] ."'";
                $i = $i + 1;
            }
            if(!empty($_PUT["text"])){
                $advt_fields_changed[$i] = "`text` = '" . $_PUT["text"] ."'";
                $i = $i + 1;
            }
            if(!empty($_PUT["price"])){
                $advt_fields_changed[$i] = "`price` = " . $_PUT["price"] ."";
                $i = $i + 1;
            }
            if(!empty($_PUT["author_id"])){
                $advt_fields_changed[$i] = "`author_id` = " . $_PUT["author_id"] ."";
                $i = $i + 1;
            }
            $advt_fields_changed = implode(', ', $advt_fields_changed);
            echo json_encode(["result" => true, "message" => "Advt is changed"]);
            $query_advt -> update_the_advt($advt_id, $advt_fields_changed);
            $ads_list = $query_advt -> load_from_advt();
        }
        else{
            echo json_encode(["result" => false, "message" => "Failed. Check your entered data"]);  
        }
    }

    else if($users_data -> method() == "DELETE"){
        if(isset($_GET["id"])){
            $query_advt -> delete_advt($_GET["id"]);
            echo json_encode(["result" => true, "message" => "Advt is deleted"]);
            $ads_list = $query_advt -> load_from_advt();
        }
        else {
            echo json_encode(["result" => false, "message" => "Enter Advt's id to delete"]);
        }
    }

echo json_encode($ads_list);

?>