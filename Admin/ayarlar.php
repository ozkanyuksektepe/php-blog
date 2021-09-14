<?php require_once 'header.php';

require_once 'sidebar.php';

$ayarsor=$baglanti->prepare("SELECT * FROM ayarlar where ayar_id=?");
$ayarsor->execute(array(1));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);

?>
<?php if (@$_GET['sayfa']=='ayarlar') { ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

       <div class="row">
           <div class="col-md-12">
           <div class="card card-primary">
               <?php
               if (@$_GET['durum']=='basarili') { ?>
                 <i style="color: green" >(İşlem Başarılı)</i>
           <?php  } elseif(@$_GET['durum']=='basarisiz') { ?>
                 <i style="color: red">(İşlem Başarısız)</i>
               <?php } ?>
               <div style="background-color: black" class="card-header">
                   <h3  class="card-title">Ayarlar</h3>
               </div>
               <form action="islem.php" method="POST">
                   <div class="card-body">
                       <div class="form-group">
                           <label for="exampleInputEmail1">Site Başlığı</label>
                           <input name="baslik" value="<?php echo $ayarcek['ayar_baslik'] ?>" type="text" class="form-control"  placeholder="Site Başlığını Giriniz">
                       </div>
                       <div class="form-group">
                           <label for="exampleInputEmail1">Site Açıklama</label>
                           <input name="aciklama" value="<?php echo $ayarcek['ayar_aciklama'] ?>" type="text" class="form-control"  placeholder="Site Açıklamasını Giriniz">
                       </div>
                       <div class="form-group">
                           <label for="exampleInputEmail1">Site Anahtar Kelime</label>
                           <input name="anahtar" value="<?php echo $ayarcek['ayar_anahtar'] ?>" type="text" class="form-control"  placeholder="Site Anahtar Kelimesini Giriniz">
                       </div>
                       <div class="form-group">
                           <label for="exampleInputEmail1">Adres</label>
                           <input name="adres" value="<?php echo $ayarcek['ayar_adres'] ?>" type="text" class="form-control"  placeholder="Adresinizi Giriniz">
                       </div>
                       <div class="form-group">
                           <label for="exampleInputEmail1">Telefon Numarası</label>
                           <input name="telefon" value="<?php echo $ayarcek['ayar_telefon'] ?>" type="text" class="form-control"  placeholder="Telefon Numaranızı Giriniz">
                       </div>
                       <div class="form-group">
                           <label for="exampleInputEmail1">Email</label>
                           <input name="email" value="<?php echo $ayarcek['ayar_email'] ?>" type="text" class="form-control"  placeholder="Email Adresinizi Giriniz">
                       </div>
                   </div>
                   <div class="card-footer">
                       <button name="ayarkaydet" style="float: right" type="submit" class="btn btn-dark">Kaydet</button>
                   </div>
               </form>
           </div>
           </div>
       </div>
      </div>
    </section>
  </div>


<?php } elseif ($_GET['sayfa']=="sosyalmedya") { ?>

    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <?php
                            if (@$_GET['durum']=='basarili') { ?>
                                <i style="color: green" >(İşlem Başarılı)</i>
                            <?php  } elseif(@$_GET['durum']=='basarisiz') { ?>
                                <i style="color: red">(İşlem Başarısız)</i>
                            <?php } ?>
                            <div style="background-color: black" class="card-header">
                                <h3  class="card-title">Sosyal Medya Ayarları</h3>
                            </div>
                            <form action="islem.php" method="POST">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Facebook</label>
                                        <input name="facebook" value="<?php echo $ayarcek['ayar_facebook'] ?>" type="text" class="form-control"  placeholder="Facebook Adresinizi Giriniz">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">İnstagram</label>
                                        <input name="instagram" value="<?php echo $ayarcek['ayar_instagram'] ?>" type="text" class="form-control"  placeholder="İnstagram Adresinizi Giriniz">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Youtube</label>
                                        <input name="youtube" value="<?php echo $ayarcek['ayar_youtube'] ?>" type="text" class="form-control"  placeholder="Youtube Adresinizi Giriniz">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Twitter</label>
                                        <input name="twitter" value="<?php echo $ayarcek['ayar_twitter'] ?>" type="text" class="form-control"  placeholder="Twitter Adresinizi Giriniz">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button name="sosyalmedyakaydet" style="float: right" type="submit" class="btn btn-dark">Kaydet</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


<?php } ?>








<?php require_once 'footer.php'; ?>