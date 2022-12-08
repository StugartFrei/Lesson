(function (app){
    app.PageRegister = {
        draw: function(){
            let content                 = document.querySelector(".content");
            let text_register           = create_text_register();
            let emailField_register     = create_emailField_register();
            let email_register          = create_email_register();
            let phoneField_register     = create_phoneField_register();
            let phone_register          = create_phone_register();
            let passwordField_register  = create_passwordField_register();
            let password_register       = create_password_register();
            let passwordField_confirm   = create_passwordField_confirm();
            let password_confirm        = create_password_confirm();
            let registerButton_register = create_registerButton_register();
            let enterButton_register    = create_enterButton_register();

            
            content.append(text_register, emailField_register, email_register, 
                            phoneField_register,phone_register, passwordField_register, 
                            password_register, passwordField_confirm, password_confirm, 
                            registerButton_register, enterButton_register);

            document.querySelector(".formName").style.marginTop = "200px";
            document.querySelector(".formName").style.marginLeft = "410px";

            function create_text_register(){
                let text_register = document.createElement("div");
                text_register.append(document.createTextNode("Регистрация"));
                text_register.classList.add("formName");
                return text_register;
            }

            function create_emailField_register(){
                let emailField_register = document.createElement("input");
                emailField_register.classList.add("formInputEmail");
                return emailField_register;
            }

            function create_email_register(){
                let email_register = document.createElement("div");
                email_register.append(document.createTextNode("Email"));
                email_register.classList.add("formEmail");
                return email_register;
            }

            function create_phoneField_register(){
                let phoneField_register = document.createElement("input");
                phoneField_register.classList.add("formInputPhone");
                return phoneField_register;
            }

            function create_phone_register(){
                let phone_register = document.createElement("div");
                phone_register.append(document.createTextNode("Телефон"));
                phone_register.classList.add("formPhone");
                return phone_register;
            }

            function create_passwordField_register(){
                let passwordField_register = document.createElement("input");
                passwordField_register.classList.add("formInputPassword");
                return passwordField_register;
            }

            function create_password_register(){
                let password_register = document.createElement("div");
                password_register.append(document.createTextNode("Пароль"));
                password_register.classList.add("formPassword");
                return password_register;
            }

            function create_passwordField_confirm(){
                let passwordField_confirm = document.createElement("input");
                passwordField_confirm.classList.add("formInputPassword");
                return passwordField_confirm;
            }

            function create_password_confirm(){
                let password_confirm = document.createElement("div");
                password_confirm.append(document.createTextNode("Подтверждение пароля"));
                password_confirm.classList.add("formPassword");
                return password_confirm;
            }

            function create_registerButton_register(){
                let registerButton_register = document.createElement("button");
                registerButton_register.classList.add("registerButton");
                registerButton_register.addEventListener("click", goToRegister);
                registerButton_register.append(document.createTextNode("Зарегистрироваться"));
                return registerButton_register;
            }

            function create_enterButton_register(){
                let enterButton_register = document.createElement("button");
                enterButton_register.classList.add("buttonEnter");
                enterButton_register.addEventListener("click", BackToEntry);
                enterButton_register.append(document.createTextNode("Войти"));
                return enterButton_register;
            }

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