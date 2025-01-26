<?php 

    require '../../model/m_staff.php';

    $MS = new model_staff();
    $group_id = htmlspecialchars($_POST['rolGroup'], ENT_QUOTES, 'UTF-8');
    $code_staff = htmlspecialchars($_POST['codeStaff'], ENT_QUOTES, 'UTF-8');
    $firts_name = strtoupper(htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8'));
    $last_name = strtoupper(htmlspecialchars($_POST['lastName'], ENT_QUOTES, 'UTF-8'));
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $dni = strtoupper(htmlspecialchars($_POST['dni'], ENT_QUOTES, 'UTF-8'));
    $phone = strtoupper(htmlspecialchars($_POST['phone'], ENT_QUOTES, 'UTF-8'));
    $department = strtoupper(htmlspecialchars($_POST['department'], ENT_QUOTES, 'UTF-8'));
    $hire_date = strtoupper(htmlspecialchars($_POST['hireDate'], ENT_QUOTES, 'UTF-8'));
    $address = strtoupper(htmlspecialchars($_POST['address'], ENT_QUOTES, 'UTF-8'));
    $city = strtoupper(htmlspecialchars($_POST['city'], ENT_QUOTES, 'UTF-8'));
    $country = strtoupper(htmlspecialchars($_POST['country'], ENT_QUOTES, 'UTF-8'));
    $birthdate = htmlspecialchars($_POST['birthDate'], ENT_QUOTES, 'UTF-8');
    $status = htmlspecialchars($_POST['status'], ENT_QUOTES, 'UTF-8');
    $timestamp = NULL;

    $consulta = $MS->create_staff($group_id, $code_staff, $firts_name, $last_name, $email, $dni, $phone, $department, $hire_date, $address, $city, $country, $birthdate, $status, $timestamp);
        echo ($consulta);

?>