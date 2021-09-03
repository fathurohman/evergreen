<?php
session_start();

$koneksi = mysqli_connect("localhost","root","","evergreen");

$nik = $_POST["nik"];
$tes = $_POST["tes"];

$sql = "select * from data_pelamar where nik='".$nik."' and status_accepted='1' limit 1";
$hasil = mysqli_query ($koneksi,$sql);
$jumlah = mysqli_num_rows($hasil);

$sql2 = "select * from b_inggris a join data_pelamar b on a.id_data_pelamar=b.id_data_pelamar where b.nik='".$nik."' limit 1";
$hasil2 = mysqli_query ($koneksi,$sql2);
$jumlah2 = mysqli_num_rows($hasil2);

$sql3 = "select * from psikotest a join data_pelamar b on a.id_data_pelamar=b.id_data_pelamar where b.nik='".$nik."' limit 1";
$hasil3 = mysqli_query ($koneksi,$sql3);
$jumlah3 = mysqli_num_rows($hasil3);


    if ($jumlah3>0 && $tes=="psikotes") {
	
        header("Location:validation?pesan=psikotest_validation");
    
    }elseif ($jumlah>0 && $tes=="psikotes") {
		$row = mysqli_fetch_assoc($hasil);
		$_SESSION["nik"]=$row["nik"];
		$_SESSION["personal_name"]=$row["personal_name"];
		$_SESSION["id_data_pelamar"]=$row["id_data_pelamar"];
	

		header("Location:psikotest");
		
	}elseif ($jumlah2>0 && $tes=="english") {
	
		header("Location:validation?pesan=english_validation");
		
	}elseif ($jumlah>0 && $tes=="english") {
		$row = mysqli_fetch_assoc($hasil);
		$_SESSION["nik"]=$row["nik"];
		$_SESSION["personal_name"]=$row["personal_name"];
		$_SESSION["id_data_pelamar"]=$row["id_data_pelamar"];
	

		header("Location:english");
		
	}else {
		header("Location:validation?pesan=file_validation");
	}
?>