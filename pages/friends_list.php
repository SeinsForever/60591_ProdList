<?php
$resultRecord = $conn->query("SELECT name, birthday
    FROM Persona");
?>

    <h3>
        List of your friends:
    </h3>
    <ol>
        <?php while($rowRecord = $resultRecord->fetch()) {?>
            <li>
                <h3><?= $rowRecord['name'] ?></h3>
            </li>
        <?php }; ?>
    </ol>