<?php
	if($_GET['back'] == 'true'){
		header('Location: index.php');
		exit();
	}
    $con = new SQLite3('database.db');
//    if($con -> prepare('DROP TABLE users') -> execute()){
//        echo 'yes';
//    }
//    if($con -> exec('CREATE TABLE users (id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT, password TEXT, login TEXT, avatar TEXT, type TEXT)')){
//       echo 'yes';
//    }else{
//        echo 'no';
//    }
//    if($con -> exec('CREATE TABLE posts (id INTEGER PRIMARY KEY AUTOINCREMENT, post TEXT, file TEXT, type TEXT)')){
//        echo 'yes';
//    }else{
//        echo 'no';
//    }
//    if($con -> exec('CREATE TABLE messages (id INTEGER PRIMARY KEY AUTOINCREMENT, autor TEXT, message TEXT, file TEXT, type TEXT)')){
//        echo 'yes';
//    }else{
//        echo 'no';
//    }
//    if($_GET['back'] == 'true'){
//        header('Location: index.php');
//        exit();
//    }
    $result = $con -> query('SELECT * FROM users');
    while ($row = $result->fetchArray()){
        if($row['password'] == sha1($_GET['password']) && $row['login'] == sha1($_GET['login'])){
            setcookie('name', $row['name']);
        }
    }
    header('Location: index.php');
    exit();
?>