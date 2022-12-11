(function (app){
    app.ResultShow = {
        draw: function(){
            
            let result  = calc_result();
            let content = document.querySelector(".content");

            content.append(result); 

            function calc_result(){
                let result = document.createElement("div");
                result.id = "result";
                result.classList.add("result");

                function addition(a,b) {
                    let c = a + b;
                    return c;
                    }

                function subtraction(a,b) {
                    let c = a - b;
                    return c;
                }

                function multiplication(a,b) {
                    let c = a*b;
                    return c;
                }  

                function division(a,b) {
                    let c = a/b;
                    return c;
                }
                
                let number1_input = document.querySelector("#FirstNumber");
                let number1 = number1_input.value;

                let number2_input = document.querySelector("#SecondNumber");
                let number2 = number2_input.value;

                let operation_value = document.querySelector("#operation_value");
                let operation = operation_value.value;
    
                if (number1!=="" && number2!==""){
                    if(operation == "Сложение"){
                        let operation_result = addition(+number1,+number2);
                        result.append(document.createTextNode(operation_result));
                    }
                    else if(operation == "Вычитание") {
                        let operation_result = subtraction(+number1,+number2);
                        result.append(document.createTextNode(operation_result));
                    }
                    else if(operation == "Умножение") {
                        let operation_result = multiplication(+number1,+number2);
                        result.append(document.createTextNode(operation_result));
                    }
                    else if(operation == "Деление") {
                        if (number2 == 0) {
                            result.append(document.createTextNode("Ошибка ввода"));
                        }
                        else {
                            let operation_result = division(+number1,+number2);
                            result.append(document.createTextNode(operation_result));
                        }
                    }
                }
                else {
                    result.append(document.createTextNode("Введите числа"));
                }

                return result;
            }
            
        }
    }
})(Calc_dynemic);