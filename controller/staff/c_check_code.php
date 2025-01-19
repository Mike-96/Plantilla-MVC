<?php 

    require '../../model/m_staff.php';

    $MS = new model_staff();
    $code = htmlspecialchars($_POST['code'], ENT_QUOTES, 'UTF-8');

    $consultation = $MS->check_code($code);
        echo ($consultation);

?>