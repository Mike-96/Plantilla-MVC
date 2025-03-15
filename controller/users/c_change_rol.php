<?php 

require '../../model/model_users.php';

$MU = new model_user();
    $userID = htmlspecialchars($_POST['userID'], ENT_QUOTES, 'UTF-8');
    $rol = htmlspecialchars($_POST['rol'], ENT_QUOTES, 'UTF-8');

    $consultation = $MU->update_rol($userID, $rol);
        echo ($consultation);

?>