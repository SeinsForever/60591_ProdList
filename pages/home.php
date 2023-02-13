<div>
    <div class="mb-3 border-bottom">
        <h1>
            Hello,
            <?php
            if($_SESSION['login'])
            {
                echo($_SESSION['username']."!");
            }
            else
            {
                echo('user! Login to start');
            }
            ?>
        </h1>
        <p>
            Welcome in ToDo list of your productivity!
        </p>
    </div>



<?php
$resultRecord = $conn->query("SELECT * FROM activity ORDER BY id DESC LIMIT 10;");
?>

        <div class="container">
            <h3>
                Last 10 results of all users:
            </h3>
                <?php while($rowRecord = $resultRecord->fetch()) {
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




                <?php }; ?>
        </div>
</div>