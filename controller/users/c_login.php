<?php 

    require '../../model/model_users.php';

    $MU = new model_user();
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');

    $consultation = $MU->verify_user($email, $password);
    if (count($consultation) > 0) {
        // Usuario válido, enviar los datos como JSON
        echo json_encode($consultation);
    } else {
        // Usuario inválido, enviar un mensaje de error como JSON
        echo json_encode(array('error' => 'Usuario o contraseña incorrectos'));
    }

?>