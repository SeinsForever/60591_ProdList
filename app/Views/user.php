
<?php require 'app/views/header.php'?>

<h1>Сведения о пользователе:</h1>
<ul>
    <?php foreach ($data['users'] as $user): ?>
        <li>
            <?=$user->id?>
            <?=$user->login?>
            <?=$user->name?>
        </li>
    <?php endforeach; ?>

</ul>

<?php require 'app/views/footer.php'?>