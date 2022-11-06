<?php
    $connection = mysqli_connect("localhost", "root", "", "test");
    if(!$connection){
        die("Связь не установлена:" . mysqli_connect_error());  // проверяем наличия соединения с базой данных
    }

    else {
        $number_res=[];
        $number_res = explode(",", $_REQUEST['number_arr']);    // получаем массив из введенных значений: первое число, второе число, значение операции из строки, запятая - граница элементов
        $number1 = (int)$number_res[0];                         // присваиваем переменной значение первого числа, преобразуем его в целое число 
        $number2 = (int)$number_res[1];                         // присваиваем переменной значение второго числа, преобразуем его в целое число 
        $operation = $number_res[2];                            // присваиваем переменной значение операции

        if($operation == "Сложение"){                           // проверяем значение операции - операции сложения
            $number_result = $number1 + $number2;               // выполняем сложение введенных значений
            mysqli_query($connection, "INSERT INTO `calculating_results`(`first_number`, `second_number`, `operation`, `result`) VALUES ('$number1 ','$number2','$operation','$number_result')");
        }                                                       // заносим в базу данных значения введенных значений, операции, результата
        else if($operation == "Вычитание"){                     // проверяем значение операции - операции вычитания
            $number_result = $number1 - $number2;               // выполняем операцию вычитание
            mysqli_query($connection, "INSERT INTO `calculating_results`(`first_number`, `second_number`, `operation`, `result`) VALUES ('$number1 ','$number2','$operation','$number_result')");
        }                                                       // заносим в базу данных значения введенных значений, операции, результата
        else if($operation == "Умножение"){                     // проверяем значение операции - операции умножения
            $number_result = $number1 * $number2;               // выполняем операцию умножения
            mysqli_query($connection, "INSERT INTO `calculating_results`(`first_number`, `second_number`, `operation`, `result`) VALUES ('$number1 ','$number2','$operation','$number_result')");
        }                                                       // заносим в базу данных значения введенных значений, операции, результата
        else if($operation == "Деление"){                       // проверяем значение операции - операции деления
            $number_result = $number1 / $number2;               // выполняем операцию деления
            mysqli_query($connection, "INSERT INTO `calculating_results`(`first_number`, `second_number`, `operation`, `result`) VALUES ('$number1 ','$number2','$operation','$number_result')");
            }                                                   // заносим в базу данных значения введенных значений, операции, результата

        $query = mysqli_query($connection, "SELECT * FROM calculating_results ORDER BY created DESC LIMIT 7");
        $results = [];                                          // получаем из базы данных занчения последних 7 операций в обратном порядке
        while($row = mysqli_fetch_assoc($query)){
            $results[] = implode(", ", $row);                   // заносим эти значения в массив, разделяем запятой элементы 
        };
        $query_result1 = mysqli_query($connection, "SELECT `result` FROM `calculating_results` ORDER BY created DESC LIMIT 1"); 
        $result1 = $query_result1 -> fetch_assoc();             // получаем и прасваиваем переменной значение в поле "Результат" последней строки в базе данных
        $result2 = $result1["result"];
        $results = [                                            // формируем окончательный массив для вывода: сначала результат последней операции, затем последние 7 строк из базы данных в обратном порядке
            "query_result" => $result2,
            "results1" => [$results]];
            
        echo json_encode($results);                             // отправка данных на клиентскую часть
    }

?>