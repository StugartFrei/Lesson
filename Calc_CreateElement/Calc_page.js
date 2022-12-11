(function (app){
    app.PageCalc = {
        draw: function(){

            let content             = document.querySelector(".content");
            let firstNumberText     = create_firstNumberText();
            let firstNumberField    = create_firstNumberInput();
            let secondNumberText    = create_secondNumberText();
            let secondNumberField   = create_secondNumberInput();
            let operationText       = create_OperationText();
            let operation_list      = create_list();
            let resultButton        = create_result_button();
            let resultText          = create_resultText();
                                    
            content.append(firstNumberText, firstNumberField, secondNumberText, 
            secondNumberField, operationText, operation_list, resultButton, resultText); 

            function create_firstNumberText(){
                let firstNumberText = document.createElement("div");
                firstNumberText.append(document.createTextNode("Введите первое число:"));
                firstNumberText.classList.add("firstNumberText");
                return firstNumberText;
            }

            function create_firstNumberInput(){
                let firstNumberField = document.createElement("input");
                firstNumberField.classList.add("formInputFirstNumber");
                firstNumberField.id= 'FirstNumber';
                return firstNumberField;
            }

            function create_secondNumberText(){
                let secondNumberText = document.createElement("div");
                secondNumberText.append(document.createTextNode("Введите второе число:"));
                secondNumberText.classList.add("secondNumberText");
                return secondNumberText;
            }

            function create_secondNumberInput(){
                let secondNumberField = document.createElement("input");
                secondNumberField.classList.add("formInputSecondNumber");
                secondNumberField.id = 'SecondNumber';
                return secondNumberField;
            }

            function create_OperationText(){
                let operationText = document.createElement("div");
                operationText.append(document.createTextNode("Выберите операцию:"));
                operationText.classList.add("OperationText");
                return operationText;
            }

            function create_list(){
                let operation_list = document.createElement("select");
                operation_list.classList.add("operation_val");
                operation_list.id = 'operation_value';
                let operations = ["Сложение", "Вычитание", "Умножение", "Деление"];
                for(let key in operations){
                    let operation_val = operations[key];
                    let option = document.createElement("option");
                    option.textContent = operation_val;
                    operation_list.appendChild(option);
                }
                return operation_list;
            }

            function create_result_button(){
                let resultButton = document.createElement("button");
                resultButton.classList.add("resultButton");
                resultButton.addEventListener("click", Calcucating);
                resultButton.append(document.createTextNode("Результат"));
                return resultButton;
            }

            function create_resultText(){
                let resultText = document.createElement("div");
                resultText.append(document.createTextNode("Результат:"));
                resultText.classList.add("resultText");
                return resultText;
            }

            function Calcucating(){
                if(document.querySelector(".result")){
                    let resultDiv = document.querySelector(".result");
                    resultDiv.remove();
                }
                app.ResultShow.draw();                            
            }
            
        }
    }
})(Calc_dynemic);