<?php 

    $contra = password_hash('admin', PASSWORD_DEFAULT, ['cost' => 12]);
    echo $contra;

?>