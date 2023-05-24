<?php
 if(!isset($_SESSION))session_start();

//session_destroy();
unset($_SESSION['patient_id']);

header('Location: Laboratory.php');
?>