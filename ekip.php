<?php require_once 'header.php'; ?>

<main id="main" data-aos="fade-in">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">
            <h2>Ekip Üyelerimiz</h2>
            <p>Ekip üyelerimizin bilgilerini ve geçmişleri hakkında merak ettiklerinizi ve bizimle ne kadar süredir çalıştıklarını öğrenebilmeniz için kendileri hakkındaki bilgileri aşağıda sizlerle paylaştık. İstediğiniz zaman merak ettiğiniz üyemizin bilgilerini öğrenebilirsiniz. </p>
        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Trainers Section ======= -->
    <section id="trainers" class="trainers">
        <div class="container" data-aos="fade-up">

            <?php
            $ekipsor=$baglanti->prepare("SELECT * FROM ekip ");
            $ekipsor->execute(array());
            while ($ekipcek=$ekipsor->fetch(PDO::FETCH_ASSOC)) { ?>

                <div class="col-lg-4 col-md-4 d-flex align-items-stretch">
                    <div class="member">
                        <img style="width: 300px" src="Admin/Resimler/Ekip/<?php echo $ekipcek['ekip_resim'] ?>" class="img-fluid">
                        <div class="member-content">
                            <h4><?php echo $ekipcek['ekip_isim'] ?></h4>
                            <span><?php echo $ekipcek['ekip_konum'] ?></span>
                            <p>
                               <?php echo $ekipcek['ekip_aciklama'] ?>
                            </p>
                            <div class="social">
                                <a href="<?php echo $ekipcek['ekip_twitter'] ?>"><i class="icofont-twitter"></i></a>
                                <a href="<?php echo $ekipcek['ekip_linkedin'] ?>"><i class="icofont-linkedin"></i></a>
                                <a href="<?php echo $ekipcek['ekip_instagram'] ?>"><i class="icofont-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
<?php } ?>
            </div>

        </div>
    </section><!-- End Trainers Section -->

</main><!-- End #main -->

<?php require_once 'footer.php';?>