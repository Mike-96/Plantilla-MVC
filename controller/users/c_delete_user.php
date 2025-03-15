<?php 

require '../../model/model_users.php';

$MU = new model_user();
    $userID = htmlspecialchars($_POST['userID'], ENT_QUOTES, 'UTF-8');

    $consultation = $MU->delete_user($userID);
        echo ($consultation);

?>