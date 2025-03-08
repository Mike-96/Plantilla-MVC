<?php 
    session_start();
    $user_id = htmlspecialchars($_POST['user_id'], ENT_QUOTES, 'UTF-8');
    $user_name = htmlspecialchars($_POST['user_name'], ENT_QUOTES, 'UTF-8');
    $rol = htmlspecialchars($_POST['rol'], ENT_QUOTES, 'UTF-8');
    $user_image = htmlspecialchars($_POST['user_image'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    
    $_SESSION['SESSION_ID']=$user_id;
    $_SESSION['SESSION_NAME']=$user_name;
    $_SESSION['SESSION_ROL']=$rol;
    $_SESSION['SESSION_IMG']=$user_image;
    $_SESSION['SESSION_EMAIL']=$email;
?>