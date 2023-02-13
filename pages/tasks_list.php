<?php

    $resultTasks = $conn->query("SELECT *
    FROM activity WHERE id_persona = ".$_SESSION['id_auth_user']." ORDER BY id DESC LIMIT 5");
    $resultTypeOfActivity = $conn->query("SELECT id, id_persona, name, dimension
    FROM TypeOfActivity ORDER BY name");
?>

<div class="container">


    <h3>
        Add new record:
    </h3>
    <form role="form" method="post" action="index.php" class="mb-5 border-bottom">
        <div class="form-group mb-3">
            <select class="form-select" aria-label="Choose!" name="selectTypeOfActivity" required>
                <?php while($rowRecord = $resultTypeOfActivity->fetch()) {?>
                    <option value="<?= $rowRecord['id'] ?>">
                        <?php
                        $resultUser = $conn->query("SELECT name FROM Persona 
                                    WHERE id=".$rowRecord['id_persona']);?>

                        <?= $rowRecord['name'] ?>, <?= $dimensions[$rowRecord['dimension']] ?>, by: <?= $resultUser->fetch()['name']?>
                    </option>
                <?php }; ?>
            </select>
        </div>

        <div class="form-group mb-3 d-flex flex-row justify-content-between">
            <input type="number" min="0" class="form-control" id="newScore" name="newScore" required placeholder="Input score of your activity">
        </div>

        <div class="form-group mb-3 d-flex flex-row justify-content-between">
            <input type="text" maxlength="1000" class="form-control" id="newComment" name="newComment" placeholder="Input comment (optional), max length 1000">
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
            <select class="form-select" aria-label="Choose!" name="selectTheDimensionOfActivity" required>
                <option value="0">
                    reps
                </option>
                <option value="1">
                    Kg
                </option>
                <option value="2">
                    g
                </option>
                <option value="3">
                    m
                </option>
                <option value="4">
                    Km
                </option>
                <option value="5">
                    hh
                </option>
                <option value="6">
                    mm
                </option>
                <option value="7">
                    ss
                </option>
                <option value="8">
                    DD
                </option>
                <option value="9">
                    MM
                </option>
                <option value="10">
                    YY
                </option>
            </select>
        </div>

        <button class="btn btn-success mb-3" type="submit">Add</button>
    </form>




    <h3>
        Last 5 your tasks results:
    </h3>
    <ol>
        <?php while($rowRecord = $resultTasks->fetch()) {?>
            <li class="">
                <?php
                $resultUser = $conn->query("SELECT name FROM Persona 
                                WHERE id=".$rowRecord['id_persona']);
                $resultActivity = $conn->query("SELECT name, dimension FROM TypeOfActivity 
                                WHERE id=".$rowRecord['id_TypeOfActivity']);
                $resultActivity = $resultActivity->fetch();?>



                <form role="form" method="post" action="index.php">

                        <div class="card border-dark mb-3" >
                            <div class="d-flex flex-row justify-content-between">
                                <div class="card-header"><small class="text-muted"><em><?= $rowRecord['date'] ?></em></small></div>
                                <button class="btn btn-sm ms-3 h-75 btn-danger" type="submit">Delete</button>
                            </div>
                            <div class="card-body text-dark">
                                    <h4 class="card-title"><?= $rowRecord['score'] ?><small><small><?= $dimensions[$resultActivity['dimension']] ?></small></small> <?= $resultActivity['name'] ?></h4>

                                <?php if($rowRecord['comment']) { ?>
                                    <p class="card-text"><?= $rowRecord['comment'] ?></p>
                                <?php } ?>
                            </div>

                    </div>
                </form>

            </li>
        <?php }; ?>
    </ol>


</div>