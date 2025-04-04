<?php
require '../../model/m_permissions.php';

$MP = new model_permissions();
$group_id = htmlspecialchars($_POST['group_id'], ENT_QUOTES, 'UTF-8');

// Consultamos los permisos
$permissions = $MP->get_permissions_for_group($group_id);

// Devolvemos los datos en formato JSON
echo json_encode($permissions);
?>

