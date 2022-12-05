(function (app){
    app.PageLogin = {
        draw: function(){
            let content = document.querySelector(".content");

            let text = document.createElement("div");
            text.append(document.createTextNode("Вход"));
            text.classList.add("formName");

            let emailField = document.createElement("input");
            emailField.classList.add("formInputEmail");

            let email = document.createElement("div");
            email.append(document.createTextNode("Email"));
            email.classList.add("formEmail");

            let registerButton = document.createElement("button");
            registerButton.classList.add("registerButton");
            registerButton.addEventListener("click", BackToRegister);
            registerButton.append(document.createTextNode("Зарегистрироваться"));

            let passwordField = document.createElement("input");
            passwordField.classList.add("formInputPassword");

            let password = document.createElement("div");
            password.append(document.createTextNode("Пароль"));
            password.classList.add("formPassword");

            let enterButton = document.createElement("button");
            enterButton.classList.add("buttonEnter");
            enterButton.addEventListener("click", goToEnter);
            enterButton.append(document.createTextNode("Войти"));

            content.append(text, emailField, registerButton, email, passwordField, password, enterButton);

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