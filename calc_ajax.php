<?php
    $connection = mysqli_connect("localhost", "root", "", "test");
    if(!$connection){
        die("Связь не установлена:" . mysqli_connect_error());
    }

    else {
        $number_res=[];
        $number_res = explode(",", $_REQUEST['number_arr']);
        $number1 = (int)$number_res[0];
        $number2 = (int)$number_res[1];
        $operation = $number_res[2];

        if($operation == "Сложение"){
            $number_result = $number1 + $number2;
            mysqli_query($connection, "INSERT INTO `calculating_results`(`first_number`, `second_number`, `operation`, `result`) VALUES ('$number1 ','$number2','$operation','$number_result')");
        } 
        else if($operation == "Вычитание"){
            $number_result = $number1 - $number2;
            mysqli_query($connection, "INSERT INTO `calculating_results`(`first_number`, `second_number`, `operation`, `result`) VALUES ('$number1 ','$number2','$operation','$number_result')");
        }
        else if($operation == "Умножение"){
            $number_result = $number1 * $number2;
        }
        else if($operation == "Деление"){
            $number_result = $number1 / $number2;
            mysqli_query($connection, "INSERT INTO `calculating_results`(`first_number`, `second_number`, `operation`, `result`) VALUES ('$number1 ','$number2','$operation','$number_result')");
            }

        $query = mysqli_query($connection, "SELECT * FROM calculating_results ORDER BY created DESC LIMIT 7");
        $results = [];
        while($row = mysqli_fetch_assoc($query)){
            $results[] = implode(", ", $row);
        }

        $results = ["results" => [$results]];
            
        echo json_encode($results);
    }



/*
    $connection = mysqli_connect("localhost", "root", "", "test");
    if(!$connection){
        die("Связь не установлена:" . mysqli_connect_error());
    }

    if(!empty($_REQUEST['button_result']) && empty($_REQUEST['number1_input']) 
    && empty($_REQUEST['number2_input'])){
    $error = "Введите числа";
    }
    else

    if(isset($_REQUEST['number1_input'], $_REQUEST['number2_input'])){
        $operation_value = $_REQUEST['operation_value'];
        if($operation_value == "Сложение"){
            $number1_input = (int)$_REQUEST['number1_input'];
            $number2_input = (int)$_REQUEST['number2_input'];
            $number_result = $number1_input + $number2_input;
            mysqli_query($connection, "INSERT INTO `calculating_results`(`first_number`, `second_number`, `operation`, `result`) VALUES ('$number1_input','$number2_input','$operation_value','$number_result')");
        }
        else if($operation_value == "Вычитание"){
            $number1_input = (int)$_REQUEST['number1_input'];
            $number2_input = (int)$_REQUEST['number2_input'];
            $number_result = (int)$number1_input - (int)$number2_input;
            mysqli_query($connection, "INSERT INTO `calculating_results`(`first_number`, `second_number`, `operation`, `result`) VALUES ('$number1_input','$number2_input','$operation_value','$number_result')");
        }
        else if($operation_value == "Умножение"){
            $number1_input = (int)$_REQUEST['number1_input'];
            $number2_input = (int)$_REQUEST['number2_input'];
            $number_result = (int)$number1_input * (int)$number2_input;
            mysqli_query($connection, "INSERT INTO `calculating_results`(`first_number`, `second_number`, `operation`, `result`) VALUES ('$number1_input','$number2_input','$operation_value','$number_result')");
        }
        else if($operation_value == "Деление"){
                if($_REQUEST['number2_input']==0){
                    $error = "Ошибка ввода";
                }
                else {
                    $number1_input = (int)$_REQUEST['number1_input'];
                    $number2_input = (int)$_REQUEST['number2_input'];
                    $number_result = $number1_input / $number2_input; 
                    mysqli_query($connection, "INSERT INTO `calculating_results`(`first_number`, `second_number`, `operation`, `result`) VALUES ('$number1_input','$number2_input','$operation_value','$number_result')");
                  
                }
        }
              
    }
 
    $query = mysqli_query($connection, "SELECT * FROM calculating_results ORDER BY created DESC LIMIT 7");
    $results = [];
    while($row = mysqli_fetch_assoc($query)){
        $results[] = $row;

*/

?>