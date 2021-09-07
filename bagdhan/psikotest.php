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

$koneksi = mysqli_connect("localhost","root","","evergreen");

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
                                Contoh:<br>
                                1) 18 + 7 = .....&emsp;25&emsp;26&emsp;24&emsp;23<br>
                                2) ..... - <sup>1</sup>/<sub>8</sub> = <sup>1</sup>/<sub>8</sub>&emsp;<sup>2</sup>/<sub>4</sub>&emsp;<sup>3</sup>/<sub>8</sub>&emsp;<sup>1</sup>/<sub>4</sub>&emsp;<sup>4</sup>/<sub>8</sub>
                                <br><br>
                                Pada contoh 1 dapat dilihat bahwa 18 + 7 = 25. Dibelakang contoh 1 dapat dilihat bahwa angka 25 terdapat di bawah
                                huruf a. Oleh karena itu, pada lembar jawaban dibelakang contoh 1, huruf a telah dilingkari.<br>
                                Jawaban yang benar dari contoh 2 adalah <sup>1</sup>/<sub>4</sub>. Oleh karena itu pada lembar jawaban dibelakang contoh 2,
                                huruf c telah dilingkari.<br>
                                Coba pecahkan sendiri contoh-contoh dibawah ini, dan lingkarilah pada lembar jawaban dibelakang nomor contoh yang bersangkutan,
                                huruf yang sesuai dengan jawaban yang benar.<br><br>
                                3) 54 : ..... = 6&emsp;8&emsp;6&emsp;7&emsp;9<br>
                                4) 0,07 + ..... = 0,67&emsp;0,06&emsp;0,6&emsp;0,63&emsp;0,063<br>
                                5) <sup>36</sup>/<sub>18</sub> : <sup>12</sup>/<sub>6</sub> = .....&emsp;<sup>3</sup>/<sub>6</sub>&emsp;<sup>4</sup>/<sub>6</sub>&emsp;<sup>3</sup>/<sub>3</sub>&emsp;<sup>12</sup>/<sub>18</sub><br><br>
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
                            </div>
                        </div>
                        <br>
                        <input type="submit" value="Submit" name="msform" class="btn btn-success d-inline-flex align-items-center">
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

    
