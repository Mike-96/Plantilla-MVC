<?php
    require '../../model/m_user_group.php';

    $MUG = new model_user_group();
    $id = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');

    $consultation = $MUG->delete_group($id);

    // Devolvemos la respuesta en formato JSON
    header('Content-Type: application/json');
    echo $consultation;

?>