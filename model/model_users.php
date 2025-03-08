<?php
require_once 'database_connect.php';

class model_user extends connectBD
{

    public function verify_user($email, $password)
    {
        $connexion = connectBD::connect();
        $sql = "SELECT 
                users.user_id, 
                users.user_image, 
                users.user_name, 
                users.email, 
                users.sex, 
                users.group_id, 
                users.`status`, 
                users.staff_id, 
                users.hash_password, 
                users.raw_password, 
                users.last_login, 
                users.created_at, 
                users.updated_at
                FROM
                users 
                WHERE 
                users.email = BINARY ?";

        $array = array();
        $query = $connexion->prepare($sql);
        $query->bindParam(1, $email);
        $query->execute();
        $result = $query->fetchAll();

        foreach ($result as $response) {
            if (password_verify($password, $response['hash_password'])) {
                $array[] = $response;
            }
        }

        $this->close_connection();
        return $array;
    }

    public function list_user()
    {
        $connexion = connectBD::connect();
        $sql = "SELECT
                users.user_id, 
                users.user_image, 
                users.user_name, 
                users.email, 
                users.sex, 
                user_group.group_id,
                user_group.group_name, 
                `status`.id_status, 
                staff.staff_id, 
                CONCAT_WS(' ', staff.code_staff, staff.first_name, staff.last_name) AS data_staff, 
                users.hash_password, 
                users.raw_password, 
                users.last_login, 
                users.created_at, 
                users.updated_at 
                FROM
                users
                LEFT JOIN
                `status`
                ON 
                users.`status` = `status`.id_status
                LEFT JOIN
                staff
                ON 
                users.staff_id = staff.staff_id
                LEFT JOIN
                user_group
                ON 
		        users.group_id = user_group.group_id";

        try {
            $query = $connexion->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            $array = array();
            foreach ($result as $response) {
                $array["data"][] = $response;
            }

            return $array;
        } catch (PDOException $e) {
            // Manejar el error
            echo "Error: " . $e->getMessage();
            return false;
        } finally {
            // Cerrar la conexión
            $this->close_connection();
        }
    }

    public function create_user($staff, $userName, $account, $password, $rawPassword, $rol, $status, $photo)
    {
        $connexion = connectBD::connect();
        $sql = "SELECT COUNT(*) FROM users WHERE email = ? OR staff_id = ?";
        $query = $connexion->prepare($sql);
        $query->bindParam(1, $account, PDO::PARAM_STR);
        $query->bindParam(2, $staff, PDO::PARAM_STR);
        $query->execute();
        $row = $query->fetchColumn();

        if ($row == 0) {
            $sqlInsert = "INSERT INTO users (staff_id, user_name, email, hash_password, raw_password, group_id, status, user_image) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $queryInsert = $connexion->prepare($sqlInsert);
            $queryInsert->bindParam(1, $staff);
            $queryInsert->bindParam(2, $userName);
            $queryInsert->bindParam(3, $account);
            $queryInsert->bindParam(4, $password);
            $queryInsert->bindParam(5, $rawPassword);
            $queryInsert->bindParam(6, $rol);
            $queryInsert->bindParam(7, $status);
            $queryInsert->bindParam(8, $photo);
            $queryInsert->execute();

            $this->close_connection();
            return 1;
        } else {
            $this->close_connection();
            return 2;
        }
    }
}
