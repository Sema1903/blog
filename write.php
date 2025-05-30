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
        <form id = 'form' action = 'backend_message.php' method = 'POST'>
            <h3>Обратная связь</h3>
            <?php 
                if(!isset($_COOKIE['name'])){
                    echo '<p>Для начала Вам нужно войти или зарегистрироваться</p>';
                }else{
					echo '
					<label to = "file_input">Можешь прикрепить файл</label>
                    <input type = "file" name = "file"><br>
                    <label to = "text_input">Напиши текст</label>
					<textarea id = "text_input" rows = "4" cols = "46" placeholder = "Sema1903, ты классный!" name = "message"></textarea><br>
					<input id = "submits" type = "submit">';
                }
            ?>
        </form>
		<?php
			$con = new SQLite3('database.db');
			$result = [];
            $records = $con -> query('SELECT * FROM messages');
            while ($row = $records->fetchArray(SQLITE3_ASSOC)) {
				array_push($result, $row);
            }
			for($i = count($result) - 1; $i >= 0; $i--){
				$avatar = '';
				$records = $con -> query('SELECT * FROM users');
				while($row = $records->fetchArray(SQLITE3_ASSOC)){
					if($row['name'] == $result[$i]['name']){
						$avatar = $row['avatar'];
					}
				}
				echo '<div id = "message">';
				if($avatar == ''){
					echo '<img id = "avatar" src = "images/unknown.png">';
				}else{
					echo '<img id = "avatar" src = "data:' . $result[$i]['type'] . ';base64,' . base64_encode($result[$i]['file']) . '">';
				}
				echo '<p>' . $result[$i]['message'] . '</p>';
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