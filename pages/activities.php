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
                        $resultActivity = $conn->query("SELECT name, dimension FROM TypeOfActivity 
                                WHERE id=".$rowRecord['id_TypeOfActivity']);
                        $resultActivity = $resultActivity->fetch();?>

                        <div class="card border-dark mb-3" >
                            <div class="card-header"><?= $resultUser->fetch()['name'] ?>, <small class="text-muted"><em><?= $rowRecord['date'] ?></em></small></div>
                            <div class="card-body text-dark">
                                <h4 class="card-title"><?= $rowRecord['score'] ?><small><small><?= $dimensions[$resultActivity['dimension']] ?></small></small> <?= $resultActivity['name'] ?></h4>
                                <?php if($rowRecord['comment']) { ?>
                                    <p class="card-text"><?= $rowRecord['comment'] ?></p>
                                <?php } ?>
                            </div>
                        </div>
                    </li>
                <?php }; ?>
            </ol>
<?php
}
?>