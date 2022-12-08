(function (app){
    app.PageLogin = {
        draw: function(){
            let content         = document.querySelector(".content");
            let text            = create_text();
            let emailField      = create_email_input();
            let email           = create_email_field();
            let registerButton  = create_register_button();
            let passwordField   = create_password_input();
            let password        = create_password_field();
            let enterButton     = create_enter_button();

            content.append(text, emailField, registerButton, email, passwordField, password, enterButton);

            function create_text(){
                let text = document.createElement("div");
                text.append(document.createTextNode("Вход"));
                text.classList.add("formName");
                return text;
            }

            function create_email_input(){
                let emailField = document.createElement("input");
                emailField.classList.add("formInputEmail");
                return emailField;
            }

            function create_email_field(){
                let email = document.createElement("div");
                email.append(document.createTextNode("Email"));
                email.classList.add("formEmail");
                return email;
            }

            function create_register_button(){
                let registerButton = document.createElement("button");
                registerButton.classList.add("registerButton");
                registerButton.addEventListener("click", BackToRegister);
                registerButton.append(document.createTextNode("Зарегистрироваться"));
                return registerButton;
            }

            function create_password_input(){
                let passwordField = document.createElement("input");
                passwordField.classList.add("formInputPassword");
                return passwordField;
            }

            function create_password_field(){
                let password = document.createElement("div");
                password.append(document.createTextNode("Пароль"));
                password.classList.add("formPassword");
                return password;
            }

            function create_enter_button(){
                let enterButton = document.createElement("button");
                enterButton.classList.add("buttonEnter");
                enterButton.addEventListener("click", goToEnter);
                enterButton.append(document.createTextNode("Войти"));
                return enterButton;
            }

            function BackToRegister(){
                document.querySelector(".content").innerHTML = "";
                app.PageRegister.draw();
            }

            function goToEnter(){
                alert("Entry is success");
            }

        }
        
    }
}
)(AdsBoard);