<?php
session_start();

$_SESSION['id_data_pelamar']='';
$_SESSION['nik']='';
$_SESSION['personal_name']='';

unset($_SESSION['id_data_pelamar']);
unset($_SESSION['nik']);
unset($_SESSION['personal_name']);

session_unset();
session_destroy();
header('Location:validation');

?>