(function (app){
    app.Header = {
        draw: function(){
            let header = document.querySelector(".header");
            header.append(document.createTextNode("MyAds.ru"));
        }
    };
})(AdsBoard);