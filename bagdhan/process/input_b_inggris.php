<?php
error_reporting(0);
include('..\db\koneksi.php');

if (isset($_POST['msform'])) {
  $id_data_pelamar = $_POST['id_data_pelamar'];
  $jwb_1 = $_POST['jwb_1'];
  $jwb_2 = $_POST['jwb_2'];
  $jwb_3 = $_POST['jwb_3'];
  $jwb_4 = $_POST['jwb_4'];
  $jwb_5 = $_POST['jwb_5'];
  $jwb_6 = $_POST['jwb_6'];
  $jwb_7 = $_POST['jwb_7'];
  $jwb_8 = $_POST['jwb_8'];
  $jwb_9 = $_POST['jwb_9'];
  $jwb_10 = $_POST['jwb_10'];
  $jwb_11 = $_POST['jwb_11'];
  $jwb_12 = $_POST['jwb_12'];
  $jwb_13 = $_POST['jwb_13'];
  $jwb_14 = $_POST['jwb_14'];
  $jwb_15 = $_POST['jwb_15'];
  $jwb_16 = $_POST['jwb_16'];
  $jwb_17 = $_POST['jwb_17'];
  $jwb_18 = $_POST['jwb_18'];
  $jwb_19 = $_POST['jwb_19'];
  $jwb_20 = $_POST['jwb_20'];
  $jwb_21 = $_POST['jwb_21'];
  $jwb_22 = $_POST['jwb_22'];
  $jwb_23 = $_POST['jwb_23'];
  $jwb_24 = $_POST['jwb_24'];
  $jwb_25 = $_POST['jwb_25'];
  $jwb_26 = $_POST['jwb_26'];
  $jwb_27 = $_POST['jwb_27'];
  $jwb_28 = $_POST['jwb_28'];
  $jwb_29 = $_POST['jwb_29'];
  $jwb_30 = $_POST['jwb_30'];
  $jwb_31 = $_POST['jwb_31'];
  $jwb_32 = $_POST['jwb_32'];
  $jwb_33 = $_POST['jwb_33'];
  $jwb_34 = $_POST['jwb_34'];
  $jwb_35 = $_POST['jwb_35'];
  $jwb_36 = $_POST['jwb_36'];
  $jwb_37 = $_POST['jwb_37'];
  $jwb_38 = $_POST['jwb_38'];
  $jwb_39 = $_POST['jwb_39'];
  $jwb_40 = $_POST['jwb_40'];
  $jwb_41 = $_POST['jwb_41'];
  $jwb_42 = $_POST['jwb_42'];
  $jwb_43 = $_POST['jwb_43'];
  $jwb_44 = $_POST['jwb_44'];
  $jwb_45 = $_POST['jwb_45'];
  $jwb_46 = $_POST['jwb_46'];
  $jwb_47 = $_POST['jwb_47'];
  $jwb_48 = $_POST['jwb_48'];
  $jwb_49 = $_POST['jwb_49'];
  $jwb_50 = $_POST['jwb_50'];
  $jwb_51 = $_POST['jwb_51'];
  $jwb_52 = $_POST['jwb_52'];
  $jwb_53 = $_POST['jwb_53'];
  $jwb_54 = $_POST['jwb_54'];
  $jwb_55 = $_POST['jwb_55'];
  $jwb_56 = $_POST['jwb_56'];
  $jwb_57 = $_POST['jwb_57'];
  $jwb_58 = $_POST['jwb_58'];
  $jwb_59 = $_POST['jwb_59'];
  $jwb_60 = $_POST['jwb_60'];
  $jwb_61 = $_POST['jwb_61'];
  $jwb_62 = $_POST['jwb_62'];
  $jwb_63 = $_POST['jwb_63'];
  $jwb_64 = $_POST['jwb_64'];
  $jwb_65 = $_POST['jwb_65'];
  $jwb_66 = $_POST['jwb_66'];
  $jwb_67 = $_POST['jwb_67'];
  $jwb_68 = $_POST['jwb_68'];
  $jwb_69 = $_POST['jwb_69'];
  $jwb_70 = $_POST['jwb_70'];
  $jwb_71 = $_POST['jwb_71'];
  $jwb_72 = $_POST['jwb_72'];
  $jwb_73 = $_POST['jwb_73'];
  $jwb_74 = $_POST['jwb_74'];
  $jwb_75 = $_POST['jwb_75'];
  $jwb_76 = $_POST['jwb_76'];
  $jwb_77 = $_POST['jwb_77'];
  $jwb_78 = $_POST['jwb_78'];
  $jwb_79 = $_POST['jwb_79'];
  $jwb_80 = $_POST['jwb_80'];
  $jwb_81 = $_POST['jwb_81'];
  $jwb_82 = $_POST['jwb_82'];
  $jwb_83 = $_POST['jwb_83'];
  $jwb_84 = $_POST['jwb_84'];
  $jwb_85 = $_POST['jwb_85'];
  $jwb_86 = $_POST['jwb_86'];
  $jwb_87 = $_POST['jwb_87'];
  $jwb_88 = $_POST['jwb_88'];
  $jwb_89 = $_POST['jwb_89'];
  $jwb_90 = $_POST['jwb_90'];
  $jwb_91 = $_POST['jwb_91'];
  $jwb_92 = $_POST['jwb_92'];
  $jwb_93 = $_POST['jwb_93'];
  $jwb_94 = $_POST['jwb_94'];
  $jwb_95 = $_POST['jwb_95'];
  $jwb_96 = $_POST['jwb_96'];
  $jwb_97 = $_POST['jwb_97'];
  $jwb_98 = $_POST['jwb_98'];
  $jwb_99 = $_POST['jwb_99'];
  $jwb_100 = $_POST['jwb_100'];

  // id_produk bernilai '' karena kita set auto increment
  $q = $koneksi->query("INSERT INTO b_inggris VALUES (NULL,'$id_data_pelamar', '$jwb_1', '$jwb_2', '$jwb_3', '$jwb_4', '$jwb_5', '$jwb_6'
  , '$jwb_7', '$jwb_8', '$jwb_9', '$jwb_10', '$jwb_11', '$jwb_12', '$jwb_13', '$jwb_14', '$jwb_15', '$jwb_16', '$jwb_17', '$jwb_18', '$jwb_19', '$jwb_20'
  , '$jwb_21', '$jwb_22', '$jwb_23', '$jwb_24', '$jwb_25', '$jwb_26', '$jwb_27', '$jwb_28', '$jwb_29', '$jwb_30', '$jwb_31', '$jwb_32', '$jwb_33', '$jwb_34'
  , '$jwb_35', '$jwb_36', '$jwb_37', '$jwb_38', '$jwb_39', '$jwb_40', '$jwb_41', '$jwb_42', '$jwb_43', '$jwb_44', '$jwb_45', '$jwb_46', '$jwb_47', '$jwb_48'
  , '$jwb_49', '$jwb_50', '$jwb_51', '$jwb_52', '$jwb_53', '$jwb_54', '$jwb_55', '$jwb_56', '$jwb_57', '$jwb_58', '$jwb_59', '$jwb_60', '$jwb_61', '$jwb_62'
  , '$jwb_63', '$jwb_64', '$jwb_65', '$jwb_66', '$jwb_67', '$jwb_68', '$jwb_69', '$jwb_70', '$jwb_71', '$jwb_72', '$jwb_73', '$jwb_74', '$jwb_75', '$jwb_76'
  , '$jwb_77', '$jwb_78', '$jwb_79', '$jwb_80', '$jwb_81', '$jwb_82', '$jwb_83', '$jwb_84', '$jwb_85', '$jwb_86', '$jwb_87', '$jwb_88', '$jwb_89', '$jwb_90'
  , '$jwb_91', '$jwb_92', '$jwb_93', '$jwb_94', '$jwb_95', '$jwb_96', '$jwb_97', '$jwb_98', '$jwb_99', '$jwb_100', NULL, NULL)");

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
