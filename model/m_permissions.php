<?php
require_once 'database_connect.php';

class model_permissions extends connectBD
{
    public function get_permissions_for_group($group_id)
    {
        $connexion = connectBD::connect();
        
        // Consultamos los permisos asignados a un grupo
        $sql = "SELECT p.permission_id, p.permission_name, gp.status 
                FROM permissions p
                LEFT JOIN group_permissions gp ON p.permission_id = gp.permission_id
                WHERE gp.group_id = ?";
        
        $query = $connexion->prepare($sql);
        $query->bindParam(1, $group_id, PDO::PARAM_INT);
        $query->execute();
    
        // Traemos los resultados
        $permissions = $query->fetchAll(PDO::FETCH_ASSOC);
    
        $this->close_connection();
        return $permissions;
    }

    public function get_groups_and_permissions() {
        try {
            $connexion = connectBD::connect();
            if (!$connexion) {
                throw new Exception('No se pudo establecer la conexión a la base de datos.');
            }
    
            $sql = "SELECT
                        g.group_id, g.group_name, p.permission_name
                    FROM
                        user_group g
                    LEFT JOIN group_permissions gp ON g.group_id = gp.group_id
                    LEFT JOIN permissions p ON gp.permission_id = p.permission_id";
    
            $query = $connexion->prepare($sql);
            $query->execute();
    
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
    
            if (!$result) {
                return []; // Devuelve un array vacío en caso de no encontrar registros
            }
    
            return $result;
    
        } catch (PDOException $e) {
            error_log('Error en consulta SQL: ' . $e->getMessage());
            return []; // Devuelve un array vacío en caso de error
        } catch (Exception $e) {
            error_log('Error en el modelo: ' . $e->getMessage());
            return []; // Devuelve un array vacío en caso de error
        }
    }
    
    
 
}
?>