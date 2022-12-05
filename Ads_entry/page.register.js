(function (app){
    app.PageRegister = {
        draw: function(){
            let content = document.querySelector(".content");

            let text_register = document.createElement("div");
            text_register.append(document.createTextNode("Регистрация"));
            text_register.classList.add("formName");

            let emailField_register = document.createElement("input");
            emailField_register.classList.add("formInputEmail");

            let email_register = document.createElement("div");
            email_register.append(document.createTextNode("Email"));
            email_register.classList.add("formEmail");

            let phoneField_register = document.createElement("input");
            phoneField_register.classList.add("formInputPhone");

            let phone_register = document.createElement("div");
            phone_register.append(document.createTextNode("Телефон"));
            phone_register.classList.add("formPhone");

            let passwordField_register = document.createElement("input");
            passwordField_register.classList.add("formInputPassword");

            let password_register = document.createElement("div");
            password_register.append(document.createTextNode("Пароль"));
            password_register.classList.add("formPassword");

            let passwordField_confirm = document.createElement("input");
            passwordField_confirm.classList.add("formInputPassword");

            let password_confirm = document.createElement("div");
            password_confirm.append(document.createTextNode("Подтверждение пароля"));
            password_confirm.classList.add("formPassword");

            let registerButton_register = document.createElement("button");
            registerButton_register.classList.add("registerButton");
            registerButton_register.addEventListener("click", goToRegister);
            registerButton_register.append(document.createTextNode("Зарегистрироваться"));

            let enterButton_register = document.createElement("button");
            enterButton_register.classList.add("buttonEnter");
            enterButton_register.addEventListener("click", BackToEntry);
            enterButton_register.append(document.createTextNode("Войти"));

            
            content.append(text_register, emailField_register, email_register, 
                            phoneField_register,phone_register, passwordField_register, 
                            password_register, passwordField_confirm, password_confirm, 
                            registerButton_register, enterButton_register);

            document.querySelector(".formName").style.marginTop = "200px";
            document.querySelector(".formName").style.marginLeft = "410px";

            function BackToEntry(){
                document.querySelector(".content").innerHTML = "";
                app.PageLogin.draw();
            }

            function goToRegister(){
                alert("Registration is success");
            }    
            
        }
    }
}
)(AdsBoard);