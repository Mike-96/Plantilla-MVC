<?php
header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Iniciar buffering de salida para capturar cualquier error o mensaje inesperado
ob_start();

// upload.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['file'])) {
        $errors = [];

        // Definir las extensiones permitidas
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
        $file_name  = $_FILES['file']['name'];
        $file_size  = $_FILES['file']['size'];
        $file_tmp   = $_FILES['file']['tmp_name'];
        $file_ext   = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        // Validar extensión
        if (!in_array($file_ext, $allowed_extensions)) {
            $errors[] = "Solo se permiten imágenes (jpg, jpeg, png, gif)";
        }

        // Validar tamaño (por ejemplo, máximo 2MB)
        if ($file_size > 2097152) {
            $errors[] = "El archivo no puede pesar más de 2MB";
        }

        if (empty($errors)) {
            // Crear un nombre único para evitar colisiones
            $new_name = uniqid("profile_", true) . "." . $file_ext;
            $destination = "../uploads/profile_images/" . $new_name;

            // Crear la carpeta si no existe
            if (!is_dir("../uploads/profile_images/")) {
                mkdir("../uploads/profile_images/", 0755, true);
            }

            if (is_writable("../uploads/profile_images/")) {
                if (move_uploaded_file($file_tmp, $destination)) {
                    $response = ["status" => "success", "file_path" => $destination];
                } else {
                    $response = ["status" => "error", "message" => "Error al mover el archivo"];
                }
            } else {
                $response = ["status" => "error", "message" => "No se tienen permisos de escritura en la carpeta de destino."];
            }
        } else {
            $response = ["status" => "error", "message" => implode(", ", $errors)];
        }
    } else {
        $response = ["status" => "error", "message" => "No se recibió ningún archivo"];
    }
} else {
    $response = ["status" => "error", "message" => "Método no permitido"];
}

// Capturar cualquier salida inesperada
$output = ob_get_clean();
if (!empty($output)) {
    $response['output'] = $output;
}

echo json_encode($response);
?>
