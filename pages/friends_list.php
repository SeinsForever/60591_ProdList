<?php

$limit = 5;

$resultRecord = $conn->query("SELECT name, birthday
    FROM Persona");
?>

<section class="form">
    <div class="container">
        <h3>
            Tasks result:<br><br>
        </h3>
        <ol style="padding-inline-start: 1rem;">
            <?php while($rowRecord = $resultRecord->fetch()) {?>
                <li>
                    <h3><?= $rowRecord['name'] ?></h3>
<!--                    <h4>Birthday: --><?//= $rowRecord['birthday'] ?><!--</h4>-->
                </li>
            <?php }; ?>
        </ol>
    </div>
</section>