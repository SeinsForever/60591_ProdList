<?php

$newLogin = strtolower($_POST['newLogin']);

if(strlen($newLogin) < 3 || strlen($newLogin) > 32)
{
    $_SESSION['warning_message'] = 'Too long or too short login';
    header('Location: ../index.php?register=1');
    exit();
}

if(strlen($_POST['name']) > 32)
{
    $_SESSION['warning_message'] = 'Too long name';
    header('Location: ../index.php?register=1');
    exit();
}

if(strlen($_POST['password']) < 3 || strlen($_POST['password']) > 32)
{
    $_SESSION['warning_message'] = 'Too long or too short password';
    header('Location: ../index.php?register=1');
    exit();
}

//Проверка на оригинальность логина
$result = $conn->query("SELECT * FROM Persona WHERE login='".$newLogin."'");
$row = $result->fetch();
if(!empty($row))
{
    $_SESSION['warning_message'] = 'This login is already taken';
    header('Location: ../index.php?register=1');
    exit();
}



if($_FILES && $_FILES["img_url"]["error"] == UPLOAD_ERR_OK)
{
    $img_url = "img/file".rand(100000, 999999).$_FILES["img_url"]["name"];
    move_uploaded_file($_FILES["img_url"]["tmp_name"], $img_url);

    //Создание новой записи о пользователе в БД
    $conn->query("INSERT INTO Persona (login, password, name, img_src) 
                        VALUES('".$newLogin."', 
                        '".md5($_POST['password'])."',
                        '".($_POST['name'])."',
                        '".$img_url."')");
}
else
{
    //Создание новой записи о пользователе в БД без фотографии
    $conn->query("INSERT INTO Persona (login, password, name) 
                        VALUES('".$newLogin."', 
                        '".md5($_POST['password'])."',
                        '".($_POST['name'])."')");
}




$result = $conn->query("SELECT * FROM Persona 
                                    WHERE login='".$newLogin."'");
$row = $result->fetch();
$_SESSION['username'] = $row['name'];
$_SESSION['id_auth_user'] = $row['id'];
$_SESSION['login'] = $row['login'];


$_SESSION['warning_message'] = 'You has been successfully registered!';
header('Location: index.php');