<?php 

require '../../model/model_users.php';
session_start(); // Asegúrate de iniciar la sesión para acceder al user_id actual

$MU = new model_user();
$userID = htmlspecialchars($_POST['userID'], ENT_QUOTES, 'UTF-8');
$status = htmlspecialchars($_POST['status'], ENT_QUOTES, 'UTF-8');

// Verificar si el usuario actual intenta desactivarse a sí mismo
$currentUserID = $_SESSION['SESSION_ID']; // ID del usuario logueado

if ($userID == $currentUserID) {
    $response = ['status' => 'self-deactivation-blocked'];
    echo json_encode($response);
    exit;
}

$consultation = $MU->desactivate_user($userID, $status);

if ($consultation) {
    $response = ['status' => 'success'];
} else {
    $response = ['status' => 'error'];
}

echo json_encode($response);
exit;

?>
