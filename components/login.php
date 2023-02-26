<?php

$result = $conn->query("SELECT * FROM Persona WHERE login='".strtolower($_POST['login'])."'");

if($row = $result->fetch())
{
    if(md5($_POST['password']) == $row['password'])
    {
        //загрузка данных пользователя
        $_SESSION['username'] = $row['name'];
        $_SESSION['id_auth_user'] = $row['id'];
        $_SESSION['login'] = $row['login'];

        header('Location: task.php');
    }
    else
    {
        $_SESSION['warning_message'] = 'Wrong password';
        header('Location: ../task.php?login=1');
    }
}
else
{
    $_SESSION['warning_message'] = 'Wrong login';
    header('Location: ../task.php?login=1');
}

