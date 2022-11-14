<?php
    session_start();
        
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
            $expression = "Первое число = " . $number1_input . "; " . "Второе число = " . $number2_input . "; " . "Операция = " . $operation_value . "; " . "Результат = " . $number_result;
            $_SESSION["expression"] = $expression; 
            mysqli_query($connection, "INSERT INTO `calculating_results`(`first_number`, `second_number`, `operation`, `result`) VALUES ('$number1_input','$number2_input','$operation_value','$number_result')");
        }
        else if($operation_value == "Вычитание"){
            $number1_input = (int)$_REQUEST['number1_input'];
            $number2_input = (int)$_REQUEST['number2_input'];
            $number_result = (int)$number1_input - (int)$number2_input;
            $expression = "Первое число = " . $number1_input . "; " . "Второе число = " . $number2_input . "; " . "Операция = " . $operation_value . "; " . "Результат = " . $number_result;
            $_SESSION["expression"] = $expression; 
            mysqli_query($connection, "INSERT INTO `calculating_results`(`first_number`, `second_number`, `operation`, `result`) VALUES ('$number1_input','$number2_input','$operation_value','$number_result')");
        }
        else if($operation_value == "Умножение"){
            $number1_input = (int)$_REQUEST['number1_input'];
            $number2_input = (int)$_REQUEST['number2_input'];
            $number_result = (int)$number1_input * (int)$number2_input;
            $expression = "Первое число = " . $number1_input . "; " . "Второе число = " . $number2_input . "; " . "Операция = " . $operation_value . "; " . "Результат = " . $number_result;
            $_SESSION["expression"] = $expression; 
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
                    $expression = "Первое число = " . $number1_input . "; " . "Второе число = " . $number2_input . "; " . "Операция = " . $operation_value . "; " . "Результат = " . $number_result;
                    $_SESSION["expression"] = $expression;  
                    mysqli_query($connection, "INSERT INTO `calculating_results`(`first_number`, `second_number`, `operation`, `result`) VALUES ('$number1_input','$number2_input','$operation_value','$number_result')");
                  
                }
        }
              
    }
 
    $query = mysqli_query($connection, "SELECT * FROM calculating_results ORDER BY created DESC LIMIT 7");
    $results = [];
    while($row = mysqli_fetch_assoc($query)){
        $results[] = $row;
    }

?>
<html>
    <head>

    </head>

    <body>
        <form method="POST">
            <div>    
                <p>Первое число:</p>
                <input type="number" name = "number1_input" />
            </div> 
            <div>
                <p>Второе число:</p>
                <input type="number" name = "number2_input" />
            </div>
            <div>
                <br><select type="text" name = "operation_value">
                    <option>Сложение</option>
                    <option>Вычитание</option>
                    <option>Умножение</option>
                    <option>Деление</option>
                </select>
            </div>                
            <div>
                <br><input type="submit" name = "button_result" value = "Вычислить"/>
            </div>

        </form>

        <?php if(isset ($error)) { ?>
            <div>
                <span>
                    <?php 
                        echo "<pre>";
                        print_r($error);
                        echo "</pre>";
                    ?>    
                </span>
            </div>
        <?php } ?>

        <?php if(isset($number_result)) { ?>
            <div>
                <span>Результат:</span>
                <span>
                    <?php 
                        echo "<pre>";
                        print_r($number_result);
                        echo "</pre>";
                    ?>    
                </span>
            </div>
         <?php } ?>

         <?php foreach($results as $result) {?>
            <div>
                <span>[<?php echo $result["id"]?>] </span>
                <?php echo $result["result"]?>
            </div> 
        <?php }?>
    </body>

</html>   