<?php require_once 'header.php';

require_once 'sidebar.php';


?>
<?php if ($_GET['sayfa']=="ekip") { ?>
  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">

       <div class="row">
           <div class="col-md-12">
           <div class="card card-primary">
               <div style="background-color: black" class="card-header">
                   <h3  class="card-title">Ekip</h3>
               </div>
               <form action="islem.php" method="POST" enctype="multipart/form-data">
                   <div class="card-body">
                       <div class="form-group">
                           <label for="exampleInputEmail1">Ekip Resim</label>
                           <input name="ekipresim" type="file" class="form-control">
                       </div>
                       <div class="form-group">
                           <label for="exampleInputEmail1">Ekip İsim</label>
                           <input name="ekipisim"  type="text" class="form-control"  placeholder="Lütfen İsminizi Giriniz">
                       </div>
                       <div class="form-group">
                           <label for="exampleInputEmail1">Ekip Konum</label>
                           <input name="ekipkonum" type="text" class="form-control" placeholder="Lütfen Konumunuzu Giriniz">
                       </div>
                       <div class="form-group">
                           <label for="exampleInputEmail1">Ekip Sıra</label>
                           <input name="ekipsira" type="text" class="form-control" placeholder="Lütfen Sıranızı Giriniz">
                       </div>
                       <div class="form-group">
                           <label for="exampleInputEmail1">Ekip Açıklama</label>
                           <textarea name="ekipaciklama" id="editor1" class="ckeditor" placeholder="Lütfen Açıklamanızı Giriniz"></textarea>
                       </div>
                       <div class="form-group">
                           <label for="exampleInputEmail1">Ekip İnstagram</label>
                           <input name="instagram" type="text" class="form-control" placeholder="Lütfen İnstagram adresinizi giriniz">
                       </div>
                       <div class="form-group">
                           <label for="exampleInputEmail1">Ekip Twitter</label>
                           <input name="twitter" type="text" class="form-control" placeholder="Lütfen Twitter adresinizi giriniz">
                       </div>
                       <div class="form-group">
                           <label for="exampleInputEmail1">Ekip Linkedin</label>
                           <input name="linkedin" type="text" class="form-control" placeholder="Lütfen Linkedin hesabınızı giriniz">
                       </div>
                   </div>
                   <div class="card-footer">
                       <button name="ekipkaydet" style="float: right" type="submit" class="btn btn-dark">Kaydet</button>
                   </div>
               </form>
           </div>
           </div>
       </div>
      </div>
    </section>
  </div>
    <?php } elseif ($_GET['sayfa']=="galeri") { ?>
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div style="background-color: black" class="card-header">
                                <h3  class="card-title">Galeri Ekle</h3>
                            </div>
                            <form action="islem.php" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Galeri Resim</label>
                                        <input name="galeriresim" type="file" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Galeri Sıra</label>
                                        <input name="galerisira" type="text" class="form-control" placeholder="Lütfen Sıranızı Giriniz">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button name="galerikaydet" style="float: right" type="submit" class="btn btn-dark">Kaydet</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php } elseif ($_GET['sayfa']=="blog") { ?>
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div style="background-color: black" class="card-header">
                                <h3  class="card-title">Blog</h3>
                            </div>
                            <form action="islem.php" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Blog Resim</label>
                                        <input name="blogresim" type="file" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Blog Başlık</label>
                                        <input name="blogbaslik"  type="text" class="form-control"  placeholder="Lütfen Blog Başlığını Giriniz">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Blog Sıra</label>
                                        <input name="blogsira" type="text" class="form-control" placeholder="Lütfen Sıranızı Giriniz">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Blog Açıklama</label>
                                        <textarea name="blogaciklama" id="editor1" class="ckeditor" placeholder="Lütfen Açıklamanızı Giriniz"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Blog Anahtar Kelime</label>
                                        <input name="bloganahtar" type="text" class="form-control" placeholder="Lütfen Anahtar kelimeyi giriniz">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button name="blogkaydet" style="float: right" type="submit" class="btn btn-dark">Kaydet</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php } elseif ($_GET['sayfa']=="kategori") { ?>
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div style="background-color: black" class="card-header">
                                <h3  class="card-title">Kategori Ekle</h3>
                            </div>
                            <form action="islem.php" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kategori Başlık</label>
                                        <input name="kategoribaslik" type="text" class="form-control" placeholder="Lütfen Başlığı Giriniz">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kategori Sıra</label>
                                        <input name="kategorisira" type="text" class="form-control" placeholder="Lütfen Sıranızı Giriniz">
                                    </div>
                                    <div class="form-group">
                                        <label>Kategori Durum</label>
                                        <select name="kategoridurum" class="form-control select2" style="width: 100%;">
                                            <option value="1" selected="selected">Aktif</option>
                                            <option value="0" >Pasif</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button name="kategorikaydet" style="float: right" type="submit" class="btn btn-dark">Kaydet</button>
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