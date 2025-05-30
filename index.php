<!DOCTYPE html>
<html>
    <head>
        <title>Блог Sema1903</title>
        <meta charset = 'utf-8'>
        <meta name = 'author' content = 'Sema1903'>
        <link rel = 'icon' href = 'images/icon.jpg'>
        <link rel = 'stylesheet' href = 'styles/style.css'>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&amp;display=swap" rel="stylesheet">
    </head>
    <body>
        <?php
            require 'header.php';
        ?>
        <?php
            if(isset($_COOKIE['name'])){
                echo '<h3>Добрый день, mr. '. $_COOKIE['name'] . '</h3>';
                if($_COOKIE['name'] == 'Sema1903'){
                    echo '
                    <form action = "navigator.php" method = "POST" id = "other_form">
                        <button name = "action" value = "publicate.php">Создать пост</button>
                    </form>';
                }
            }else{
                echo '<h3>Mr. Noname, чтобы продолжить Вам необходимо войти или зарегистрироваться</h3>';
            }
        ?>
        <?php
            $con = new SQLite3('database.db');
            $result = [];
            $records = $con -> query('SELECT * FROM posts');
            while ($row = $records->fetchArray(SQLITE3_ASSOC)) {
				array_push($result, $row);
            }
            for($i = count($result) - 1; $i >= 0; $i--){
                echo '
                <div id = "publication_div">
                    <img src = "images/icon.jpg" id = "avatar">
                    <p>' . $result[$i]['post'].  '</p>';
                if(in_array($result[$i]['type'], ['audio/wav', 'audio/midi', 'audio/mp3', 'audio/wma', 'audio/mpeg'])){
                    echo '<audio image = "image" src ="data:' . $result[$i]['type'] .  ';base64,' . base64_encode($result[$i]['file']) . '"controls loop muted>';
                }else if(in_array($result[$i]['type'], ['image/gif', 'image/bmp', 'image/jpg', 'image/jpeg', 'image/tif'])){
                    echo '<img id = "image" src ="data:' . $result[$i]['type'] . ';base64,' . base64_encode($result[$i]['file']) . '">';
                }else if(in_array($result[$i]['type'], ['video/mp4', 'video/avi', 'video/quicktime'])){
                    echo '<video id = "image" src = "data:' . $result[$i]['type'] . ';base64,' . base64_encode($result[$i]['file']) . '" controls autoplay loop muted>';
                }else{
                    echo '<a href = "data:' . $result[$i]['type'] . ';base64,' . base64_encode($result[$i]['file']) . '" download>Скачать файл</a>';
                }
                echo '<br></div>';
            }
        ?>
    </body>
</html>