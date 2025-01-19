<?php 

    require '../../model/m_user_group.php';

    $MUG = new model_user_group();
    $id = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');
    $groupName = strtoupper(htmlspecialchars($_POST['groupName'], ENT_QUOTES, 'UTF-8'));
    $slug = strtolower(htmlspecialchars($_POST['slug'], ENT_QUOTES, 'UTF-8'));

    $consultation = $MUG->update_group($id, $groupName, $slug);
        echo ($consultation);

?>