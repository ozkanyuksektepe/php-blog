<?php require_once 'header.php';

    $iceriksor=$baglanti->prepare("SELECT * FROM icerik where icerik_id=:icerik_id");
    $iceriksor->execute(array(
            'icerik_id'=>$_GET['icerik_id']
    ));
    $icerikcek=$iceriksor->fetch(PDO::FETCH_ASSOC);
?>
<main id="main">
    <br>
    <br>
    <br>
    <!-- ======= Cource Details Section ======= -->
    <section id="course-details" class="course-details">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-lg-8">
                    <img src="Admin/Resimler/İcerik/<?php echo $icerikcek['icerik_resim'] ?>" class="img-fluid" alt="">
                    <h3><?php echo $icerikcek['icerik_baslik'] ?></h3>
                    <p>
                        <?php echo $icerikcek['icerik_aciklama'] ?>
                    </p>

<?php

$yorumlarsor=$baglanti->prepare("SELECT * FROM yorumlar  where yorum_kategori=:yorum_kategori and icerik_id=:icerik_id and yorum_onay=:yorum_onay");
$yorumlarsor->execute(array(
    'yorum_kategori'=>2,
    'icerik_id'=>$_GET['icerik_id'],
    'yorum_onay'=>1
));
while ($yorumlarcek=$yorumlarsor->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <b>YORUMLAR</b><br>
                    <div class="course-info d-flex justify-content-between align-items-center">
                        <h5><?php echo $yorumlarcek['yorum_adsoyad'] ?></h5>
                        <p><?php echo $yorumlarcek['yorum_detay'] ?></p>
                    </div>
    <?php } ?>
                    <form action="Admin/islem.php" method="post">
                        <div class="form-row">
                            <div class="col-md-12 form-group">
                                <input type="text" name="adsoyad" class="form-control" id="name" placeholder="Adınız ve Soyadınız" data-rule="minlen:4" data-msg="Lütfen minimum 4 karakter giriniz" />
                                <div class="validate"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="detay" rows="5" data-rule="required" data-msg="Lütfen Mesajınızı yazınız" placeholder="Mesajınız"></textarea>
                            <div class="validate"></div>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $icerikcek['icerik_id'] ?>">
                        <input type="hidden" name="kategori" value="2">
                        <div class="text-center"><button name="icerikyorumkaydet" class="btn btn-success" type="submit">Gönder</button></div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="course-info d-flex justify-content-between align-items-center">
                        <h5>Eklenme Tarihi:</h5>
                        <p><?php echo $icerikcek['icerik_zaman'] ?></p>
                    </div>

                    <div class="course-info d-flex justify-content-between align-items-center">
                        <h5>Ekleyen:</h5>
                        <p>Özkan Yüksektepe</p>
                    </div>

                    <div class="course-info d-flex justify-content-between align-items-center">
                        <h5>İletişim:</h5>
                        <p>ozkanyuksektepe@gmail.com</p>
                    </div>

                </div>
            </div>

        </div>
    </section>
</main>

<?php require_once 'footer.php';?>