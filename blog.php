<?php require_once 'header.php';


$blogsor=$baglanti->prepare("SELECT * FROM blog order by blog_sira ASC ");
$blogsor->execute(array());
?>


<main id="main" data-aos="fade-in">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">
            <h2>Blog Yazılarımız</h2>
            <p>Burada sizleri bilgilendirmek ve ilginizi çekebilecek yazılarımız vardır. İstediğiniz zaman istediğinizi seçip okuyabilirsiniz. </p>
        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Courses Section ======= -->
    <section id="courses" class="courses">
        <div class="container" data-aos="fade-up">

            <div class="row" data-aos="zoom-in" data-aos-delay="100">
               <?php while ($blogcek=$blogsor->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="course-item">
                        <img style="height: 250px" width="350px" src="Admin/Resimler/Blog/<?php echo $blogcek['blog_resim'] ?>" class="img-fluid" alt="...">
                        <div class="course-content">
                            <h3><a href="blog-detay-<?=seolink($blogcek['blog_baslik']).'-'.$blogcek['blog_id'] ?>"><?php echo $blogcek['blog_baslik'] ?></a></h3>
                            <p><?php
                                $aciklama=$blogcek['blog_aciklama'];
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