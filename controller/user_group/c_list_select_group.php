<?php 

    require '../../model/m_user_group.php';

    $MUG = new model_user_group();
    $consultation = $MUG->listSelectGroup();
    if (count($consultation) > 0) {
        // Usuario válido, enviar los datos como JSON
        echo json_encode($consultation);
    } else {
        // Usuario inválido, enviar un mensaje de error como JSON
        echo '{
            "sEcho": 1,
            "iTotalRecords": "0",
            "iTotalDisplayRecords": "0",
            "aaData": []
        }';
    }

?>