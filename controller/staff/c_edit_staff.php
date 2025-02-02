<?php 

require '../../model/m_staff.php';

$MS = new model_staff();
$group_id = htmlspecialchars($_POST['rolGroup'], ENT_QUOTES, 'UTF-8');
$code_staff = htmlspecialchars($_POST['codeStaff'], ENT_QUOTES, 'UTF-8');
$first_name = ucwords(strtolower(htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8')));
$last_name = ucwords(strtolower(htmlspecialchars($_POST['lastName'], ENT_QUOTES, 'UTF-8')));
$email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
$dni = strtoupper(htmlspecialchars($_POST['dni'], ENT_QUOTES, 'UTF-8'));
$phone = htmlspecialchars($_POST['phone'], ENT_QUOTES, 'UTF-8');
$department = htmlspecialchars($_POST['department'], ENT_QUOTES, 'UTF-8');
$hire_date = htmlspecialchars($_POST['hireDate'], ENT_QUOTES, 'UTF-8');
$address = ucwords(strtolower(htmlspecialchars($_POST['address'], ENT_QUOTES, 'UTF-8')));
$city = htmlspecialchars($_POST['city'], ENT_QUOTES, 'UTF-8');
$country = htmlspecialchars($_POST['country'], ENT_QUOTES, 'UTF-8');
$birthdate = htmlspecialchars($_POST['birthDate'], ENT_QUOTES, 'UTF-8');
$status = htmlspecialchars($_POST['status'], ENT_QUOTES, 'UTF-8');
$staff_id = htmlspecialchars($_POST['staffID'], ENT_QUOTES, 'UTF-8');

$consulta = $MS->update_staff($staff_id, $group_id, $code_staff, $first_name, $last_name, $email, $dni, $phone, $department, $hire_date, $address, $city, $country, $birthdate, $status);
echo ($consulta);

?>
