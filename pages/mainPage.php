<div class="container">
    <?php

    //    Сообщение от сервера
    if($_SESSION['warning_message'])
    {
        echo('<div class="container"><button  type="button" class="btn btn-warning mb-4 ml-2 container" disabled>'.$_SESSION['warning_message'].'</button></div>');
    }

    //    Страница профиля
    if($_GET['profile'])
    {
        if(!$_SESSION['id_auth_user'])
        {
            header('Location: index.php?login=1');
        }
        unset($_SESSION['warning_message']);

        require('pages/profile.php');
    }

//    Страница регистрации
    elseif($_GET['register'])
    {
        if($_SESSION['id_auth_user'])
        {
            header('Location: index.php');
        }
        unset($_SESSION['warning_message']);

        require('pages/register_form.php');
    }

//    Страница логина
    elseif($_GET['login'])
    {
        if($_SESSION['id_auth_user'])
        {
            header('Location: index.php');
        }
        unset($_SESSION['warning_message']);

        require('pages/login_form.php');
    }

    elseif($_GET['tasks'])
    {
        if(!$_SESSION['id_auth_user'])
        {
            header('Location: index.php?login=1');
        }
        unset($_SESSION['warning_message']);

        require('pages/tasks_list.php');
    }

    elseif($_GET['activities'])
    {
        require('pages/activities.php');
    }


//    Страница информации о странице
    elseif($_GET['info'])
    {
        require('pages/info.php');
    }

    else
    {
        if($_GET)
        {
            header('Location: index.php');
            die;
        }
        require('pages/home.php');
    }
    ?>
</div>
