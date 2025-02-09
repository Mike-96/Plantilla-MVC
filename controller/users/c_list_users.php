<?php 

require '../../model/model_users.php';

$MU = new model_user();
try {
    $response = $MU->list_user();
    
    if (count($response) > 0) {
        // Usuario válido, enviar los datos como JSON
        echo json_encode($response);
    } else {
        // Usuario inválido, enviar un mensaje de error como JSON
        echo json_encode([
            "sEcho" => 1,
            "iTotalRecords" => 0,
            "iTotalDisplayRecords" => 0,
            "aaData" => []
        ]);
    }
} catch (Exception $e) {
    // Manejar la excepción y enviar un mensaje de error como JSON
    echo json_encode([
        "error" => $e->getMessage()
    ]);
}

?>
