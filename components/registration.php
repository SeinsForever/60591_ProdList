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



if (($file = fopen($_FILES['img_url']['tmp_name'], 'r+')) && $_FILES["img_url"]["error"] == UPLOAD_ERR_OK)
{
    $ext = explode('.', $_FILES["filename"]["name"]);
    $ext = $ext[count($ext) - 1];
    $filename = 'file' . rand(100000, 999999) . '.' . $ext;

    $resource = Container::getFileUploader()->store($file, $filename);
    $picture_url = $resource['ObjectURL'];
}
else
{
    $picture_url = '/img/profile.jpg';
}

try
{
    //Создание новой записи о пользователе в БД
    $sql = 'INSERT INTO Persona (login, password, name, img_src) VALUES(:login, :password, :name, :img_url)';
    $stat = $conn->prepare($sql);
    $stat->bindValue(':login', $newLogin);
    $stat->bindValue(':password', md5($_POST['password']));
    $stat->bindValue(':name', $_POST['name']);
    $stat->bindValue(':img_url', $picture_url);
    $stat->execute();


//            $conn->query("INSERT INTO Persona (login, password, name, img_src)
//                        VALUES('".$newLogin."',
//                        '".md5($_POST['password'])."',
//                        '".($_POST['name'])."',
//                        '".$img_url."')");

}
catch (PDOException $error)
{
    $_SESSION['warning_message'] = 'ERROR! Code: ' . $error->getMessage();
    header('Location: index.php');
    exit();
}




$result = $conn->query("SELECT * FROM Persona 
                                    WHERE login='".$newLogin."'");
$row = $result->fetch();
$_SESSION['username'] = $row['name'];
$_SESSION['id_auth_user'] = $row['id'];
$_SESSION['login'] = $row['login'];


$_SESSION['warning_message'] = 'You has been successfully registered!';
header('Location: index.php');