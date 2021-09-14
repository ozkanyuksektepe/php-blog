<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h3>BLOG</h3>
                    <p style="color: black">
                       <strong>Adres:</strong> <?php echo $ayarcek['ayar_adres'] ?> <br>
                        <strong>Telefon:</strong> <?php echo $ayarcek['ayar_telefon'] ?><br>
                        <strong>Email:</strong> <?php echo $ayarcek['ayar_email'] ?> <br><br>
                    </p>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Sayfalar</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a style="color: black" href="index">Anasayfa</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a style="color: black" href="hakkimizda">Hakkımızda</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a style="color: black" href="ekip">Ekibimiz</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a style="color: black" href="blog">Blog</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a style="color: black" href="iletisim">İletişim</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a style="color: black" href="galeri">Galeri</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Kategoriler</h4>
                    <ul>
                        <?php
                        $kategorisor=$baglanti->prepare("SELECT * FROM kategori order by kategori_sira ASC ");
                        $kategorisor->execute(array());
                        while ($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) { ?>
                            <li><a style="color: black" href="kategori-detay-<?=seolink($kategoricek['kategori_baslik']).'-'.$kategoricek['kategori_id'] ?>"><?php echo $kategoricek['kategori_baslik'] ?></a></li>
                        <?php } ?>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 footer-newsletter">
                    <h4>E-Bültene Abone Olun</h4>
                    <p>E-bültene abone olarak içeriklerden haberdar olabilirsiniz</p>
                    <form action="Admin/islem.php" method="post">
                        <input placeholder="Lütfen Email Giriniz" type="email" name="email">
                        <input name="abone" type="submit" value="Abone Ol">
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="container d-md-flex py-4">

        <div class="mr-md-auto text-center text-md-left">
            <div class="copyright">
                &copy; Tüm Hakları Saklıdır <strong><span>BLOG</span></strong> <?php echo date("Y") ?>
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/ -->
                Designed by <a href="https://bootstrapmade.com/">Özkan Yüksektepe</a>
            </div>
        </div>
        <div class="social-links text-center text-md-right pt-3 pt-md-0">
            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="assets/vendor/counterup/counterup.min.js"></script>
<script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>