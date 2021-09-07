<?php
session_start();

$_SESSION['id_data_pelamar']='';
$_SESSION['id_card_number']='';
$_SESSION['personal_name']='';

unset($_SESSION['id_data_pelamar']);
unset($_SESSION['id_card_number']);
unset($_SESSION['personal_name']);

session_unset();
session_destroy();
header('Location:validation');

?>
