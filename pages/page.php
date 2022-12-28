<!--Для использования данных в JS-->
<div class="data-php" data-language="<?= $_SESSION['language'] ?>"
     data-idUser="<?= $_SESSION['id_auth_user']; ?>"></div>

<body class="container">

    <?php
    require('header.php');
    require('mainPage.php');
    require('footer.php');
    ?>

</body>
