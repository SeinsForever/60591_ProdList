<?php

if($_POST['oldPassword'])
{
    if(strlen($_POST['newPassword']) < 3 || strlen($_POST['newPassword']) > 32)
    {
        $_SESSION['warning_message'] = 'Too long or too short new password';
        header('Location: ../task.php?profile=1');
        exit();
    }

    $result = $conn->query("SELECT * FROM Persona WHERE id='".$_SESSION['id_auth_user']."'");
    $row = $result->fetch();

    if($row['password'] == md5($_POST['oldPassword']))
    {
        $conn->query("UPDATE Persona SET 
                       password = '".md5($_POST['newPassword'])."'
                       WHERE id = ".$_SESSION['id_auth_user']);

        $_SESSION['warning_message'] = 'Password has been successfully changed';
        header('Location: ../task.php?profile=1');
    }
    else
    {
        $_SESSION['warning_message'] = 'Wrong old password';
        header('Location: ../task.php?profile=1');
    }
}