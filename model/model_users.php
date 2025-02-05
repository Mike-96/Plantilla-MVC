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
                status.id_status,
                users.staff_id,
                users.hash_password,
                users.raw_password,
                users.last_login,
                users.created_at,
                users.updated_at
            FROM users
            LEFT JOIN 
            staff 
            ON 
            users.staff_id = staff.staff_id  
            LEFT JOIN 
            status 
            ON 
            staff.status = status.id_status 
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
                    users.group_id,
                    user_group.group_name,
                    status.id_status,
                    users.staff_id,
                    CONCAT_WS(' ', staff.code_staff, staff.first_name, staff.last_name) AS data_staff,
                    users.hash_password,
                    users.raw_password,
                    users.last_login,
                    users.created_at,
                    users.updated_at
                    FROM
                    users
                    INNER JOIN 
                    user_group
                    ON 
                    users.group_id = user_group.group_id
                    LEFT JOIN 
                    staff
                    ON 
                    users.staff_id = staff.staff_id
                    LEFT JOIN
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
}
