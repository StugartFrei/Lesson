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

function show() {
    let number1_input = document.querySelector(".number1_input");
    let number1 = number1_input.value;

    let number2_input = document.querySelector(".number2_input");
    let number2 = number2_input.value;

    let operation_value = document.querySelector(".operation_value");
    let operation = operation_value.value;
    
   if (number1!=="" && number2!=="" && operation!==""){
        if(operation == "Сложение"){
            let operation_result = addition(+number1,+number2);
            let number_result = document.querySelector(".result");
            number_result.innerHTML = operation_result;
            let element_window = document.querySelector(".window");
            element_window.classList.remove("hidden");
            }
        else if(operation == "Вычитание") {
            let operation_result = subtraction(+number1,+number2);
            let number_result = document.querySelector(".result");
            number_result.innerHTML = operation_result;
            let element_window = document.querySelector(".window");
            element_window.classList.remove("hidden");
        }
        else if(operation == "Умножение") {
            let operation_result = multiplication(+number1,+number2);
            let number_result = document.querySelector(".result");
            number_result.innerHTML = operation_result;
            let element_window = document.querySelector(".window");
            element_window.classList.remove("hidden");
         }
         else if(operation == "Деление") {
            if (number2 == 0) {
                let element_window = document.querySelector(".window_error");
                element_window.classList.remove("hidden");
            }
            else {
                let operation_result = division(+number1,+number2);
                let number_result = document.querySelector(".result");
                number_result.innerHTML = operation_result;
                let element_window = document.querySelector(".window");
                element_window.classList.remove("hidden");
            }
         }

         }
         else {
            let element_window = document.querySelector(".window_error");
            element_window.classList.remove("hidden");
     }
}
 
function hide() {
    let element_window = document.querySelector(".window");
    element_window.classList.add("hidden");
    }

function hide_error() {
    let element_window = document.querySelector(".window_error");
    element_window.classList.add("hidden");
    }
