<?php require 'app/views/header.php'?>

<h3>
    List of all activities:
</h3>
<ol>
    <?php foreach($data['activities'] as $rowRecord)  {
//
//        $resultUser = $conn->query("SELECT name FROM Persona
//                                WHERE id=" . $rowRecord['id_persona']);
//        $resulActivity = $conn->query("SELECT COUNT(*) AS 'count' FROM activity
//                                WHERE id_TypeOfActivity=" . $rowRecord['id']); ?>
        <li>
            <a class="btn btn-link btn-lg " href="../index.php?activities=1&details=<?= $rowRecord->id ?>" role="button"><?= $rowRecord->name ?></a>
            <h5 class="mx-3">by  | measured in  | done  time(s)</h5>
        </li>
    <?php }; ?>
</ol>

<?php require 'app/views/footer.php'?>