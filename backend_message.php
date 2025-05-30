<?php
	$con = new SQLite3('database.db');
    $file = $_FILES['file'];
    $type = $file['type'];
	echo $type;
//    $fileData = file_get_contents($file["tmp_name"]);
//    $dop = $con -> prepare('INSERT INTO messages (autor, message, file, type) VALUES (:autor, :message, :file, :type)');
//    $dop -> bindValue(':name', $_COOKIE['name'], SQLITE3_TEXT);
//    $dop -> bindValue(':file', $fileData, SQLITE3_BLOB);
//    $dop -> bindValue(':type', $type, SQLITE3_TEXT);
//	  $dop -> bindValue(':message', $_POST['message'], SQLITE3_TEXT);
//    $dop -> execute();
//    $con -> close();
//    header('Location: index.php');
//    exit();
?>