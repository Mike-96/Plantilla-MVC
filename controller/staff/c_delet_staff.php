<?php 

    require '../../model/m_staff.php';

    $MS = new model_staff();
    $staff_id = htmlspecialchars($_POST['staff_id'], ENT_QUOTES, 'UTF-8');

    $consultation = $MS->delete_staff($staff_id);
        echo ($consultation);

?>