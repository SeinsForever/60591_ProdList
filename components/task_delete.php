<?php
if($_POST['idTaskToDelete'])
{

    $conn->query("DELETE FROM activity WHERE id = ".$_POST['idTaskToDelete']);

    $_SESSION['warning_message'] = 'Successfully delete the activity!';
    header('Location: index.php?tasks=1');
}