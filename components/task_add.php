<?php

if($_POST['newScore'])
{
    $resultTypeOfActivity = $conn->query("SELECT id, max_score
                    FROM TypeOfActivity WHERE id ='".$_POST['selectTypeOfActivity']."'");

    if($_POST['newScore'] > $resultTypeOfActivity->fetch()['max_score'])
    {
        $_SESSION['warning_message'] = 'Too big score! Please try again.';
        header('Location: index.php?tasks=1');
        exit();
    }

    $conn->query("INSERT INTO activity (id_persona, id_TypeOfActivity, date, score)
                        VALUES('".$_SESSION['id_auth_user']."',
                        '".$_POST['selectTypeOfActivity']."',
                        '".date('Y-m-d H:i:s', time())."',
                        '".$_POST['newScore']."')");
    $_SESSION['warning_message'] = 'Successfully added new record!';
    header('Location: index.php?tasks=1');
}

elseif($_POST['newTypeOfActivity'])
{
    $resultTypeOfActivity = $conn->query("SELECT id
                    FROM TypeOfActivity WHERE name ='".$_POST['newTypeOfActivity']."'");

    if($resultTypeOfActivity->rowCount() > 0)
    {
        $_SESSION['warning_message'] = 'This type of activity has already been added!';
        header('Location: index.php?tasks=1');
        exit();
    }

    $conn->query("INSERT INTO TypeOfActivity (id_persona, name, max_score)
                        VALUES('".$_SESSION['id_auth_user']."',
                        '".$_POST['newTypeOfActivity']."',
                        '".$_POST['newScoreForNewTypeOfActivity']."')");
    $_SESSION['warning_message'] = 'Successfully added new type of activity!';
    header('Location: index.php?tasks=1');
}

