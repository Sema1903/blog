<style>
    img{
        width: 10%;
        margin-top: 1%;
        margin-left: 1%;
        margin-bottom: 1%;
    }
    div{
        font-family: 'Montserrat';
        background-color: deepskyblue;
        position: relative;
    }
    h1{
        position: absolute;
        left: 13%;
        top: 21%;
        font-size: 250%;
    }
    h2{
        position: absolute;
        font-size: 200%;
        left: 13%;
        top: 40%;
    }
    form{
        margin-top: 1%;
        padding-left: 1%;
        padding-reight: 1%;
        align-items: center;
        justify-content: center;
        display: flex;
        background-color: deepskyblue;
        position: relative;
    }
    button{
        padding: 2%;
        font-family: 'Montserrat';
        font-size: 125%;
        border: 0px;;
        background-color: deepskyblue;
        transition: 0.5s;
        margin-left: 7.5%;
        margin-right: 7.5%;
        color: black;
    }
    button:hover{
        transition: 0.5s;
        background-color: lightblue;
    }
    #as_div{
        position: absolute;
        top: 90%;
        left: 85%;
    }
    a{
        transition: 0.5s;
    }
    a:hover{
        transition: 0.5s;
        color:blueviolet ;
    }
</style>
<div id = 'head_div'>
    <img src = 'images/icon.jpg', border = '3%'>
    <h1>Блог Sema1903</h1>
    <h2>О себе и о коде</h2>
    <div id = 'as_div'>
        <a href = 'sign.php'>Войти</a> / <a href = 'registration.php'>Зарегистрироваться</a>
    </div>
</div>
<form action = 'navigator.php', method = 'POST'>
    <button id = 'main_button' name = 'action' value = 'index.php'>Главная</button>
    <button name = 'action' value = 'about.php'>О себе</button>
    <button name = 'action' value = 'work.php'>Проекты</button>
    <button id = 'wite_button' name = 'action' value = 'write.php'>Комментарии</button>
</form>