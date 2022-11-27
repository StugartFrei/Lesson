<?php

require_once("Query_users2.php");
require_once("Users2.php");

$query_work = new Query_users();
$users_data = new Users_data();

$users = [];
$entered_data = [];
if($users_data -> method() == "GET"){
    if(isset($_GET["id"])){
        $users = Query_users::load_one_user();
    }
    else {
        $users = Query_users::load_from_query();
    }
}

else if($users_data -> method() == "POST"){
    $entered_data = $users_data -> entered_data();
    if(isset($entered_data[0], $entered_data[1], $entered_data[2], $entered_data[3])){
        $query_work -> save_into_query($entered_data[0], $entered_data[1], $entered_data[2], $entered_data[3]);
        echo json_encode(["result" => true, "message" => "User is added"]);
        $users = Query_users::load_from_query();
    }
    else{
        echo json_encode(["result" => false, "message" => "Fill all entry fields"]);
    }
}
else if($users_data -> method() == "PUT"){
    parse_str(file_get_contents('php://input'), $_PUT);
    if(!empty($_PUT["id"]) && !empty($_PUT["name"]) && !empty($_PUT["lastname"] && !empty($_PUT["phone_number"]) && !empty($_PUT["email"]))){
        $query_work -> update_the_query($_PUT["id"], $_PUT["name"], $_PUT["lastname"], $_PUT["phone_number"], $_PUT["email"]); 
        echo json_encode(["result" => true, "message" => "User is changed"]);
        $users = Query_users::load_from_query();
    }
    else{
        echo json_encode(["result" => false, "message" => "Failed. Check your entered data"]);  
    }
}
else if($users_data -> method() == "DELETE"){
    if(isset($_GET["id"])){
        $query_work -> delete_from_query($_GET["id"]);
        echo json_encode(["result" => true, "message" => "User is deleted"]);
        $users = Query_users::load_from_query();
    }
    else {
        echo json_encode(["result" => false, "message" => "Enter User's id to delete"]);
    }
}

echo json_encode($users);

?>  