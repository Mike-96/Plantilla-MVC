<?php
// delete_image.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['file_path'])) {
        $file_path = $_POST['file_path'];
        if (file_exists($file_path)) {
            if (unlink($file_path)) {
                echo json_encode(["status" => "success", "message" => "Imagen eliminada"]);
            } else {
                echo json_encode(["status" => "error", "message" => "Error al eliminar la imagen"]);
            }
        } else {
            echo json_encode(["status" => "error", "message" => "El archivo no existe"]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "No se recibió la ruta del archivo"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Método no permitido"]);
}

?>