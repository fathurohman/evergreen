<?php

include('..\db\koneksi.php');

if (isset($_POST['msform'])) {
  $id_data_pelamar = $_POST['id_data_pelamar'];
  $angka_1 = $_POST['angka_1'];
  $angka_2 = $_POST['angka_2'];
  $angka_3 = $_POST['angka_3'];
  $angka_4 = $_POST['angka_4'];
  $angka_5 = $_POST['angka_5'];
  $angka_6 = $_POST['angka_6'];
  $angka_7 = $_POST['angka_7'];
  $angka_8 = $_POST['angka_8'];
  $angka_9 = $_POST['angka_9'];
  $angka_10 = $_POST['angka_10'];
  $angka_11 = $_POST['angka_11'];
  $angka_12 = $_POST['angka_12'];
  $angka_13 = $_POST['angka_13'];
  $angka_14 = $_POST['angka_14'];
  $angka_15 = $_POST['angka_15'];
  $angka_16 = $_POST['angka_16'];
  $angka_17 = $_POST['angka_17'];
  $angka_18 = $_POST['angka_18'];
  $angka_19 = $_POST['angka_19'];
  $angka_20 = $_POST['angka_20'];
  $angka_21 = $_POST['angka_21'];
  $angka_22 = $_POST['angka_22'];
  $angka_23 = $_POST['angka_23'];
  $angka_24 = $_POST['angka_24'];
  $angka_25 = $_POST['angka_25'];
  $angka_26 = $_POST['angka_26'];
  $angka_27 = $_POST['angka_27'];
  $angka_28 = $_POST['angka_28'];
  $angka_29 = $_POST['angka_29'];
  $angka_30 = $_POST['angka_30'];
  $angka_31 = $_POST['angka_31'];
  $angka_32 = $_POST['angka_32'];
  $angka_33 = $_POST['angka_33'];
  $angka_34 = $_POST['angka_34'];
  $angka_35 = $_POST['angka_35'];
  $angka_36 = $_POST['angka_36'];
  $angka_37 = $_POST['angka_37'];
  $angka_38 = $_POST['angka_38'];
  $angka_39 = $_POST['angka_39'];
  $angka_40 = $_POST['angka_40'];
  $gabungan_1 = implode($_POST['gabungan_1'], ',');
  $gabungan_2 = implode($_POST['gabungan_2'], ',');
  $gabungan_3 = implode($_POST['gabungan_3'], ',');
  $gabungan_4 = implode($_POST['gabungan_4'], ',');
  $gabungan_5 = implode($_POST['gabungan_5'], ',');
  $gabungan_6 = implode($_POST['gabungan_6'], ',');
  $gabungan_7 = implode($_POST['gabungan_7'], ',');
  $gabungan_8 = implode($_POST['gabungan_8'], ',');
  $gabungan_9 = implode($_POST['gabungan_9'], ',');
  $gabungan_10 = implode($_POST['gabungan_10'], ',');
  $gabungan_11 = implode($_POST['gabungan_11'], ',');
  $gabungan_12 = implode($_POST['gabungan_12'], ',');
  $gabungan_13 = implode($_POST['gabungan_13'], ',');
  $gabungan_14 = implode($_POST['gabungan_14'], ',');
  $gabungan_15 = implode($_POST['gabungan_15'], ',');
  $gabungan_16 = implode($_POST['gabungan_16'], ',');
  $gabungan_17 = implode($_POST['gabungan_17'], ',');
  $gabungan_18 = implode($_POST['gabungan_18'], ',');
  $gabungan_19 = implode($_POST['gabungan_19'], ',');
  $gabungan_20 = implode($_POST['gabungan_20'], ',');
  $gabungan_21 = implode($_POST['gabungan_21'], ',');
  $gabungan_22 = implode($_POST['gabungan_22'], ',');
  $gabungan_23 = implode($_POST['gabungan_23'], ',');
  $gabungan_24 = implode($_POST['gabungan_24'], ',');
  $gabungan_25 = implode($_POST['gabungan_25'], ',');
  $gabungan_26 = implode($_POST['gabungan_26'], ',');
  $hubungan_1 = implode($_POST['hubungan_1'], ',');
  $hubungan_2 = implode($_POST['hubungan_2'], ',');
  $hubungan_3 = implode($_POST['hubungan_3'], ',');
  $hubungan_4 = implode($_POST['hubungan_4'], ',');
  $hubungan_5 = implode($_POST['hubungan_5'], ',');
  $hubungan_6 = implode($_POST['hubungan_6'], ',');
  $hubungan_7 = implode($_POST['hubungan_7'], ',');
  $hubungan_8 = implode($_POST['hubungan_8'], ',');
  $hubungan_9 = implode($_POST['hubungan_9'], ',');
  $hubungan_10 = implode($_POST['hubungan_10'], ',');
  $hubungan_11 = implode($_POST['hubungan_11'], ',');
  $hubungan_12 = implode($_POST['hubungan_12'], ',');
  $hubungan_13 = implode($_POST['hubungan_13'], ',');
  $hubungan_14 = implode($_POST['hubungan_14'], ',');
  $hubungan_15 = implode($_POST['hubungan_15'], ',');
  $hubungan_16 = implode($_POST['hubungan_16'], ',');
  $hubungan_17 = implode($_POST['hubungan_17'], ',');
  $hubungan_18 = implode($_POST['hubungan_18'], ',');
  $hubungan_19 = implode($_POST['hubungan_19'], ',');
  $hubungan_20 = implode($_POST['hubungan_20'], ',');
  $hubungan_21 = implode($_POST['hubungan_21'], ',');
  $hubungan_22 = implode($_POST['hubungan_22'], ',');
  $hubungan_23 = implode($_POST['hubungan_23'], ',');
  $hubungan_24 = implode($_POST['hubungan_24'], ',');
  $hubungan_25 = implode($_POST['hubungan_25'], ',');
  $hubungan_26 = implode($_POST['hubungan_26'], ',');
  $hubungan_27 = implode($_POST['hubungan_27'], ',');
  $hubungan_28 = implode($_POST['hubungan_28'], ',');
  $hubungan_29 = implode($_POST['hubungan_29'], ',');
  $hubungan_30 = implode($_POST['hubungan_30'], ',');
  $hubungan_31 = implode($_POST['hubungan_31'], ',');
  $hubungan_32 = implode($_POST['hubungan_32'], ',');
  $hubungan_33 = implode($_POST['hubungan_33'], ',');
  $hubungan_34 = implode($_POST['hubungan_34'], ',');
  $hubungan_35 = implode($_POST['hubungan_35'], ',');
  $hubungan_36 = implode($_POST['hubungan_36'], ',');
  $hubungan_37 = implode($_POST['hubungan_37'], ',');
  $hubungan_38 = implode($_POST['hubungan_38'], ',');
  $hubungan_39 = implode($_POST['hubungan_39'], ',');
  $hubungan_40 = implode($_POST['hubungan_40'], ',');
  $abstraksi_1 = implode($_POST['abstraksi_1'], ',');
  $abstraksi_2 = implode($_POST['abstraksi_2'], ',');
  $abstraksi_3 = implode($_POST['abstraksi_3'], ',');
  $abstraksi_4 = implode($_POST['abstraksi_4'], ',');
  $abstraksi_5 = implode($_POST['abstraksi_5'], ',');
  $abstraksi_6 = implode($_POST['abstraksi_6'], ',');
  $abstraksi_7 = implode($_POST['abstraksi_7'], ',');
  $abstraksi_8 = implode($_POST['abstraksi_8'], ',');
  $abstraksi_9 = implode($_POST['abstraksi_9'], ',');
  $abstraksi_10 = implode($_POST['abstraksi_10'], ',');
  $abstraksi_11 = implode($_POST['abstraksi_11'], ',');
  $abstraksi_12 = implode($_POST['abstraksi_12'], ',');
  $abstraksi_13 = implode($_POST['abstraksi_13'], ',');
  $abstraksi_14 = implode($_POST['abstraksi_14'], ',');
  $abstraksi_15 = implode($_POST['abstraksi_15'], ',');
  $abstraksi_16 = implode($_POST['abstraksi_16'], ',');
  $abstraksi_17 = implode($_POST['abstraksi_17'], ',');
  $abstraksi_18 = implode($_POST['abstraksi_18'], ',');
  $abstraksi_19 = implode($_POST['abstraksi_19'], ',');
  $abstraksi_20 = implode($_POST['abstraksi_20'], ',');
  $abstraksi_21 = implode($_POST['abstraksi_21'], ',');
  $abstraksi_22 = implode($_POST['abstraksi_22'], ',');
  $abstraksi_23 = implode($_POST['abstraksi_23'], ',');
  $abstraksi_24 = implode($_POST['abstraksi_24'], ',');
  $abstraksi_25 = implode($_POST['abstraksi_25'], ',');
  $abstraksi_26 = implode($_POST['abstraksi_26'], ',');
  $abstraksi_27 = implode($_POST['abstraksi_27'], ',');
  $abstraksi_28 = implode($_POST['abstraksi_28'], ',');
  $abstraksi_29 = implode($_POST['abstraksi_29'], ',');
  $abstraksi_30 = implode($_POST['abstraksi_30'], ',');

  // id_produk bernilai '' karena kita set auto increment
  $q = $koneksi->query("INSERT INTO psikotest VALUES (NULL, '$id_data_pelamar', '$angka_1', '$angka_2', '$angka_3', '$angka_4', '$angka_5'
  , '$angka_6', '$angka_7', '$angka_8', '$angka_9', '$angka_10', '$angka_11', '$angka_12', '$angka_13', '$angka_14', '$angka_15', '$angka_16'
  , '$angka_17', '$angka_18', '$angka_19', '$angka_20', '$angka_21', '$angka_22', '$angka_23', '$angka_24', '$angka_25', '$angka_26', '$angka_27'
  , '$angka_28', '$angka_29', '$angka_30', '$angka_31', '$angka_32', '$angka_33', '$angka_34', '$angka_35', '$angka_36', '$angka_37', '$angka_38'
  , '$angka_39', '$angka_40', '$gabungan_1', '$gabungan_2', '$gabungan_3', '$gabungan_4', '$gabungan_5', '$gabungan_6', '$gabungan_7', '$gabungan_8'
  , '$gabungan_9', '$gabungan_10', '$gabungan_11', '$gabungan_12', '$gabungan_13', '$gabungan_14', '$gabungan_15', '$gabungan_16', '$gabungan_17'
  , '$gabungan_18', '$gabungan_19', '$gabungan_20', '$gabungan_21', '$gabungan_22', '$gabungan_23', '$gabungan_24', '$gabungan_25', '$gabungan_26'
  , '$hubungan_1', '$hubungan_2', '$hubungan_3', '$hubungan_4', '$hubungan_5', '$hubungan_6', '$hubungan_7', '$hubungan_8', '$hubungan_9'
  , '$hubungan_10', '$hubungan_11', '$hubungan_12', '$hubungan_13', '$hubungan_14', '$hubungan_15', '$hubungan_16', '$hubungan_17', '$hubungan_18'
  , '$hubungan_19', '$hubungan_20', '$hubungan_21', '$hubungan_22', '$hubungan_23', '$hubungan_24', '$hubungan_25', '$hubungan_26', '$hubungan_27'
  , '$hubungan_28', '$hubungan_29', '$hubungan_30', '$hubungan_31', '$hubungan_32', '$hubungan_33', '$hubungan_34', '$hubungan_35', '$hubungan_36'
  , '$hubungan_37', '$hubungan_38', '$hubungan_39', '$hubungan_40', '$abstraksi_1', '$abstraksi_2', '$abstraksi_3', '$abstraksi_4', '$abstraksi_5'
  , '$abstraksi_6', '$abstraksi_7', '$abstraksi_8', '$abstraksi_9', '$abstraksi_10', '$abstraksi_11', '$abstraksi_12', '$abstraksi_13', '$abstraksi_14'
  , '$abstraksi_15', '$abstraksi_16', '$abstraksi_17', '$abstraksi_18', '$abstraksi_19', '$abstraksi_20', '$abstraksi_21', '$abstraksi_22', '$abstraksi_23'
  , '$abstraksi_24', '$abstraksi_25', '$abstraksi_26', '$abstraksi_27', '$abstraksi_28', '$abstraksi_29', '$abstraksi_30', NULL, NULL)");

  if ($q) {
    // pesan jika data tersimpan
    echo "<script>alert('Jawaban Anda berhasil disimpan.'); window.location.href='logout'</script>";
  } else {
    // pesan jika data gagal disimpan
    echo "<script>alert('Jawaban Anda gagal disimpan.'); window.location.href='logout'</script>";
  }
} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: logout');
}
