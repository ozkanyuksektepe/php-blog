<?php require_once 'header.php';

require_once 'sidebar.php';


?>
<?php if($_GET['sayfa']=="ekip") {


    $ekipsor=$baglanti->prepare("SELECT * FROM ekip where ekip_id=:ekip_id");
    $ekipsor->execute(array(
        'ekip_id'=>$_GET['id']
    ));
    $ekipcek=$ekipsor->fetch(PDO::FETCH_ASSOC);
    ?>

  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">

       <div class="row">
           <div class="col-md-12">
           <div class="card card-primary">
               <div style="background-color: black" class="card-header">
                   <h3  class="card-title">Düzenle</h3>
               </div>
               <form action="islem.php" method="POST" enctype="multipart/form-data">
                   <div class="card-body">
                       <div class="form-group">
                           <label for="exampleInputEmail1">Ekip Resim</label>
                           <img style="width: 150px" src="Resimler/Ekip/<?php echo $ekipcek['ekip_resim'] ?>">
                       </div>
                       <div class="form-group">
                           <label for="exampleInputEmail1">Ekip Resim</label>
                           <input name="ekipresim" type="file" class="form-control">
                       </div>
                       <div class="form-group">
                           <label for="exampleInputEmail1">Ekip İsim</label>
                           <input value="<?php echo $ekipcek['ekip_isim'] ?>" name="ekipisim"  type="text" class="form-control"  placeholder="Lütfen İsminizi Giriniz">
                       </div>
                       <div class="form-group">
                           <label for="exampleInputEmail1">Ekip Konum</label>
                           <input value="<?php echo $ekipcek['ekip_konum'] ?>" name="ekipkonum" type="text" class="form-control" placeholder="Lütfen Konumunuzu Giriniz">
                       </div>
                       <div class="form-group">
                           <label for="exampleInputEmail1">Ekip Sıra</label>
                           <input value="<?php echo $ekipcek['ekip_sira'] ?>" name="ekipsira" type="text" class="form-control" placeholder="Lütfen Sıranızı Giriniz">
                       </div>
                       <div class="form-group">
                           <label for="exampleInputEmail1">Ekip Açıklama</label>
                           <textarea name="ekipaciklama" id="editor1" class="ckeditor" placeholder="Lütfen Açıklamanızı Giriniz"><?php echo $ekipcek['ekip_aciklama'] ?></textarea>
                       </div>
                       <div class="form-group">
                           <label for="exampleInputEmail1">Ekip İnstagram</label>
                           <input value="<?php echo $ekipcek['ekip_instagram'] ?>" name="instagram" type="text" class="form-control" placeholder="Lütfen İnstagram adresinizi giriniz">
                       </div>
                       <div class="form-group">
                           <label for="exampleInputEmail1">Ekip Twitter</label>
                           <input value="<?php echo $ekipcek['ekip_twitter'] ?>" name="twitter" type="text" class="form-control" placeholder="Lütfen Twitter adresinizi giriniz">
                       </div>
                       <div class="form-group">
                           <label for="exampleInputEmail1">Ekip Linkedin</label>
                           <input value="<?php echo $ekipcek['ekip_linkedin'] ?>" name="linkedin" type="text" class="form-control" placeholder="Lütfen Linkedin hesabınızı giriniz">
                       </div>
                       <input type="hidden" name="eskiresim" value="<?php echo $ekipcek['ekip_resim'] ?>">
                       <input type="hidden" name="id" value="<?php echo $ekipcek['ekip_id'] ?>">


                   </div>
                   <div class="card-footer">
                       <button name="ekipduzenle" style="float: right" type="submit" class="btn btn-dark">Düzenle</button>
                   </div>
               </form>
           </div>
           </div>
       </div>
      </div>
    </section>
  </div>

    <?php } elseif ($_GET['sayfa']=="galeri") {
    $galerisor=$baglanti->prepare("SELECT * FROM galeri where galeri_id=:galeri_id");
    $galerisor->execute(array(
        'galeri_id'=>$_GET['id']
    ));
    $galericek=$galerisor->fetch(PDO::FETCH_ASSOC);

    ?>
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div style="background-color: black" class="card-header">
                                <h3  class="card-title">Düzenle</h3>
                            </div>
                            <form action="islem.php" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Galeri Resim</label>
                                        <img style="width: 150px" src="Resimler/Galeri/<?php echo $galericek['galeri_resim'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Galeri Resim</label>
                                        <input name="galeriresim" type="file" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Galeri Sıra</label>
                                        <input value="<?php echo $galericek['galeri_sira'] ?>" name="galerisira" type="text" class="form-control" placeholder="Lütfen Sıranızı Giriniz">
                                    </div>
                                    <input type="hidden" name="eskiresim" value="<?php echo $galericek['galeri_resim'] ?>">
                                    <input type="hidden" name="id" value="<?php echo $galericek['galeri_id'] ?>">


                                </div>
                                <div class="card-footer">
                                    <button name="galeriduzenle" style="float: right" type="submit" class="btn btn-dark">Düzenle</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php } elseif ($_GET['sayfa']=="blog") {

    $blogsor=$baglanti->prepare("SELECT * FROM blog where blog_id=:blog_id");
    $blogsor->execute(array(
    'blog_id'=>$_GET['id']
    ));
    $blogcek=$blogsor->fetch(PDO::FETCH_ASSOC);

    ?>
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div style="background-color: black" class="card-header">
                                <h3  class="card-title">Düzenle</h3>
                            </div>
                            <form action="islem.php" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Blog Resim</label>
                                        <img style="width: 150px" src="Resimler/Blog/<?php echo $blogcek['blog_resim'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Blog Resim</label>
                                        <input name="blogresim" type="file" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Blog Başlık</label>
                                        <input value="<?php echo $blogcek['blog_baslik'] ?>" name="blogbaslik"  type="text" class="form-control"  placeholder="Lütfen Blog Başlığınızı Giriniz">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Blog Sıra</label>
                                        <input value="<?php echo $blogcek['blog_sira'] ?>" name="blogsira" type="text" class="form-control" placeholder="Lütfen Sıranızı Giriniz">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Ekip Açıklama</label>
                                        <textarea name="blogaciklama" id="editor1" class="ckeditor" placeholder="Lütfen Açıklamanızı Giriniz"><?php echo $blogcek['blog_aciklama'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Blog Anahtar Kelime</label>
                                        <input value="<?php echo $blogcek['blog_anahtarkelime'] ?>" name="bloganahtar" type="text" class="form-control" placeholder="Lütfen Anahtar kelimenizi giriniz">
                                    </div>
                                    <input type="hidden" name="eskiresim" value="<?php echo $blogcek['blog_resim'] ?>">
                                    <input type="hidden" name="id" value="<?php echo $blogcek['blog_id'] ?>">


                                </div>
                                <div class="card-footer">
                                    <button name="blogduzenle" style="float: right" type="submit" class="btn btn-dark">Düzenle</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php } elseif ($_GET['sayfa']=="kategori") {
    $kategorisor=$baglanti->prepare("SELECT * FROM kategori where kategori_id=:kategori_id");
    $kategorisor->execute(array(
        'kategori_id'=>$_GET['id']
    ));
    $kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC);

    ?>
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div style="background-color: black" class="card-header">
                                <h3  class="card-title">Düzenle</h3>
                            </div>
                            <form action="islem.php" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kategori Başlık</label>
                                        <input value="<?php echo $kategoricek['kategori_baslik'] ?>" name="kategoribaslik" type="text" class="form-control" placeholder="Lütfen Başlığı Giriniz">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kategori Sıra</label>
                                        <input value="<?php echo $kategoricek['kategori_sira'] ?>" name="kategorisira" type="text" class="form-control" placeholder="Lütfen Sıranızı Giriniz">
                                    </div>
                                    <div class="form-group">
                                        <label>Kategori Durum</label>
                                        <select name="kategoridurum" class="form-control select2" style="width: 100%;">
                                            <option value="1" <?php if ($kategoricek['kategori_durum']=="1") {
                                                echo "selected";
                                            } ?> >Aktif</option>
                                            <option value="0" <?php if ($kategoricek['kategori_durum']=="0") {
                                                echo "selected";
                                            } ?> >Pasif</option>
                                        </select>
                                    </div>
                                    <input type="hidden" name="id" value="<?php echo $kategoricek['kategori_id'] ?>">


                                </div>
                                <div class="card-footer">
                                    <button name="kategoriduzenle" style="float: right" type="submit" class="btn btn-dark">Düzenle</button>
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