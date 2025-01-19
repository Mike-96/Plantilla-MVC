<?php 

    require '../../model/m_staff.php';

    $MS = new model_staff();
    $consultation = $MS->LIST_STAFF();
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