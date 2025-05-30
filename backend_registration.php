<?php
    if($_GET['back'] == 'true'){
        header('Location: index.php');
        exit();
    }
    $here = false;
    $con = new SQLite3('database.db');
    $records = $con -> query('SELECT * FROM users');
    while ($row = $records->fetchArray()){
        if($row['password'] == sha1($_GET['password']) || $row['login'] == sha1($_GET['login'] || $row['name'] == $_GET['name'])){
            $here = true;
            header('Location: registration.php');
            exit();
        }
    }
    if($here == false){
		$file = $_FILES['file'];
		$type = $file['type'];
		$fileData = file_get_contents($file["tmp_name"]);
        $dop = $con -> prepare('INSERT INTO users (name, password, login, avatar) VALUES (:name, :password, :login, :avatar)');
        $dop -> bindValue(':name', $_GET['name'], SQLITE3_TEXT);
        $dop -> bindValue(':password', sha1($_GET['password']), SQLITE3_TEXT);
        $dop -> bindValue(':login', sha1($_GET['login']), SQLITE3_TEXT);
        $dop -> bindValue(':avatar', $fileData, SQLITE3_BLOB);
        $dop -> execute();
        $con -> close();
        setcookie('name', $_GET['name']);
        header('Location: index.php');
        exit();
    }
?>