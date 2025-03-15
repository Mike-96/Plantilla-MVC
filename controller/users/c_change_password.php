<?php 

    require __DIR__ . "/../../model/model_users.php";

    $MU = new model_user();
    $userID = htmlspecialchars($_POST['userID'], ENT_QUOTES, 'UTF-8');
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT,['cost'=>10]);
    $rawPassword = htmlspecialchars($_POST['rawPassword'], ENT_QUOTES, 'UTF-8');

    $consultation = $MU->update_password($userID,$password, $rawPassword);
        echo ($consultation);

?>