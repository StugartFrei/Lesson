<?php
    require_once("Query_work.php");
    require_once("Calculating.php");

        $query_work = new Query_work();
        $calculating = new Calculating();
        
        $number_res=[];
        $number_res = explode(",", $_REQUEST['number_arr']); 
        $number1 = (int)$number_res[0];
        $number2 = (int)$number_res[1];
        $operation = $number_res[2];     

        if($operation == "Сложение"){
            $number_result = $calculating -> adding($number1, $number2);
            Query_work::save_into_query($number1, $number2, $operation, $number_result);   
        }
        else if($operation == "Вычитание"){
            $number_result = $calculating -> subtract($number1, $number2);
            Query_work::save_into_query($number1, $number2, $operation, $number_result);    
        }
        else if($operation == "Умножение"){                     
            $number_result = $calculating -> multiplic($number1, $number2);              
            Query_work::save_into_query($number1, $number2, $operation, $number_result);
        } 
        else if($operation == "Деление"){                       
            $number_result = $calculating -> division($number1, $number2);              
            Query_work::save_into_query($number1, $number2, $operation, $number_result);  
        }                                                     

    $results = Query_work::load_from_query();

    $query_result1 = Query_work::load_result_from_query();

    $result1 = Query_work::fetch($query_result1);

    $result2 = $result1["result"];

    $results = [                                            
        "query_result" => $result2,
        "results1" => [$results]];
            
    echo json_encode($results);                             
    
?>