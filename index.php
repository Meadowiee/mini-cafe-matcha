<!DOCTYPE html>
<html>

<head>
    <title>Landing Page</title>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/click-scroll.js"></script>
    <script src="js/vegas.min.js"></script>
    <script src="js/custom.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200;0,400;0,600;0,700;1,200;1,700&display=swap" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/bootstrap-icons.css" rel="stylesheet">

    <link href="css/vegas.min.css" rel="stylesheet">

    <link href="css/tooplate-barista.css" rel="stylesheet">
</head>

<body>
    <main>
        <?php
            include 'controllers/config.php';
            if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin') {
                include 'components/admin-navbar.php';
            } else {
                include 'components/user-navbar.php';
            }
        ?>

        <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">

            <div class="container">
                <div class="row align-items-center">

                    <div class="col-lg-6 col-12 mx-auto">
                        <em class="small-text">Selamat Datang di Matcha.cha</em>

                        <h1>Mini Cafe Matcha</h1>

                        <p class="text-white mb-4 pb-lg-2">
                            Nikamati Rutinitas dengan <em>rasa</em> yang kamu percaya.
                        </p>

                        <a class="btn custom-btn custom-border-btn smoothscroll me-3" href="#section_2">
                            Tentang Kami
                        </a>

                        <a class="btn custom-btn smoothscroll me-2 mb-2" href="#section_3"><strong>Cek Menu</strong></a>
                    </div>

                </div>
            </div>

            <div class="hero-slides"></div>
        </section>


        <section class="about-section section-padding" id="section_2">
            <div class="section-overlay"></div>
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-lg-6 col-12">
                        <div class="ratio ratio-1x1">
                            <video autoplay="" loop="" muted="" class="custom-video" poster="">
                                <source src="videos/Video.mp4" type="video/mp4">

                            </video>

                            <div class="about-video-info d-flex flex-column">
                                <h4 class="mt-auto">Kami memulai di 2025</h4>

                                <h4>Cafe Matcha terbaik di Ilkom</h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 col-12 mt-4 mt-lg-0 mx-auto">
                        <em class="text-white">Matcha.cha</em>

                        <h2 class="text-white mb-3">Mini Cafe Matcha</h2>

                        <p class="text-white">Kafe ini sudah ada di kota baru-baru ini, dan telah menjadi tempat yang sangat disukai oleh penduduk setempat, tempat di mana rasa matcha yang khas menyatu dengan kenangan lama.</p>

                        <p class="text-white">Kafe ini dikelola oleh remaja yang ramah dan hangat<a rel="nofollow" href="https://www.tooplate.com" target="_blank">Tooplate</a>.</p>


                        <a href="#barista-team" class="smoothscroll btn custom-btn custom-border-btn mt-3 mb-4">Tim Barista</a>
                    </div>

                </div>
            </div>
        </section>


        <section class="barista-section section-padding section-bg" id="barista-team">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-lg-12 col-12 text-center mb-4 pb-lg-2">
                        <em class="text-white">Barista Kreatif</em>

                        <h2 class="text-white">Temui Para Peracik Matcha</h2>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 mb-4">
                        <div class="team-block-wrap">
                            <div class="team-block-info d-flex flex-column">
                                <div class="d-flex mt-auto mb-3">
                                    <h4 class="text-white mb-0">Shafina</h4>

                                    <p class="badge ms-4"><em>Boss</em></p>
                                </div>

                                <p class="text-white mb-0">Matcha terbaik hadir dari tangan hangat yang meracik dengan cinta setiap harinya.</p>
                            </div>

                            <div class="team-block-image-wrap">
                                <img src="images/team/fina.jpeg" class="team-block-image img-fluid" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 mb-4">
                        <div class="team-block-wrap">
                            <div class="team-block-info d-flex flex-column">
                                <div class="d-flex mt-auto mb-3">
                                    <h4 class="text-white mb-0">Aza</h4>

                                    <p class="badge ms-4"><em>Manager</em></p>
                                </div>

                                <p class="text-white mb-0">Matcha kesukaanmu selalu siap menemani hari dengan sempurna.</p>
                            </div>

                            <div class="team-block-image-wrap">
                                <img src="images/team/azza.jpeg" class="team-block-image img-fluid" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 mb-4">
                        <div class="team-block-wrap">
                            <div class="team-block-info d-flex flex-column">
                                <div class="d-flex mt-auto mb-3">
                                    <h4 class="text-white mb-0">Zusnia</h4>

                                    <p class="badge ms-4"><em>Senior</em></p>
                                </div>

                                <p class="text-white mb-0">Teman setia untuk hari-hari penuh cerita, dengan cita rasa matcha.</p>
                            </div>

                            <div class="team-block-image-wrap">
                                <img src="images/team/jus.jpeg" class="team-block-image img-fluid" alt="">
                            </div>
                        </div>
                    </div>
        </section>


        <section class="menu-section section-padding" id="section_3">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-12 mb-4 mb-lg-0">
                        <div class="menu-block-wrap">
                            <div class="text-center mb-4 pb-lg-2">
                                <em class="text-white">Menu Favorit</em>
                                <h4 class="text-white">Hot / Iced Matcha</h4>
                            </div>

                            <div class="menu-block">
                                <div class="d-flex">
                                    <h6>Hot Matcha Latte</h6>

                                    <span class="underline"></span>

                                    <strong class="ms-auto">Rp28.000</strong>
                                </div>

                                <div class="border-top mt-2 pt-2">
                                    <small>Matcha bubuk premium dengan susu hangat dan foam lembut</small>
                                </div>
                            </div>

                            <div class="menu-block my-4">
                                <div class="d-flex">
                                    <h6>
                                        Iced Matcha Latte
                                    </h6>

                                    <span class="underline"></span>

                                    <strong class="text-white ms-auto"><del>Rp40.000</del></strong>

                                    <strong class="ms-2">Rp30.000</strong>
                                </div>

                                <div class="border-top mt-2 pt-2">
                                    <small>Disajikan dingin dengan es batu dan susu creamy</small>
                                </div>
                            </div>

                            <div class="menu-block">
                                <div class="d-flex">
                                    <h6>Iced Matcha Espresso Fusion
                                        <span class="badge ms-3">Recommend</span>
                                    </h6>

                                    <span class="underline"></span>

                                    <strong class="ms-auto">Rp32.000</strong>
                                </div>

                                <div class="border-top mt-2 pt-2">
                                    <small>Kombinasi espresso dengan matcha dan susu segar</small>
                                </div>
                            </div>

                            <div class="menu-block my-4">
                                <div class="d-flex">
                                    <h6>Matcha Lemonade</h6>

                                    <span class="underline"></span>

                                    <strong class="ms-auto">Rp27.000</strong>
                                </div>

                                <div class="border-top mt-2 pt-2">
                                    <small>Campuran segar matcha dan jus lemon, cocok untuk cuaca panas</small>
                                </div>
                            </div>

                            <div class="menu-block">
                                <div class="d-flex">
                                    <h6>Matcha Milkshake</h6>

                                    <span class="underline"></span>

                                    <strong class="ms-auto">Rp31.000</strong>
                                </div>

                                <div class="border-top mt-2 pt-2">
                                    <small>Smoothie dingin dengan matcha, susu kental, dan es krim vanila</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="menu-block-wrap">
                            <div class="text-center mb-4 pb-lg-2">
                                <em class="text-white">Menu Penutup</em></em>
                                <h4 class="text-white">Matcha Cake</h4>
                            </div>

                            <div class="menu-block">
                                <div class="d-flex">
                                    <h6>Matcha Cheesecake</h6>

                                    <span class="underline"></span>

                                    <strong class="text-white ms-auto"><del>Rp35.000</del></strong>

                                    <strong class="ms-2">Rp30.000</strong>
                                </div>

                                <div class="border-top mt-2 pt-2">
                                    <small>Kue keju lembut dengan sentuhan matcha Jepang</small>
                                </div>
                            </div>

                            <div class="menu-block my-4">
                                <div class="d-flex">
                                    <h6>
                                        Matcha Roll Cake
                                        <span class="badge ms-3">Recommend</span>
                                    </h6>

                                    <span class="underline"></span>

                                    <strong class="ms-auto">Rp28.000</strong>
                                </div>

                                <div class="border-top mt-2 pt-2">
                                    <small>Kue gulung isi krim matcha yang manis dan lembut</small>
                                </div>
                            </div>

                            <div class="menu-block">
                                <div class="d-flex">
                                    <h6>Matcha Lava Cake
                                        <span class="badge ms-3">Baru</span>
                                    </h6>

                                    <span class="underline"></span>

                                    <strong class="ms-auto">Rp38.000</strong>
                                </div>

                                <div class="border-top mt-2 pt-2">
                                    <small>Lelehan matcha hangat dari dalam kue cokelat lembut</small>
                                </div>
                            </div>

                            <div class="menu-block my-4">
                                <div class="d-flex">
                                    <h6>Matcha Cake</h6>

                                    <span class="underline"></span>

                                    <strong class="ms-auto">Rp25.000</strong>
                                </div>

                                <div class="border-top mt-2 pt-2">
                                    <small>Kue lembut dengan rasa matcha asli, cocok untuk teman minum teh</small>
                                </div>
                            </div>

                            <div class="menu-block">
                                <div class="d-flex">
                                    <h6>Ice Cream Matcha</h6>

                                    <span class="underline"></span>

                                    <strong class="ms-auto">Rp20.000</strong></strong>
                                </div>

                                <div class="border-top mt-2 pt-2">
                                    <small>Es krim homemade dengan rasa matcha, cocok disantap kapan saja</small>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <section class="reviews-section section-padding section-bg" id="section_4">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-lg-12 col-12 text-center mb-4 pb-lg-2">
                        <em class="text-white">Ulasan dari Pelanggan</em>

                        <h2 class="text-white">Testimoni</h2>
                    </div>

                    <div class="timeline">
                        <div class="timeline-container timeline-container-left">
                            <div class="timeline-content">
                                <div class="reviews-block">
                                    <div class="reviews-block-image-wrap d-flex align-items-center">
                                        <img src="images/reviews/ulasan1.jpeg" class="reviews-block-image img-fluid" alt="">

                                        <div class="">
                                            <h6 class="text-green mb-0">Mikey</h6>
                                            <em class="text-green"> Pelanggan</em>
                                        </div>
                                    </div>

                                    <div class="reviews-block-info">
                                        <p>Saya sangat menyukai suasana di Kafe Matcha ini. Tempatnya tenang, hangat, dan setiap minuman yang disajikan terasa nikmat. Matcha Latte-nya benar-benar istimewa.</p>

                                        <div class="d-flex border-top pt-3 mt-4">
                                            <strong class="text-white">4.5 <small class="ms-2">Rating</small></strong>

                                            <div class="reviews-group ms-auto">
                                                <i class="bi-star-fill"></i>
                                                <i class="bi-star-fill"></i>
                                                <i class="bi-star-fill"></i>
                                                <i class="bi-star-fill"></i>
                                                <i class="bi-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="timeline-container timeline-container-right">
                            <div class="timeline-content">
                                <div class="reviews-block">
                                    <div class="reviews-block-image-wrap d-flex align-items-center">
                                        <img src="images/reviews/ulasan2.jpeg" class="reviews-block-image img-fluid" alt="">

                                        <div class="">
                                            <h6 class="text-green mb-0">Mona</h6>
                                            <em class="text-green"> Pelanggan</em>
                                        </div>
                                    </div>

                                    <div class="reviews-block-info">
                                        <p>Pelayanan di sini sangat ramah dan tempatnya nyaman untuk bekerja atau bersantai. Matcha Cake-nya lembut dengan rasa manis yang pas di lidah.</p>

                                        <div class="d-flex border-top pt-3 mt-4">
                                            <strong class="text-white">4.5 <small class="ms-2">Rating</small></strong>

                                            <div class="reviews-group ms-auto">
                                                <i class="bi-star-fill"></i>
                                                <i class="bi-star-fill"></i>
                                                <i class="bi-star-fill"></i>
                                                <i class="bi-star-fill"></i>
                                                <i class="bi-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="timeline-container timeline-container-left">
                            <div class="timeline-content">
                                <div class="reviews-block">
                                    <div class="reviews-block-image-wrap d-flex align-items-center">
                                        <img src="images/reviews/ulasan3.jpeg" class="reviews-block-image img-fluid" alt="">

                                        <div class="">
                                            <h6 class="text-green mb-0">Gebriell</h6>
                                            <em class="text-green"> Pelanggan</em>
                                        </div>
                                    </div>

                                    <div class="reviews-block-info">
                                        <p>Kafe ini menjadi tempat favorit saya setiap akhir pekan. Menu yang disajikan unik, staf sangat ramah, dan suasananya membuat saya merasa betah.</p>

                                        <div class="d-flex border-top pt-3 mt-4">
                                            <strong class="text-white">5.5 <small class="ms-2">Rating</small></strong>

                                            <div class="reviews-group ms-auto">
                                                <i class="bi-star-fill"></i>
                                                <i class="bi-star-fill"></i>
                                                <i class="bi-star-fill"></i>
                                                <i class="bi-star-fill"></i>
                                                <i class="bi-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <section class="contact-section section-padding" id="section_5">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12">
                        <em class="text-white">Katakan Hai</em>
                        <h2 class="text-white mb-4 pb-lg-2">Hubungi</h2>
                    </div>

                    <div class="col-lg-6 col-12">
                        <form action="#" method="post" class="custom-form contact-form" role="form">

                            <div class="row">

                                <div class="col-lg-6 col-12">
                                    <label for="name" class="form-label">Nama <sup class="text-danger">*</sup></label>

                                    <input type="text" name="name" id="name" class="form-control" placeholder="Jackson" required="">
                                </div>

                                <div class="col-lg-6 col-12">
                                    <label for="email" class="form-label">Alamat Email</label>

                                    <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Jack@gmail.com" required="">
                                </div>

                                <div class="col-12">
                                    <label for="message" class="form-label">Apa yang dapat kami bantu?</label>

                                    <textarea name="message" rows="4" class="form-control" id="message" placeholder="Message" required=""></textarea>

                                </div>
                            </div>

                            <div class="col-lg-5 col-12 mx-auto mt-3">
                                <button type="submit" class="form-control">Kirim pesan</button>
                            </div>
                        </form>
                    </div>

                    <div class="col-lg-6 col-12 mx-auto mt-5 mt-lg-0 ps-lg-5">
                        <iframe class="google-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5039.668141741662!2d72.81814769288509!3d19.043340656729775!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c994f34a7355%3A0x2680d63a6f7e33c2!2sLover%20Point!5e1!3m2!1sen!2sth!4v1692722771770!5m2!1sen!2sth" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                </div>
            </div>
        </section>


        <footer class="site-footer">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-12 me-auto">
                        <em class="text-white d-block mb-4">Dimana kami berada?</em>

                        <strong class="text-white">
                            <i class="bi-geo-alt me-2"></i>
                            Banjarbaru, Kalimantan Selatan
                        </strong>

                        <ul class="social-icon mt-4">
                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link bi-facebook">
                                </a>
                            </li>

                            <li class="social-icon-item">
                                <a href="https://x.com/minthu" target="_new" class="social-icon-link bi-twitter">
                                </a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link bi-whatsapp">
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-12 mt-4 mb-3 mt-lg-0 mb-lg-0">
                        <em class="text-white d-block mb-4">Hubungi</em>

                        <p class="d-flex mb-1">
                            <strong class="me-2">No.Telp:</strong>
                            <a href="tel: 305-240-9671" class="site-footer-link">
                                (+62)
                                123-456-78900
                            </a>
                        </p>

                        <p class="d-flex">
                            <strong class="me-2">Email:</strong>

                            <a href="mailto:info@yourgmail.com" class="site-footer-link">
                                Matcha_cha.gmail.com
                            </a>
                        </p>
                    </div>


                    <div class="col-lg-5 col-12">
                        <em class="text-white d-block mb-4">Jam Operasional</em>

                        <ul class="opening-hours-list">
                            <li class="d-flex">
                                Senin - Jumat
                                <span class="underline"></span>

                                <strong>9:00 - 18:00</strong>
                            </li>

                            <li class="d-flex">
                                Sabtu
                                <span class="underline"></span>

                                <strong>11:00 - 16:30</strong>
                            </li>

                            <li class="d-flex">
                                Minggu
                                <span class="underline"></span>

                                <strong>Closed</strong>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-8 col-12 mt-4">
                        <p class="copyright-text mb-0">Copyright © Barista Cafe 2048
                            - Design: <a rel="sponsored" href="https://www.tooplate.com" target="_blank">Tooplate</a></p>
                    </div>
                </div>
        </footer>
    </main>
</body>

</html>