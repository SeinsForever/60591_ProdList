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

    <section class="form">
        <div class="container">
            <h3>
                Last 10 results of all users:
            </h3>
            <ol>
                <?php while($rowRecord = $resultRecord->fetch()) {?>
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
        </div>
    </section>
</div>