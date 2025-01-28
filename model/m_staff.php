<?php
require_once 'database_connect.php';

class model_staff extends connectBD
{


    public function LIST_STAFF()
    {
        $connexion = connectBD::connect();
        $sql = "SELECT 
                    staff.staff_id,
                    staff.group_id,
                    staff.code_staff,
                    user_group.group_name,
                    staff.first_name,
                    staff.last_name,
                    staff.email,
                    staff.dni,
                    staff.phone,
                    staff.department,
                    staff.salary,
                    staff.hire_date,
                    staff.address,
                    staff.city,
                    staff.country,
                    staff.birthdate,
                    status.id_status as status,
                    staff.created_at,
                    staff.updated_at
                    FROM
                    staff
                    INNER JOIN 
                    user_group
                    ON 
                    staff.group_id = user_group.group_id
                    INNER JOIN
                    status
                    ON
                    staff.status = status.id_status";

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


    public function check_code($code)
    {
        $connexion = connectBD::connect();

        $sql = "SELECT COUNT(*) FROM staff WHERE code_staff = ?";

        $query = $connexion->prepare($sql);
        $query->bindParam(1, $code, PDO::PARAM_STR);
        $query->execute();

        $row = $query->fetchColumn();

        if ($row == 0) {
            $this->close_connection();
            return "not_exists"; // El código no existe
        } else {
            $this->close_connection();
            return "exists"; // El código existe
        }
    }


    public function create_staff($group_id, $code_staff, $first_name, $last_name, $email, $dni, $phone, $department, $hire_date, $address, $city, $country, $birthdate, $status)
{
    $connexion = connectBD::connect();
    $sql = "SELECT COUNT(*) FROM staff WHERE dni = ?";
    
    $query = $connexion->prepare($sql);
    $query->bindParam(1, $dni, PDO::PARAM_STR);
    $query->execute();
    
    $row = $query->fetchColumn();
    
    if ($row == 0) {
        $sqlInsert = "INSERT INTO staff (group_id, code_staff, first_name, last_name, email, dni, phone, department, hire_date, address, city, country, birthdate, status, created_at) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW())";
        
        $queryInsert = $connexion->prepare($sqlInsert);
        $queryInsert->bindParam(1, $group_id, PDO::PARAM_STR);
        $queryInsert->bindParam(2, $code_staff, PDO::PARAM_STR);
        $queryInsert->bindParam(3, $first_name, PDO::PARAM_STR);
        $queryInsert->bindParam(4, $last_name, PDO::PARAM_STR);
        $queryInsert->bindParam(5, $email, PDO::PARAM_STR);
        $queryInsert->bindParam(6, $dni, PDO::PARAM_STR);
        $queryInsert->bindParam(7, $phone, PDO::PARAM_STR);
        $queryInsert->bindParam(8, $department, PDO::PARAM_STR);
        $queryInsert->bindParam(9, $hire_date, PDO::PARAM_STR);
        $queryInsert->bindParam(10, $address, PDO::PARAM_STR);
        $queryInsert->bindParam(11, $city, PDO::PARAM_STR);
        $queryInsert->bindParam(12, $country, PDO::PARAM_STR);
        $queryInsert->bindParam(13, $birthdate, PDO::PARAM_STR);
        $queryInsert->bindParam(14, $status, PDO::PARAM_INT);
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

    
    public function delete_group($id)
    {
        $connexion = connectBD::connect();
            // Actualiza el registro existente
            $sqlDelete = "DELETE FROM user_group WHERE group_id = ?";
            $queryDelete = $connexion->prepare($sqlDelete);
            $queryDelete->bindParam(1, $id, PDO::PARAM_INT);
            $queryDelete->execute();
            
            $this->close_connection();
        
    }

}
?>