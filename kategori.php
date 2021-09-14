<?php require_once 'header.php';


$iceriksor=$baglanti->prepare("SELECT * FROM icerik where kategori_id=:kategori_id order by icerik_sira ASC ");
$iceriksor->execute(array(
        'kategori_id'=>$_GET['kategori_id']
));
?>


<main id="main" data-aos="fade-in">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">
            <h2>İçerikler</h2>
            <p>Burada sizleri bilgilendirmek ve ilginizi çekebilecek yazılarımız vardır. İstediğiniz zaman istediğinizi seçip okuyabilirsiniz. </p>
        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Courses Section ======= -->
    <section id="courses" class="courses">
        <div class="container" data-aos="fade-up">

            <div class="row" data-aos="zoom-in" data-aos-delay="100">
               <?php while ($icerikcek=$iceriksor->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="course-item">
                        <img style="height: 250px" width="350px" src="Admin/Resimler/İcerik/<?php echo $icerikcek['icerik_resim'] ?>" class="img-fluid" alt="...">
                        <div class="course-content">
                            <h3><a href="icerik-detay-<?=seolink($icerikcek['icerik_baslik']).'-'.$icerikcek['icerik_id'] ?>"><?php echo $icerikcek['icerik_baslik'] ?></a></h3>
                            <p><?php
                                $aciklama=$icerikcek['icerik_aciklama'];
                                $bolaciklama=substr($aciklama, 0,50);

                                   echo $bolaciklama;
                                ?>
                            </p>
                        </div>
                    </div>
                </div> <!-- End Course Item-->
                <?php } ?>
            </div>

        </div>
    </section><!-- End Courses Section -->

</main><!-- End #main -->

<?php require_once 'footer.php'; ?>