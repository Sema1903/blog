<!DOCTYPE html>
<html>
    <head>
        <title>Вход в систему</title>
        <meta charset = 'utf-8'>
        <meta name = 'author' content = 'Sema1903'>
        <link rel = 'icon' href = 'images/icon.jpg'>
        <link rel = 'stylesheet' href = 'styles/sign.css'>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&amp;display=swap" rel="stylesheet">
    </head>
    <body>
        <form action = 'backend_sign.php' method = 'GET'>
            <h1>Вход</h1>
            <label to = 'password_input'>Введи пароль</label>
            <input type = 'password' name = 'password' id = 'password_input' placeholder = 'it_is_the_password'><br>
            <label to = 'login_input'>Введи логин</label>
            <input name = 'login' id = 'login_input' placeholder = 'and_it_is_the_login'><br>
            <input type = 'submit' id = 'submit_input'>
            <button name = 'back' value = 'true'>На главную</button>
        </form>
    </body>
</html>