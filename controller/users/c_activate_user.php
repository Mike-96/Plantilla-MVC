<?php 

require '../../model/model_users.php';

$MU = new model_user();
    $userID = htmlspecialchars($_POST['userID'], ENT_QUOTES, 'UTF-8');
    $status = htmlspecialchars($_POST['status'], ENT_QUOTES, 'UTF-8');

    $consultation = $MU->activate_user($userID, $status);
        echo ($consultation);

?>