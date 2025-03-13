<?php 

    require '../../model/model_users.php';

    $MU = new model_user();
    $consultation = $MU->list_ViewStaff();
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