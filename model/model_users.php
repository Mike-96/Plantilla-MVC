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
                user_group.group_name, 
                users.`status`, 
                users.staff_id, 
                users.hash_password, 
                users.raw_password, 
                users.last_login, 
                users.created_at, 
                users.updated_at
                FROM
                users
                LEFT JOIN
                user_group
                ON 
                    users.group_id = user_group.group_id
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

    public function list_ViewStaff()
    {
        $connexion = connectBD::connect();
        $sql = "SELECT
                    staff.staff_id as staff, 
                    staff.group_id, 
                    staff.code_staff, 
                    staff.first_name, 
                    staff.last_name, 
                    staff.email, 
                    staff.dni, 
                    staff.phone, 
                    staff.`status`, 
                    staff.department, 
                    staff.salary, 
                    staff.hire_date, 
                    staff.address, 
                    staff.city, 
                    staff.country, 
                    staff.birthdate, 
                    staff.created_at, 
                    staff.updated_at, 
                    `status`.id_status as status, 
                    users.staff_id, 
                    user_group.group_name
                FROM
                    staff
                    LEFT JOIN
                    users
                    ON 
                        staff.staff_id = users.staff_id
                    LEFT JOIN
                    `status`
                    ON 
                        staff.`status` = `status`.id_status
                    LEFT JOIN
                    user_group
                    ON 
                        staff.group_id = user_group.group_id
                WHERE
                    `status`.id_status = 1 AND
                    users.staff_id IS NULL";

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

    public function update_password($userID, $password, $rawPassword)
    {
        $connexion = connectBD::connect();
        $sql = "UPDATE users SET hash_password = ?, raw_password = ? WHERE staff_id = ?";
        $query = $connexion->prepare($sql);
        $query->bindParam(1, $password);
        $query->bindParam(2, $rawPassword);
        $query->bindParam(3, $userID);
        $query->execute();

        $this->close_connection();
        return 1;
    }

    public function update_rol($userID, $rol)
    {
        $connexion = connectBD::connect();
        $sql = "UPDATE users SET group_id = ? WHERE user_id = ?";
        $query = $connexion->prepare($sql);
        $query->bindParam(1, $rol);
        $query->bindParam(2, $userID);
        $query->execute();

        $this->close_connection();
        return 1;
    }

    public function activate_user($userID, $status)
    {
        $connexion = connectBD::connect();
        $sql = "UPDATE users SET `status` = ? WHERE user_id = ?";
        $query = $connexion->prepare($sql);
        $query->bindParam(1, $status);
        $query->bindParam(2, $userID);
        $query->execute();

        $this->close_connection();
        return 1;
    }

    public function desactivate_user($userID, $status)
    {
        $connexion = connectBD::connect();
        $sql = "UPDATE users SET `status` = ? WHERE user_id = ?";
        $query = $connexion->prepare($sql);
        $query->bindParam(1, $status);
        $query->bindParam(2, $userID);
        $query->execute();

        $this->close_connection();
        return 1;
    }

    // Dentro de la clase model_user
    public function delete_user($userID)
    {
        $connexion = connectBD::connect();

        // SQL para eliminar el usuario
        $sqlDelete = "DELETE FROM users WHERE user_id = ?";
        $queryDelete = $connexion->prepare($sqlDelete);
        $queryDelete->bindParam(1, $userID, PDO::PARAM_INT);

        // Ejecuta la consulta
        $queryDelete->execute();

        // Verificar si se eliminó alguna fila
        if ($queryDelete->rowCount() > 0) {
            // Si se eliminó el usuario
            $this->close_connection();
            return true;  // Regresa un valor verdadero indicando éxito
        } else {
            // Si no se eliminó el usuario
            $this->close_connection();
            return false;  // Regresa falso si no se eliminó
        }
    }
}
