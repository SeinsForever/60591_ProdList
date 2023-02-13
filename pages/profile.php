<?php

$limit = 5;

$resultActivity = $conn->query("SELECT id
    FROM activity WHERE id_persona = ".$_SESSION['id_auth_user']);
$resultTypeOfActivity = $conn->query("SELECT id, id_persona, name, dimension
    FROM TypeOfActivity ORDER BY name");
$imageSrc = $conn->query("SELECT img_src
    FROM Persona WHERE id = ".$_SESSION['id_auth_user']);
?>


<div class="container" style="margin-bottom: 1rem">

    <h1>
        Hello, <?= $_SESSION['login']?>
    </h1>

    <?php
    $imageSrc = $imageSrc->fetch();
    if($imageSrc['img_src'] != null)
    {?>
    <img class="img-thumbnail border-bottom mb-3" width="150" height="150" src="<?= $imageSrc['img_src'] ?>">
    <?php
    }
    else
    {?>
    <p class="border-bottom mb-3">
        No Photo!
    </p>
    <?php
    }?>



    <h3>
        Password change:
    </h3>
    <form role="form" method="post" action="index.php" class="border-bottom">
        <div class="form-group mb-3">
            <label for="password">Old password</label>
            <input type="password" class="form-control w-50" id="oldPassword" name="oldPassword" required placeholder="3-32 characters">
        </div>

        <div class="form-group mb-3">
            <label for="password">New password</label>
            <input type="password" class="form-control w-50" id="newPassword" name="newPassword" required placeholder="3-32 characters">
        </div>

        <button class="btn btn-success mb-3" type="submit">Change</button>
    </form>

    <h3>
        Let's watch on your records:
    </h3>
    <?php
    if($resultActivity->rowCount() > 0)
    {
    ?>
    <ol>
        <?php
        while($rowRecord = $resultTypeOfActivity->fetch())
        {

            $findRecord = $conn->query("SELECT score, date
                        FROM activity WHERE id_persona = ".$_SESSION['id_auth_user']." AND id_TypeOfActivity = ".$rowRecord['id']."  ORDER BY score DESC LIMIT 1");
            if($findRecord->rowCount() == 1)
            {
                ?>
            <li>

                <h3><?= $rowRecord['name'] ?></h3>

                <h4 class="ps-3"> Score:
                <?php
                        $findRecord=$findRecord->fetch();
                        echo($findRecord['score']." | ".$findRecord['date']);
                ?>
                </h4>
            </li>
        <?php
            }
        }
        ?>
    </ol>
    <?php
    }
    else
    {
    ?>
        <h4>No records :( <br>You can add your first activity <a href="../index.php?tasks=1" class="link-primary">here</a></h4>
    <?php
    }
    ?>

</div>