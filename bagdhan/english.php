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
<title>Tes Bahasa Inggris</title>
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
        <img class="navbar-brand-dark" src="assets/img/brand/light.svg" alt="Volt logo" /> <img class="navbar-brand-light" src="assets/img/brand/dark.svg" alt="Volt logo" />
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
          <span class="mt-1 ms-1 sidebar-text">Hi, <?php echo $personal_name; ?></span>
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
          <span class="mt-1 ms-1 sidebar-text">Remaining Time</span>
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
                        <h1 class="h4">English Test</h1>
                        <p class="mb-0">Fill in the questions carefully, the time limit is 1 hour. Good luck..</p>
                    </div>
                </div>
            </div>

            <form method="post" action="input_b_inggris" id="msform">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="card border-light shadow-sm components-section">
                        <div class="card-body">
                                <div class="mb-3">
                                    <h2 class="h5">I. Select a, b, c, or d to complete the sentence in the correct way. Put a cross (x) on the letter you have selected.</h2>
                                </div>
                                <br>
                                <!--Buttons-->
                                <legend class="h6">1. I work in this company, I ....... a senior staff</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="hidden" name="id_data_pelamar" value="<?php echo $id_data_pelamar; ?>">
                                            <input class="form-check-input" type="radio" name="jwb_1" id="exampleRadios1" value="a">
                                            <label class="form-check-label" for="exampleRadios1">
                                              a. are
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_1" id="exampleRadios2" value="b">
                                            <label class="form-check-label" for="exampleRadios2">
                                              b. was
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_1" id="exampleRadios3" value="c">
                                            <label class="form-check-label" for="exampleRadios3">
                                              c. am
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_1" id="exampleRadios4" value="d">
                                            <label class="form-check-label" for="exampleRadios4">
                                              d. were
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">2. He ....... here, he comes to the office today.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_2" id="exampleRadios5" value="a">
                                            <label class="form-check-label" for="exampleRadios5">
                                              a. was
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_2" id="exampleRadios6" value="b">
                                            <label class="form-check-label" for="exampleRadios6">
                                              b. is
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_2" id="exampleRadios7" value="c">
                                            <label class="form-check-label" for="exampleRadios7">
                                              c. be
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_2" id="exampleRadios8" value="d">
                                            <label class="form-check-label" for="exampleRadios8">
                                              d. were
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">3. " ....... they coming?". I think so.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_3" id="exampleRadios9" value="a">
                                            <label class="form-check-label" for="exampleRadios9">
                                              a. was
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_3" id="exampleRadios10" value="b">
                                            <label class="form-check-label" for="exampleRadios10">
                                              b. were
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_3" id="exampleRadios11" value="c">
                                            <label class="form-check-label" for="exampleRadios11">
                                              c. being
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_3" id="exampleRadios12" value="d">
                                            <label class="form-check-label" for="exampleRadios12">
                                              d. are
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">4. The two boys ....... not here when I came.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_4" id="exampleRadios13" value="a">
                                            <label class="form-check-label" for="exampleRadios13">
                                              a. were
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_4" id="exampleRadios14" value="b">
                                            <label class="form-check-label" for="exampleRadios14">
                                              b. will be
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_4" id="exampleRadios15" value="c">
                                            <label class="form-check-label" for="exampleRadios15">
                                              c. are
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_4" id="exampleRadios16" value="d">
                                            <label class="form-check-label" for="exampleRadios16">
                                              d. was
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">5. What ....... she do when you met her?</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_5" id="exampleRadios17" value="a">
                                            <label class="form-check-label" for="exampleRadios17">
                                              a. did
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_5" id="exampleRadios18" value="b">
                                            <label class="form-check-label" for="exampleRadios18">
                                              b. do
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_5" id="exampleRadios19" value="c">
                                            <label class="form-check-label" for="exampleRadios19">
                                              c. does
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_5" id="exampleRadios20" value="d">
                                            <label class="form-check-label" for="exampleRadios20">
                                              d. done
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">6. The scretary didn't ....... me anything.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_6" id="exampleRadios21" value="a">
                                            <label class="form-check-label" for="exampleRadios21">
                                              a. telling
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_6" id="exampleRadios22" value="b">
                                            <label class="form-check-label" for="exampleRadios22">
                                              b. tell
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_6" id="exampleRadios23" value="c">
                                            <label class="form-check-label" for="exampleRadios23">
                                              c. tells
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_6" id="exampleRadios24" value="d">
                                            <label class="form-check-label" for="exampleRadios24">
                                              d. told
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">7. She ....... a letter when the manager came</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_7" id="exampleRadios25" value="a">
                                            <label class="form-check-label" for="exampleRadios25">
                                              a. was typed
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_7" id="exampleRadios26" value="b">
                                            <label class="form-check-label" for="exampleRadios26">
                                              b. is typing
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_7" id="exampleRadios27" value="c">
                                            <label class="form-check-label" for="exampleRadios27">
                                              c. was typing
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_7" id="exampleRadios28" value="d">
                                            <label class="form-check-label" for="exampleRadios28">
                                              d. typed
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">8. The family went to Bali last week, they ....... there several time.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_8" id="exampleRadios29" value="a">
                                            <label class="form-check-label" for="exampleRadios29">
                                              a. were going
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_8" id="exampleRadios30" value="b">
                                            <label class="form-check-label" for="exampleRadios30">
                                              b. went
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_8" id="exampleRadios31" value="c">
                                            <label class="form-check-label" for="exampleRadios31">
                                              c. have going
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_8" id="exampleRadios32" value="d">
                                            <label class="form-check-label" for="exampleRadios32">
                                              d. have gone
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">9. The Doctor ....... soon.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_9" id="exampleRadios33" value="a">
                                            <label class="form-check-label" for="exampleRadios33">
                                              a. left
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_9" id="exampleRadios34" value="b">
                                            <label class="form-check-label" for="exampleRadios34">
                                              b. will lived
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_9" id="exampleRadios35" value="c">
                                            <label class="form-check-label" for="exampleRadios35">
                                              c. leaved
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_9" id="exampleRadios36" value="d">
                                            <label class="form-check-label" for="exampleRadios36">
                                              d. will be leaving
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">10. My Brother ....... there this year.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_10" id="exampleRadios37" value="a">
                                            <label class="form-check-label" for="exampleRadios37">
                                              a. hasn't to go
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_10" id="exampleRadios38" value="b">
                                            <label class="form-check-label" for="exampleRadios38">
                                              b. haven't gone
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_10" id="exampleRadios39" value="c">
                                            <label class="form-check-label" for="exampleRadios39">
                                              c. doesn't have to go
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_10" id="exampleRadios40" value="d">
                                            <label class="form-check-label" for="exampleRadios40">
                                              d. doesn't not have
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">11. Stanley ....... many friends in this city.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_11" id="exampleRadios41" value="a">
                                            <label class="form-check-label" for="exampleRadios41">
                                              a. not have
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_11" id="exampleRadios42" value="b">
                                            <label class="form-check-label" for="exampleRadios42">
                                              b. doesn't have
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_11" id="exampleRadios43" value="c">
                                            <label class="form-check-label" for="exampleRadios43">
                                              c. not has
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_11" id="exampleRadios45" value="d">
                                            <label class="form-check-label" for="exampleRadios45">
                                              d. doesn't not have
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">12. All of them ....... on time</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_12" id="exampleRadios46" value="a">
                                            <label class="form-check-label" for="exampleRadios46">
                                              a. have to be there
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_12" id="exampleRadios47" value="b">
                                            <label class="form-check-label" for="exampleRadios47">
                                              b. will there
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_12" id="exampleRadios48" value="c">
                                            <label class="form-check-label" for="exampleRadios48">
                                              c. have to there
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_12" id="exampleRadios49" value="d">
                                            <label class="form-check-label" for="exampleRadios49">
                                              d. have there
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">13. The staff always ....... T.V whenever they have no work to do.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_13" id="exampleRadios50" value="a">
                                            <label class="form-check-label" for="exampleRadios50">
                                              a. have watched
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_13" id="exampleRadios51" value="b">
                                            <label class="form-check-label" for="exampleRadios51">
                                              b. watched
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_13" id="exampleRadios52" value="c">
                                            <label class="form-check-label" for="exampleRadios52">
                                              c. whatch
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_13" id="exampleRadios53" value="d">
                                            <label class="form-check-label" for="exampleRadios53">
                                              d. are watching
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">14. Two years ago the experts ....... in a plane crash</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_14" id="exampleRadios54" value="a">
                                            <label class="form-check-label" for="exampleRadios54">
                                              a. dies
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_14" id="exampleRadios55" value="b">
                                            <label class="form-check-label" for="exampleRadios55">
                                              b. die
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_14" id="exampleRadios56" value="c">
                                            <label class="form-check-label" for="exampleRadios56">
                                              c. is dying
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_14" id="exampleRadios57" value="d">
                                            <label class="form-check-label" for="exampleRadios57">
                                              d. died
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">15. My Brother ....... as ship captain for more than ten years.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_15" id="exampleRadios58" value="a">
                                            <label class="form-check-label" for="exampleRadios58">
                                              a. has worked
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_15" id="exampleRadios59" value="b">
                                            <label class="form-check-label" for="exampleRadios59">
                                              b. is working
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_15" id="exampleRadios60" value="c">
                                            <label class="form-check-label" for="exampleRadios60">
                                              c. works
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_15" id="exampleRadios61" value="d">
                                            <label class="form-check-label" for="exampleRadios61">
                                              d. work
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">16. While the director was explaining the details, the marketing staff ....... to each other.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_16" id="exampleRadios62" value="a">
                                            <label class="form-check-label" for="exampleRadios62">
                                              a. talked
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_16" id="exampleRadios63" value="b">
                                            <label class="form-check-label" for="exampleRadios63">
                                              b. were talking
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_16" id="exampleRadios64" value="c">
                                            <label class="form-check-label" for="exampleRadios64">
                                              c. talk
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_16" id="exampleRadios65" value="d">
                                            <label class="form-check-label" for="exampleRadios65">
                                              d. was talking
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">17. This company ....... about ten years ago.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_17" id="exampleRadios66" value="a">
                                            <label class="form-check-label" for="exampleRadios66">
                                              a. was establishing
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_17" id="exampleRadios67" value="b">
                                            <label class="form-check-label" for="exampleRadios67">
                                              b. established
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_17" id="exampleRadios68" value="c">
                                            <label class="form-check-label" for="exampleRadios68">
                                              c. establishes
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_17" id="exampleRadios69" value="d">
                                            <label class="form-check-label" for="exampleRadios69">
                                              d. was established
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">18. The result of the experiment will depend ....... this correct calculation.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_18" id="exampleRadios70" value="a">
                                            <label class="form-check-label" for="exampleRadios70">
                                              a. on
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_18" id="exampleRadios71" value="b">
                                            <label class="form-check-label" for="exampleRadios71">
                                              b. of
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_18" id="exampleRadios72" value="c">
                                            <label class="form-check-label" for="exampleRadios72">
                                              c. at
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_18" id="exampleRadios73" value="d">
                                            <label class="form-check-label" for="exampleRadios73">
                                              d. from
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">19. This building is situated ......., Jl. H R Rasuna Said kav C-3, Jakarta 12920.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_19" id="exampleRadios74" value="a">
                                            <label class="form-check-label" for="exampleRadios74">
                                              a. on
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_19" id="exampleRadios75" value="b">
                                            <label class="form-check-label" for="exampleRadios75">
                                              b. in
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_19" id="exampleRadios76" value="c">
                                            <label class="form-check-label" for="exampleRadios76">
                                              c. at
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_19" id="exampleRadios77" value="d">
                                            <label class="form-check-label" for="exampleRadios77">
                                              d. over
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">20. Hendrawan plays golf very ....... He is the champion of our company.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_20" id="exampleRadios78" value="a">
                                            <label class="form-check-label" for="exampleRadios78">
                                              a. better
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_20" id="exampleRadios79" value="b">
                                            <label class="form-check-label" for="exampleRadios79">
                                              b. well
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_20" id="exampleRadios80" value="c">
                                            <label class="form-check-label" for="exampleRadios80">
                                              c. goodness
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_20" id="exampleRadios81" value="d">
                                            <label class="form-check-label" for="exampleRadios81">
                                              d. good
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">21. You can't be promoted to high position whitout working .......</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_21" id="exampleRadios82" value="a">
                                            <label class="form-check-label" for="exampleRadios82">
                                              a. hardness
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_21" id="exampleRadios83" value="b">
                                            <label class="form-check-label" for="exampleRadios83">
                                              b. hard
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_21" id="exampleRadios84" value="c">
                                            <label class="form-check-label" for="exampleRadios84">
                                              c. hardest
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_21" id="exampleRadios85" value="d">
                                            <label class="form-check-label" for="exampleRadios85">
                                              d. hardly
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">22. We export a lot of ....... overseas.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_22" id="exampleRadios86" value="a">
                                            <label class="form-check-label" for="exampleRadios86">
                                              a. fishes
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_22" id="exampleRadios87" value="b">
                                            <label class="form-check-label" for="exampleRadios87">
                                              b. fishers
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_22" id="exampleRadios88" value="c">
                                            <label class="form-check-label" for="exampleRadios88">
                                              c. fish
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_22" id="exampleRadios89" value="d">
                                            <label class="form-check-label" for="exampleRadios89">
                                              d. fishs
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">23. That company is ....... in our new products</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_23" id="exampleRadios90" value="a">
                                            <label class="form-check-label" for="exampleRadios90">
                                              a. interests
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_23" id="exampleRadios91" value="b">
                                            <label class="form-check-label" for="exampleRadios91">
                                              b. interesting
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_23" id="exampleRadios92" value="c">
                                            <label class="form-check-label" for="exampleRadios92">
                                              c. interest
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_23" id="exampleRadios93" value="d">
                                            <label class="form-check-label" for="exampleRadios93">
                                              d. interested
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">24. The beautifully ....... poster gives us a happy feeling.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_24" id="exampleRadios94" value="a">
                                            <label class="form-check-label" for="exampleRadios94">
                                              a. coloured
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_24" id="exampleRadios95" value="b">
                                            <label class="form-check-label" for="exampleRadios95">
                                              b. colours
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_24" id="exampleRadios96" value="c">
                                            <label class="form-check-label" for="exampleRadios96">
                                              c. colouring
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_24" id="exampleRadios97" value="d">
                                            <label class="form-check-label" for="exampleRadios97">
                                              d. color
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">25. The engine lost ....... power because of faulty adjusment.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_25" id="exampleRadios98" value="a">
                                            <label class="form-check-label" for="exampleRadios98">
                                              a. theirs
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_25" id="exampleRadios99" value="b">
                                            <label class="form-check-label" for="exampleRadios99">
                                              b. its
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_25" id="exampleRadios100" value="c">
                                            <label class="form-check-label" for="exampleRadios100">
                                              c. their's
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_25" id="exampleRadios101" value="d">
                                            <label class="form-check-label" for="exampleRadios101">
                                              d. it's
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">26. The company has suffered a huge loss this year ....... the employees will not get any bonuses.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_26" id="exampleRadios102" value="a">
                                            <label class="form-check-label" for="exampleRadios102">
                                              a. although
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_26" id="exampleRadios103" value="b">
                                            <label class="form-check-label" for="exampleRadios103">
                                              b. because
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_26" id="exampleRadios104" value="c">
                                            <label class="form-check-label" for="exampleRadios104">
                                              c. nevertheless
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_26" id="exampleRadios105" value="d">
                                            <label class="form-check-label" for="exampleRadios105">
                                              d. consequently
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">27. Before going out he puts on his .......</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_27" id="exampleRadios106" value="a">
                                            <label class="form-check-label" for="exampleRadios106">
                                              a. jacket
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_27" id="exampleRadios107" value="b">
                                            <label class="form-check-label" for="exampleRadios107">
                                              b. pencil
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_27" id="exampleRadios108" value="c">
                                            <label class="form-check-label" for="exampleRadios108">
                                              c. briefcase
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_27" id="exampleRadios109" value="d">
                                            <label class="form-check-label" for="exampleRadios109">
                                              d. mousetache
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">28. The weather is ....... today. Wear that thick coat.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_28" id="exampleRadios110" value="a">
                                            <label class="form-check-label" for="exampleRadios110">
                                              a. breezy
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_28" id="exampleRadios111" value="b">
                                            <label class="form-check-label" for="exampleRadios111">
                                              b. warm
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_28" id="exampleRadios112" value="c">
                                            <label class="form-check-label" for="exampleRadios112">
                                              c. chilly
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_28" id="exampleRadios113" value="d">
                                            <label class="form-check-label" for="exampleRadios113">
                                              d. winter
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">29. It's really gigantic. It means that it is .......</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_29" id="exampleRadios114" value="a">
                                            <label class="form-check-label" for="exampleRadios114">
                                              a. huge
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_29" id="exampleRadios115" value="b">
                                            <label class="form-check-label" for="exampleRadios115">
                                              b. pleasent
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_29" id="exampleRadios116" value="c">
                                            <label class="form-check-label" for="exampleRadios116">
                                              c. exited
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_29" id="exampleRadios117" value="d">
                                            <label class="form-check-label" for="exampleRadios117">
                                              d. wonderful
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">30. The robbers ....... their loot in an empty hut</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_30" id="exampleRadios118" value="a">
                                            <label class="form-check-label" for="exampleRadios118">
                                              a. displayed
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_30" id="exampleRadios119" value="b">
                                            <label class="form-check-label" for="exampleRadios119">
                                              b. concealed
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_30" id="exampleRadios120" value="c">
                                            <label class="form-check-label" for="exampleRadios120">
                                              c. declared
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_30" id="exampleRadios121" value="d">
                                            <label class="form-check-label" for="exampleRadios121">
                                              d. conceived
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">31. We were ....... to learn that he has so much experience.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_31" id="exampleRadios122" value="a">
                                            <label class="form-check-label" for="exampleRadios122">
                                              a. astonished
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_31" id="exampleRadios123" value="b">
                                            <label class="form-check-label" for="exampleRadios123">
                                              b. abused
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_31" id="exampleRadios124" value="c">
                                            <label class="form-check-label" for="exampleRadios124">
                                              c. curious
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_31" id="exampleRadios125" value="d">
                                            <label class="form-check-label" for="exampleRadios125">
                                              d. cornered
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">32. Tom had difficulty passing his driver's license test, but e finally succeeded on his third .......</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_32" id="exampleRadios126" value="a">
                                            <label class="form-check-label" for="exampleRadios126">
                                              a. process
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_32" id="exampleRadios127" value="b">
                                            <label class="form-check-label" for="exampleRadios127">
                                              b. display
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_32" id="exampleRadios128" value="c">
                                            <label class="form-check-label" for="exampleRadios128">
                                              c. perform
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_32" id="exampleRadios129" value="d">
                                            <label class="form-check-label" for="exampleRadios129">
                                              d. attempt
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">33. I'm sorry my presentation was too long last week. I'll be ....... today.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_33" id="exampleRadios130" value="a">
                                            <label class="form-check-label" for="exampleRadios130">
                                              a. patient
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_33" id="exampleRadios131" value="b">
                                            <label class="form-check-label" for="exampleRadios131">
                                              b. fair
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_33" id="exampleRadios132" value="c">
                                            <label class="form-check-label" for="exampleRadios132">
                                              c. brief
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_33" id="exampleRadios133" value="d">
                                            <label class="form-check-label" for="exampleRadios133">
                                              d. speed
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">34. I know I have met that man before, I can't ....... where.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_34" id="exampleRadios134" value="a">
                                            <label class="form-check-label" for="exampleRadios134">
                                              a. recall
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_34" id="exampleRadios135" value="b">
                                            <label class="form-check-label" for="exampleRadios135">
                                              b. assume
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_34" id="exampleRadios136" value="c">
                                            <label class="form-check-label" for="exampleRadios136">
                                              c. recognize
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_34" id="exampleRadios137" value="d">
                                            <label class="form-check-label" for="exampleRadios137">
                                              d. wonder
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">35. Compared to the importance of that conference this meeting is only .......</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_35" id="exampleRadios138" value="a">
                                            <label class="form-check-label" for="exampleRadios138">
                                              a. trivial
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_35" id="exampleRadios139" value="b">
                                            <label class="form-check-label" for="exampleRadios139">
                                              b. handy
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_35" id="exampleRadios140" value="c">
                                            <label class="form-check-label" for="exampleRadios140">
                                              c. keen
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_35" id="exampleRadios141" value="d">
                                            <label class="form-check-label" for="exampleRadios141">
                                              d. moist
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">36. Doctor's and nurses have patient in .......</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_36" id="exampleRadios142" value="a">
                                            <label class="form-check-label" for="exampleRadios142">
                                              a. hospital
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_36" id="exampleRadios143" value="b">
                                            <label class="form-check-label" for="exampleRadios143">
                                              b. office
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_36" id="exampleRadios144" value="c">
                                            <label class="form-check-label" for="exampleRadios144">
                                              c. hospitally
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_36" id="exampleRadios145" value="d">
                                            <label class="form-check-label" for="exampleRadios145">
                                              d. dispensasy
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">37. People use ....... to go up and down in high buildings.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_37" id="exampleRadios146" value="a">
                                            <label class="form-check-label" for="exampleRadios146">
                                              a. parking lot
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_37" id="exampleRadios147" value="b">
                                            <label class="form-check-label" for="exampleRadios147">
                                              b. elevator
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_37" id="exampleRadios148" value="c">
                                            <label class="form-check-label" for="exampleRadios148">
                                              c. carpet
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_37" id="exampleRadios149" value="d">
                                            <label class="form-check-label" for="exampleRadios149">
                                              d. office boy
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">38. The cost of ....... of the equipments is very high.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_38" id="exampleRadios150" value="a">
                                            <label class="form-check-label" for="exampleRadios150">
                                              a. subtances
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_38" id="exampleRadios151" value="b">
                                            <label class="form-check-label" for="exampleRadios151">
                                              b. buying
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_38" id="exampleRadios152" value="c">
                                            <label class="form-check-label" for="exampleRadios152">
                                              c. maintenance
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_38" id="exampleRadios153" value="d">
                                            <label class="form-check-label" for="exampleRadios153">
                                              d. maintaining
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">39. ....... in the rural areas are made of wood and bamboo.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_39" id="exampleRadios154" value="a">
                                            <label class="form-check-label" for="exampleRadios154">
                                              a. brickwork
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_39" id="exampleRadios155" value="b">
                                            <label class="form-check-label" for="exampleRadios155">
                                              b. acroos the river
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_39" id="exampleRadios156" value="c">
                                            <label class="form-check-label" for="exampleRadios156">
                                              c. bridging
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_39" id="exampleRadios157" value="d">
                                            <label class="form-check-label" for="exampleRadios157">
                                              d. bridges
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">40. Her ....... of many subjects is broad because she likes to read scientific journals.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_40" id="exampleRadios158" value="a">
                                            <label class="form-check-label" for="exampleRadios158">
                                              a. knowledge
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_40" id="exampleRadios159" value="b">
                                            <label class="form-check-label" for="exampleRadios159">
                                              b. well known
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_40" id="exampleRadios160" value="c">
                                            <label class="form-check-label" for="exampleRadios160">
                                              c. know how
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_40" id="exampleRadios161" value="d">
                                            <label class="form-check-label" for="exampleRadios161">
                                              d. knows
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">41. Tomy and Tiny don't have much to do today .......</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_41" id="exampleRadios162" value="a">
                                            <label class="form-check-label" for="exampleRadios162">
                                              a. Either Tom doesn't
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_41" id="exampleRadios163" value="b">
                                            <label class="form-check-label" for="exampleRadios163">
                                              b. Tom doesn't either
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_41" id="exampleRadios164" value="c">
                                            <label class="form-check-label" for="exampleRadios164">
                                              c. Tom don't much to do
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_41" id="exampleRadios165" value="d">
                                            <label class="form-check-label" for="exampleRadios165">
                                              d. Tom neither not.
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">42. The secretary wrote many letters last month ....... ?</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_42" id="exampleRadios166" value="a">
                                            <label class="form-check-label" for="exampleRadios166">
                                              a. I also did too
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_42" id="exampleRadios167" value="b">
                                            <label class="form-check-label" for="exampleRadios167">
                                              b. So I did
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_42" id="exampleRadios168" value="c">
                                            <label class="form-check-label" for="exampleRadio168">
                                              c. I didn't too
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_42" id="exampleRadios169" value="d">
                                            <label class="form-check-label" for="exampleRadios169">
                                              d. I did too
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">43. Mr. Green left the houses earlier than you did, ....... ?</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_43" id="exampleRadios170" value="a">
                                            <label class="form-check-label" for="exampleRadios170">
                                              a. did he
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_43" id="exampleRadios171" value="b">
                                            <label class="form-check-label" for="exampleRadios171">
                                              b. do you
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_43" id="exampleRadios172" value="c">
                                            <label class="form-check-label" for="exampleRadios172">
                                              c. didn't he
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_43" id="exampleRadios173" value="d">
                                            <label class="form-check-label" for="exampleRadios173">
                                              d. didn't you
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">44. The staff are trained to speak French, ....... ?</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_44" id="exampleRadios174" value="a">
                                            <label class="form-check-label" for="exampleRadios174">
                                              a. aren't trained
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_44" id="exampleRadios175" value="b">
                                            <label class="form-check-label" for="exampleRadios175">
                                              b. aren't they
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_44" id="exampleRadios176" value="c">
                                            <label class="form-check-label" for="exampleRadios176">
                                              c. aren't to speak
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_44" id="exampleRadios177" value="d">
                                            <label class="form-check-label" for="exampleRadios177">
                                              d. are the staff
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">45. ....... tomorrow, I think he will come here.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_45" id="exampleRadios178" value="a">
                                            <label class="form-check-label" for="exampleRadios178">
                                              a. If he has time
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_45" id="exampleRadios179" value="b">
                                            <label class="form-check-label" for="exampleRadios179">
                                              b. If he has had time
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_45" id="exampleRadios180" value="c">
                                            <label class="form-check-label" for="exampleRadios180">
                                              c. If he will have time
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_45" id="exampleRadios181" value="d">
                                            <label class="form-check-label" for="exampleRadios181">
                                              d. If he will
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">46. ....... then if you hadn't had to go?</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_46" id="exampleRadios182" value="a">
                                            <label class="form-check-label" for="exampleRadios182">
                                              a. What would you do
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_46" id="exampleRadios183" value="b">
                                            <label class="form-check-label" for="exampleRadios183">
                                              b. What did you do
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_46" id="exampleRadios184" value="c">
                                            <label class="form-check-label" for="exampleRadios184">
                                              c. What would you have done
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_46" id="exampleRadios185" value="d">
                                            <label class="form-check-label" for="exampleRadios185">
                                              d. What have you done
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">47. Would you do it if ....... to?</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_47" id="exampleRadios186" value="a">
                                            <label class="form-check-label" for="exampleRadios186">
                                              a. you asked
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_47" id="exampleRadios187" value="b">
                                            <label class="form-check-label" for="exampleRadios187">
                                              b. were you asked
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_47" id="exampleRadios188" value="c">
                                            <label class="form-check-label" for="exampleRadios188">
                                              c. you were asked
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_47" id="exampleRadios189" value="d">
                                            <label class="form-check-label" for="exampleRadios189">
                                              d. you are asked
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">48. Here we are gentlement, this is the conference room. .......</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_48" id="exampleRadios190" value="a">
                                            <label class="form-check-label" for="exampleRadios190">
                                              a. After you, please
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_48" id="exampleRadios191" value="b">
                                            <label class="form-check-label" for="exampleRadios191">
                                              b. You are after, please
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_48" id="exampleRadios192" value="c">
                                            <label class="form-check-label" for="exampleRadios192">
                                              c. You please after
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_48" id="exampleRadios193" value="d">
                                            <label class="form-check-label" for="exampleRadios193">
                                              d. Please, you are after
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">49. Had she known you didn't come, ....... for you.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_49" id="exampleRadios194" value="a">
                                            <label class="form-check-label" for="exampleRadios194">
                                              a. She had not waited
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_49" id="exampleRadios195" value="b">
                                            <label class="form-check-label" for="exampleRadios195">
                                              b. She would have waited
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_49" id="exampleRadios196" value="c">
                                            <label class="form-check-label" for="exampleRadios196">
                                              c. She will have waited
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_49" id="exampleRadios197" value="d">
                                            <label class="form-check-label" for="exampleRadios197">
                                              d. She wouldn't have waited
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">50. Benny ....... to the manager, when I ....... his room.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_50" id="exampleRadios198" value="a">
                                            <label class="form-check-label" for="exampleRadios198">
                                              a. was speaking - entered
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_50" id="exampleRadios199" value="b">
                                            <label class="form-check-label" for="exampleRadios199">
                                              b. spoke - entered
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_50" id="exampleRadios200" value="c">
                                            <label class="form-check-label" for="exampleRadios200">
                                              c. speaking - was entering
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_50" id="exampleRadios201" value="d">
                                            <label class="form-check-label" for="exampleRadios201">
                                              d. spoke - entering
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">51. When the bell ....... we ....... the last section.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_51" id="exampleRadios202" value="a">
                                            <label class="form-check-label" for="exampleRadios202">
                                              a. rung - completed
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_51" id="exampleRadios203" value="b">
                                            <label class="form-check-label" for="exampleRadios203">
                                              b. rings - completing
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_51" id="exampleRadios204" value="c">
                                            <label class="form-check-label" for="exampleRadios204">
                                              c. ring - completing
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_51" id="exampleRadios205" value="d">
                                            <label class="form-check-label" for="exampleRadios205">
                                              d. rang - were completing
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">52. The president ....... home when we ....... to his office.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_52" id="exampleRadios206" value="a">
                                            <label class="form-check-label" for="exampleRadios206">
                                              a. had already gone for - got
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_52" id="exampleRadios207" value="b">
                                            <label class="form-check-label" for="exampleRadios207">
                                              b. had already left for - got
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_52" id="exampleRadios208" value="c">
                                            <label class="form-check-label" for="exampleRadios208">
                                              c. had already leave - geeting
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_52" id="exampleRadios209" value="d">
                                            <label class="form-check-label" for="exampleRadios209">
                                              d. already leaved - gotten
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">53. We were forced ....... a rediculous position ....... agreesing ....... the problem.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_53" id="exampleRadios210" value="a">
                                            <label class="form-check-label" for="exampleRadios210">
                                              a. to - on - with
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_53" id="exampleRadios211" value="b">
                                            <label class="form-check-label" for="exampleRadios211">
                                              b. over - in - to
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_53" id="exampleRadios212" value="c">
                                            <label class="form-check-label" for="exampleRadios212">
                                              c. into - by - to
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_53" id="exampleRadios213" value="d">
                                            <label class="form-check-label" for="exampleRadios213">
                                              d. onto - out of - into
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">54. Please ....... a message if anyone ....... while I ....... a way.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_54" id="exampleRadios214" value="a">
                                            <label class="form-check-label" for="exampleRadios214">
                                              a. leave - is calling - was
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_54" id="exampleRadios215" value="b">
                                            <label class="form-check-label" for="exampleRadios215">
                                              b. leave - calling - be
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_54" id="exampleRadios216" value="c">
                                            <label class="form-check-label" for="exampleRadios216">
                                              c. left - will call - will
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_54" id="exampleRadios216" value="d">
                                            <label class="form-check-label" for="exampleRadios216">
                                              d. leave - is calling - am
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">55. ....... easy! We ....... a massage as soon as we ....... there.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_55" id="exampleRadios217" value="a">
                                            <label class="form-check-label" for="exampleRadios217">
                                              a. take it - will send - arrive
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_55" id="exampleRadios218" value="b">
                                            <label class="form-check-label" for="exampleRadios218">
                                              b. take - send - will be arriving there
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_55" id="exampleRadios219" value="c">
                                            <label class="form-check-label" for="exampleRadios219">
                                              c. Don't take - will be sending - arrive
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_55" id="exampleRadios220" value="d">
                                            <label class="form-check-label" for="exampleRadios220">
                                              d. Don't take it - sending - arriving
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">56. I'm at the front counter. I greet my guest: ....... , .......</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_56" id="exampleRadios221" value="a">
                                            <label class="form-check-label" for="exampleRadios221">
                                              a. Good morning, madam. What do you want?
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_56" id="exampleRadios222" value="b">
                                            <label class="form-check-label" for="exampleRadios222">
                                              b. Good afternoon, sir. What do you want me
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_56" id="exampleRadios223" value="c">
                                            <label class="form-check-label" for="exampleRadios223">
                                              c. Good evening, sir. Do you help me?
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_56" id="exampleRadios224" value="d">
                                            <label class="form-check-label" for="exampleRadios224">
                                              d. Good afternoon, madam. What can I do for you?
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">57. Yes, ....... . ....... .</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_57" id="exampleRadios225" value="a">
                                            <label class="form-check-label" for="exampleRadios225">
                                              a. I have a promise with Mr. Himawan. He is into?
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_57" id="exampleRadios226" value="b">
                                            <label class="form-check-label" for="exampleRadios226">
                                              b. I agree with Mr. Himawan. Is he into?
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_57" id="exampleRadios227" value="c">
                                            <label class="form-check-label" for="exampleRadios227">
                                              c. I have an appointment with Mr. Himawan. Is he in?
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_57" id="exampleRadios228" value="d">
                                            <label class="form-check-label" for="exampleRadios228">
                                              d. I a date with Mr. Himawan. Would I like to see him?
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">58. What did he say? He told us that .......</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_58" id="exampleRadios229" value="a">
                                            <label class="form-check-label" for="exampleRadios229">
                                              a. we had to finish it today.
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_58" id="exampleRadios230" value="b">
                                            <label class="form-check-label" for="exampleRadios230">
                                              b. to finish it today.
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_58" id="exampleRadios231" value="c">
                                            <label class="form-check-label" for="exampleRadios231">
                                              c. we must finish today.
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_58" id="exampleRadios232" value="d">
                                            <label class="form-check-label" for="exampleRadios232">
                                              d. we may finish today.
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">59. Over the past eighteen years ....... in Asia.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_59" id="exampleRadios233" value="a">
                                            <label class="form-check-label" for="exampleRadios233">
                                              a. we have told the programs
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_59" id="exampleRadios234" value="b">
                                            <label class="form-check-label" for="exampleRadios234">
                                              b. we have held the programs
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_59" id="exampleRadios235" value="c">
                                            <label class="form-check-label" for="exampleRadios235">
                                              c. we hold the programs
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_59" id="exampleRadios236" value="d">
                                            <label class="form-check-label" for="exampleRadios236">
                                              d. we have holding the programs.
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">60. Finally, you mentioned that participant .......</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_60" id="exampleRadios237" value="a">
                                            <label class="form-check-label" for="exampleRadios237">
                                              a. will be come to ASEAN countries
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_60" id="exampleRadios238" value="b">
                                            <label class="form-check-label" for="exampleRadios238">
                                              b. will coming from ASEAN countries
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_60" id="exampleRadios239" value="c">
                                            <label class="form-check-label" for="exampleRadios239">
                                              c. would come from ASEAN countries
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_60" id="exampleRadios240" value="d">
                                            <label class="form-check-label" for="exampleRadios240">
                                              d. would come from ASEAN countries
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">61. ....... to wish you a very happy successful progress.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_61" id="exampleRadios241" value="a">
                                            <label class="form-check-label" for="exampleRadios241">
                                              a. For the most, we should like
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_61" id="exampleRadios242" value="b">
                                            <label class="form-check-label" for="exampleRadios242">
                                              b. For most, we like
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_61" id="exampleRadios243" value="c">
                                            <label class="form-check-label" for="exampleRadios243">
                                              c. For most, we are like
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_61" id="exampleRadios244" value="d">
                                            <label class="form-check-label" for="exampleRadios244">
                                              d. Fore most, we would like
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">62. We are very sorry ....... you earlier.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_62" id="exampleRadios245" value="a">
                                            <label class="form-check-label" for="exampleRadios245">
                                              a. for not being able to contact
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_62" id="exampleRadios246" value="b">
                                            <label class="form-check-label" for="exampleRadios246">
                                              b. for not be able to contacting
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_62" id="exampleRadios247" value="c">
                                            <label class="form-check-label" for="exampleRadios247">
                                              c. for not able contact
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_62" id="exampleRadios248" value="d">
                                            <label class="form-check-label" for="exampleRadios248">
                                              d. for not ability to contact
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">63. I hope ....... of correspondence we had the last two months.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_63" id="exampleRadios249" value="a">
                                            <label class="form-check-label" for="exampleRadios249">
                                              a. you are available to exchange
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_63" id="exampleRadios250" value="b">
                                            <label class="form-check-label" for="exampleRadios250">
                                              b. you available to be exchanging
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_63" id="exampleRadios251" value="c">
                                            <label class="form-check-label" for="exampleRadios251">
                                              c. you have available the exchange
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_63" id="exampleRadios252" value="d">
                                            <label class="form-check-label" for="exampleRadios252">
                                              d. you available exchange
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">64. ....... during this week I will proceed with my plans</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_64" id="exampleRadios253" value="a">
                                            <label class="form-check-label" for="exampleRadios253">
                                              a. If I don't here from you
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_64" id="exampleRadios254" value="b">
                                            <label class="form-check-label" for="exampleRadios254">
                                              b. If I don't hear from you
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_64" id="exampleRadios255" value="c">
                                            <label class="form-check-label" for="exampleRadios255">
                                              c. If I not hear from you
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_64" id="exampleRadios256" value="d">
                                            <label class="form-check-label" for="exampleRadios256">
                                              d. If I not hearing from you
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">65. Regrettably ....... him from understanding the mission</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_65" id="exampleRadios257" value="a">
                                            <label class="form-check-label" for="exampleRadios257">
                                              a. a family illness has presented
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_65" id="exampleRadios258" value="b">
                                            <label class="form-check-label" for="exampleRadios258">
                                              b. he has prevented a family illness
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_65" id="exampleRadios259" value="c">
                                            <label class="form-check-label" for="exampleRadios259">
                                              c. has a family illness prevented
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_65" id="exampleRadios260" value="d">
                                            <label class="form-check-label" for="exampleRadios260">
                                              d. has a family prevented illness
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">66. It would be appreciated if ....... and advise us urgently.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_66" id="exampleRadios261" value="a">
                                            <label class="form-check-label" for="exampleRadios261">
                                              a. you rescheduleed appointing
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_66" id="exampleRadios262" value="b">
                                            <label class="form-check-label" for="exampleRadios262">
                                              b. you could reschedule the appointment
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_66" id="exampleRadios263" value="c">
                                            <label class="form-check-label" for="exampleRadios263">
                                              c. you can schedule the appointment
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_66" id="exampleRadios264" value="d">
                                            <label class="form-check-label" for="exampleRadios264">
                                              d. reschedule the appointment
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">67. In this regard ....... in meeting with me</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_67" id="exampleRadios265" value="a">
                                            <label class="form-check-label" for="exampleRadios265">
                                              a. I enquire weather you would interest
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_67" id="exampleRadios266" value="b">
                                            <label class="form-check-label" for="exampleRadios266">
                                              b. I enquiring wheather you would be interest
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_67" id="exampleRadios267" value="c">
                                            <label class="form-check-label" for="exampleRadios267">
                                              c. I am enquiring weather you would be interested
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_67" id="exampleRadios268" value="d">
                                            <label class="form-check-label" for="exampleRadios268">
                                              d. I am enquired weather you are interest
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">68. Your duties ....... of the project within the specific market.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_68" id="exampleRadios269" value="a">
                                            <label class="form-check-label" for="exampleRadios269">
                                              a. is include promoting
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_68" id="exampleRadios270" value="b">
                                            <label class="form-check-label" for="exampleRadios270">
                                              b. is include in the promote
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_68" id="exampleRadios271" value="c">
                                            <label class="form-check-label" for="exampleRadios271">
                                              c. will be included the promotion
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_68" id="exampleRadios272" value="d">
                                            <label class="form-check-label" for="exampleRadios272">
                                              d. will include the promotion
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">69. Harrow House ....... again today after the holidays</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_69" id="exampleRadios273" value="a">
                                            <label class="form-check-label" for="exampleRadios273">
                                              a. opened up for business
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_69" id="exampleRadios274" value="b">
                                            <label class="form-check-label" for="exampleRadios274">
                                              b. to open the business
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_69" id="exampleRadios275" value="c">
                                            <label class="form-check-label" for="exampleRadios275">
                                              c. open on for business
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_69" id="exampleRadios276" value="d">
                                            <label class="form-check-label" for="exampleRadios276">
                                              d. opening in the business
                                            </label>
                                          </div>
                                          <br>
                                <legend class="h6">70. We also ....... with European Business Company in London</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_70" id="exampleRadios277" value="a">
                                            <label class="form-check-label" for="exampleRadios277">
                                              a. to link on
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_70" id="exampleRadios278" value="b">
                                            <label class="form-check-label" for="exampleRadios278">
                                              b. have a link up
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_70" id="exampleRadios279" value="c">
                                            <label class="form-check-label" for="exampleRadios279">
                                              c. having to link in
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_70" id="exampleRadios280" value="d">
                                            <label class="form-check-label" for="exampleRadios280">
                                              d. to have a link into
                                            </label>
                                          </div>
                            </div>
                        </div>
                        <br>
                    <div class="card border-light shadow-sm components-section">
                        <div class="card-body">
                                <div class="mb-3">
                                    <h2 class="h5">II. Correct the sentences as the correction of the given sentence.</h2>
                                </div>
                                <br>
                                <!--Buttons-->
                                <legend class="h6">71. Jack go the office with public city bus.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_71" id="exampleRadios281" value="a">
                                            <label class="form-check-label" for="exampleRadios281">
                                              a. Jack go to the office together the public city bus
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_71" id="exampleRadios282" value="b">
                                            <label class="form-check-label" for="exampleRadios282">
                                              b. Jack goes into office by the general city bus
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_71" id="exampleRadios283" value="c">
                                            <label class="form-check-label" for="exampleRadios283">
                                              c. Jack goes to the office by public city bus
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_71" id="exampleRadios284" value="d">
                                            <label class="form-check-label" for="exampleRadios284">
                                              d. Jack gone to office in the public city bus
                                            </label>
                                          </div>
                                <br>
                                <legend class="h6">72. He introduced us what was his name</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_72" id="exampleRadios285" value="a">
                                            <label class="form-check-label" for="exampleRadios285">
                                              a. He introduce us what will his name
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_72" id="exampleRadios286" value="b">
                                            <label class="form-check-label" for="exampleRadios286">
                                              b. He introducing what his name is
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_72" id="exampleRadios287" value="c">
                                            <label class="form-check-label" for="exampleRadios287">
                                              c. He introduces what is his name
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_72" id="exampleRadios288" value="d">
                                            <label class="form-check-label" for="exampleRadios288">
                                              d. He introduced us what his name was
                                            </label>
                                          </div>
                                <br>
                                <legend class="h6">73. There have many people from overseas working on this company</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_73" id="exampleRadios289" value="a">
                                            <label class="form-check-label" for="exampleRadios289">
                                              a. There are many people from overseas working on this company
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_73" id="exampleRadios290" value="b">
                                            <label class="form-check-label" for="exampleRadios290">
                                              b. There have be many people from over the sea working at this company
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_73" id="exampleRadios291" value="c">
                                            <label class="form-check-label" for="exampleRadios291">
                                              c. There are many people ever the sea to work in this company
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_73" id="exampleRadios292" value="d">
                                            <label class="form-check-label" for="exampleRadios292">
                                              d. There have been many by overseas work in this company
                                            </label>
                                          </div>
                                <br>
                                <legend class="h6">74. I had the children to play noisely outside the house.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_74" id="exampleRadios293" value="a">
                                            <label class="form-check-label" for="exampleRadios293">
                                              a. I here the children playing noisely outside home
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_74" id="exampleRadios294" value="b">
                                            <label class="form-check-label" for="exampleRadios294">
                                              b. I heard the children playing noisely outside the house
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_74" id="exampleRadios295" value="c">
                                            <label class="form-check-label" for="exampleRadios295">
                                              c. I hear the children to play noise outside the house
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_74" id="exampleRadios296" value="d">
                                            <label class="form-check-label" for="exampleRadios296">
                                              d. I heared the children play noisely out of the home
                                            </label>
                                          </div>
                                <br>
                                <legend class="h6">75. The people of one country, they always figh one another.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_75" id="exampleRadios297" value="a">
                                            <label class="form-check-label" for="exampleRadios297">
                                              a. The people of each country always fight one another
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_75" id="exampleRadios298" value="b">
                                            <label class="form-check-label" for="exampleRadios298">
                                              b. The people of same country always fight one to other
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_75" id="exampleRadios299" value="c">
                                            <label class="form-check-label" for="exampleRadios299">
                                              c. The people of a country fight to one other
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_75" id="exampleRadios300" value="d">
                                            <label class="form-check-label" for="exampleRadios300">
                                              d. The people of the country fights one and other
                                            </label>
                                          </div>
                                <br>
                                <legend class="h6">76. We always enjoyed to play badminton with our colleague</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_76" id="exampleRadios301" value="a">
                                            <label class="form-check-label" for="exampleRadios301">
                                              a. We always enjoying to play badminton together our colleagues
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_76" id="exampleRadios302" value="b">
                                            <label class="form-check-label" for="exampleRadios302">
                                              b. We always enjoy playing badminton with our colleagues
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_76" id="exampleRadios303" value="c">
                                            <label class="form-check-label" for="exampleRadios303">
                                              c. We enjoy to play badminton by our colleagues
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_76" id="exampleRadios304" value="d">
                                            <label class="form-check-label" for="exampleRadios304">
                                              d. We join to playing badminton to our colleagues
                                            </label>
                                          </div>
                                <br>
                                <legend class="h6">77. The weather rains a lot in some countries in wints</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_77" id="exampleRadios305" value="a">
                                            <label class="form-check-label" for="exampleRadios305">
                                              a. The climate rains a lot in countries of wints
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_77" id="exampleRadios306" value="b">
                                            <label class="form-check-label" for="exampleRadios306">
                                              b. The weather it rains a lot in wints countries
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_77" id="exampleRadios307" value="c">
                                            <label class="form-check-label" for="exampleRadios307">
                                              c. It rains a lot in some countries in wints
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_77" id="exampleRadios308" value="d">
                                            <label class="form-check-label" for="exampleRadios308">
                                              d. It rain lot in some countrys on wints
                                            </label>
                                          </div>
                                <br>
                                <legend class="h6">78. If will accept the work, we will to have a party.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_78" id="exampleRadios309" value="a">
                                            <label class="form-check-label" for="exampleRadios309">
                                              a. If we accept the work, we will be having the party
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_78" id="exampleRadios310" value="b">
                                            <label class="form-check-label" for="exampleRadios310">
                                              b. If we will accepted for the work, we will have party
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_78" id="exampleRadios311" value="c">
                                            <label class="form-check-label" for="exampleRadios311">
                                              c. If we accepted working, we will to having the party
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_78" id="exampleRadios312" value="d">
                                            <label class="form-check-label" for="exampleRadios312">
                                              d. If we are accepted the work, we will have a party
                                            </label>
                                          </div>
                                <br>
                                <legend class="h6">79. One of the boys have decided to study economics at the university</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_79" id="exampleRadios313" value="a">
                                            <label class="form-check-label" for="exampleRadios313">
                                              a. One of the boys has decided studying economy at the university
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_79" id="exampleRadios314" value="b">
                                            <label class="form-check-label" for="exampleRadios314">
                                              b. One of the boys has decided to study economics at the university
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_79" id="exampleRadios315" value="c">
                                            <label class="form-check-label" for="exampleRadios315">
                                              c. One of the boys have decided studying economic at the university
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_79" id="exampleRadios316" value="d">
                                            <label class="form-check-label" for="exampleRadios316">
                                              d. One of the boy decided to study economics at the university
                                            </label>
                                          </div>
                                <br>
                                <legend class="h6">80. Eating the green grass, we saw fat cows while driving pasts the maeadow</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_80" id="exampleRadios317" value="a">
                                            <label class="form-check-label" for="exampleRadios317">
                                              a. The fat cows eating the green grass while we saw driving pass the meadow
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_80" id="exampleRadios318" value="b">
                                            <label class="form-check-label" for="exampleRadios318">
                                              b. While we pass the meadow, the fat cows eating green grass
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_80" id="exampleRadios319" value="c">
                                            <label class="form-check-label" for="exampleRadios319">
                                              c. The green grass eaten the fat cows while we passing the meadow
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_80" id="exampleRadios320" value="d">
                                            <label class="form-check-label" for="exampleRadios320">
                                              d. We saw fat cows eating the green grass while we were passing the meadow
                                            </label>
                                          </div>
                                <br>
                                <legend class="h6">81. We are dislike matemathics they confuse us.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_81" id="exampleRadios321" value="a">
                                            <label class="form-check-label" for="exampleRadios321">
                                              a. We dislike mathemathics because it confuse us
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_81" id="exampleRadios322" value="b">
                                            <label class="form-check-label" for="exampleRadios322">
                                              b. We dislike are mathemathics because it confuse us
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_81" id="exampleRadios323" value="c">
                                            <label class="form-check-label" for="exampleRadios323">
                                              c. We dislike matemathics because if confuse we
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_81" id="exampleRadios324" value="d">
                                            <label class="form-check-label" for="exampleRadios324">
                                              d. We are dislike mathemathics because they confuses we
                                            </label>
                                          </div>
                                <br>
                                <legend class="h6">82. I plan finally to leave the Europe either late evening or early morning</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_82" id="exampleRadios325" value="a">
                                            <label class="form-check-label" for="exampleRadios325">
                                              a. I finally plan leave to Europe late evening or either early morning
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_82" id="exampleRadios326" value="b">
                                            <label class="form-check-label" for="exampleRadios326">
                                              b. Finally I will plan will leave for Europe late evening or early morning
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_82" id="exampleRadios327" value="c">
                                            <label class="form-check-label" for="exampleRadios327">
                                              c. Finally I plan to leave for Europe either late on the evening or early in the morning
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_82" id="exampleRadios328" value="d">
                                            <label class="form-check-label" for="exampleRadios328">
                                              d. Finally plan I will leave for Europe evening and morning
                                            </label>
                                          </div>
                                <br>
                                <legend class="h6">83. We are interest in the opportunity continue on-going programs</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_83" id="exampleRadios329" value="a">
                                            <label class="form-check-label" for="exampleRadios329">
                                              a. We are interesting to opportunity to continue on-going the programs
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_83" id="exampleRadios330" value="b">
                                            <label class="form-check-label" for="exampleRadios330">
                                              b. We interested on the opportunity continuing on-going programs
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_83" id="exampleRadios331" value="c">
                                            <label class="form-check-label" for="exampleRadios331">
                                              c. We have interested the oppotunity continue going-on programs
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_83" id="exampleRadios332" value="d">
                                            <label class="form-check-label" for="exampleRadios332">
                                              d. We are interested in the opportunity to continue the on-going programs
                                            </label>
                                          </div>
                                <br>
                                <legend class="h6">84. I would like putting forward following questions and comments</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_84" id="exampleRadios333" value="a">
                                            <label class="form-check-label" for="exampleRadios333">
                                              a. I would like to put forward questions and comments
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_84" id="exampleRadios334" value="b">
                                            <label class="form-check-label" for="exampleRadios334">
                                              b. I would to like putting forward the following question and to comment
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_84" id="exampleRadios335" value="c">
                                            <label class="form-check-label" for="exampleRadios335">
                                              c. I will like putting for a word following question and the comments
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_84" id="exampleRadios336" value="d">
                                            <label class="form-check-label" for="exampleRadios336">
                                              d. I like to putting for the word follow the questions and comments
                                            </label>
                                          </div>
                                <br>
                                <legend class="h6">85. I am going to the supermarket, I'm run out of sugar</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_85" id="exampleRadios337" value="a">
                                            <label class="form-check-label" for="exampleRadios337">
                                              a. I go to the supermarket, I run out of the sugar
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_85" id="exampleRadios338" value="b">
                                            <label class="form-check-label" for="exampleRadios338">
                                              b. I'm go to supermarket, I running out the sugar
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_85" id="exampleRadios339" value="c">
                                            <label class="form-check-label" for="exampleRadios339">
                                              c. I go to supermarket, I run to the sugar
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_85" id="exampleRadios340" value="d">
                                            <label class="form-check-label" for="exampleRadios340">
                                              d. I'm going to the supermarket, I'm running out of sugar
                                            </label>
                                          </div>
                            </div>
                        </div>
                        <br>
                    <div class="card border-light shadow-sm components-section">
                        <div class="card-body">
                                <div class="mb-3">
                                    <h2 class="h5">III. Select the correct passive from of the given sentences</h2>
                                </div>
                                <br>
                                <legend class="h6">86. They were able to put the fire out before the house burnt down</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_86" id="exampleRadios341" value="a">
                                            <label class="form-check-label" for="exampleRadios341">
                                              a. Before the house burnt down they put the fire out
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_86" id="exampleRadios342" value="b">
                                            <label class="form-check-label" for="exampleRadios342">
                                              b. The fire was able to be put out before the house burnt down
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_86" id="exampleRadios343" value="c">
                                            <label class="form-check-label" for="exampleRadios343">
                                              c. The fire was put out before the fire was burnt down
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_86" id="exampleRadios344" value="d">
                                            <label class="form-check-label" for="exampleRadios344">
                                              d. The house was burnt down by the put out they fire
                                            </label>
                                          </div>
                                <br>
                                <legend class="h6">87. I can't understand how he was able to keep awake</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_87" id="exampleRadios345" value="a">
                                            <label class="form-check-label" for="exampleRadios345">
                                              a. He was able to keep awake I can't be understood
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_87" id="exampleRadios346" value="b">
                                            <label class="form-check-label" for="exampleRadios346">
                                              b. How to keep him awake I am unable to understand
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_87" id="exampleRadios347" value="c">
                                            <label class="form-check-label" for="exampleRadios347">
                                              c. I can't be understand how to keep him able to awake
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_87" id="exampleRadios348" value="d">
                                            <label class="form-check-label" for="exampleRadios348">
                                              d. It can't be understood how he was able to keep awake
                                            </label>
                                          </div>
                                <br>
                                <legend class="h6">88. I piked it up and opened it to see if I could find out the owner's name</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_88" id="exampleRadios349" value="a">
                                            <label class="form-check-label" for="exampleRadios349">
                                              a. It was picked up and opened to see if I could find out the owner's name
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_88" id="exampleRadios350" value="b">
                                            <label class="form-check-label" for="exampleRadios350">
                                              b. I was picked up and opened it to see if I could find the owner's name
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_88" id="exampleRadios351" value="c">
                                            <label class="form-check-label" for="exampleRadios351">
                                              c. Pick it up and open it to see if I could find out the owner's name
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_88" id="exampleRadios352" value="d">
                                            <label class="form-check-label" for="exampleRadios352">
                                              d. To pick up and to open it to see and find out the owner's name
                                            </label>
                                          </div>
                                <br>
                                <legend class="h6">89. They had also invited another person, so that there would be four people at a table</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_89" id="exampleRadios353" value="a">
                                            <label class="form-check-label" for="exampleRadios353">
                                              a. Another person they had also invited, so that there would be four people at a table
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_89" id="exampleRadios354" value="b">
                                            <label class="form-check-label" for="exampleRadios354">
                                              b. Another person had also been invited, so that there would be four people at a table
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_89" id="exampleRadios355" value="c">
                                            <label class="form-check-label" for="exampleRadios355">
                                              c. They had been invited another person, there would have been four people at a table
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_89" id="exampleRadios356" value="d">
                                            <label class="form-check-label" for="exampleRadios356">
                                              d. Another person to be invited, so that four people at a table.
                                            </label>
                                          </div>
                                <br>
                                <legend class="h6">90. Mary said he liked flowers, so George sent her some.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_90" id="exampleRadios357" value="a">
                                            <label class="form-check-label" for="exampleRadios357">
                                              a. Mary was said she like flowers, so George was sent her some.
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_90" id="exampleRadios358" value="b">
                                            <label class="form-check-label" for="exampleRadios358">
                                              b. Mary said flowers were like, so some was sent George
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_90" id="exampleRadios359" value="c">
                                            <label class="form-check-label" for="exampleRadios359">
                                              c. Mary said flowers were liked by her, so some were sent her by George
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_90" id="exampleRadios360" value="d">
                                            <label class="form-check-label" for="exampleRadios360">
                                              d. Flowers were liked Mary, so George was sent her.
                                            </label>
                                          </div>
                                <br>
                                <legend class="h6">91. I've already learnt a great deal about them in a short time.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_91" id="exampleRadios361" value="a">
                                            <label class="form-check-label" for="exampleRadios361">
                                              a. I've been already learnt a great deal about them in a short time.
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_91" id="exampleRadios362" value="b">
                                            <label class="form-check-label" for="exampleRadios362">
                                              b. I learnt a great deal about them in a short time.
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_91" id="exampleRadios363" value="c">
                                            <label class="form-check-label" for="exampleRadios363">
                                              c. In a short time I have already learnt a great deal about them
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_91" id="exampleRadios364" value="d">
                                            <label class="form-check-label" for="exampleRadios364">
                                              d. A great deal about them had already been learnt in a short time.
                                            </label>
                                          </div>
                                <br>
                                <legend class="h6">92. His absence did not greatly surprise the others.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_92" id="exampleRadios366 value="a">
                                            <label class="form-check-label" for="exampleRadios366">
                                              a. His absence were not greatly surprised by the others.
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_92" id="exampleRadios367" value="b">
                                            <label class="form-check-label" for="exampleRadios367">
                                              b. The others did not greatly surprised by his absence.
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_92" id="exampleRadios368" value="c">
                                            <label class="form-check-label" for="exampleRadios368">
                                              c. The others were not greatly surprised by his absence.
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_92" id="exampleRadios369" value="d">
                                            <label class="form-check-label" for="exampleRadios369">
                                              d. His absence did not greatly surprised by the others.
                                            </label>
                                          </div>
                                <br>
                                <legend class="h6">93. Do you drink a lot of water in a hot wheather?</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_93" id="exampleRadios370" value="a">
                                            <label class="form-check-label" for="exampleRadios370">
                                              a. Does a lot of wather drunk by you in a hot weather?
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_93" id="exampleRadios371" value="b">
                                            <label class="form-check-label" for="exampleRadios371">
                                              b. Is a lot of wather drunk by you in a hot weather?
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_93" id="exampleRadios372" value="c">
                                            <label class="form-check-label" for="exampleRadios372">
                                              c. are you drunk by lot of water in a hot weather?
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_93" id="exampleRadios373" value="d">
                                            <label class="form-check-label" for="exampleRadios373">
                                              d. Do you drunk a lot of water in a hot weather?
                                            </label>
                                          </div>
                                <br>
                                <legend class="h6">94. She noticed that he had been absent for nearly a month.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_94" id="exampleRadios374" value="a">
                                            <label class="form-check-label" for="exampleRadios374">
                                              a. That he had been absent for nearly a month was noticed by her.
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_94" id="exampleRadios375" value="b">
                                            <label class="form-check-label" for="exampleRadios375">
                                              b. She had been noticed to be absent for nearly a month.
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_94" id="exampleRadios376" value="c">
                                            <label class="form-check-label" for="exampleRadios376">
                                              c. She had been seen for nearly a month absent.
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_94" id="exampleRadios377" value="d">
                                            <label class="form-check-label" for="exampleRadios377">
                                              d. She had been absent for nearly a month he noticed.
                                            </label>
                                          </div>
                                <br>
                                <legend class="h6">95. She locked the door and drew the curtains.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_95" id="exampleRadios378" value="a">
                                            <label class="form-check-label" for="exampleRadios378">
                                              a. The door locked and drew her by the curtains.
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_95" id="exampleRadios379" value="b">
                                            <label class="form-check-label" for="exampleRadios379">
                                              b. The door locked and the curtains drawns.
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_95" id="exampleRadios380" value="c">
                                            <label class="form-check-label" for="exampleRadios380">
                                              c. The door was locked and the curtains were drawn.
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_95" id="exampleRadios381" value="d">
                                            <label class="form-check-label" for="exampleRadios381">
                                              d. She was locked the door was drew the curtains.
                                            </label>
                                          </div>
                                <br>
                                <legend class="h6">96. Helen packed a small suitcase and said goodbye to her mother.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_96" id="exampleRadios382" value="a">
                                            <label class="form-check-label" for="exampleRadios382">
                                              a. Helen was packed a small suitcase and said goodbye to her mother.
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_96" id="exampleRadios383" value="b">
                                            <label class="form-check-label" for="exampleRadios383">
                                              b. Packed a small suitcase Helen and say goodbye to her mother.
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_96" id="exampleRadios384" value="c">
                                            <label class="form-check-label" for="exampleRadios384">
                                              c. A small suitcase packed Helen and say goodbye to her mother.
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_96" id="exampleRadios385" value="d">
                                            <label class="form-check-label" for="exampleRadios385">
                                              d. A small suitcase was packed and Helen said goodbye to her mother.
                                            </label>
                                          </div>
                                <br>
                                <legend class="h6">97. The bus conducter saw her running.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_97" id="exampleRadios386" value="a">
                                            <label class="form-check-label" for="exampleRadios386">
                                              a. The bus was run her by the conducter.
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_97" id="exampleRadios387" value="b">
                                            <label class="form-check-label" for="exampleRadios387">
                                              b. She was run by the conducter of the bus.
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_97" id="exampleRadios388" value="c">
                                            <label class="form-check-label" for="exampleRadios388">
                                              c. She was seen running by the bus conducter.
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_97" id="exampleRadios389" value="d">
                                            <label class="form-check-label" for="exampleRadios389">
                                              d. The bus conducter was seen her running.
                                            </label>
                                          </div>
                                <br>
                                <legend class="h6">98. Could you understand what he said?</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_98" id="exampleRadios390" value="a">
                                            <label class="form-check-label" for="exampleRadios390">
                                              a. Could you understood what he was said?
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_98" id="exampleRadios391" value="b">
                                            <label class="form-check-label" for="exampleRadios391">
                                              b. Could you understand what was said?
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_98" id="exampleRadios392" value="c">
                                            <label class="form-check-label" for="exampleRadios392">
                                              c. Could you be understand what was he said?
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_98" id="exampleRadios393" value="d">
                                            <label class="form-check-label" for="exampleRadios393">
                                              d. Could you be understood what he was said?
                                            </label>
                                          </div>
                                <br>
                                <legend class="h6">99. They did not want to spend a lot of money.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_99" id="exampleRadios394" value="a">
                                            <label class="form-check-label" for="exampleRadios394">
                                              a. A lot of money was not wanted to be spent by them.
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_99" id="exampleRadios395" value="b">
                                            <label class="form-check-label" for="exampleRadios395">
                                              b. They was not wanted a lot of money to spend.
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_99" id="exampleRadios396" value="c">
                                            <label class="form-check-label" for="exampleRadios396">
                                              c. They was not want to be spent a lot of money.
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_99" id="exampleRadios397" value="d">
                                            <label class="form-check-label" for="exampleRadios397">
                                              d. A lot of money was not wanted to spent by them.
                                            </label>
                                          </div>
                                <br>
                                <legend class="h6">100. "I wish he had let me know" the young man said.</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_100" id="exampleRadios398" value="a">
                                            <label class="form-check-label" for="exampleRadios398">
                                              a. "I wish he had let me known" the young man said.
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_100" id="exampleRadios399" value="b">
                                            <label class="form-check-label" for="exampleRadios399">
                                              b. "Let me know" said the young man.
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_100" id="exampleRadios400" value="c">
                                            <label class="form-check-label" for="exampleRadios400">
                                              c. "Let me be known I wish" the young man said.
                                            </label>
                                          </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jwb_100" id="exampleRadios401" value="d">
                                            <label class="form-check-label" for="exampleRadios401">
                                              d. "I wish I had been let known" said the young man.
                                            </label>
                                          </div>
                            </div>
                        </div>
                        <br>
                        <input type="submit" value="Submit" name="msform" class="btn btn-success d-inline-flex align-items-center">
                    </div>
                </div>
            </div>
            </form>


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


</body>

</html>
