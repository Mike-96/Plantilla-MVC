<?php 

    require '../../model/m_user_group.php';

    $MUG = new model_user_group();
    $id = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');
    $status = htmlspecialchars($_POST['status'], ENT_QUOTES, 'UTF-8');

    $consultation = $MUG->update_status_group($id, $status);
        echo ($consultation);

?>