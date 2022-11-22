<?php

require_once("Query_users.php");
require_once("Users.php");

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
    $query_work -> save_into_query($entered_data[1], $entered_data[2], $entered_data[3], $entered_data[4]);
    $users = Query_users::load_from_query();
}
else if($users_data -> method() == "PUT"){
    //$entered_data = $users_data -> entered_data();
    $query_work -> update_the_query();
    //$query_work -> update_the_query($entered_data[0], $entered_data[1], $entered_data[2], $entered_data[3], $entered_data[4]); 
    $users = Query_users::load_from_query();
}
else if($users_data -> method() == "DELETE"){
    //$entered_data = $users_data -> entered_data();
    $query_work -> delete_from_query(42);
    //$query_work -> delete_from_query($entered_data[0]);
    $users = Query_users::load_from_query();
}
echo "<pre>";
print_r($users);
echo "</pre>";    


?>

<html>

    <head>

    </head>

    <body>

        <form method="POST">
            <div>
                <p>Номер пользователя:</p>
                <input type="number" name = "id" />
            </div>
            <div>    
                <p>Имя:</p>
                <input type="text" name = "name" />
            </div> 
            <div>
                <p>Фамилия:</p>
                <input type="text" name = "lastname" />
            </div>
            <div>
                <p>Номер телефона:</p>
                <input type="number" name = "phone_number" />
            </div>
            <div>
                <p>Email:</p>
                <input type="text" name = "email" />
            </div>
         
            <div>
                <br><input type="submit" name = "run" value = "Выполнить"/>
            </div>
        </form>

    </body>

</html>



