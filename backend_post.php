<?php
	if($_POST['back'] == 'true'){
		header('Location: index.php');
		exit();
	}
    $con = new SQLite3('database.db');
    $file = $_FILES['file'];
    $type = $file['type'];
    $fileData = file_get_contents($file["tmp_name"]);
//	echo '<img src = "data:image/'. $type . ';base64,' . base64_encode(file_get_contents($file['tmp_name'])) . '">';
    $dop = $con -> prepare('INSERT INTO posts (post, file, type) VALUES (:post, :file, :type)');
    $dop -> bindValue(':post', $_POST['post'], SQLITE3_TEXT);
    $dop -> bindValue(':file', $fileData, SQLITE3_BLOB);
    $dop -> bindValue(':type', $type, SQLITE3_TEXT);
    $dop -> execute();
    $con -> close();
    header('Location: index.php');
    exit();
?>