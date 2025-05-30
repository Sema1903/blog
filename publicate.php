<!DOCTYPE html>
<html>
    <head>
        <title>Создание поста</title>
        <meta charset = 'utf-8'>
        <meta name = 'author' content = 'Sema1903'>
        <link rel = 'icon' href = 'images/icon.jpg'>
        <link rel = 'stylesheet' href = 'styles/sign.css'>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&amp;display=swap" rel="stylesheet">
    </head>
    <body>
        <form action = 'backend_post.php' method = 'POST' enctype="multipart/form-data">
            <h1>Создание поста</h1>
            <label to = 'file_input'>Прикрепи файл</label>
            <input type = 'file' name = 'file'><br>
            <label to = 'post_input'>Напиши текст поста</label>
            <textarea id = 'post_input' name = 'post' placeholder = 'Все круто!' rows = '4' cols = '36'></textarea><br>
            <input type = 'submit' id = 'submit_input'>
            <button name = 'back' value = 'true'>На главную</button>
        </form>
    </body>
</html>