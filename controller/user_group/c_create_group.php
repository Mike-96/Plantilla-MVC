<?php 

    require '../../model/m_user_group.php';

    $MUG = new model_user_group();
    $groupName = strtoupper(htmlspecialchars($_POST['groupName'], ENT_QUOTES, 'UTF-8'));
    $slug = strtolower(htmlspecialchars($_POST['slug'], ENT_QUOTES, 'UTF-8'));
    $status = htmlspecialchars($_POST['status'], ENT_QUOTES, 'UTF-8');

    $consultation = $MUG->create_group($groupName, $slug, $status);
        echo ($consultation);

?>