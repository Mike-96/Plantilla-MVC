<?php
require '../../model/m_permissions.php';

header('Content-Type: application/json'); // Asegurar salida JSON

try {
    $MUG = new model_permissions();
    $groups = $MUG->get_groups_and_permissions(); // Obtener grupos y permisos

    if (!$groups || empty($groups)) {
        echo json_encode(['error' => 'No se encontraron grupos o permisos.']);
        exit;
    }

    // Obtener lista única de todos los permisos disponibles
    $allPermissions = [];
    foreach ($groups as $group) {
        if (!in_array($group['permission_name'], $allPermissions) && $group['permission_name']) {
            $allPermissions[] = $group['permission_name'];
        }
    }

    // Agrupar permisos por grupo
    $groupPermissions = [];
    foreach ($groups as $group) {
        if (!isset($groupPermissions[$group['group_id']])) {
            $groupPermissions[$group['group_id']] = [
                'group_name' => $group['group_name'],
                'permissions' => [] // Inicializar vacío
            ];
        }
        if ($group['permission_name']) {
            $groupPermissions[$group['group_id']]['permissions'][] = $group['permission_name'];
        }
    }

    // Añadir todos los permisos disponibles a cada grupo
    foreach ($groupPermissions as &$group) {
        foreach ($allPermissions as $permission) {
            if (!in_array($permission, $group['permissions'])) {
                $group['permissions'][] = ['permission_name' => $permission, 'assigned' => false];
            } else {
                $group['permissions'] = array_map(function ($p) use ($permission) {
                    return is_array($p)
                        ? $p
                        : ['permission_name' => $p, 'assigned' => true];
                }, $group['permissions']);
            }
        }
    }

    // Respuesta JSON
    echo json_encode($groupPermissions);
    exit;
} catch (Exception $e) {
    error_log('Error en el controlador: ' . $e->getMessage());
    echo json_encode(['error' => 'Error interno del servidor.']);
    exit;
}