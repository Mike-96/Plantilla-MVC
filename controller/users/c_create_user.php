<?php 

    require '../../model/m_user.php';

    $MU = new model_user();
    $staff = htmlspecialchars($_POST['staff'], ENT_QUOTES, 'UTF-8');
    $userName = htmlspecialchars($_POST['userName'], ENT_QUOTES, 'UTF-8');
    $account = htmlspecialchars($_POST['account'], ENT_QUOTES, 'UTF-8');
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT,['cost'=>10]);
    $rawPassword = htmlspecialchars($_POST['rawPassword'], ENT_QUOTES, 'UTF-8');
    $rol = htmlspecialchars($_POST['rol'], ENT_QUOTES, 'UTF-8');
    $status = htmlspecialchars($_POST['status'], ENT_QUOTES, 'UTF-8');
    $photo = htmlspecialchars($_POST['photo'], ENT_QUOTES, 'UTF-8');// Ruta de la imagen subida

    $consultation = $MU->create_user($staff, $userName, $account, $password, $rawPassword, $rol, $status, $photo);
        echo ($consultation);

?>