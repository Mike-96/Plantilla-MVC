<?php
require_once 'database_connect.php';

class model_user_group extends connectBD
{
    public function list_user_group()
    {
        $connexion = connectBD::connect();
        $sql = "SELECT 
                    user_group.group_id,
                    user_group.group_name,
                    user_group.slug,
                    user_group.status,
                    user_group.created_at,
                    user_group.updated_at
                    FROM
                    user_group";

        $array = array();
        $query = $connexion->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $response) {
            $array["data"][] = $response;
        }

        $this->close_connection();
        return $array;
    }

    public function create_group($groupName, $slug, $status)
    {
        $connexion = connectBD::connect();
        $sql = "SELECT COUNT(*) FROM user_group WHERE group_name = ?";

        $query = $connexion->prepare($sql);
        $query->bindParam(1, $groupName, PDO::PARAM_STR);
        $query->execute();

        $row = $query->fetchColumn();

        if ($row == 0) {
            $sqlInsert = "INSERT INTO user_group(group_name, slug, status, created_at) VALUES(?, ?, ?, NOW())";

            $queryInsert = $connexion->prepare($sqlInsert);
            $queryInsert->bindParam(1, $groupName, PDO::PARAM_STR);
            $queryInsert->bindParam(2, $slug, PDO::PARAM_STR);
            $queryInsert->bindParam(3, $status, PDO::PARAM_INT);

            $queryInsert->execute();

            $this->close_connection();
            return 1;
        } else {
            $this->close_connection();
            return 2;
        }
    }

    public function update_group($id, $groupName, $slug)
    {
        $connexion = connectBD::connect();
        $sql = "SELECT COUNT(*) FROM user_group WHERE group_name = ?";

        $query = $connexion->prepare($sql);
        $query->bindParam(1, $groupName, PDO::PARAM_STR);
        $query->execute();

        $row = $query->fetchColumn();

        if ($row == 0) {
            // Actualiza el registro existente
            $sqlUpdate = "UPDATE user_group SET group_name = ?, slug = ?, updated_at = NOW() WHERE group_id = ?";
            $queryUpdate = $connexion->prepare($sqlUpdate);
            $queryUpdate->bindParam(1, $groupName, PDO::PARAM_STR);
            $queryUpdate->bindParam(2, $slug, PDO::PARAM_STR);
            $queryUpdate->bindParam(3, $id, PDO::PARAM_INT);

            $queryUpdate->execute();

            $this->close_connection();
            return 1; // Éxito en la actualización
        } else {
            $this->close_connection();
            return 2; // El nombre del grupo ya existe
        }
    }

    public function update_status_group($id, $status)
    {
        $connexion = connectBD::connect();
        // Actualiza el registro existente
        $sqlUpdate = "UPDATE user_group SET status = ?, updated_at = NOW() WHERE group_id = ?";
        $queryUpdate = $connexion->prepare($sqlUpdate);
        $queryUpdate->bindParam(1, $status, PDO::PARAM_STR);
        $queryUpdate->bindParam(2, $id, PDO::PARAM_INT);
        $queryUpdate->execute();

        $this->close_connection();
    }

    /// Método para eliminar un grupo
    /// @param int $id El ID del grupo a eliminar
    public function delete_group($id)
    {
        $connexion = connectBD::connect();

        // Verificar si el grupo está asignado a un staff o usuario
        $sqlCheck = "SELECT COUNT(*) as count FROM user_group 
                 LEFT JOIN staff ON user_group.group_id = staff.group_id
                 LEFT JOIN users ON user_group.group_id = users.group_id
                 WHERE user_group.group_id = ? 
                 AND (staff.group_id IS NOT NULL OR users.group_id IS NOT NULL)";

        $queryCheck = $connexion->prepare($sqlCheck);
        $queryCheck->bindParam(1, $id, PDO::PARAM_INT);
        $queryCheck->execute();
        $result = $queryCheck->fetch(PDO::FETCH_ASSOC);

        // Si el grupo está asignado, retornamos un error
        if ($result['count'] > 0) {
            return json_encode(["status" => "error", "message" => "No puedes eliminar este grupo porque está asignado a un Usuraio o Personal."]);
        }

        // Si no está asignado, proceder con la eliminación
        $sqlDelete = "DELETE FROM user_group WHERE group_id = ?";
        $queryDelete = $connexion->prepare($sqlDelete);
        $queryDelete->bindParam(1, $id, PDO::PARAM_INT);
        $queryDelete->execute();

        $this->close_connection();

        return json_encode(["status" => "success", "message" => "Grupo eliminado correctamente."]);
    }


    public function listSelectGroup()
    {
        $connexion = connectBD::connect();
        $sql = "SELECT 
                    user_group.group_id,
                    user_group.group_name,
                    user_group.slug,
                    user_group.status,
                    user_group.created_at,
                    user_group.updated_at
                    FROM
                    user_group
                    WHERE user_group.status = 1";

        $array = array();
        $query = $connexion->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $response) {
            $array["data"][] = $response;
        }

        $this->close_connection();
        return $array;
    }

    // public function update_group_permissions($group_id, $permissions)
    // {
    //     try {
    //         $connexion = connectBD::connect();

    //         // Convertimos el array de permisos en JSON para almacenarlo
    //         $permissions_json = json_encode($permissions);

    //         $sqlUpdate = "UPDATE user_group SET permission = ? WHERE group_id = ?";
    //         $queryUpdate = $connexion->prepare($sqlUpdate);
    //         $queryUpdate->bindParam(1, $permissions_json, PDO::PARAM_STR);
    //         $queryUpdate->bindParam(2, $group_id, PDO::PARAM_INT);

    //         $result = $queryUpdate->execute();

    //         $this->close_connection();

    //         return $result ? "success" : "error";
    //     } catch (Exception $e) {
    //         return "error: " . $e->getMessage();
    //     }
    // }
}
