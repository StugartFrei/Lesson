<?php

    if(!empty($_REQUEST['button_result']) && empty($_REQUEST['number1_input']) 
    && empty($_REQUEST['number2_input'])){
    $error = "Введите числа";
    }
    else

<<<<<<< HEAD
    if(isset($_REQUEST['number1_input'], $_REQUEST['number2_input'])){
        $operation_value = $_REQUEST['operation_value'];
        $number1_input = $_REQUEST['number1_input'];
        $number2_input = $_REQUEST['number2_input'];
        if($operation_value == "Сложение"){
            $number_result = (int)$number1_input + (int)$number2_input;
        }
        else if($operation_value == "Вычитание"){
            $number_result = (int)$number1_input - (int)$number2_input;   
        }
        else if($operation_value == "Умножение"){
            $number_result = (int)$number1_input * (int)$number2_input;   
=======
    if(isset($_REQUEST['number1_input']) && isset($_REQUEST['number2_input'])){
        $operation_value = $_REQUEST['operation_value'];
        if($operation_value == "Сложение"){
            $number1_input = $_REQUEST['number1_input'];
            $number2_input = $_REQUEST['number2_input'];
            $number_result = $number1_input + $number2_input;
        }
        else if($operation_value == "Вычитание"){
            $number1_input = $_REQUEST['number1_input'];
            $number2_input = $_REQUEST['number2_input'];
            $number_result = $number1_input - $number2_input;    
        }
        else if($operation_value == "Умножение"){
            $number1_input = $_REQUEST['number1_input'];
            $number2_input = $_REQUEST['number2_input'];
            $number_result = $number1_input * $number2_input;    
>>>>>>> fbf7d7dbcd51c51255dea6a01b5f63513681fd35
        }
        else if($operation_value == "Деление"){
                if($_REQUEST['number2_input']==0){
                    $error = "Ошибка ввода";
                }
                else {
<<<<<<< HEAD
                    $number_result = (int)$number1_input / (int)$number2_input; 
=======
                    $number1_input = $_REQUEST['number1_input'];
                    $number2_input = $_REQUEST['number2_input'];
                    $number_result = $number1_input / $number2_input;  
>>>>>>> fbf7d7dbcd51c51255dea6a01b5f63513681fd35
                }
        }

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

<<<<<<< HEAD
        <?php if(isset ($error)) { ?>
=======
        <?php if(!empty ($error)) { ?>
>>>>>>> fbf7d7dbcd51c51255dea6a01b5f63513681fd35
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
<<<<<<< HEAD
         <?php } ?>
=======
        <?php } ?>

>>>>>>> fbf7d7dbcd51c51255dea6a01b5f63513681fd35
    </body>

</html>   