<?php

    $limit = 5;

    $resultTasks = $conn->query("SELECT id, id_persona, id_TypeOfActivity, score, date
    FROM activity WHERE id_persona = ".$_SESSION['id_auth_user']." ORDER BY id DESC");
    $resultTypeOfActivity = $conn->query("SELECT id, id_persona, name, max_score
    FROM TypeOfActivity ORDER BY name");
?>

<div class="container">


    <h3>
        Add new record:
    </h3>
    <form role="form" method="post" action="index.php" class="mb-5 border-bottom">
        <div class="form-group mb-3">
            <select class="form-select" aria-label="Choose!" name="selectTypeOfActivity" required>
                <option selected>Choose type of your activity</option>
                <?php while($rowRecord = $resultTypeOfActivity->fetch()) {?>
                    <option value="<?= $rowRecord['id'] ?>">
                        <?php
                        $resultUser = $conn->query("SELECT name FROM Persona 
                                    WHERE id=".$rowRecord['id_persona']);?>

                        <?= $rowRecord['name'] ?>, max score: <?= $rowRecord['max_score'] ?>, by: <?= $resultUser->fetch()['name']?>
                    </option>
                <?php }; ?>
            </select>
        </div>

        <div class="form-group mb-3">
            <input type="number" min="0" class="form-control" id="newScore" name="newScore" required placeholder="Input score of your activity">
        </div>

        <button class="btn btn-success mb-3" type="submit">Add</button>
    </form>



    <h3>
        Add new type of activity:
    </h3>
    <form role="form" method="post" action="index.php" class="mb-5 border-bottom">
        <div class="form-group mb-3">
            <input type="text" class="form-control" id="newTypeOfActivity" name="newTypeOfActivity" required placeholder="Name of activity">
        </div>

        <div class="form-group mb-3">
            <input type="number" min="0" class="form-control" id="newScoreForNewTypeOfActivity" name="newScoreForNewTypeOfActivity" required placeholder="Input score of your activity">
        </div>

        <button class="btn btn-success mb-3" type="submit">Add</button>
    </form>




    <h3>
        Tasks results:
    </h3>
    <ol>
        <?php while($rowRecord = $resultTasks->fetch()) {?>
            <li class="">
                <?php
                $resultUser = $conn->query("SELECT name FROM Persona 
                                WHERE id=".$rowRecord['id_persona']);
                $resultActivity = $conn->query("SELECT name FROM TypeOfActivity 
                                WHERE id=".$rowRecord['id_TypeOfActivity']);?>
                <h3><?= $resultUser->fetch()['name'] ?></h3>


                <form role="form" method="post" action="index.php">
                    <div class="d-flex flex-row justify-content-between">
                        <h4 class="ps-3"><?= $resultActivity->fetch()['name'] ?> | Score: <?= $rowRecord['score'] ?> | <?= $rowRecord['date'] ?></h4>

                            <div class="form-group mb-3">
                                <input type="hidden" name="idTaskToDelete" value=<?= $rowRecord['id'] ?>>
                            </div>
                            <button class="btn btn-sm ms-3 btn-danger" type="submit">Delete</button>

                    </div>
                </form>

            </li>
        <?php }; ?>
    </ol>


</div>