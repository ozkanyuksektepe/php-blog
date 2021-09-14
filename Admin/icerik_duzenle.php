<?php require_once 'header.php';
require_once 'sidebar.php';
$iceriksor=$baglanti->prepare("SELECT * FROM icerik where icerik_id=:icerik_id");
$iceriksor->execute(array(
        'icerik_id'=>$_GET['id']
));
$icerikcek=$iceriksor->fetch(PDO::FETCH_ASSOC);



?>
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div style="background-color: black" class="card-header">
                            <h3  class="card-title">İçerik</h3>
                        </div>
                        <form action="islem.php" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">İçerik Resim</label>
                                    <img style="width: 150px" src="Resimler/İcerik/<?php echo $icerikcek['icerik_resim'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">İçerik Resim</label>
                                    <input name="icerikresim" type="file" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">İçerik Başlık</label>
                                    <input value="<?php echo $icerikcek['icerik_baslik'] ?>" name="icerikbaslik"  type="text" class="form-control"  placeholder="Lütfen Başlığı Giriniz">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">İçerik Sıra</label>
                                    <input value="<?php echo $icerikcek['icerik_sira'] ?>" name="iceriksira" type="text" class="form-control" placeholder="Lütfen Sıranıyı Giriniz">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">İçerik Açıklama</label>
                                    <textarea name="icerikaciklama" id="editor1" class="ckeditor" placeholder="Lütfen Açıklamayı Giriniz">
                                        <?php echo $icerikcek['icerik_aciklama'] ?>
                                    </textarea>
                                </div>
                                <input type="hidden" name="id" value="<?php echo $icerikcek['icerik_id'] ?>">
                                <input type="hidden" name="katid" value="<?php echo $icerikcek['kategori_id'] ?>">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">İçerik Anahtar Kelime</label>
                                    <input value="<?php echo $icerikcek['icerik_anahtarkelime'] ?>" name="icerikanahtar" type="text" class="form-control" placeholder="Lütfen Anahtar Kelimeyi giriniz">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button name="icerikduzenle" style="float: right" type="submit" class="btn btn-dark">Düzenle</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>









<?php require_once 'footer.php';?>
