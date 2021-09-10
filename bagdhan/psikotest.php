<!--

=========================================================
* Volt Pro - Premium Bootstrap 5 Dashboard
=========================================================

* Product Page: https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard
* Copyright 2021 Themesberg (https://www.themesberg.com)
* License (https://themesberg.com/licensing)

* Designed and coded by https://themesberg.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. Please contact us to request a removal.

-->
<?php
session_start();

if (!isset($_SESSION["id_card_number"])) {
header('Location:validation');
	exit;
}

$id_data_pelamar=$_SESSION["id_data_pelamar"];
$personal_name=$_SESSION["personal_name"];
$id_card_number=$_SESSION["id_card_number"];

include('db\koneksi.php');

//set session dulu dengan nama $_SESSION["mulai"]
if (isset($_SESSION["mulai"])) { 
  //jika session sudah ada
  $telah_berlalu = time() - $_SESSION["mulai"];
} else { 
  //jika session belum ada
  $_SESSION["mulai"]  = time();
  $telah_berlalu      = 0;
}

$sql    = mysqli_query($koneksi, "select * from timer");   
$data   = mysqli_fetch_array($sql);

$temp_waktu = ($data['waktu']*60) - $telah_berlalu; //dijadikan detik dan dikurangi waktu yang berlalu
$temp_menit = (int)($temp_waktu/60);                //dijadikan menit lagi
$temp_detik = $temp_waktu%60;                       //sisa bagi untuk detik

if ($temp_menit < 60) { 
  /* Apabila $temp_menit yang kurang dari 60 meni */
  $jam    = 0; 
  $menit  = $temp_menit; 
  $detik  = $temp_detik; 
} else { 
  /* Apabila $temp_menit lebih dari 60 menit */           
  $jam    = (int)($temp_menit/60);    //$temp_menit dijadikan jam dengan dibagi 60 dan dibulatkan menjadi integer 
  $menit  = $temp_menit%60;           //$temp_menit diambil sisa bagi ($temp_menit%60) untuk menjadi menit
  $detik  = $temp_detik;
}
?>
<!DOCTYPE html>
<html lang="en">

<head> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Primary Meta Tags -->
<title>Psikotest</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="title" content="Volt Premium Bootstrap Dashboard - Buttons">
<meta name="author" content="Themesberg">
<meta name="description" content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
<meta name="keywords" content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, themesberg, themesberg dashboard, themesberg admin dashboard" />
<link rel="canonical" href="https://themesberg.com/product/admin-dashboard/volt-premium-bootstrap-5-dashboard">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="https://demo.themesberg.com/volt-pro">
<meta property="og:title" content="Volt Premium Bootstrap Dashboard - Buttons">
<meta property="og:description" content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
<meta property="og:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/volt-pro-bootstrap-5-dashboard/volt-pro-preview.jpg">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="https://demo.themesberg.com/volt-pro">
<meta property="twitter:title" content="Volt Premium Bootstrap Dashboard - Buttons">
<meta property="twitter:description" content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
<meta property="twitter:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/volt-pro-bootstrap-5-dashboard/volt-pro-preview.jpg">

<!-- Favicon -->
<link rel="apple-touch-icon" sizes="120x120" href="resources/question/assets/img/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="resources/question/assets/img/favicon/evergreen_logo.png">
<link rel="icon" type="image/png" sizes="16x16" href="resources/question/assets/img/favicon/evergreen_logo.png">
<link rel="manifest" href="resources/question/assets/img/favicon/site.webmanifest">
<link rel="mask-icon" href="resources/question/assets/img/favicon/safari-pinned-tab.svg" color="#ffffff">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="theme-color" content="#ffffff">

<!-- Sweet Alert -->
<link type="text/css" href="resources/question/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">

<!-- Notyf -->
<link type="text/css" href="resources/question/vendor/notyf/notyf.min.css" rel="stylesheet">

<!-- Volt CSS -->
<link type="text/css" href="resources/question/css/volt.css" rel="stylesheet">

<script src="http://code.jquery.com/jquery-1.10.2.min.js" type="text/javascript"></script>

<!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->

<script type="text/javascript">
        $(document).ready(function() {
            /** Membuat Waktu Mulai Hitung Mundur Dengan 
                * var detik;
                * var menit;
                * var jam;
            */
            var detik   = <?= $detik; ?>;
            var menit   = <?= $menit; ?>;
            var jam     = <?= $jam; ?>;
                  
            /**
               * Membuat function hitung() sebagai Penghitungan Waktu
            */
            function hitung() {
                /** setTimout(hitung, 1000) digunakan untuk 
                     * mengulang atau merefresh halaman selama 1000 (1 detik) 
                */
                setTimeout(hitung,1000);
  
                /** Jika waktu kurang dari 10 menit maka Timer akan berubah menjadi warna merah */
                if(menit < 10 && jam == 0){
                    var peringatan = 'style="color:red"';
                };
  
                /** Menampilkan Waktu Timer pada Tag #Timer di HTML yang tersedia */
                $('#timer').html(
                  '<span class="mt-1 ms-1 sidebar-text">' + jam + ' jam : ' + menit + ' menit : ' + detik + ' detik</span>'
                );
  
                /** Melakukan Hitung Mundur dengan Mengurangi variabel detik - 1 */
                detik --;
  
                /** Jika var detik < 0
                    * var detik akan dikembalikan ke 59
                    * Menit akan Berkurang 1
                */
                if(detik < 0) {
                    detik = 59;
                    menit --;
  
                   /** Jika menit < 0
                        * Maka menit akan dikembali ke 59
                        * Jam akan Berkurang 1
                    */
                    if(menit < 0) {
                        menit = 59;
                        jam --;
  
                        /** Jika var jam < 0
                            * clearInterval() Memberhentikan Interval dan submit secara otomatis
                        */
                             
                        if(jam < 0) { 
                            clearInterval(hitung); 
                            /** Variable yang digunakan untuk submit secara otomatis di Form */
                            var msform = document.getElementById("msform"); 
                            alert('Waktu telah habis, jawaban Anda akan otomatis tersimpan.');
                            msform.submit(); 
                        } 
                    } 
                } 
            }           
            /** Menjalankan Function Hitung Waktu Mundur */
            hitung();
        });
    </script>
</head>

<body>

        <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->
        
    
        <nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
    <a class="navbar-brand me-lg-5" href="index.html">
        <img class="navbar-brand-dark" src="resources/question/assets/img/brand/light.svg" alt="Volt logo" /> <img class="navbar-brand-light" src="assets/img/brand/dark.svg" alt="Volt logo" />
    </a>
    <div class="d-flex align-items-center">
        <button class="navbar-toggler d-lg-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

        <nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
  <div class="sidebar-inner px-4 pt-3">
    <div class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
      <div class="d-flex align-items-center">
        <div class="avatar-lg me-4">
        </div>
        <div class="d-block">
        </div>
      </div>
      <div class="collapse-close d-md-none">
        <a href="#sidebarMenu" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="true"
            aria-label="Toggle navigation">
            <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
          </a>
      </div>
    </div>
    <ul class="nav flex-column pt-3 pt-md-0">
      <li class="nav-item">
        <a href="#" class="nav-link d-flex align-items-center">
          <span class="sidebar-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-person" viewBox="0 0 16 16">
  <path d="M12 1a1 1 0 0 1 1 1v10.755S12 11 8 11s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h8zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z"/>
  <path d="M8 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
</svg>
          </span>
          <span class="mt-1 ms-1 sidebar-text">Halo, <?php echo $personal_name; ?></span>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link d-flex align-items-center">
          <span class="sidebar-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
  <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
  <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
</svg>
          </span>
          <span class="mt-1 ms-1 sidebar-text">Waktu tersisa</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link d-flex align-items-center">
          <div id='timer'></div>
        </a>
      </li>
    </ul>
  </div>
</nav>
    
        <main class="content">

            

            <div class="py-4">
                
                <div class="d-flex justify-content-between w-100 flex-wrap">
                    <div class="mb-3 mb-lg-0">
                        <h1 class="h4">Intelegensia Test</h1>
                        <p class="mb-0">Isilah pertanyaan dengan cermat, batas waktunya adalah 1 jam. Semoga beruntung..</p>
                    </div>
                </div>
            </div>

            <form method="post" action="input_psikotest" id="msform">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="card border-light shadow-sm components-section">
                        <div class="card-body">
                                <div class="mb-3">
                                    <h1 class="h4">Bagian 1. Berhitung Angka</h1>
                                    <h2 class="h5">INSTRUKSI:</h2>
                                </div>
                                <!--Buttons-->
                                <p align="justify">Tes berikut ini terdiri dari soal-soal berhitung.<br>
                                Setiap soal disertai dengan empat kemungkinan jawaban a, b, c, dan d.
                                Salah satu diantaranya adalah jawaban yang benar dari soal tersebut.
                                Cara menjawabnya adalah dengan melingkari pada lembar jawaban di belakang nomor soal yang bersangkutan,
                                huruf yang sesuai dengan jawaban tersebut.<br><br>
                                <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\contoh-berhitung-angka-1.png"><br>
                                Pada contoh 1 dapat dilihat bahwa 18 + 7 = 25. Dibelakang contoh 1 dapat dilihat bahwa angka 25 terdapat di bawah
                                huruf a. Oleh karena itu, pada lembar jawaban dibelakang contoh 1, huruf a telah dilingkari.<br>
                                Jawaban yang benar dari contoh 2 adalah <sup>1</sup>/<sub>4</sub>. Oleh karena itu pada lembar jawaban dibelakang contoh 2,
                                huruf c telah dilingkari.<br>
                                Coba pecahkan sendiri contoh-contoh dibawah ini, dan lingkarilah pada lembar jawaban dibelakang nomor contoh yang bersangkutan,
                                huruf yang sesuai dengan jawaban yang benar.<br><br>
                                <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\contoh-berhitung-angka-2.png"><br><br>
                                Jawaban yang benar dari contoh 3 adalah 9. Oleh karena itu pada lembar jawaban dibelakang contoh 3, huruf d harus dilingkari. Jawaban yang
                                benar contoh-contoh lainnya adalah: contoh 4: b; contoh 5: C.<br>
                                Jika perlu, perhitungan-perhitungan dapat dilakukan pada kertas buram yang tersedia.</p>
                            </div>
                        </div>
                        <br>
                    <div class="card border-light shadow-sm components-section">
                        <div class="card-body">
                                <div class="mb-3">
                                    <h1 class="h4">SOAL-SOAL</h1>
                                    <h2 class="h5">PILIHLAH JAWABAN YANG BENAR PADA LEMBAR JAWABAN</h2>
                                </div>
                                <!--Buttons-->
                                <legend class="h6">1. 78 : 13 = .......</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="hidden" name="id_data_pelamar" value="<?php echo $id_data_pelamar; ?>">
                                            <input class="form-check-input" type="radio" name="angka_1" id="exampleRadios1" value="a">
                                            <label class="form-check-label" for="exampleRadios1">
                                              a. 5
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_1" id="exampleRadios2" value="b">
                                            <label class="form-check-label" for="exampleRadios2">
                                              b. 6
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_1" id="exampleRadios3" value="c">
                                            <label class="form-check-label" for="exampleRadios3">
                                              c. 7
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_1" id="exampleRadios4" value="d">
                                            <label class="form-check-label" for="exampleRadios4">
                                              d. 8
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">2. ....... + 49 = 81</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_2" id="exampleRadios5" value="a">
                                            <label class="form-check-label" for="exampleRadios5">
                                              a. 34
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_2" id="exampleRadios6" value="b">
                                            <label class="form-check-label" for="exampleRadios6">
                                              b. 36
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_2" id="exampleRadios7" value="c">
                                            <label class="form-check-label" for="exampleRadios7">
                                              c. 32
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_2" id="exampleRadios8" value="d">
                                            <label class="form-check-label" for="exampleRadios8">
                                              d. 28
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">3. ....... - 17 = 18</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_3" id="exampleRadios9" value="a">
                                            <label class="form-check-label" for="exampleRadios9">
                                              a. 32
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_3" id="exampleRadios10" value="b">
                                            <label class="form-check-label" for="exampleRadios10">
                                              b. 37
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_3" id="exampleRadios11" value="c">
                                            <label class="form-check-label" for="exampleRadios11">
                                              c. 35
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_3" id="exampleRadios12" value="d">
                                            <label class="form-check-label" for="exampleRadios12">
                                              d. 34
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">4. 9 x ....... = 117</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_4" id="exampleRadios13" value="a">
                                            <label class="form-check-label" for="exampleRadios13">
                                              a. 13
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_4" id="exampleRadios14" value="b">
                                            <label class="form-check-label" for="exampleRadios14">
                                              b. 14
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_4" id="exampleRadios15" value="c">
                                            <label class="form-check-label" for="exampleRadios15">
                                              c. 12
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_4" id="exampleRadios16" value="d">
                                            <label class="form-check-label" for="exampleRadios16">
                                              d. 15
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">5. <sup>5</sup>/<sub>7</sub> x 14 = .......</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_5" id="exampleRadios17" value="a">
                                            <label class="form-check-label" for="exampleRadios17">
                                              a. 17 <sup>1</sup>/<sub>2</sub>
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_5" id="exampleRadios18" value="b">
                                            <label class="form-check-label" for="exampleRadios18">
                                              b. 10
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_5" id="exampleRadios19" value="c">
                                            <label class="form-check-label" for="exampleRadios19">
                                              c. <sup>60</sup>/<sub>7</sub>
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_5" id="exampleRadios20" value="d">
                                            <label class="form-check-label" for="exampleRadios20">
                                              d. 9
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">6. 13 x 4 = .......</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_6" id="exampleRadios21" value="a">
                                            <label class="form-check-label" for="exampleRadios21">
                                              a. 62
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_6" id="exampleRadios22" value="b">
                                            <label class="form-check-label" for="exampleRadios22">
                                              b. 58
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_6" id="exampleRadios23" value="c">
                                            <label class="form-check-label" for="exampleRadios23">
                                              c. 54
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_6" id="exampleRadios24" value="d">
                                            <label class="form-check-label" for="exampleRadios24">
                                              d. 52
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">7. 13 + 8 = .......</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_7" id="exampleRadios25" value="a">
                                            <label class="form-check-label" for="exampleRadios25">
                                              a. 22
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_7" id="exampleRadios26" value="b">
                                            <label class="form-check-label" for="exampleRadios26">
                                              b. 24
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_7" id="exampleRadios27" value="c">
                                            <label class="form-check-label" for="exampleRadios27">
                                              c. 23
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_7" id="exampleRadios28" value="d">
                                            <label class="form-check-label" for="exampleRadios28">
                                              d. 21
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">8. 32 : 8 = .......</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_8" id="exampleRadios29" value="a">
                                            <label class="form-check-label" for="exampleRadios29">
                                              a. 4
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_8" id="exampleRadios30" value="b">
                                            <label class="form-check-label" for="exampleRadios30">
                                              b. 3
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_8" id="exampleRadios31" value="c">
                                            <label class="form-check-label" for="exampleRadios31">
                                              c. 2
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_8" id="exampleRadios32" value="d">
                                            <label class="form-check-label" for="exampleRadios32">
                                              d. 5
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">9. 25 + 6 = .......</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_9" id="exampleRadios33" value="a">
                                            <label class="form-check-label" for="exampleRadios33">
                                              a. 33
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_9" id="exampleRadios34" value="b">
                                            <label class="form-check-label" for="exampleRadios34">
                                              b. 41
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_9" id="exampleRadios35" value="c">
                                            <label class="form-check-label" for="exampleRadios35">
                                              c. 42
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_9" id="exampleRadios36" value="d">
                                            <label class="form-check-label" for="exampleRadios36">
                                              d. 31
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">10. 0.25 + 0.07 = .......</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_10" id="exampleRadios37" value="a">
                                            <label class="form-check-label" for="exampleRadios37">
                                              a. 0.32
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_10" id="exampleRadios38" value="b">
                                            <label class="form-check-label" for="exampleRadios38">
                                              b. 0.23
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_10" id="exampleRadios39" value="c">
                                            <label class="form-check-label" for="exampleRadios39">
                                              c. 0.032
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_10" id="exampleRadios40" value="d">
                                            <label class="form-check-label" for="exampleRadios40">
                                              d. 0.257
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">11. 43 - ....... = 27</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_11" id="exampleRadios41" value="a">
                                            <label class="form-check-label" for="exampleRadios41">
                                              a. 14
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_11" id="exampleRadios42" value="b">
                                            <label class="form-check-label" for="exampleRadios42">
                                              b. 16
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_11" id="exampleRadios43" value="c">
                                            <label class="form-check-label" for="exampleRadios43">
                                              c. 15
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_11" id="exampleRadios44" value="d">
                                            <label class="form-check-label" for="exampleRadios44">
                                              d. 17
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">12. 22 - ....... = 9</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_12" id="exampleRadios45" value="a">
                                            <label class="form-check-label" for="exampleRadios45">
                                              a. 14
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_12" id="exampleRadios46" value="b">
                                            <label class="form-check-label" for="exampleRadios46">
                                              b. 15
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_12" id="exampleRadios47" value="c">
                                            <label class="form-check-label" for="exampleRadios47">
                                              c. 13
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_12" id="exampleRadios48" value="d">
                                            <label class="form-check-label" for="exampleRadios48">
                                              d. 17
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">13. <sup>14</sup>/<sub>7</sub> x <sup>2</sup>/<sub>7</sub> = .......</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_13" id="exampleRadios49" value="a">
                                            <label class="form-check-label" for="exampleRadios49">
                                              a. <sup>5</sup>/<sub>7</sub>
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_13" id="exampleRadios50" value="b">
                                            <label class="form-check-label" for="exampleRadios50">
                                              b. <sup>4</sup>/<sub>7</sub>
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_13" id="exampleRadios51" value="c">
                                            <label class="form-check-label" for="exampleRadios51">
                                              c. <sup>3</sup>/<sub>7</sub>
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_13" id="exampleRadios52" value="d">
                                            <label class="form-check-label" for="exampleRadios52">
                                              d. <sup>2</sup>/<sub>7</sub>
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">14. <sup>6</sup>/<sub>8</sub> x <sup>2</sup>/<sub>4</sub> = .......</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_14" id="exampleRadios53" value="a">
                                            <label class="form-check-label" for="exampleRadios53">
                                              a. <sup>5</sup>/<sub>8</sub>
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_14" id="exampleRadios54" value="b">
                                            <label class="form-check-label" for="exampleRadios54">
                                              b. <sup>3</sup>/<sub>4</sub>
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_14" id="exampleRadios55" value="c">
                                            <label class="form-check-label" for="exampleRadios55">
                                              c. <sup>3</sup>/<sub>8</sub>
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_14" id="exampleRadios56" value="d">
                                            <label class="form-check-label" for="exampleRadios56">
                                              d. <sup>1</sup>/<sub>4</sub>
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">15. 26 + ....... = 38</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_15" id="exampleRadios57" value="a">
                                            <label class="form-check-label" for="exampleRadios57">
                                              a. 8
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_15" id="exampleRadios58" value="b">
                                            <label class="form-check-label" for="exampleRadios58">
                                              b. 12
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_15" id="exampleRadios58" value="c">
                                            <label class="form-check-label" for="exampleRadios58">
                                              c. 11
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_15" id="exampleRadios59" value="d">
                                            <label class="form-check-label" for="exampleRadios59">
                                              d. 9
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">16. ....... x <sup>1</sup>/<sub>5</sub> = 5</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_16" id="exampleRadios60" value="a">
                                            <label class="form-check-label" for="exampleRadios60">
                                              a. <sup>110</sup>/<sub>5</sub>
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_16" id="exampleRadios61" value="b">
                                            <label class="form-check-label" for="exampleRadios61">
                                              b. <sup>120</sup>/<sub>5</sub>
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_16" id="exampleRadios62" value="c">
                                            <label class="form-check-label" for="exampleRadios62">
                                              c. <sup>125</sup>/<sub>5</sub>
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_16" id="exampleRadios63" value="d">
                                            <label class="form-check-label" for="exampleRadios63">
                                              d. <sup>100</sup>/<sub>5</sub>
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">17. 17 + 9 = .......</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_17" id="exampleRadios64" value="a">
                                            <label class="form-check-label" for="exampleRadios64">
                                              a. 24
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_17" id="exampleRadios65" value="b">
                                            <label class="form-check-label" for="exampleRadios65">
                                              b. 25
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_17" id="exampleRadios66" value="c">
                                            <label class="form-check-label" for="exampleRadios66">
                                              c. 26
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_17" id="exampleRadios67" value="d">
                                            <label class="form-check-label" for="exampleRadios67">
                                              d. 27
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">18. 27 + ....... = 51</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_18" id="exampleRadios68" value="a">
                                            <label class="form-check-label" for="exampleRadios68">
                                              a. 14
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_18" id="exampleRadios69" value="b">
                                            <label class="form-check-label" for="exampleRadios69">
                                              b. 25
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_18" id="exampleRadios70" value="c">
                                            <label class="form-check-label" for="exampleRadios70">
                                              c. 27
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_18" id="exampleRadios71" value="d">
                                            <label class="form-check-label" for="exampleRadios71">
                                              d. 24
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">19. 27 x 3 = .......</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_19" id="exampleRadios72" value="a">
                                            <label class="form-check-label" for="exampleRadios72">
                                              a. 81
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_19" id="exampleRadios73" value="b">
                                            <label class="form-check-label" for="exampleRadios73">
                                              b. 71
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_19" id="exampleRadios74" value="c">
                                            <label class="form-check-label" for="exampleRadios74">
                                              c. 75
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_19" id="exampleRadios75" value="d">
                                            <label class="form-check-label" for="exampleRadios75">
                                              d. 91
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">20. 0.03 + 0.025 = .......</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_20" id="exampleRadios76" value="a">
                                            <label class="form-check-label" for="exampleRadios76">
                                              a. 0.28
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_20" id="exampleRadios77" value="b">
                                            <label class="form-check-label" for="exampleRadios77">
                                              b. 0.05
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_20" id="exampleRadios78" value="c">
                                            <label class="form-check-label" for="exampleRadios78">
                                              c. 0.5
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_20" id="exampleRadios79" value="d">
                                            <label class="form-check-label" for="exampleRadios79">
                                              d. 0.032
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">21. 0.13 - 0.019 = .......</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_21" id="exampleRadios80" value="a">
                                            <label class="form-check-label" for="exampleRadios80">
                                              a. 0.111
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_21" id="exampleRadios81" value="b">
                                            <label class="form-check-label" for="exampleRadios81">
                                              b. 0.31
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_21" id="exampleRadios82" value="c">
                                            <label class="form-check-label" for="exampleRadios82">
                                              c. 0.110
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_21" id="exampleRadios83" value="d">
                                            <label class="form-check-label" for="exampleRadios83">
                                              d. 0.031
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">22. <sup>8</sup>/<sub>9</sub> + ....... = 1</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_22" id="exampleRadios84" value="a">
                                            <label class="form-check-label" for="exampleRadios84">
                                              a. <sup>3</sup>/<sub>18</sub>
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_22" id="exampleRadios85" value="b">
                                            <label class="form-check-label" for="exampleRadios85">
                                              b. <sup>2</sup>/<sub>9</sub>
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_22" id="exampleRadios86" value="c">
                                            <label class="form-check-label" for="exampleRadios86">
                                              c. <sup>2</sup>/<sub>18</sub>
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_22" id="exampleRadios87" value="d">
                                            <label class="form-check-label" for="exampleRadios87">
                                              d. <sup>4</sup>/<sub>18</sub>
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">23. 36 - 19 = .......</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_23" id="exampleRadios88" value="a">
                                            <label class="form-check-label" for="exampleRadios88">
                                              a. 15
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_23" id="exampleRadios89" value="b">
                                            <label class="form-check-label" for="exampleRadios89">
                                              b. 18
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_23" id="exampleRadios90" value="c">
                                            <label class="form-check-label" for="exampleRadios90">
                                              c. 16
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_23" id="exampleRadios91" value="d">
                                            <label class="form-check-label" for="exampleRadios91">
                                              d. 17
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">24. ....... + <sup>2</sup>/<sub>3</sub> = <sup>7</sup>/<sub>6</sub></legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_24" id="exampleRadios92" value="a">
                                            <label class="form-check-label" for="exampleRadios92">
                                              a. <sup>3</sup>/<sub>6</sub>
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_24" id="exampleRadios93" value="b">
                                            <label class="form-check-label" for="exampleRadios93">
                                              b. <sup>1</sup>/<sub>3</sub>
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_24" id="exampleRadios94" value="c">
                                            <label class="form-check-label" for="exampleRadios94">
                                              c. <sup>4</sup>/<sub>6</sub>
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_24" id="exampleRadios95" value="d">
                                            <label class="form-check-label" for="exampleRadios95">
                                              d. <sup>3</sup>/<sub>9</sub>
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">25. 0.019 - 0.011 = .......</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_25" id="exampleRadios96" value="a">
                                            <label class="form-check-label" for="exampleRadios96">
                                              a. 0.008
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_25" id="exampleRadios97" value="b">
                                            <label class="form-check-label" for="exampleRadios97">
                                              b. 0.08
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_25" id="exampleRadios98" value="c">
                                            <label class="form-check-label" for="exampleRadios98">
                                              c. 0.18
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_25" id="exampleRadios99" value="d">
                                            <label class="form-check-label" for="exampleRadios99">
                                              d. 0.018
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">26. 0.14 + 0.023 = .......</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_26" id="exampleRadios100" value="a">
                                            <label class="form-check-label" for="exampleRadios100">
                                              a. 0.1423
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_26" id="exampleRadios101" value="b">
                                            <label class="form-check-label" for="exampleRadios101">
                                              b. 0.163
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_26" id="exampleRadios102" value="c">
                                            <label class="form-check-label" for="exampleRadios102">
                                              c. 0.37
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_26" id="exampleRadios103" value="d">
                                            <label class="form-check-label" for="exampleRadios103">
                                              d. 0.037
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">27. <sup>4</sup>/<sub>8</sub> x <sup>12</sup>/<sub>16</sub> = .......</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_27" id="exampleRadios104" value="a">
                                            <label class="form-check-label" for="exampleRadios104">
                                              a. <sup>5</sup>/<sub>16</sub>
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_27" id="exampleRadios105" value="b">
                                            <label class="form-check-label" for="exampleRadios105">
                                              b. <sup>3</sup>/<sub>8</sub>
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_27" id="exampleRadios106" value="c">
                                            <label class="form-check-label" for="exampleRadios106">
                                              c. <sup>1</sup>/<sub>4</sub>
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_27" id="exampleRadios107" value="d">
                                            <label class="form-check-label" for="exampleRadios107">
                                              d. <sup>7</sup>/<sub>16</sub>
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">28. 0.47 - 0.024 = .......</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_28" id="exampleRadios108" value="a">
                                            <label class="form-check-label" for="exampleRadios108">
                                              a. 0.456
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_28" id="exampleRadios109" value="b">
                                            <label class="form-check-label" for="exampleRadios109">
                                              b. 0.023
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_28" id="exampleRadios110" value="c">
                                            <label class="form-check-label" for="exampleRadios110">
                                              c. 0.446
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_28" id="exampleRadios111" value="d">
                                            <label class="form-check-label" for="exampleRadios111">
                                              d. 0.23
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">29. 0.27 : 0.3 = .......</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_29" id="exampleRadios112" value="a">
                                            <label class="form-check-label" for="exampleRadios112">
                                              a. 0.81
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_29" id="exampleRadios113" value="b">
                                            <label class="form-check-label" for="exampleRadios113">
                                              b. 0.09
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_29" id="exampleRadios114" value="c">
                                            <label class="form-check-label" for="exampleRadios114">
                                              c. 0.9
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_29" id="exampleRadios115" value="d">
                                            <label class="form-check-label" for="exampleRadios115">
                                              d. 0.081
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">30. <sup>6</sup>/<sub>7</sub> + <sup>18</sup>/<sub>21</sub> = .......</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_30" id="exampleRadios116" value="a">
                                            <label class="form-check-label" for="exampleRadios116">
                                              a. <sup>12</sup>/<sub>7</sub>
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_30" id="exampleRadios117" value="b">
                                            <label class="form-check-label" for="exampleRadios117">
                                              b. <sup>11</sup>/<sub>7</sub>
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_30" id="exampleRadios118" value="c">
                                            <label class="form-check-label" for="exampleRadios118">
                                              c. <sup>10</sup>/<sub>7</sub>
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_30" id="exampleRadios119" value="d">
                                            <label class="form-check-label" for="exampleRadios119">
                                              d. <sup>13</sup>/<sub>7</sub>
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">31. 0.68 - 0.3 = .......</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_31" id="exampleRadios120" value="a">
                                            <label class="form-check-label" for="exampleRadios120">
                                              a. 0.35
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_31" id="exampleRadios121" value="b">
                                            <label class="form-check-label" for="exampleRadios121">
                                              b. 0.38
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_31" id="exampleRadios122" value="c">
                                            <label class="form-check-label" for="exampleRadios122">
                                              c. 0.65
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_31" id="exampleRadios123" value="d">
                                            <label class="form-check-label" for="exampleRadios123">
                                              d. 0.035
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">32. <sup>3</sup>/<sub>8</sub> - ....... = <sup>1</sup>/<sub>8</sub></legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_32" id="exampleRadios124" value="a">
                                            <label class="form-check-label" for="exampleRadios124">
                                              a. <sup>2</sup>/<sub>16</sub>
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_32" id="exampleRadios125" value="b">
                                            <label class="form-check-label" for="exampleRadios125">
                                              b. <sup>6</sup>/<sub>24</sub>
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_32" id="exampleRadios126" value="c">
                                            <label class="form-check-label" for="exampleRadios126">
                                              c. <sup>4</sup>/<sub>24</sub>
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_32" id="exampleRadios127" value="d">
                                            <label class="form-check-label" for="exampleRadios127">
                                              d. <sup>5</sup>/<sub>16</sub>
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">33. 0.03 x ....... = 0.018</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_33" id="exampleRadios128" value="a">
                                            <label class="form-check-label" for="exampleRadios128">
                                              a. 0.006
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_33" id="exampleRadios129" value="b">
                                            <label class="form-check-label" for="exampleRadios129">
                                              b. 0.6
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_33" id="exampleRadios130" value="c">
                                            <label class="form-check-label" for="exampleRadios130">
                                              c. 0.06
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_33" id="exampleRadios131" value="d">
                                            <label class="form-check-label" for="exampleRadios131">
                                              d. 0.606
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">34. 0.3 + ....... = 0.43</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_34" id="exampleRadios132" value="a">
                                            <label class="form-check-label" for="exampleRadios132">
                                              a. 0.4
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_34" id="exampleRadios133" value="b">
                                            <label class="form-check-label" for="exampleRadios133">
                                              b. 13
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_34" id="exampleRadios134" value="c">
                                            <label class="form-check-label" for="exampleRadios134">
                                              c. 0.04
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_34" id="exampleRadios135" value="d">
                                            <label class="form-check-label" for="exampleRadios135">
                                              d. 0.13
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">35. 30 - <sup>26</sup>/<sub>7</sub> = .......</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_35" id="exampleRadios136" value="a">
                                            <label class="form-check-label" for="exampleRadios136">
                                              a. 26<sup>2</sup>/<sub>7</sub>
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_35" id="exampleRadios137" value="b">
                                            <label class="form-check-label" for="exampleRadios137">
                                              b. 25<sup>3</sup>/<sub>7</sub>
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_35" id="exampleRadios138" value="c">
                                            <label class="form-check-label" for="exampleRadios138">
                                              c. 27<sup>2</sup>/<sub>7</sub>
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_35" id="exampleRadios139" value="d">
                                            <label class="form-check-label" for="exampleRadios139">
                                              d. 26<sup>3</sup>/<sub>7</sub>
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">36. 26 - <sup>26</sup>/<sub>8</sub> = .......</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_36" id="exampleRadios140" value="a">
                                            <label class="form-check-label" for="exampleRadios140">
                                              a. 21<sup>1</sup>/<sub>4</sub>
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_36" id="exampleRadios141" value="b">
                                            <label class="form-check-label" for="exampleRadios141">
                                              b. 22<sup>3</sup>/<sub>4</sub>
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_36" id="exampleRadios142" value="c">
                                            <label class="form-check-label" for="exampleRadios142">
                                              c. 23<sup>1</sup>/<sub>4</sub>
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_36" id="exampleRadios143" value="d">
                                            <label class="form-check-label" for="exampleRadios143">
                                              d. 22<sup>1</sup>/<sub>4</sub>
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">37. 0.24 x ....... = 0.096</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_37" id="exampleRadios144" value="a">
                                            <label class="form-check-label" for="exampleRadios144">
                                              a. 0.4
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_37" id="exampleRadios145" value="b">
                                            <label class="form-check-label" for="exampleRadios145">
                                              b. 4
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_37" id="exampleRadios146" value="c">
                                            <label class="form-check-label" for="exampleRadios146">
                                              c. 0.04
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_37" id="exampleRadios147" value="d">
                                            <label class="form-check-label" for="exampleRadios147">
                                              d. 0.004
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">38. <sup>7</sup>/<sub>8</sub> x ....... = <sup>7</sup>/<sub>6</sub></legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_38" id="exampleRadios148" value="a">
                                            <label class="form-check-label" for="exampleRadios148">
                                              a. <sup>4</sup>/<sub>5</sub>
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_38" id="exampleRadios149" value="b">
                                            <label class="form-check-label" for="exampleRadios149">
                                              b. <sup>4</sup>/<sub>3</sub>
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_38" id="exampleRadios150" value="c">
                                            <label class="form-check-label" for="exampleRadios150">
                                              c. <sup>5</sup>/<sub>4</sub>
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_38" id="exampleRadios151" value="d">
                                            <label class="form-check-label" for="exampleRadios151">
                                              d. <sup>3</sup>/<sub>4</sub>
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">39. 0.32 : 0.2 = .......</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_39" id="exampleRadios152" value="a">
                                            <label class="form-check-label" for="exampleRadios152">
                                              a. 1.6
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_39" id="exampleRadios153" value="b">
                                            <label class="form-check-label" for="exampleRadios153">
                                              b. 0.16
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_39" id="exampleRadios154" value="c">
                                            <label class="form-check-label" for="exampleRadios154">
                                              c. 0.64
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_39" id="exampleRadios155" value="d">
                                            <label class="form-check-label" for="exampleRadios155">
                                              d. 6.4
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">40. 0.33 : ....... = 0.03</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_40" id="exampleRadios156" value="a">
                                            <label class="form-check-label" for="exampleRadios156">
                                              a. 1.1
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_40" id="exampleRadios157" value="b">
                                            <label class="form-check-label" for="exampleRadios157">
                                              b. 110
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_40" id="exampleRadios158" value="c">
                                            <label class="form-check-label" for="exampleRadios158">
                                              c. 0.11
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="angka_40" id="exampleRadios159" value="d">
                                            <label class="form-check-label" for="exampleRadios159">
                                              d. 11
                                            </label>
                                          </div>
                            </div>
                        </div>
                        <br>
                    <div class="card border-light shadow-sm components-section">
                        <div class="card-body">
                                <div class="mb-3">
                                    <h1 class="h4">Bagian 2. Gabungan Bagian</h1>
                                    <h2 class="h5">INSTRUKSI:</h2>
                                </div>
                                <!--Buttons-->
                                <p align="justify">Tes berikut ini terdiri dari gambar bentuk-bentuk.<br>
                                Gambar disebelah kiri dari setiap soal merupakan bentuk terpotong menjadi 3 bagian yang sudah ditentukan.
                                Disebelah kanannya terdapat 6 gambar a, b, c, d, e, dan f. Dua diantaranya terbuat dari bagian-bagian
                                yang terdapat disebelah kiri. Carilah kedua gambar tersebut. Apabila sudah ditemukan, lingkarilah pada lembar
                                jawaban di belakang nomor soal yang bersangkutan, huruf-huruf yang menunjukkan gambar yang dimaksud.<br><br>
                                Perhatikan sekarang contoh dibawah ini.<br>
                                Contoh:<br>
                                <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\contoh-gabungan-bagian.png"><br>
                                Pada contoh 1 dapat dilihat bahwa jika bagian-bagian yang terdapat disebelah kiri digabungkan, maka akan
                                diperoleh gambar-gambar b dan d. Oleh karena itu, pada lembar jawaban di belakang contoh 1, huruf b dan d
                                telah dilingkari. Jika bagian-bagian yang terdapat di sebelah kiri dari contoh 2 digabungkan, maka akan
                                diperoleh gambar c dan f. Oleh karena itu pada lembar jawaban dibelakang contoh 2, huruf c dan f telah dilingkari.<br><br>
                                Dibawah masih terdapat dua contoh lagi. Kerjakan menurut cara yang sama.<br>
                                Contoh:<br>
                                <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\contoh-gabungan-bagian-2.png"><br>
                                Jawaban yang benar dari contoh-contoh diatas adalah: contoh 3: c dan f, contoh 4: a dan d.</p>
                            </div>
                        </div>
                        <br>
                    <div class="card border-light shadow-sm components-section">
                        <div class="card-body">
                                <div class="mb-3">
                                    <h1 class="h4">SOAL-SOAL</h1>
                                    <h2 class="h5">PILIHLAH JAWABAN YANG BENAR PADA LEMBAR JAWABAN YANG BENAR</h2>
                                </div>
                                <legend class="h6">1. <img src="resources\question\assets\img\soal-psikotes\soal-gabungan-1.png"></legend>
                                        
                                            <input class="form-check-input" type="checkbox" name="gabungan_1[]" id="examplecheckbox1" value="a">
                                            <label class="form-check-label" for="examplecheckbox1">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-1-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_1[]" id="examplecheckbox2" value="b">
                                            <label class="form-check-label" for="examplecheckbox2">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-1-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_1[]" id="examplecheckbox3" value="c">
                                            <label class="form-check-label" for="examplecheckbox3">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-1-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_1[]" id="examplecheckbox4" value="d">
                                            <label class="form-check-label" for="examplecheckbox4">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-1-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_1[]" id="examplecheckbox5" value="e">
                                            <label class="form-check-label" for="examplecheckbox5">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-1-e.png">
                                            </label>
                                            <br>
                                            <input class="form-check-input" type="checkbox" name="gabungan_1[]" id="examplecheckbox6" value="f">
                                            <label class="form-check-label" for="examplecheckbox6">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-1-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">2. <img src="resources\question\assets\img\soal-psikotes\soal-gabungan-2.png"></legend>
                                        
                                            <input class="form-check-input" type="checkbox" name="gabungan_2[]" id="examplecheckbox7" value="a">
                                            <label class="form-check-label" for="examplecheckbox7">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-2-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_2[]" id="examplecheckbox8" value="b">
                                            <label class="form-check-label" for="examplecheckbox8">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-2-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_2[]" id="examplecheckbox9" value="c">
                                            <label class="form-check-label" for="examplecheckbox9">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-2-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_2[]" id="examplecheckbox10" value="d">
                                            <label class="form-check-label" for="examplecheckbox10">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-2-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_2[]" id="examplecheckbox11" value="e">
                                            <label class="form-check-label" for="examplecheckbox11">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-2-e.png">
                                            </label>
                                            <br>
                                            <input class="form-check-input" type="checkbox" name="gabungan_2[]" id="examplecheckbox12" value="f">
                                            <label class="form-check-label" for="examplecheckbox12">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-2-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">3. <img src="resources\question\assets\img\soal-psikotes\soal-gabungan-3.png"></legend>
                                        
                                            <input class="form-check-input" type="checkbox" name="gabungan_3[]" id="examplecheckbox13" value="a">
                                            <label class="form-check-label" for="examplecheckbox13">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-3-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_3[]" id="examplecheckbox14" value="b">
                                            <label class="form-check-label" for="examplecheckbox14">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-3-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_3[]" id="examplecheckbox15" value="c">
                                            <label class="form-check-label" for="examplecheckbox15">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-3-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_3[]" id="examplecheckbox16" value="d">
                                            <label class="form-check-label" for="examplecheckbox16">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-3-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_3[]" id="examplecheckbox17" value="e">
                                            <label class="form-check-label" for="examplecheckbox17">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-3-e.png">
                                            </label>
                                            <br>
                                            <input class="form-check-input" type="checkbox" name="gabungan_3[]" id="examplecheckbox18" value="f">
                                            <label class="form-check-label" for="examplecheckbox18">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-3-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">4. <img src="resources\question\assets\img\soal-psikotes\soal-gabungan-4.png"></legend>
                                        
                                            <input class="form-check-input" type="checkbox" name="gabungan_4[]" id="examplecheckbox19" value="a">
                                            <label class="form-check-label" for="examplecheckbox19">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-4-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_4[]" id="examplecheckbox20" value="b">
                                            <label class="form-check-label" for="examplecheckbox20">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-4-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_4[]" id="examplecheckbox21" value="c">
                                            <label class="form-check-label" for="examplecheckbox21">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-4-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_4[]" id="examplecheckbox22" value="d">
                                            <label class="form-check-label" for="examplecheckbox22">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-4-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_4[]" id="examplecheckbox23" value="e">
                                            <label class="form-check-label" for="examplecheckbox23">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-4-e.png">
                                            </label>
                                            <br>
                                            <input class="form-check-input" type="checkbox" name="gabungan_4[]" id="examplecheckbox24" value="f">
                                            <label class="form-check-label" for="examplecheckbox24">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-4-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">5. <img src="resources\question\assets\img\soal-psikotes\soal-gabungan-5.png"></legend>
                                        
                                            <input class="form-check-input" type="checkbox" name="gabungan_5[]" id="examplecheckbox25" value="a">
                                            <label class="form-check-label" for="examplecheckbox25">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-5-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_5[]" id="examplecheckbox26" value="b">
                                            <label class="form-check-label" for="examplecheckbox26">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-5-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_5[]" id="examplecheckbox27" value="c">
                                            <label class="form-check-label" for="examplecheckbox27">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-5-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_5[]" id="examplecheckbox28" value="d">
                                            <label class="form-check-label" for="examplecheckbox28">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-5-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_5[]" id="examplecheckbox29" value="e">
                                            <label class="form-check-label" for="examplecheckbox29">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-5-e.png">
                                            </label>
                                            <br>
                                            <input class="form-check-input" type="checkbox" name="gabungan_5[]" id="examplecheckbox30" value="f">
                                            <label class="form-check-label" for="examplecheckbox30">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-5-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">6. <img src="resources\question\assets\img\soal-psikotes\soal-gabungan-6.png"></legend>
                                        
                                            <input class="form-check-input" type="checkbox" name="gabungan_6[]" id="examplecheckbox31" value="a">
                                            <label class="form-check-label" for="examplecheckbox31">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-6-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_6[]" id="examplecheckbox32" value="b">
                                            <label class="form-check-label" for="examplecheckbox32">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-6-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_6[]" id="examplecheckbox33" value="c">
                                            <label class="form-check-label" for="examplecheckbox33">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-6-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_6[]" id="examplecheckbox34" value="d">
                                            <label class="form-check-label" for="examplecheckbox34">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-6-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_6[]" id="examplecheckbox35" value="e">
                                            <label class="form-check-label" for="examplecheckbox35">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-6-e.png">
                                            </label>
                                            <br>
                                            <input class="form-check-input" type="checkbox" name="gabungan_6[]" id="examplecheckbox36" value="f">
                                            <label class="form-check-label" for="examplecheckbox36">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-6-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">7. <img src="resources\question\assets\img\soal-psikotes\soal-gabungan-7.png"></legend>
                                        
                                            <input class="form-check-input" type="checkbox" name="gabungan_7[]" id="examplecheckbox37" value="a">
                                            <label class="form-check-label" for="examplecheckbox37">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-7-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_7[]" id="examplecheckbox38" value="b">
                                            <label class="form-check-label" for="examplecheckbox38">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-7-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_7[]" id="examplecheckbox39" value="c">
                                            <label class="form-check-label" for="examplecheckbox39">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-7-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_7[]" id="examplecheckbox40" value="d">
                                            <label class="form-check-label" for="examplecheckbox40">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-7-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_7[]" id="examplecheckbox41" value="e">
                                            <label class="form-check-label" for="examplecheckbox41">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-7-e.png">
                                            </label>
                                            <br>
                                            <input class="form-check-input" type="checkbox" name="gabungan_7[]" id="examplecheckbox42" value="f">
                                            <label class="form-check-label" for="examplecheckbox42">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-7-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">8. <img src="resources\question\assets\img\soal-psikotes\soal-gabungan-8.png"></legend>
                                        
                                            <input class="form-check-input" type="checkbox" name="gabungan_8[]" id="examplecheckbox43" value="a">
                                            <label class="form-check-label" for="examplecheckbox43">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-8-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_8[]" id="examplecheckbox44" value="b">
                                            <label class="form-check-label" for="examplecheckbox44">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-8-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_8[]" id="examplecheckbox45" value="c">
                                            <label class="form-check-label" for="examplecheckbox45">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-8-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_8[]" id="examplecheckbox46" value="d">
                                            <label class="form-check-label" for="examplecheckbox46">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-8-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_8[]" id="examplecheckbox47" value="e">
                                            <label class="form-check-label" for="examplecheckbox47">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-8-e.png">
                                            </label>
                                            <br>
                                            <input class="form-check-input" type="checkbox" name="gabungan_8[]" id="examplecheckbox48" value="f">
                                            <label class="form-check-label" for="examplecheckbox48">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-8-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">9. <img src="resources\question\assets\img\soal-psikotes\soal-gabungan-9.png"></legend>
                                        
                                            <input class="form-check-input" type="checkbox" name="gabungan_9[]" id="examplecheckbox49" value="a">
                                            <label class="form-check-label" for="examplecheckbox49">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-9-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_9[]" id="examplecheckbox50" value="b">
                                            <label class="form-check-label" for="examplecheckbox50">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-9-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_9[]" id="examplecheckbox51" value="c">
                                            <label class="form-check-label" for="examplecheckbox51">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-9-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_9[]" id="examplecheckbox52" value="d">
                                            <label class="form-check-label" for="examplecheckbox52">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-9-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_9[]" id="examplecheckbox53" value="e">
                                            <label class="form-check-label" for="examplecheckbox53">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-9-e.png">
                                            </label>
                                            <br>
                                            <input class="form-check-input" type="checkbox" name="gabungan_9[]" id="examplecheckbox54" value="f">
                                            <label class="form-check-label" for="examplecheckbox54">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-9-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">10. <img src="resources\question\assets\img\soal-psikotes\soal-gabungan-10.png"></legend>
                                        
                                            <input class="form-check-input" type="checkbox" name="gabungan_10[]" id="examplecheckbox55" value="a">
                                            <label class="form-check-label" for="examplecheckbox55">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-10-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_10[]" id="examplecheckbox56" value="b">
                                            <label class="form-check-label" for="examplecheckbox56">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-10-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_10[]" id="examplecheckbox57" value="c">
                                            <label class="form-check-label" for="examplecheckbox57">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-10-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_10[]" id="examplecheckbox58" value="d">
                                            <label class="form-check-label" for="examplecheckbox58">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-10-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_10[]" id="examplecheckbox59" value="e">
                                            <label class="form-check-label" for="examplecheckbox59">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-10-e.png">
                                            </label>
                                            <br>
                                            <input class="form-check-input" type="checkbox" name="gabungan_10[]" id="examplecheckbox60" value="f">
                                            <label class="form-check-label" for="examplecheckbox60">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-10-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">11. <img src="resources\question\assets\img\soal-psikotes\soal-gabungan-11.png"></legend>
                                        
                                            <input class="form-check-input" type="checkbox" name="gabungan_11[]" id="examplecheckbox61" value="a">
                                            <label class="form-check-label" for="examplecheckbox61">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-11-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_11[]" id="examplecheckbox62" value="b">
                                            <label class="form-check-label" for="examplecheckbox62">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-11-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_11[]" id="examplecheckbox63" value="c">
                                            <label class="form-check-label" for="examplecheckbox63">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-11-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_11[]" id="examplecheckbox64" value="d">
                                            <label class="form-check-label" for="examplecheckbox64">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-11-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_11[]" id="examplecheckbox65" value="e">
                                            <label class="form-check-label" for="examplecheckbox65">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-11-e.png">
                                            </label>
                                            <br>
                                            <input class="form-check-input" type="checkbox" name="gabungan_11[]" id="examplecheckbox66" value="f">
                                            <label class="form-check-label" for="examplecheckbox66">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-11-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">12. <img src="resources\question\assets\img\soal-psikotes\soal-gabungan-12.png"></legend>
                                        
                                            <input class="form-check-input" type="checkbox" name="gabungan_12[]" id="examplecheckbox67" value="a">
                                            <label class="form-check-label" for="examplecheckbox67">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-12-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_12[]" id="examplecheckbox68" value="b">
                                            <label class="form-check-label" for="examplecheckbox68">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-12-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_12[]" id="examplecheckbox69" value="c">
                                            <label class="form-check-label" for="examplecheckbox69">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-12-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_12[]" id="examplecheckbox70" value="d">
                                            <label class="form-check-label" for="examplecheckbox70">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-12-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_12[]" id="examplecheckbox71" value="e">
                                            <label class="form-check-label" for="examplecheckbox71">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-12-e.png">
                                            </label>
                                            <br>
                                            <input class="form-check-input" type="checkbox" name="gabungan_12[]" id="examplecheckbox72" value="f">
                                            <label class="form-check-label" for="examplecheckbox72">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-12-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">13. <img src="resources\question\assets\img\soal-psikotes\soal-gabungan-13.png"></legend>
                                        
                                            <input class="form-check-input" type="checkbox" name="gabungan_13[]" id="examplecheckbox73" value="a">
                                            <label class="form-check-label" for="examplecheckbox73">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-13-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_13[]" id="examplecheckbox74" value="b">
                                            <label class="form-check-label" for="examplecheckbox74">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-13-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_13[]" id="examplecheckbox75" value="c">
                                            <label class="form-check-label" for="examplecheckbox75">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-13-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_13[]" id="examplecheckbox76" value="d">
                                            <label class="form-check-label" for="examplecheckbox76">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-13-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_13[]" id="examplecheckbox77" value="e">
                                            <label class="form-check-label" for="examplecheckbox77">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-13-e.png">
                                            </label>
                                            <br>
                                            <input class="form-check-input" type="checkbox" name="gabungan_13[]" id="examplecheckbox78" value="f">
                                            <label class="form-check-label" for="examplecheckbox78">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-13-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">14. <img src="resources\question\assets\img\soal-psikotes\soal-gabungan-14.png"></legend>
                                        
                                            <input class="form-check-input" type="checkbox" name="gabungan_14[]" id="examplecheckbox79" value="a">
                                            <label class="form-check-label" for="examplecheckbox79">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-14-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_14[]" id="examplecheckbox80" value="b">
                                            <label class="form-check-label" for="examplecheckbox80">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-14-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_14[]" id="examplecheckbox81" value="c">
                                            <label class="form-check-label" for="examplecheckbox81">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-14-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_14[]" id="examplecheckbox82" value="d">
                                            <label class="form-check-label" for="examplecheckbox82">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-14-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_14[]" id="examplecheckbox83" value="e">
                                            <label class="form-check-label" for="examplecheckbox83">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-14-e.png">
                                            </label>
                                            <br>
                                            <input class="form-check-input" type="checkbox" name="gabungan_14[]" id="examplecheckbox84" value="f">
                                            <label class="form-check-label" for="examplecheckbox84">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-14-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">15. <img src="resources\question\assets\img\soal-psikotes\soal-gabungan-15.png"></legend>
                                        
                                            <input class="form-check-input" type="checkbox" name="gabungan_15[]" id="examplecheckbox85" value="a">
                                            <label class="form-check-label" for="examplecheckbox85">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-15-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_15[]" id="examplecheckbox86" value="b">
                                            <label class="form-check-label" for="examplecheckbox86">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-15-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_15[]" id="examplecheckbox87" value="c">
                                            <label class="form-check-label" for="examplecheckbox87">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-15-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_15[]" id="examplecheckbox88" value="d">
                                            <label class="form-check-label" for="examplecheckbox88">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-15-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_15[]" id="examplecheckbox89" value="e">
                                            <label class="form-check-label" for="examplecheckbox89">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-15-e.png">
                                            </label>
                                            <br>
                                            <input class="form-check-input" type="checkbox" name="gabungan_15[]" id="examplecheckbox90" value="f">
                                            <label class="form-check-label" for="examplecheckbox90">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-15-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">16. <img src="resources\question\assets\img\soal-psikotes\soal-gabungan-16.png"></legend>
                                        
                                            <input class="form-check-input" type="checkbox" name="gabungan_16[]" id="examplecheckbox91" value="a">
                                            <label class="form-check-label" for="examplecheckbox91">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-16-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_16[]" id="examplecheckbox92" value="b">
                                            <label class="form-check-label" for="examplecheckbox92">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-16-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_16[]" id="examplecheckbox93" value="c">
                                            <label class="form-check-label" for="examplecheckbox93">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-16-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_16[]" id="examplecheckbox94" value="d">
                                            <label class="form-check-label" for="examplecheckbox94">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-16-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_16[]" id="examplecheckbox95" value="e">
                                            <label class="form-check-label" for="examplecheckbox95">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-16-e.png">
                                            </label>
                                            <br>
                                            <input class="form-check-input" type="checkbox" name="gabungan_16[]" id="examplecheckbox96" value="f">
                                            <label class="form-check-label" for="examplecheckbox96">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-16-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">17. <img src="resources\question\assets\img\soal-psikotes\soal-gabungan-17.png"></legend>
                                        
                                            <input class="form-check-input" type="checkbox" name="gabungan_17[]" id="examplecheckbox97" value="a">
                                            <label class="form-check-label" for="examplecheckbox97">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-17-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_17[]" id="examplecheckbox98" value="b">
                                            <label class="form-check-label" for="examplecheckbox98">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-17-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_17[]" id="examplecheckbox99" value="c">
                                            <label class="form-check-label" for="examplecheckbox99">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-17-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_17[]" id="examplecheckbox100" value="d">
                                            <label class="form-check-label" for="examplecheckbox100">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-17-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_17[]" id="examplecheckbox101" value="e">
                                            <label class="form-check-label" for="examplecheckbox101">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-17-e.png">
                                            </label>
                                            <br>
                                            <input class="form-check-input" type="checkbox" name="gabungan_17[]" id="examplecheckbox102" value="f">
                                            <label class="form-check-label" for="examplecheckbox102">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-17-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">18. <img src="resources\question\assets\img\soal-psikotes\soal-gabungan-18.png"></legend>
                                        
                                            <input class="form-check-input" type="checkbox" name="gabungan_18[]" id="examplecheckbox103" value="a">
                                            <label class="form-check-label" for="examplecheckbox103">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-18-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_18[]" id="examplecheckbox104" value="b">
                                            <label class="form-check-label" for="examplecheckbox104">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-18-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_18[]" id="examplecheckbox105" value="c">
                                            <label class="form-check-label" for="examplecheckbox105">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-18-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_18[]" id="examplecheckbox106" value="d">
                                            <label class="form-check-label" for="examplecheckbox106">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-18-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_18[]" id="examplecheckbox107" value="e">
                                            <label class="form-check-label" for="examplecheckbox107">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-18-e.png">
                                            </label>
                                            <br>
                                            <input class="form-check-input" type="checkbox" name="gabungan_18[]" id="examplecheckbox108" value="f">
                                            <label class="form-check-label" for="examplecheckbox108">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-18-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">19. <img src="resources\question\assets\img\soal-psikotes\soal-gabungan-19.png"></legend>
                                        
                                            <input class="form-check-input" type="checkbox" name="gabungan_19[]" id="examplecheckbox109" value="a">
                                            <label class="form-check-label" for="examplecheckbox109">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-19-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_19[]" id="examplecheckbox110" value="b">
                                            <label class="form-check-label" for="examplecheckbox110">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-19-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_19[]" id="examplecheckbox111" value="c">
                                            <label class="form-check-label" for="examplecheckbox111">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-19-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_19[]" id="examplecheckbox112" value="d">
                                            <label class="form-check-label" for="examplecheckbox112">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-19-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_19[]" id="examplecheckbox113" value="e">
                                            <label class="form-check-label" for="examplecheckbox113">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-19-e.png">
                                            </label>
                                            <br>
                                            <input class="form-check-input" type="checkbox" name="gabungan_19[]" id="examplecheckbox114" value="f">
                                            <label class="form-check-label" for="examplecheckbox114">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-19-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">20. <img src="resources\question\assets\img\soal-psikotes\soal-gabungan-20.png"></legend>
                                        
                                            <input class="form-check-input" type="checkbox" name="gabungan_20[]" id="examplecheckbox1155" value="a">
                                            <label class="form-check-label" for="examplecheckbox1155">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-20-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_20[]" id="examplecheckbox115" value="b">
                                            <label class="form-check-label" for="examplecheckbox115">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-20-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_20[]" id="examplecheckbox116" value="c">
                                            <label class="form-check-label" for="examplecheckbox116">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-20-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_20[]" id="examplecheckbox117" value="d">
                                            <label class="form-check-label" for="examplecheckbox117">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-20-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_20[]" id="examplecheckbox118" value="e">
                                            <label class="form-check-label" for="examplecheckbox118">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-20-e.png">
                                            </label>
                                            <br>
                                            <input class="form-check-input" type="checkbox" name="gabungan_20[]" id="examplecheckbox119" value="f">
                                            <label class="form-check-label" for="examplecheckbox119">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-20-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">21. <img src="resources\question\assets\img\soal-psikotes\soal-gabungan-21.png"></legend>
                                        
                                            <input class="form-check-input" type="checkbox" name="gabungan_21[]" id="examplecheckbox120" value="a">
                                            <label class="form-check-label" for="examplecheckbox120">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-21-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_21[]" id="examplecheckbox121" value="b">
                                            <label class="form-check-label" for="examplecheckbox121">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-21-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_21[]" id="examplecheckbox122" value="c">
                                            <label class="form-check-label" for="examplecheckbox122">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-21-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_21[]" id="examplecheckbox123" value="d">
                                            <label class="form-check-label" for="examplecheckbox123">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-21-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_21[]" id="examplecheckbox124" value="e">
                                            <label class="form-check-label" for="examplecheckbox124">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-21-e.png">
                                            </label>
                                            <br>
                                            <input class="form-check-input" type="checkbox" name="gabungan_21[]" id="examplecheckbox125" value="f">
                                            <label class="form-check-label" for="examplecheckbox125">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-21-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">22. <img src="resources\question\assets\img\soal-psikotes\soal-gabungan-22.png"></legend>
                                        
                                            <input class="form-check-input" type="checkbox" name="gabungan_22[]" id="examplecheckbox126" value="a">
                                            <label class="form-check-label" for="examplecheckbox126">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-22-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_22[]" id="examplecheckbox127" value="b">
                                            <label class="form-check-label" for="examplecheckbox127">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-22-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_22[]" id="examplecheckbox128" value="c">
                                            <label class="form-check-label" for="examplecheckbox128">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-22-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_22[]" id="examplecheckbox129" value="d">
                                            <label class="form-check-label" for="examplecheckbox129">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-22-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_22[]" id="examplecheckbox130" value="e">
                                            <label class="form-check-label" for="examplecheckbox130">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-22-e.png">
                                            </label>
                                            <br>
                                            <input class="form-check-input" type="checkbox" name="gabungan_22[]" id="examplecheckbox131" value="f">
                                            <label class="form-check-label" for="examplecheckbox131">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-22-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">23. <img src="resources\question\assets\img\soal-psikotes\soal-gabungan-23.png"></legend>
                                        
                                            <input class="form-check-input" type="checkbox" name="gabungan_23[]" id="examplecheckbox132" value="a">
                                            <label class="form-check-label" for="examplecheckbox132">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-23-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_23[]" id="examplecheckbox133" value="b">
                                            <label class="form-check-label" for="examplecheckbox133">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-23-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_23[]" id="examplecheckbox134" value="c">
                                            <label class="form-check-label" for="examplecheckbox134">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-23-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_23[]" id="examplecheckbox135" value="d">
                                            <label class="form-check-label" for="examplecheckbox135">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-23-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_23[]" id="examplecheckbox136" value="e">
                                            <label class="form-check-label" for="examplecheckbox136">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-23-e.png">
                                            </label>
                                            <br>
                                            <input class="form-check-input" type="checkbox" name="gabungan_23[]" id="examplecheckbox137" value="f">
                                            <label class="form-check-label" for="examplecheckbox137">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-23-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">24. <img src="resources\question\assets\img\soal-psikotes\soal-gabungan-24.png"></legend>
                                        
                                            <input class="form-check-input" type="checkbox" name="gabungan_24[]" id="examplecheckbox138" value="a">
                                            <label class="form-check-label" for="examplecheckbox138">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-24-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_24[]" id="examplecheckbox139" value="b">
                                            <label class="form-check-label" for="examplecheckbox139">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-24-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_24[]" id="examplecheckbox140" value="c">
                                            <label class="form-check-label" for="examplecheckbox140">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-24-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_24[]" id="examplecheckbox141" value="d">
                                            <label class="form-check-label" for="examplecheckbox141">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-24-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_24[]" id="examplecheckbox142" value="e">
                                            <label class="form-check-label" for="examplecheckbox142">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-24-e.png">
                                            </label>
                                            <br>
                                            <input class="form-check-input" type="checkbox" name="gabungan_24[]" id="examplecheckbox143" value="f">
                                            <label class="form-check-label" for="examplecheckbox143">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-24-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">25. <img src="resources\question\assets\img\soal-psikotes\soal-gabungan-25.png"></legend>
                                        
                                            <input class="form-check-input" type="checkbox" name="gabungan_25[]" id="examplecheckbox150" value="a">
                                            <label class="form-check-label" for="examplecheckbox150">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-25-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_25[]" id="examplecheckbox151" value="b">
                                            <label class="form-check-label" for="examplecheckbox151">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-25-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_25[]" id="examplecheckbox152" value="c">
                                            <label class="form-check-label" for="examplecheckbox152">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-25-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_25[]" id="examplecheckbox153" value="d">
                                            <label class="form-check-label" for="examplecheckbox153">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-25-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_25[]" id="examplecheckbox154" value="e">
                                            <label class="form-check-label" for="examplecheckbox154">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-25-e.png">
                                            </label>
                                            <br>
                                            <input class="form-check-input" type="checkbox" name="gabungan_25[]" id="examplecheckbox155" value="f">
                                            <label class="form-check-label" for="examplecheckbox155">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-25-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">26. <img src="resources\question\assets\img\soal-psikotes\soal-gabungan-26.png"></legend>
                                        
                                            <input class="form-check-input" type="checkbox" name="gabungan_26[]" id="examplecheckbox144" value="a">
                                            <label class="form-check-label" for="examplecheckbox144">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-26-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_26[]" id="examplecheckbox145" value="b">
                                            <label class="form-check-label" for="examplecheckbox145">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-26-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_26[]" id="examplecheckbox146" value="c">
                                            <label class="form-check-label" for="examplecheckbox146">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-26-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_26[]" id="examplecheckbox147" value="d">
                                            <label class="form-check-label" for="examplecheckbox147">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-26-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="gabungan_26[]" id="examplecheckbox148" value="e">
                                            <label class="form-check-label" for="examplecheckbox148">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-26-e.png">
                                            </label>
                                            <br>
                                            <input class="form-check-input" type="checkbox" name="gabungan_26[]" id="examplecheckbox149" value="f">
                                            <label class="form-check-label" for="examplecheckbox149">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-gabungan-26-f.png">
                                            </label>
                                            <br>
                                          
                            </div>
                        </div>
                        <br>
                    <div class="card border-light shadow-sm components-section">
                        <div class="card-body">
                                <div class="mb-3">
                                    <h1 class="h4">Bagian 3. Hubungan Kata</h1>
                                    <h2 class="h5">INSTRUKSI:</h2>
                                </div>
                                <!--Buttons-->
                                <p align="justify">Tes berikut ini terdiri dari kata-kata.<br>
                                Setiap soal terdiri dari 4 kata a, b, c, dan d.<br>
                                Carilah 2 buah kata yang memiliki kesamaan arti yang paling dekat atau yang mempunyai arti yang berlawanan.
                                Setelah kata-kata itu ditemukan, lingkarilah pada lembar jawaban di belakang nomor soal yang bersangkutan,
                                huruf-huruf yang sesuai:<br><br>
                                Perhatikan sekarang contoh 1 dibawah ini.<br>
                                Contoh:<br>
                                <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\contoh-hubungan-kata-1.png"><br>
                                Pada contoh 1 dapat dilihat, bahwa kata-kata menikah dan kawin memiliki kesamaan arti. Jadi, jawaban contoh 1
                                adalah a dan c. Oleh karena itu, pada lembar jawaban dibelakang contoh 1, huruf a dan c telah dilingkari.<br><br>
                                Perhatikan sekarang contoh 2.<br>
                                Contoh:<br>
                                <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\contoh-hubungan-kata-2.png"><br>
                                Pada contoh 2, kata-kata tua dan muda mempunyai arti yang berlawanan satu sama lain. Oleh karena itu, pada lembar
                                jawaban dibelakang contoh 2, huruf b dan d telah dilingkari.<br><br>
                                Di bawah ini masih ada beberapa contoh untuk latihan. Kerjakan menurut cara yang sama.<br>
                                Contoh:<br>
                                <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\contoh-hubungan-kata-3.png"><br>
                                Jawaban yang benar dari contoh-contoh diatas adalah:<br>
                                contoh 3: b dan c; contoh 4: a dan d; contoh 5: a dan d.</p>
                            </div>
                        </div>
                        <br>
                    <div class="card border-light shadow-sm components-section">
                        <div class="card-body">
                                <div class="mb-3">
                                    <h1 class="h4">SOAL-SOAL</h1>
                                    <h2 class="h5">PILIHLAH JAWABAN YANG BENAR PADA LEMBAR JAWABAN</h2>
                                </div>
                                            1.&emsp;<input class="form-check-input" type="checkbox" name="hubungan_1[]" id="examplecheckbox156" value="a">
                                            <label class="form-check-label" for="examplecheckbox156">
                                              a. sedikit
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_1[]" id="examplecheckbox157" value="b">
                                            <label class="form-check-label" for="examplecheckbox157">
                                              b. tepat
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_1[]" id="examplecheckbox158" value="c">
                                            <label class="form-check-label" for="examplecheckbox158">
                                              c. jernih
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_1[]" id="examplecheckbox159" value="d">
                                            <label class="form-check-label" for="examplecheckbox159">
                                              d. banyak
                                            </label>
                                            <br>
                                            2.&emsp;<input class="form-check-input" type="checkbox" name="hubungan_2[]" id="examplecheckbox160" value="a">
                                            <label class="form-check-label" for="examplecheckbox160">
                                              a. pergi
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_2[]" id="examplecheckbox161" value="b">
                                            <label class="form-check-label" for="examplecheckbox161">
                                              b. berdiri
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_2[]" id="examplecheckbox162" value="c">
                                            <label class="form-check-label" for="examplecheckbox162">
                                              c. datang
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_2[]" id="examplecheckbox163" value="d">
                                            <label class="form-check-label" for="examplecheckbox163">
                                              d. beristirahat
                                            </label>
                                            <br>
                                            3.&emsp;<input class="form-check-input" type="checkbox" name="hubungan_3[]" id="examplecheckbox164" value="a">
                                            <label class="form-check-label" for="examplecheckbox164">
                                              a. hasrat
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_3[]" id="examplecheckbox165" value="b">
                                            <label class="form-check-label" for="examplecheckbox165">
                                              b. pengetahuan
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_3[]" id="examplecheckbox166" value="c">
                                            <label class="form-check-label" for="examplecheckbox166">
                                              c. keinginan
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_3[]" id="examplecheckbox167" value="d">
                                            <label class="form-check-label" for="examplecheckbox167">
                                              d. kekuasaan
                                            </label>
                                            <br>
                                            4.&emsp;<input class="form-check-input" type="checkbox" name="hubungan_4[]" id="examplecheckbox168" value="a">
                                            <label class="form-check-label" for="examplecheckbox168">
                                              a. jauh
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_4[]" id="examplecheckbox169" value="b">
                                            <label class="form-check-label" for="examplecheckbox169">
                                              b. luas
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_4[]" id="examplecheckbox170" value="c">
                                            <label class="form-check-label" for="examplecheckbox170">
                                              c. dekat
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_4[]" id="examplecheckbox171" value="d">
                                            <label class="form-check-label" for="examplecheckbox171">
                                              d. nyaring
                                            </label>
                                            <br>
                                            5.&emsp;<input class="form-check-input" type="checkbox" name="hubungan_5[]" id="examplecheckbox172" value="a">
                                            <label class="form-check-label" for="examplecheckbox172">
                                              a. terik
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_5[]" id="examplecheckbox173" value="b">
                                            <label class="form-check-label" for="examplecheckbox173">
                                              b. panas
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_5[]" id="examplecheckbox174" value="c">
                                            <label class="form-check-label" for="examplecheckbox174">
                                              c. tawar
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_5[]" id="examplecheckbox175" value="d">
                                            <label class="form-check-label" for="examplecheckbox175">
                                              d. sial
                                            </label>
                                            <br>
                                            6.&emsp;<input class="form-check-input" type="checkbox" name="hubungan_6[]" id="examplecheckbox176" value="a">
                                            <label class="form-check-label" for="examplecheckbox176">
                                              a. kelana
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_6[]" id="examplecheckbox177" value="b">
                                            <label class="form-check-label" for="examplecheckbox177">
                                              b. pemberontak
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_6[]" id="examplecheckbox178" value="c">
                                            <label class="form-check-label" for="examplecheckbox178">
                                              c. pelari
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_6[]" id="examplecheckbox179" value="d">
                                            <label class="form-check-label" for="examplecheckbox179">
                                              d. pengembara
                                            </label>
                                            <br>
                                            7.&emsp;<input class="form-check-input" type="checkbox" name="hubungan_7[]" id="examplecheckbox180" value="a">
                                            <label class="form-check-label" for="examplecheckbox180">
                                              a. jasad
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_7[]" id="examplecheckbox181" value="b">
                                            <label class="form-check-label" for="examplecheckbox181">
                                              b. ijazah
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_7[]" id="examplecheckbox182" value="c">
                                            <label class="form-check-label" for="examplecheckbox182">
                                              c. organisme
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_7[]" id="examplecheckbox183" value="d">
                                            <label class="form-check-label" for="examplecheckbox183">
                                              d. alat
                                            </label>
                                            <br>
                                            8.&emsp;<input class="form-check-input" type="checkbox" name="hubungan_8[]" id="examplecheckbox184" value="a">
                                            <label class="form-check-label" for="examplecheckbox184">
                                              a. kikir
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_8[]" id="examplecheckbox185" value="b">
                                            <label class="form-check-label" for="examplecheckbox185">
                                              b. dermawan
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_8[]" id="examplecheckbox186" value="c">
                                            <label class="form-check-label" for="examplecheckbox186">
                                              c. kurus
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_8[]" id="examplecheckbox187" value="d">
                                            <label class="form-check-label" for="examplecheckbox187">
                                              d. mendewakan
                                            </label>
                                            <br>
                                            9.&emsp;<input class="form-check-input" type="checkbox" name="hubungan_9[]" id="examplecheckbox188" value="a">
                                            <label class="form-check-label" for="examplecheckbox188">
                                              a. azas
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_9[]" id="examplecheckbox189" value="b">
                                            <label class="form-check-label" for="examplecheckbox189">
                                              b. tamat
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_9[]" id="examplecheckbox190" value="c">
                                            <label class="form-check-label" for="examplecheckbox190">
                                              c. prinsip
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_9[]" id="examplecheckbox191" value="d">
                                            <label class="form-check-label" for="examplecheckbox191">
                                              d. kekuasaan
                                            </label>
                                            <br>
                                            10.&emsp;<input class="form-check-input" type="checkbox" name="hubungan_10[]" id="examplecheckbox192" value="a">
                                            <label class="form-check-label" for="examplecheckbox192">
                                              a. mencurigakan
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_10[]" id="examplecheckbox193" value="b">
                                            <label class="form-check-label" for="examplecheckbox193">
                                              b. malu
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_10[]" id="examplecheckbox194" value="c">
                                            <label class="form-check-label" for="examplecheckbox194">
                                              c. haram
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_10[]" id="examplecheckbox195" value="d">
                                            <label class="form-check-label" for="examplecheckbox195">
                                              d. halal
                                            </label>
                                            <br>
                                            11.&emsp;<input class="form-check-input" type="checkbox" name="hubungan_11[]" id="examplecheckbox196" value="a">
                                            <label class="form-check-label" for="examplecheckbox196">
                                              a. serasi
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_11[]" id="examplecheckbox197" value="b">
                                            <label class="form-check-label" for="examplecheckbox197">
                                              b. sesuai
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_11[]" id="examplecheckbox198" value="c">
                                            <label class="form-check-label" for="examplecheckbox198">
                                              c. ceroboh
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_11[]" id="examplecheckbox199" value="d">
                                            <label class="form-check-label" for="examplecheckbox199">
                                              d. kabur
                                            </label>
                                            <br>
                                            12.&emsp;<input class="form-check-input" type="checkbox" name="hubungan_12[]" id="examplecheckbox200" value="a">
                                            <label class="form-check-label" for="examplecheckbox200">
                                              a. menyala
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_12[]" id="examplecheckbox201" value="b">
                                            <label class="form-check-label" for="examplecheckbox201">
                                              b. menyalak
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_12[]" id="examplecheckbox202" value="c">
                                            <label class="form-check-label" for="examplecheckbox202">
                                              c. padam
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_12[]" id="examplecheckbox203" value="d">
                                            <label class="form-check-label" for="examplecheckbox203">
                                              d. meradang
                                            </label>
                                            <br>
                                            13.&emsp;<input class="form-check-input" type="checkbox" name="hubungan_13[]" id="examplecheckbox204" value="a">
                                            <label class="form-check-label" for="examplecheckbox204">
                                              a. terpencil
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_13[]" id="examplecheckbox205" value="b">
                                            <label class="form-check-label" for="examplecheckbox205">
                                              b. terpencar
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_13[]" id="examplecheckbox206" value="c">
                                            <label class="form-check-label" for="examplecheckbox206">
                                              c. jinak
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_13[]" id="examplecheckbox207" value="d">
                                            <label class="form-check-label" for="examplecheckbox207">
                                              d. terasing
                                            </label>
                                            <br>
                                            14.&emsp;<input class="form-check-input" type="checkbox" name="hubungan_14[]" id="examplecheckbox208" value="a">
                                            <label class="form-check-label" for="examplecheckbox208">
                                              a. ramah
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_14[]" id="examplecheckbox209" value="b">
                                            <label class="form-check-label" for="examplecheckbox209">
                                              b. lihai
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_14[]" id="examplecheckbox210" value="c">
                                            <label class="form-check-label" for="examplecheckbox210">
                                              c. arif
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_14[]" id="examplecheckbox211" value="d">
                                            <label class="form-check-label" for="examplecheckbox211">
                                              d. bijaksana
                                            </label>
                                            <br>
                                            15.&emsp;<input class="form-check-input" type="checkbox" name="hubungan_15[]" id="examplecheckbox212" value="a">
                                            <label class="form-check-label" for="examplecheckbox212">
                                              a. tongkat
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_15[]" id="examplecheckbox213" value="b">
                                            <label class="form-check-label" for="examplecheckbox213">
                                              b. taraf
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_15[]" id="examplecheckbox214" value="c">
                                            <label class="form-check-label" for="examplecheckbox214">
                                              c. titik
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_15[]" id="examplecheckbox215" value="d">
                                            <label class="form-check-label" for="examplecheckbox215">
                                              d. tingkat
                                            </label>
                                            <br>  
                                            16.&emsp;<input class="form-check-input" type="checkbox" name="hubungan_16[]" id="examplecheckbox216" value="a">
                                            <label class="form-check-label" for="examplecheckbox216">
                                              a. megah
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_16[]" id="examplecheckbox217" value="b">
                                            <label class="form-check-label" for="examplecheckbox217">
                                              b. tegang
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_16[]" id="examplecheckbox218" value="c">
                                            <label class="form-check-label" for="examplecheckbox218">
                                              c. malu
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_16[]" id="examplecheckbox219" value="d">
                                            <label class="form-check-label" for="examplecheckbox219">
                                              d. kejang
                                            </label>
                                            <br>
                                            17.&emsp;<input class="form-check-input" type="checkbox" name="hubungan_17[]" id="examplecheckbox220" value="a">
                                            <label class="form-check-label" for="examplecheckbox220">
                                              a. untung
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_17[]" id="examplecheckbox221" value="b">
                                            <label class="form-check-label" for="examplecheckbox221">
                                              b. jujur
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_17[]" id="examplecheckbox222" value="c">
                                            <label class="form-check-label" for="examplecheckbox222">
                                              c. mujur
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_17[]" id="examplecheckbox223" value="d">
                                            <label class="form-check-label" for="examplecheckbox223">
                                              d. urung
                                            </label>
                                            <br>   
                                            18.&emsp;<input class="form-check-input" type="checkbox" name="hubungan_18[]" id="examplecheckbox224" value="a">
                                            <label class="form-check-label" for="examplecheckbox224">
                                              a. meradang
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_18[]" id="examplecheckbox225" value="b">
                                            <label class="form-check-label" for="examplecheckbox225">
                                              b. murung
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_18[]" id="examplecheckbox226" value="c">
                                            <label class="form-check-label" for="examplecheckbox226">
                                              c. mengampuni
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_18[]" id="examplecheckbox227" value="d">
                                            <label class="form-check-label" for="examplecheckbox227">
                                              d. gembira
                                            </label>
                                            <br>
                                            19.&emsp;<input class="form-check-input" type="checkbox" name="hubungan_19[]" id="examplecheckbox228" value="a">
                                            <label class="form-check-label" for="examplecheckbox228">
                                              a. lapang
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_19[]" id="examplecheckbox229" value="b">
                                            <label class="form-check-label" for="examplecheckbox229">
                                              b. ruang
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_19[]" id="examplecheckbox230" value="c">
                                            <label class="form-check-label" for="examplecheckbox230">
                                              c. panjang
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_19[]" id="examplecheckbox231" value="d">
                                            <label class="form-check-label" for="examplecheckbox231">
                                              d. luas
                                            </label>
                                            <br>
                                            20.&emsp;<input class="form-check-input" type="checkbox" name="hubungan_20[]" id="examplecheckbox232" value="a">
                                            <label class="form-check-label" for="examplecheckbox232">
                                              a. memperbaiki
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_20[]" id="examplecheckbox233" value="b">
                                            <label class="form-check-label" for="examplecheckbox233">
                                              b. menutupi
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_20[]" id="examplecheckbox234" value="c">
                                            <label class="form-check-label" for="examplecheckbox234">
                                              c. menyelubungi
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_20[]" id="examplecheckbox235" value="d">
                                            <label class="form-check-label" for="examplecheckbox235">
                                              d. mencari
                                            </label>
                                            <br>  
                                            21.&emsp;<input class="form-check-input" type="checkbox" name="hubungan_21[]" id="examplecheckbox236" value="a">
                                            <label class="form-check-label" for="examplecheckbox236">
                                              a. sementara
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_21[]" id="examplecheckbox237" value="b">
                                            <label class="form-check-label" for="examplecheckbox237">
                                              b. menggembirakan
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_21[]" id="examplecheckbox238" value="c">
                                            <label class="form-check-label" for="examplecheckbox238">
                                              c. menyeret
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_21[]" id="examplecheckbox239" value="d">
                                            <label class="form-check-label" for="examplecheckbox239">
                                              d. kekal
                                            </label>
                                            <br>     
                                            22.&emsp;<input class="form-check-input" type="checkbox" name="hubungan_22[]" id="examplecheckbox240" value="a">
                                            <label class="form-check-label" for="examplecheckbox240">
                                              a. nisbi
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_22[]" id="examplecheckbox241" value="b">
                                            <label class="form-check-label" for="examplecheckbox241">
                                              b. mutlak
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_22[]" id="examplecheckbox242" value="c">
                                            <label class="form-check-label" for="examplecheckbox242">
                                              c. curiga
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_22[]" id="examplecheckbox243" value="d">
                                            <label class="form-check-label" for="examplecheckbox243">
                                              d. malu
                                            </label>
                                            <br>
                                            23.&emsp;<input class="form-check-input" type="checkbox" name="hubungan_23[]" id="examplecheckbox244" value="a">
                                            <label class="form-check-label" for="examplecheckbox244">
                                              a. dispensasi
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_23[]" id="examplecheckbox245" value="b">
                                            <label class="form-check-label" for="examplecheckbox245">
                                              b. amnesti
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_23[]" id="examplecheckbox246" value="c">
                                            <label class="form-check-label" for="examplecheckbox246">
                                              c. kelonggaran
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_23[]" id="examplecheckbox247" value="d">
                                            <label class="form-check-label" for="examplecheckbox247">
                                              d. penyesalan
                                            </label>
                                            <br>
                                            24.&emsp;<input class="form-check-input" type="checkbox" name="hubungan_24[]" id="examplecheckbox248" value="a">
                                            <label class="form-check-label" for="examplecheckbox248">
                                              a. marah
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_24[]" id="examplecheckbox249" value="b">
                                            <label class="form-check-label" for="examplecheckbox249">
                                              b. melarat
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_24[]" id="examplecheckbox250" value="c">
                                            <label class="form-check-label" for="examplecheckbox250">
                                              c. gusar
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_24[]" id="examplecheckbox251" value="d">
                                            <label class="form-check-label" for="examplecheckbox251">
                                              d. mengesalkan
                                            </label>
                                            <br>
                                            25.&emsp;<input class="form-check-input" type="checkbox" name="hubungan_25[]" id="examplecheckbox252" value="a">
                                            <label class="form-check-label" for="examplecheckbox252">
                                              a. pengecut
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_25[]" id="examplecheckbox253" value="b">
                                            <label class="form-check-label" for="examplecheckbox253">
                                              b. rendah hati
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_25[]" id="examplecheckbox254" value="c">
                                            <label class="form-check-label" for="examplecheckbox254">
                                              c. kecil
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_25[]" id="examplecheckbox255" value="d">
                                            <label class="form-check-label" for="examplecheckbox255">
                                              d. sombong
                                            </label>
                                            <br>
                                            26.&emsp;<input class="form-check-input" type="checkbox" name="hubungan_26[]" id="examplecheckbox256" value="a">
                                            <label class="form-check-label" for="examplecheckbox256">
                                              a. penyakit
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_26[]" id="examplecheckbox257" value="b">
                                            <label class="form-check-label" for="examplecheckbox257">
                                              b. tobat
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_26[]" id="examplecheckbox258" value="c">
                                            <label class="form-check-label" for="examplecheckbox258">
                                              c. bisa
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_26[]" id="examplecheckbox259" value="d">
                                            <label class="form-check-label" for="examplecheckbox259">
                                              d. racun
                                            </label>
                                            <br>
                                            27.&emsp;<input class="form-check-input" type="checkbox" name="hubungan_27[]" id="examplecheckbox260" value="a">
                                            <label class="form-check-label" for="examplecheckbox260">
                                              a. damai
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_27[]" id="examplecheckbox261" value="b">
                                            <label class="form-check-label" for="examplecheckbox261">
                                              b. berseri
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_27[]" id="examplecheckbox262" value="c">
                                            <label class="form-check-label" for="examplecheckbox262">
                                              c. tenang
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_27[]" id="examplecheckbox263" value="d">
                                            <label class="form-check-label" for="examplecheckbox263">
                                              d. mulia
                                            </label>
                                            <br>
                                            28.&emsp;<input class="form-check-input" type="checkbox" name="hubungan_28[]" id="examplecheckbox264" value="a">
                                            <label class="form-check-label" for="examplecheckbox264">
                                              a. mengganggu
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_28[]" id="examplecheckbox265" value="b">
                                            <label class="form-check-label" for="examplecheckbox265">
                                              b. mengangkat
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_28[]" id="examplecheckbox266" value="c">
                                            <label class="form-check-label" for="examplecheckbox266">
                                              c. mengangkut
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_28[]" id="examplecheckbox267" value="d">
                                            <label class="form-check-label" for="examplecheckbox267">
                                              d. mengusik
                                            </label>
                                            <br>
                                            29.&emsp;<input class="form-check-input" type="checkbox" name="hubungan_29[]" id="examplecheckbox268" value="a">
                                            <label class="form-check-label" for="examplecheckbox268">
                                              a. menguji
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_29[]" id="examplecheckbox269" value="b">
                                            <label class="form-check-label" for="examplecheckbox269">
                                              b. memuji
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_29[]" id="examplecheckbox270" value="c">
                                            <label class="form-check-label" for="examplecheckbox270">
                                              c. menyanjung
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_29[]" id="examplecheckbox271" value="d">
                                            <label class="form-check-label" for="examplecheckbox271">
                                              d. mendewakan
                                            </label>
                                            <br>
                                            30.&emsp;<input class="form-check-input" type="checkbox" name="hubungan_30[]" id="examplecheckbox272" value="a">
                                            <label class="form-check-label" for="examplecheckbox272">
                                              a. vertikal
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_30[]" id="examplecheckbox273" value="b">
                                            <label class="form-check-label" for="examplecheckbox273">
                                              b. lurus
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_30[]" id="examplecheckbox274" value="c">
                                            <label class="form-check-label" for="examplecheckbox274">
                                              c. tegak lurus
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_30[]" id="examplecheckbox275" value="d">
                                            <label class="form-check-label" for="examplecheckbox275">
                                              d. rata-rata
                                            </label>
                                            <br>
                                            31.&emsp;<input class="form-check-input" type="checkbox" name="hubungan_31[]" id="examplecheckbox276" value="a">
                                            <label class="form-check-label" for="examplecheckbox276">
                                              a. peraturan
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_31[]" id="examplecheckbox277" value="b">
                                            <label class="form-check-label" for="examplecheckbox277">
                                              b. kebiasaan
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_31[]" id="examplecheckbox278" value="c">
                                            <label class="form-check-label" for="examplecheckbox278">
                                              c. kenangan
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_31[]" id="examplecheckbox279" value="d">
                                            <label class="form-check-label" for="examplecheckbox279">
                                              d. adat
                                            </label>
                                            <br>
                                            32.&emsp;<input class="form-check-input" type="checkbox" name="hubungan_32[]" id="examplecheckbox280" value="a">
                                            <label class="form-check-label" for="examplecheckbox280">
                                              a. pendekar
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_32[]" id="examplecheckbox281" value="b">
                                            <label class="form-check-label" for="examplecheckbox281">
                                              b. pelopor
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_32[]" id="examplecheckbox282" value="c">
                                            <label class="form-check-label" for="examplecheckbox282">
                                              c. penyajak
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_32[]" id="examplecheckbox283" value="d">
                                            <label class="form-check-label" for="examplecheckbox283">
                                              d. penyair
                                            </label>
                                            <br>
                                            33.&emsp;<input class="form-check-input" type="checkbox" name="hubungan_33[]" id="examplecheckbox284" value="a">
                                            <label class="form-check-label" for="examplecheckbox284">
                                              a. menarik
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_33[]" id="examplecheckbox285" value="b">
                                            <label class="form-check-label" for="examplecheckbox285">
                                              b. asing
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_33[]" id="examplecheckbox286" value="c">
                                            <label class="form-check-label" for="examplecheckbox286">
                                              c. aneh
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_33[]" id="examplecheckbox287" value="d">
                                            <label class="form-check-label" for="examplecheckbox287">
                                              d. umum
                                            </label>
                                            <br>
                                            34.&emsp;<input class="form-check-input" type="checkbox" name="hubungan_34[]" id="examplecheckbox288" value="a">
                                            <label class="form-check-label" for="examplecheckbox288">
                                              a. bara
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_34[]" id="examplecheckbox289" value="b">
                                            <label class="form-check-label" for="examplecheckbox289">
                                              b. suluh
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_34[]" id="examplecheckbox290" value="c">
                                            <label class="form-check-label" for="examplecheckbox290">
                                              c. obor
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_34[]" id="examplecheckbox291" value="d">
                                            <label class="form-check-label" for="examplecheckbox291">
                                              d. menara
                                            </label>
                                            <br>
                                            35.&emsp;<input class="form-check-input" type="checkbox" name="hubungan_35[]" id="examplecheckbox292" value="a">
                                            <label class="form-check-label" for="examplecheckbox292">
                                              a. cemar
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_35[]" id="examplecheckbox293" value="b">
                                            <label class="form-check-label" for="examplecheckbox293">
                                              b. sedih
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_35[]" id="examplecheckbox294" value="c">
                                            <label class="form-check-label" for="examplecheckbox294">
                                              c. cemas
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_35[]" id="examplecheckbox295" value="d">
                                            <label class="form-check-label" for="examplecheckbox295">
                                              d. bersih
                                            </label>
                                            <br>
                                            36.&emsp;<input class="form-check-input" type="checkbox" name="hubungan_36[]" id="examplecheckbox296" value="a">
                                            <label class="form-check-label" for="examplecheckbox296">
                                              a. sedih
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_36[]" id="examplecheckbox297" value="b">
                                            <label class="form-check-label" for="examplecheckbox297">
                                              b. lamban
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_36[]" id="examplecheckbox298" value="c">
                                            <label class="form-check-label" for="examplecheckbox298">
                                              c. kasar
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_36[]" id="examplecheckbox299" value="d">
                                            <label class="form-check-label" for="examplecheckbox299">
                                              d. hati-hati
                                            </label>
                                            <br>
                                            37.&emsp;<input class="form-check-input" type="checkbox" name="hubungan_37[]" id="examplecheckbox300" value="a">
                                            <label class="form-check-label" for="examplecheckbox300">
                                              a. penat
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_37[]" id="examplecheckbox301" value="b">
                                            <label class="form-check-label" for="examplecheckbox301">
                                              b. kenyang
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_37[]" id="examplecheckbox302" value="c">
                                            <label class="form-check-label" for="examplecheckbox302">
                                              c. penuh
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_37[]" id="examplecheckbox303" value="d">
                                            <label class="form-check-label" for="examplecheckbox303">
                                              d. jenuh
                                            </label>
                                            <br>
                                            38.&emsp;<input class="form-check-input" type="checkbox" name="hubungan_38[]" id="examplecheckbox304" value="a">
                                            <label class="form-check-label" for="examplecheckbox304">
                                              a. tak bersemangat
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_38[]" id="examplecheckbox305" value="b">
                                            <label class="form-check-label" for="examplecheckbox305">
                                              b. ramah tamah
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_38[]" id="examplecheckbox306" value="c">
                                            <label class="form-check-label" for="examplecheckbox306">
                                              c. keranjingan
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_38[]" id="examplecheckbox307" value="d">
                                            <label class="form-check-label" for="examplecheckbox307">
                                              d. berpantang
                                            </label>
                                            <br>
                                            39.&emsp;<input class="form-check-input" type="checkbox" name="hubungan_39[]" id="examplecheckbox308" value="a">
                                            <label class="form-check-label" for="examplecheckbox308">
                                              a. nila
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_39[]" id="examplecheckbox309" value="b">
                                            <label class="form-check-label" for="examplecheckbox309">
                                              b. aib
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_39[]" id="examplecheckbox310" value="c">
                                            <label class="form-check-label" for="examplecheckbox310">
                                              c. nista
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_39[]" id="examplecheckbox311" value="d">
                                            <label class="form-check-label" for="examplecheckbox311">
                                              d. dosa
                                            </label>
                                            <br>
                                            40.&emsp;<input class="form-check-input" type="checkbox" name="hubungan_40[]" id="examplecheckbox312" value="a">
                                            <label class="form-check-label" for="examplecheckbox312">
                                              a. sombong
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_40[]" id="examplecheckbox313" value="b">
                                            <label class="form-check-label" for="examplecheckbox313">
                                              b. terkendali
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_40[]" id="examplecheckbox314" value="c">
                                            <label class="form-check-label" for="examplecheckbox314">
                                              c. lancang
                                            </label>&emsp;
                                            <input class="form-check-input" type="checkbox" name="hubungan_40[]" id="examplecheckbox315" value="d">
                                            <label class="form-check-label" for="examplecheckbox315">
                                              d. gila hormat
                                            </label>
                                            <br>                              
                            </div>
                        </div>
                        <br>
                    <div class="card border-light shadow-sm components-section">
                        <div class="card-body">
                                <div class="mb-3">
                                    <h1 class="h4">Bagian 4. Abstraksi non Verbal</h1>
                                    <h2 class="h5">INSTRUKSI:</h2>
                                </div>
                                <!--Buttons-->
                                <p align="justify">Dalam tes ini setiap soal terdiri dari 10 gambar.<br>
                                Empat gambar pertama dari setiap soal menunjukkan kesamaan dalam suatu hal atau segi tertentu. Dua diantara
                                enam gambar a, b, c, d, e, dan f berikutnya menunjukkan kesamaan dengan keempat gambar pertama itu. Carilah kedua
                                gambar yang dimaksudkan itu. Apabila kedua gambar itu sudah ditemukan, lingkarilah pada lembar jawaban dibelakang
                                nomor soal yang bersangkutan, huruf-huruf yang menunjukkan gambar tersebut.<br><br>
                                Perhatikan contoh-contoh dibawah ini.<br>
                                <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\contoh-abstraksi-non-verbal-1.png"><br>
                                Pada contoh 1 dapat dilihat, bahwa gambar 4 yang pertama semuanya adalah segiempat atau bujur sangkar. Dari 6 gambar
                                a dan f saja yang menunjukkan kesamaan itu yaitu berupa segiempat atau bujur sangkar. Oleh karena itu, pada lembar
                                jawaban dibelakang contoh 1, huruf a dan f telah dilingkari. Perhatikan sekarang contoh 2. Keempat gambar pertama
                                semuanya dihitamkan dengan cara yang sama. Diantara 6 gambar berikutnya, hanya gambar c dan e yang dihitamkan dengan
                                cara yang sama. Oleh karena itu, pada lembar jawaban dibelakang contoh 2, huruf c dan e telah dilingkari.<br><br>
                                Dibawah ini terdapat 3 contoh sebagai latihan. Kerjakan menurut cara yang sama.<br>
                                <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\contoh-abstraksi-non-verbal-2.png"><br>
                                Pada contoh 3, dapat dilihat bahwa keempat gambar pertama adalah garis-garis bengkok. Dengan demikian jawaban yang benar
                                dari contoh 3 adalah c dan e. Oleh karena itu, pada lembar jawaban dibelakang contoh 3, huruf c dan e harus dilingkari.
                                Jawaban contoh 4 adalah d dan e, sebab garis-garis dalam keempat gambar pertama hanya menyinggung lingkaran dan bukannya
                                memontong. Jawaban contoh 5 adalah e dan f. Jika diperhatikan, maka akan dapat dilihat bahwa bentuk-bentuk dalam keempat
                                gambar pertama dari contoh 5 tidak ada yang bersudut tegak lurus, dan gambar e dan f menunjukkan kesamaan itu.</p>
                            </div>
                        </div>
                        <br>
                    <div class="card border-light shadow-sm components-section">
                        <div class="card-body">
                                <div class="mb-3">
                                    <h1 class="h4">SOAL-SOAL</h1>
                                    <h2 class="h5">PILIHLAH JAWABAN YANG BENAR PADA LEMBAR JAWABAN YANG BENAR</h2>
                                </div>
                                <legend class="h6">1. <img src="resources\question\assets\img\soal-psikotes\soal-abstraksi-1.png"></legend>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_1[]" id="examplecheckbox316" value="a">
                                            <label class="form-check-label" for="examplecheckbox316">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-1-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_1[]" id="examplecheckbox317" value="b">
                                            <label class="form-check-label" for="examplecheckbox317">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-1-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_1[]" id="examplecheckbox318" value="c">
                                            <label class="form-check-label" for="examplecheckbox318">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-1-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_1[]" id="examplecheckbox319" value="d">
                                            <label class="form-check-label" for="examplecheckbox319">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-1-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_1[]" id="examplecheckbox320" value="e">
                                            <label class="form-check-label" for="examplecheckbox320">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-1-e.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_1[]" id="examplecheckbox321" value="f">
                                            <label class="form-check-label" for="examplecheckbox321">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-1-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">2. <img src="resources\question\assets\img\soal-psikotes\soal-abstraksi-2.png"></legend>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_2[]" id="examplecheckbox322" value="a">
                                            <label class="form-check-label" for="examplecheckbox322">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-2-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_2[]" id="examplecheckbox323" value="b">
                                            <label class="form-check-label" for="examplecheckbox323">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-2-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_2[]" id="examplecheckbox324" value="c">
                                            <label class="form-check-label" for="examplecheckbox324">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-2-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_2[]" id="examplecheckbox325" value="d">
                                            <label class="form-check-label" for="examplecheckbox325">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-2-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_2[]" id="examplecheckbox326" value="e">
                                            <label class="form-check-label" for="examplecheckbox326">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-2-e.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_2[]" id="examplecheckbox327" value="f">
                                            <label class="form-check-label" for="examplecheckbox327">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-2-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">3. <img src="resources\question\assets\img\soal-psikotes\soal-abstraksi-3.png"></legend>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_3[]" id="examplecheckbox328" value="a">
                                            <label class="form-check-label" for="examplecheckbox328">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-3-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_3[]" id="examplecheckbox329" value="b">
                                            <label class="form-check-label" for="examplecheckbox329">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-3-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_3[]" id="examplecheckbox330" value="c">
                                            <label class="form-check-label" for="examplecheckbox330">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-3-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_3[]" id="examplecheckbox331" value="d">
                                            <label class="form-check-label" for="examplecheckbox331">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-3-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_3[]" id="examplecheckbox332" value="e">
                                            <label class="form-check-label" for="examplecheckbox332">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-3-e.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_3[]" id="examplecheckbox333" value="f">
                                            <label class="form-check-label" for="examplecheckbox333">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-3-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">4. <img src="resources\question\assets\img\soal-psikotes\soal-abstraksi-4.png"></legend>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_4[]" id="examplecheckbox334" value="a">
                                            <label class="form-check-label" for="examplecheckbox334">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-4-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_4[]" id="examplecheckbox335" value="b">
                                            <label class="form-check-label" for="examplecheckbox335">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-4-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_4[]" id="examplecheckbox336" value="c">
                                            <label class="form-check-label" for="examplecheckbox336">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-4-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_4[]" id="examplecheckbox337" value="d">
                                            <label class="form-check-label" for="examplecheckbox337">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-4-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_4[]" id="examplecheckbox338" value="e">
                                            <label class="form-check-label" for="examplecheckbox338">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-4-e.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_4[]" id="examplecheckbox339" value="f">
                                            <label class="form-check-label" for="examplecheckbox339">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-4-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">5. <img src="resources\question\assets\img\soal-psikotes\soal-abstraksi-5.png"></legend>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_5[]" id="examplecheckbox340" value="a">
                                            <label class="form-check-label" for="examplecheckbox340">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-5-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_5[]" id="examplecheckbox341" value="b">
                                            <label class="form-check-label" for="examplecheckbox341">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-5-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_5[]" id="examplecheckbox342" value="c">
                                            <label class="form-check-label" for="examplecheckbox342">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-5-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_5[]" id="examplecheckbox343" value="d">
                                            <label class="form-check-label" for="examplecheckbox343">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-5-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_5[]" id="examplecheckbox344" value="e">
                                            <label class="form-check-label" for="examplecheckbox344">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-5-e.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_5[]" id="examplecheckbox345" value="f">
                                            <label class="form-check-label" for="examplecheckbox345">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-5-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">6. <img src="resources\question\assets\img\soal-psikotes\soal-abstraksi-6.png"></legend>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_6[]" id="examplecheckbox346" value="a">
                                            <label class="form-check-label" for="examplecheckbox346">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-6-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_6[]" id="examplecheckbox347" value="b">
                                            <label class="form-check-label" for="examplecheckbox347">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-6-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_6[]" id="examplecheckbox348" value="c">
                                            <label class="form-check-label" for="examplecheckbox348">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-6-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_6[]" id="examplecheckbox349" value="d">
                                            <label class="form-check-label" for="examplecheckbox349">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-6-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_6[]" id="examplecheckbox350" value="e">
                                            <label class="form-check-label" for="examplecheckbox350">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-6-e.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_6[]" id="examplecheckbox351" value="f">
                                            <label class="form-check-label" for="examplecheckbox351">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-6-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">7. <img src="resources\question\assets\img\soal-psikotes\soal-abstraksi-7.png"></legend>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_7[]" id="examplecheckbox352" value="a">
                                            <label class="form-check-label" for="examplecheckbox352">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-7-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_7[]" id="examplecheckbox353" value="b">
                                            <label class="form-check-label" for="examplecheckbox353">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-7-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_7[]" id="examplecheckbox354" value="c">
                                            <label class="form-check-label" for="examplecheckbox354">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-7-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_7[]" id="examplecheckbox355" value="d">
                                            <label class="form-check-label" for="examplecheckbox355">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-7-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_7[]" id="examplecheckbox356" value="e">
                                            <label class="form-check-label" for="examplecheckbox356">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-7-e.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_7[]" id="examplecheckbox357" value="f">
                                            <label class="form-check-label" for="examplecheckbox357">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-7-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">8. <img src="resources\question\assets\img\soal-psikotes\soal-abstraksi-8.png"></legend>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_8[]" id="examplecheckbox358" value="a">
                                            <label class="form-check-label" for="examplecheckbox358">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-8-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_8[]" id="examplecheckbox359" value="b">
                                            <label class="form-check-label" for="examplecheckbox359">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-8-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_8[]" id="examplecheckbox360" value="c">
                                            <label class="form-check-label" for="examplecheckbox360">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-8-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_8[]" id="examplecheckbox361" value="d">
                                            <label class="form-check-label" for="examplecheckbox361">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-8-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_8[]" id="examplecheckbox362" value="e">
                                            <label class="form-check-label" for="examplecheckbox362">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-8-e.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_8[]" id="examplecheckbox363" value="f">
                                            <label class="form-check-label" for="examplecheckbox363">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-8-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">9. <img src="resources\question\assets\img\soal-psikotes\soal-abstraksi-9.png"></legend>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_9[]" id="examplecheckbox364" value="a">
                                            <label class="form-check-label" for="examplecheckbox364">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-9-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_9[]" id="examplecheckbox365" value="b">
                                            <label class="form-check-label" for="examplecheckbox365">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-9-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_9[]" id="examplecheckbox366" value="c">
                                            <label class="form-check-label" for="examplecheckbox366">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-9-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_9[]" id="examplecheckbox367" value="d">
                                            <label class="form-check-label" for="examplecheckbox367">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-9-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_9[]" id="examplecheckbox368" value="e">
                                            <label class="form-check-label" for="examplecheckbox368">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-9-e.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_9[]" id="examplecheckbox369" value="f">
                                            <label class="form-check-label" for="examplecheckbox369">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-9-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">10. <img src="resources\question\assets\img\soal-psikotes\soal-abstraksi-10.png"></legend>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_10[]" id="examplecheckbox370" value="a">
                                            <label class="form-check-label" for="examplecheckbox370">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-10-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_10[]" id="examplecheckbox371" value="b">
                                            <label class="form-check-label" for="examplecheckbox371">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-10-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_10[]" id="examplecheckbox372" value="c">
                                            <label class="form-check-label" for="examplecheckbox372">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-10-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_10[]" id="examplecheckbox373" value="d">
                                            <label class="form-check-label" for="examplecheckbox373">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-10-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_10[]" id="examplecheckbox374" value="e">
                                            <label class="form-check-label" for="examplecheckbox374">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-10-e.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_10[]" id="examplecheckbox375" value="f">
                                            <label class="form-check-label" for="examplecheckbox375">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-10-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">11. <img src="resources\question\assets\img\soal-psikotes\soal-abstraksi-11.png"></legend>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_11[]" id="examplecheckbox376" value="a">
                                            <label class="form-check-label" for="examplecheckbox376">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-11-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_11[]" id="examplecheckbox377" value="b">
                                            <label class="form-check-label" for="examplecheckbox377">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-11-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_11[]" id="examplecheckbox378" value="c">
                                            <label class="form-check-label" for="examplecheckbox378">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-11-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_11[]" id="examplecheckbox379" value="d">
                                            <label class="form-check-label" for="examplecheckbox379">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-11-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_11[]" id="examplecheckbox380" value="e">
                                            <label class="form-check-label" for="examplecheckbox380">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-11-e.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_11[]" id="examplecheckbox381" value="f">
                                            <label class="form-check-label" for="examplecheckbox381">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-11-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">12. <img src="resources\question\assets\img\soal-psikotes\soal-abstraksi-12.png"></legend>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_12[]" id="examplecheckbox382" value="a">
                                            <label class="form-check-label" for="examplecheckbox382">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-12-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_12[]" id="examplecheckbox383" value="b">
                                            <label class="form-check-label" for="examplecheckbox383">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-12-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_12[]" id="examplecheckbox384" value="c">
                                            <label class="form-check-label" for="examplecheckbox384">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-12-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_12[]" id="examplecheckbox385" value="d">
                                            <label class="form-check-label" for="examplecheckbox385">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-12-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_12[]" id="examplecheckbox386" value="e">
                                            <label class="form-check-label" for="examplecheckbox386">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-12-e.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_12[]" id="examplecheckbox387" value="f">
                                            <label class="form-check-label" for="examplecheckbox387">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-12-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">13. <img src="resources\question\assets\img\soal-psikotes\soal-abstraksi-13.png"></legend>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_13[]" id="examplecheckbox388" value="a">
                                            <label class="form-check-label" for="examplecheckbox388">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-13-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_13[]" id="examplecheckbox389" value="b">
                                            <label class="form-check-label" for="examplecheckbox389">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-13-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_13[]" id="examplecheckbox390" value="c">
                                            <label class="form-check-label" for="examplecheckbox390">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-1-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_13[]" id="examplecheckbox391" value="d">
                                            <label class="form-check-label" for="examplecheckbox391">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-13-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_13[]" id="examplecheckbox392" value="e">
                                            <label class="form-check-label" for="examplecheckbox392">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-1-e.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_13[]" id="examplecheckbox393" value="f">
                                            <label class="form-check-label" for="examplecheckbox393">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-13-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">14. <img src="resources\question\assets\img\soal-psikotes\soal-abstraksi-14.png"></legend>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_14[]" id="examplecheckbox394" value="a">
                                            <label class="form-check-label" for="examplecheckbox394">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-14-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_14[]" id="examplecheckbox395" value="b">
                                            <label class="form-check-label" for="examplecheckbox395">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-14-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_14[]" id="examplecheckbox396" value="c">
                                            <label class="form-check-label" for="examplecheckbox396">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-14-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_14[]" id="examplecheckbox397" value="d">
                                            <label class="form-check-label" for="examplecheckbox397">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-14-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_14[]" id="examplecheckbox398" value="e">
                                            <label class="form-check-label" for="examplecheckbox398">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-14-e.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_14[]" id="examplecheckbox399" value="f">
                                            <label class="form-check-label" for="examplecheckbox399">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-14-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">15. <img src="resources\question\assets\img\soal-psikotes\soal-abstraksi-15.png"></legend>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_15[]" id="examplecheckbox400" value="a">
                                            <label class="form-check-label" for="examplecheckbox400">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-15-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_15[]" id="examplecheckbox401" value="b">
                                            <label class="form-check-label" for="examplecheckbox401">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-15-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_15[]" id="examplecheckbox402" value="c">
                                            <label class="form-check-label" for="examplecheckbox402">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-15-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_15[]" id="examplecheckbox403" value="d">
                                            <label class="form-check-label" for="examplecheckbox403">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-15-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_15[]" id="examplecheckbox404" value="e">
                                            <label class="form-check-label" for="examplecheckbox404">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-15-e.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_15[]" id="examplecheckbox405" value="f">
                                            <label class="form-check-label" for="examplecheckbox405">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-15-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">16. <img src="resources\question\assets\img\soal-psikotes\soal-abstraksi-16.png"></legend>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_16[]" id="examplecheckbox406" value="a">
                                            <label class="form-check-label" for="examplecheckbox406">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-16-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_16[]" id="examplecheckbox407" value="b">
                                            <label class="form-check-label" for="examplecheckbox407">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-16-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_16[]" id="examplecheckbox408" value="c">
                                            <label class="form-check-label" for="examplecheckbox408">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-16-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_16[]" id="examplecheckbox409" value="d">
                                            <label class="form-check-label" for="examplecheckbox409">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-16-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_16[]" id="examplecheckbox410" value="e">
                                            <label class="form-check-label" for="examplecheckbox410">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-16-e.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_16[]" id="examplecheckbox411" value="f">
                                            <label class="form-check-label" for="examplecheckbox411">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-16-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">17. <img src="resources\question\assets\img\soal-psikotes\soal-abstraksi-17.png"></legend>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_17[]" id="examplecheckbox412" value="a">
                                            <label class="form-check-label" for="examplecheckbox412">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-17-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_17[]" id="examplecheckbox413" value="b">
                                            <label class="form-check-label" for="examplecheckbox413">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-17-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_17[]" id="examplecheckbox414" value="c">
                                            <label class="form-check-label" for="examplecheckbox414">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-17-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_17[]" id="examplecheckbox415" value="d">
                                            <label class="form-check-label" for="examplecheckbox415">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-17-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_17[]" id="examplecheckbox416" value="e">
                                            <label class="form-check-label" for="examplecheckbox416">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-17-e.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_17[]" id="examplecheckbox417" value="f">
                                            <label class="form-check-label" for="examplecheckbox417">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-17-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">18. <img src="resources\question\assets\img\soal-psikotes\soal-abstraksi-18.png"></legend>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_18[]" id="examplecheckbox418" value="a">
                                            <label class="form-check-label" for="examplecheckbox418">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-18-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_18[]" id="examplecheckbox419" value="b">
                                            <label class="form-check-label" for="examplecheckbox419">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-18-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_18[]" id="examplecheckbox420" value="c">
                                            <label class="form-check-label" for="examplecheckbox420">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-18-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_18[]" id="examplecheckbox421" value="d">
                                            <label class="form-check-label" for="examplecheckbox421">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-18-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_18[]" id="examplecheckbox422" value="e">
                                            <label class="form-check-label" for="examplecheckbox422">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-18-e.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_18[]" id="examplecheckbox423" value="f">
                                            <label class="form-check-label" for="examplecheckbox423">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-18-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">19. <img src="resources\question\assets\img\soal-psikotes\soal-abstraksi-19.png"></legend>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_19[]" id="examplecheckbox424" value="a">
                                            <label class="form-check-label" for="examplecheckbox424">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-19-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_19[]" id="examplecheckbox425" value="b">
                                            <label class="form-check-label" for="examplecheckbox425">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-19-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_19[]" id="examplecheckbox426" value="c">
                                            <label class="form-check-label" for="examplecheckbox426">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-19-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_19[]" id="examplecheckbox427" value="d">
                                            <label class="form-check-label" for="examplecheckbox427">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-19-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_19[]" id="examplecheckbox428" value="e">
                                            <label class="form-check-label" for="examplecheckbox428">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-19-e.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_19[]" id="examplecheckbox429" value="f">
                                            <label class="form-check-label" for="examplecheckbox429">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-19-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">20. <img src="resources\question\assets\img\soal-psikotes\soal-abstraksi-20.png"></legend>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_20[]" id="examplecheckbox430" value="a">
                                            <label class="form-check-label" for="examplecheckbox430">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-20-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_20[]" id="examplecheckbox431" value="b">
                                            <label class="form-check-label" for="examplecheckbox431">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-20-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_20[]" id="examplecheckbox432" value="c">
                                            <label class="form-check-label" for="examplecheckbox432">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-20-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_20[]" id="examplecheckbox433" value="d">
                                            <label class="form-check-label" for="examplecheckbox433">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-20-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_20[]" id="examplecheckbox434" value="e">
                                            <label class="form-check-label" for="examplecheckbox434">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-20-e.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_20[]" id="examplecheckbox435" value="f">
                                            <label class="form-check-label" for="examplecheckbox435">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-20-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">21. <img src="resources\question\assets\img\soal-psikotes\soal-abstraksi-21.png"></legend>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_21[]" id="examplecheckbox436" value="a">
                                            <label class="form-check-label" for="examplecheckbox436">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-21-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_21[]" id="examplecheckbox437" value="b">
                                            <label class="form-check-label" for="examplecheckbox437">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-21-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_21[]" id="examplecheckbox438" value="c">
                                            <label class="form-check-label" for="examplecheckbox438">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-21-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_21[]" id="examplecheckbox439" value="d">
                                            <label class="form-check-label" for="examplecheckbox439">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-21-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_21[]" id="examplecheckbox440" value="e">
                                            <label class="form-check-label" for="examplecheckbox440">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-21-e.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_21[]" id="examplecheckbox441" value="f">
                                            <label class="form-check-label" for="examplecheckbox441">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-21-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">22. <img src="resources\question\assets\img\soal-psikotes\soal-abstraksi-22.png"></legend>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_22[]" id="examplecheckbox442" value="a">
                                            <label class="form-check-label" for="examplecheckbox442">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-22-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_22[]" id="examplecheckbox443" value="b">
                                            <label class="form-check-label" for="examplecheckbox443">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-22-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_22[]" id="examplecheckbox444" value="c">
                                            <label class="form-check-label" for="examplecheckbox444">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-22-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_22[]" id="examplecheckbox445" value="d">
                                            <label class="form-check-label" for="examplecheckbox445">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-22-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_22[]" id="examplecheckbox446" value="e">
                                            <label class="form-check-label" for="examplecheckbox446">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-22-e.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_22[]" id="examplecheckbox447" value="f">
                                            <label class="form-check-label" for="examplecheckbox447">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-22-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">23. <img src="resources\question\assets\img\soal-psikotes\soal-abstraksi-23.png"></legend>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_23[]" id="examplecheckbox448" value="a">
                                            <label class="form-check-label" for="examplecheckbox448">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-23-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_23[]" id="examplecheckbox449" value="b">
                                            <label class="form-check-label" for="examplecheckbox449">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-23-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_23[]" id="examplecheckbox450" value="c">
                                            <label class="form-check-label" for="examplecheckbox450">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-23-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_23[]" id="examplecheckbox451" value="d">
                                            <label class="form-check-label" for="examplecheckbox451">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-23-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_23[]" id="examplecheckbox452" value="e">
                                            <label class="form-check-label" for="examplecheckbox452">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-23-e.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_23[]" id="examplecheckbox453" value="f">
                                            <label class="form-check-label" for="examplecheckbox453">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-23-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">24. <img src="resources\question\assets\img\soal-psikotes\soal-abstraksi-24.png"></legend>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_24[]" id="examplecheckbox454" value="a">
                                            <label class="form-check-label" for="examplecheckbox454">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-24-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_24[]" id="examplecheckbox455" value="b">
                                            <label class="form-check-label" for="examplecheckbox455">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-24-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_24[]" id="examplecheckbox456" value="c">
                                            <label class="form-check-label" for="examplecheckbox456">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-24-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_24[]" id="examplecheckbox457" value="d">
                                            <label class="form-check-label" for="examplecheckbox457">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-24-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_24[]" id="examplecheckbox458" value="e">
                                            <label class="form-check-label" for="examplecheckbox458">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-24-e.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_24[]" id="examplecheckbox459" value="f">
                                            <label class="form-check-label" for="examplecheckbox459">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-24-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">25. <img src="resources\question\assets\img\soal-psikotes\soal-abstraksi-25.png"></legend>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_25[]" id="examplecheckbox460" value="a">
                                            <label class="form-check-label" for="examplecheckbox460">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-25-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_25[]" id="examplecheckbox461" value="b">
                                            <label class="form-check-label" for="examplecheckbox461">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-25-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_25[]" id="examplecheckbox462" value="c">
                                            <label class="form-check-label" for="examplecheckbox462">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-25-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_25[]" id="examplecheckbox463" value="d">
                                            <label class="form-check-label" for="examplecheckbox463">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-25-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_25[]" id="examplecheckbox464" value="e">
                                            <label class="form-check-label" for="examplecheckbox464">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-25-e.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_25[]" id="examplecheckbox465" value="f">
                                            <label class="form-check-label" for="examplecheckbox465">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-25-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">26. <img src="resources\question\assets\img\soal-psikotes\soal-abstraksi-26.png"></legend>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_26[]" id="examplecheckbox466" value="a">
                                            <label class="form-check-label" for="examplecheckbox466">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-26-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_26[]" id="examplecheckbox467" value="b">
                                            <label class="form-check-label" for="examplecheckbox467">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-26-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_26[]" id="examplecheckbox468" value="c">
                                            <label class="form-check-label" for="examplecheckbox468">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-26-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_26[]" id="examplecheckbox469" value="d">
                                            <label class="form-check-label" for="examplecheckbox469">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-26-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_26[]" id="examplecheckbox470" value="e">
                                            <label class="form-check-label" for="examplecheckbox470">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-26-e.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_26[]" id="examplecheckbox471" value="f">
                                            <label class="form-check-label" for="examplecheckbox471">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-26-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">27. <img src="resources\question\assets\img\soal-psikotes\soal-abstraksi-27.png"></legend>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_27[]" id="examplecheckbox472" value="a">
                                            <label class="form-check-label" for="examplecheckbox472">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-27-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_27[]" id="examplecheckbox473" value="b">
                                            <label class="form-check-label" for="examplecheckbox473">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-27-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_27[]" id="examplecheckbox474" value="c">
                                            <label class="form-check-label" for="examplecheckbox474">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-27-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_27[]" id="examplecheckbox475" value="d">
                                            <label class="form-check-label" for="examplecheckbox475">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-27-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_27[]" id="examplecheckbox476" value="e">
                                            <label class="form-check-label" for="examplecheckbox476">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-27-e.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_27[]" id="examplecheckbox477" value="f">
                                            <label class="form-check-label" for="examplecheckbox477">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-27-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">28. <img src="resources\question\assets\img\soal-psikotes\soal-abstraksi-28.png"></legend>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_28[]" id="examplecheckbox478" value="a">
                                            <label class="form-check-label" for="examplecheckbox478">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-28-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_28[]" id="examplecheckbox479" value="b">
                                            <label class="form-check-label" for="examplecheckbox479">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-28-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_28[]" id="examplecheckbox480" value="c">
                                            <label class="form-check-label" for="examplecheckbox480">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-28-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_28[]" id="examplecheckbox481" value="d">
                                            <label class="form-check-label" for="examplecheckbox481">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-28-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_28[]" id="examplecheckbox482" value="e">
                                            <label class="form-check-label" for="examplecheckbox482">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-28-e.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_28[]" id="examplecheckbox483" value="f">
                                            <label class="form-check-label" for="examplecheckbox483">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-28-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">29. <img src="resources\question\assets\img\soal-psikotes\soal-abstraksi-29.png"></legend>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_29[]" id="examplecheckbox484" value="a">
                                            <label class="form-check-label" for="examplecheckbox484">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-29-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_29[]" id="examplecheckbox485" value="b">
                                            <label class="form-check-label" for="examplecheckbox485">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-29-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_29[]" id="examplecheckbox486" value="c">
                                            <label class="form-check-label" for="examplecheckbox486">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-29-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_29[]" id="examplecheckbox487" value="d">
                                            <label class="form-check-label" for="examplecheckbox487">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-29-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_29[]" id="examplecheckbox488" value="e">
                                            <label class="form-check-label" for="examplecheckbox488">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-29-e.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_29[]" id="examplecheckbox489" value="f">
                                            <label class="form-check-label" for="examplecheckbox489">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-29-f.png">
                                            </label>
                                            <br>
                                <legend class="h6">30. <img src="resources\question\assets\img\soal-psikotes\soal-abstraksi-30.png"></legend>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_30[]" id="examplecheckbox490" value="a">
                                            <label class="form-check-label" for="examplecheckbox490">
                                              a. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-30-a.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_30[]" id="examplecheckbox491" value="b">
                                            <label class="form-check-label" for="examplecheckbox491">
                                              b. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-30-b.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_30[]" id="examplecheckbox492" value="c">
                                            <label class="form-check-label" for="examplecheckbox492">
                                              c. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-30-c.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_30[]" id="examplecheckbox493" value="d">
                                            <label class="form-check-label" for="examplecheckbox493">
                                              d. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-30-d.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_30[]" id="examplecheckbox494" value="e">
                                            <label class="form-check-label" for="examplecheckbox494">
                                              e. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-30-e.png">
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="abstraksi_30[]" id="examplecheckbox495" value="f">
                                            <label class="form-check-label" for="examplecheckbox495">
                                              f. <img width="50%" height="50%" src="resources\question\assets\img\soal-psikotes\jwb-abstraksi-30-f.png">
                                            </label>
                                            <br>                                          
                            </div>
                        </div>
                        <br>
                        <input type="submit" value="Simpan Jawaban" name="msform" class="btn btn-success d-inline-flex align-items-center">
                    </div>
                </div>
            </div>
            <div class="theme-settings card bg-gray-800 pt-2 collapse" id="theme-settings">
    
</div>

<footer class="bg-white rounded shadow p-5 mb-4 mt-4">
    <div class="row">
        <div class="col-12 col-md-4 col-xl-6 mb-4 mb-md-0">
            <p class="mb-0 text-center text-lg-start">© <span class="current-year"></span> <a class="text-primary fw-normal" href="https://www.evergreen-line.com/" target="_blank">PT. Evergreen Shipping Agency Indonesia</a></p>
        </div>
    </div>
</footer>
        </main>

    <!-- Core -->
<script src="resources/question/vendor/@popperjs/core/dist/umd/popper.min.js"></script>
<script src="resources/question/vendor/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Vendor JS -->
<script src="resources/question/vendor/onscreen/dist/on-screen.umd.min.js"></script>

<!-- Slider -->
<script src="resources/question/vendor/nouislider/distribute/nouislider.min.js"></script>

<!-- Smooth scroll -->
<script src="resources/question/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>

<!-- Charts -->
<script src="resources/question/vendor/chartist/dist/chartist.min.js"></script>
<script src="resources/question/vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>

<!-- Datepicker -->
<script src="resources/question/vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>

<!-- Sweet Alerts 2 -->
<script src="resources/question/vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>

<!-- Moment JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>

<!-- Vanilla JS Datepicker -->
<script src="resources/question/vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>

<!-- Notyf -->
<script src="resources/question/vendor/notyf/notyf.min.js"></script>

<!-- Simplebar -->
<script src="resources/question/vendor/simplebar/dist/simplebar.min.js"></script>

<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<!-- Volt JS -->
<script src="resources/question/assets/js/volt.js"></script>

<script>
  $(document).ready(function(){
			$("input[name='gabungan_1[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='gabungan_1[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='gabungan_2[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='gabungan_2[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='gabungan_3[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='gabungan_3[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='gabungan_4[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='gabungan_4[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='gabungan_5[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='gabungan_5[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='gabungan_6[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='gabungan_6[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='gabungan_7[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='gabungan_7[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='gabungan_8[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='gabungan_8[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='gabungan_9[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='gabungan_9[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='gabungan_10[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='gabungan_10[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='gabungan_11[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='gabungan_11[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='gabungan_12[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='gabungan_12[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='gabungan_13[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='gabungan_13[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='gabungan_14[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='gabungan_14[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='gabungan_15[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='gabungan_15[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='gabungan_16[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='gabungan_16[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='gabungan_17[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='gabungan_17[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='gabungan_18[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='gabungan_18[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='gabungan_19[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='gabungan_19[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='gabungan_20[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='gabungan_20[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='gabungan_21[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='gabungan_21[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='gabungan_22[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='gabungan_22[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='gabungan_23[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='gabungan_23[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='gabungan_24[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='gabungan_24[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='gabungan_25[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='gabungan_25[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='gabungan_26[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='gabungan_26[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='hubungan_1[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='hubungan_1[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='hubungan_2[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='hubungan_2[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='hubungan_3[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='hubungan_3[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='hubungan_4[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='hubungan_4[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='hubungan_5[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='hubungan_5[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='hubungan_6[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='hubungan_6[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='hubungan_7[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='hubungan_7[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='hubungan_8[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='hubungan_8[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='hubungan_9[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='hubungan_9[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='hubungan_10[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='hubungan_10[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='hubungan_11[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='hubungan_11[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='hubungan_12[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='hubungan_12[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='hubungan_13[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='hubungan_13[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='hubungan_14[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='hubungan_14[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='hubungan_15[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='hubungan_15[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='hubungan_16[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='hubungan_16[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='hubungan_17[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='hubungan_17[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='hubungan_18[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='hubungan_18[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='hubungan_19[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='hubungan_19[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='hubungan_20[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='hubungan_20[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='hubungan_21[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='hubungan_21[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='hubungan_22[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='hubungan_22[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='hubungan_23[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='hubungan_23[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='hubungan_24[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='hubungan_24[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='hubungan_25[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='hubungan_25[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='hubungan_26[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='hubungan_26[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='hubungan_27[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='hubungan_27[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='hubungan_28[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='hubungan_28[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='hubungan_29[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='hubungan_29[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='hubungan_30[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='hubungan_30[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='hubungan_31[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='hubungan_31[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='hubungan_32[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='hubungan_32[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='hubungan_33[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='hubungan_33[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='hubungan_34[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='hubungan_34[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='hubungan_35[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='hubungan_35[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='hubungan_36[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='hubungan_36[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='hubungan_37[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='hubungan_37[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='hubungan_38[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='hubungan_38[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='hubungan_39[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='hubungan_39[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='hubungan_40[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='hubungan_40[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='abstraksi_1[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='abstraksi_1[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='abstraksi_2[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='abstraksi_2[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='abstraksi_3[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='abstraksi_3[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='abstraksi_4[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='abstraksi_4[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='abstraksi_5[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='abstraksi_5[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='abstraksi_6[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='abstraksi_6[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='abstraksi_7[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='abstraksi_7[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='abstraksi_8[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='abstraksi_8[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='abstraksi_9[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='abstraksi_9[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='abstraksi_10[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='abstraksi_10[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='abstraksi_11[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='abstraksi_11[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='abstraksi_12[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='abstraksi_12[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='abstraksi_13[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='abstraksi_13[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='abstraksi_14[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='abstraksi_14[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='abstraksi_15[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='abstraksi_15[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='abstraksi_16[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='abstraksi_16[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='abstraksi_17[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='abstraksi_17[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='abstraksi_18[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='abstraksi_18[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='abstraksi_19[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='abstraksi_19[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='abstraksi_20[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='abstraksi_20[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='abstraksi_21[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='abstraksi_21[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='abstraksi_22[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='abstraksi_22[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='abstraksi_23[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='abstraksi_23[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='abstraksi_24[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='abstraksi_24[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='abstraksi_25[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='abstraksi_25[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='abstraksi_26[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='abstraksi_26[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='abstraksi_27[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='abstraksi_27[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='abstraksi_28[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='abstraksi_28[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='abstraksi_29[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='abstraksi_29[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
  $(document).ready(function(){
			$("input[name='abstraksi_30[]']").change(function() {
                             var maxpil = 2;
                              var jml = $("input[name='abstraksi_30[]']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
			}
			});
		});
</script>

    
