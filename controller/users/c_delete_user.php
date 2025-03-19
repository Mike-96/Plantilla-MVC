<?php 
require '../../model/model_users.php';
session_start(); // Para obtener el ID de sesión

$MU = new model_user();
$userID = htmlspecialchars($_POST['userID'], ENT_QUOTES, 'UTF-8');

$currentUserID = $_SESSION['SESSION_ID']; // ID del usuario logueado

// Prevenir la eliminación del propio usuario
if ($userID == $currentUserID) {
    echo json_encode(['status' => 'self-deletion-blocked']);
    exit;
}

// Llamar a la función para eliminar el usuario
$consultation = $MU->delete_user($userID);

// Verificar si la eliminación fue exitosa
if ($consultation) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error']);
}
?>
