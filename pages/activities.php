<?php



if(!$_GET['details'])
{
    $resultRecord = $conn->query("SELECT id, name, id_persona, dimension
            FROM TypeOfActivity");

?>

    <h3>
        List of all activities:
    </h3>
    <ol>
        <?php while($rowRecord = $resultRecord->fetch()) {

                $resultUser = $conn->query("SELECT name FROM Persona 
                                WHERE id=" . $rowRecord['id_persona']);
                $resulActivity = $conn->query("SELECT COUNT(*) AS 'count' FROM activity
                                WHERE id_TypeOfActivity=" . $rowRecord['id']); ?>
            <li>
                <a class="btn btn-link btn-lg " href="../index.php?activities=1&details=<?= $rowRecord['id'] ?>" role="button"><?= $rowRecord['name'] ?></a>
                <h5 class="mx-3">by <?= $resultUser->fetch()['name'] ?> | measured in <?= $dimensions[$rowRecord['dimension']]?> | done <?= $resulActivity->fetch()['count']?> time(s)</h5>
            </li>
        <?php }; ?>
    </ol>

<?php
}
else
{
    $resultRecord = $conn->query("SELECT * FROM TypeOfActivity WHERE id=".$_GET['details']);
    $resultRecord = $resultRecord->fetch();

    $resultActivities = $conn->query("SELECT * FROM activity WHERE id_TypeOfActivity=".$_GET['details']." ORDER BY id DESC;");
?>
    <a class="btn btn-link btn-sm my-2" href="../index.php?activities=1" role="button">←List of activities</a>
    <h3>
        Users result for <?= $resultRecord['name'] ?>:
    </h3>
            <ol>
                <?php while($rowRecord = $resultActivities->fetch()) {?>
                    <li>
                        <?php
                        $resultUser = $conn->query("SELECT name FROM Persona 
                                        WHERE id=".$rowRecord['id_persona']);
                        $resultActivity = $conn->query("SELECT name FROM TypeOfActivity 
                                        WHERE id=".$rowRecord['id_TypeOfActivity']);?>
                        <h3><?= $resultUser->fetch()['name'] ?></h3>
                        <h4 class="ps-3"><?= $resultActivity->fetch()['name'] ?> | Score: <?= $rowRecord['score'] ?> | <?= $rowRecord['date'] ?></h4>

                    </li>
                <?php }; ?>
            </ol>
<?php
}
?>