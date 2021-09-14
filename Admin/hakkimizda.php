<?php require_once 'header.php';

require_once 'sidebar.php';

$hakkimizdasor=$baglanti->prepare("SELECT * FROM hakkimizda where hakkimizda_id=?");
$hakkimizdasor->execute(array(1));
$hakkimizdacek=$hakkimizdasor->fetch(PDO::FETCH_ASSOC);

?>
  <div class="content-wrapper">
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
                   <h3  class="card-title">Hakkımızda</h3>
               </div>
               <form action="islem.php" method="POST" enctype="multipart/form-data">
                   <div class="card-body">
                       <div class="form-group">
                           <label for="exampleInputEmail1">Hakkımızda Resim</label>
                           <img style="width: 200px;" src="Resimler/hakkimizda/<?php echo $hakkimizdacek['hakkimizda_resim'] ?>">
                       </div>
                       <input type="hidden" name="eskiresim" value="<?php echo $hakkimizdacek['hakkimizda_resim'] ?>">
                       <div class="form-group">
                           <label for="exampleInputEmail1">Hakkımızda Resim</label>
                           <input name="hakkimizdaresim" type="file" class="form-control">
                       </div>
                       <div class="form-group">
                           <label for="exampleInputEmail1">Hakkımızda Başlık</label>
                           <input name="hakkimizdabaslik" value="<?php echo $hakkimizdacek['hakkimizda_baslik'] ?>" type="text" class="form-control"  placeholder="Lütfen Başlığı Giriniz">
                       </div>
                       <div class="form-group">
                           <label for="exampleInputEmail1">Hakkımızda Açıklama</label>
                           <textarea name="hakkimizdaaciklama" id="editor1" class="ckeditor"><?php echo $hakkimizdacek['hakkimizda_aciklama'] ?></textarea>
                       </div>
                   </div>
                   <div class="card-footer">
                       <button name="hakkimizdakaydet" style="float: right" type="submit" class="btn btn-dark">Kaydet</button>
                   </div>
               </form>
           </div>
           </div>
       </div>
      </div>
    </section>
  </div>



<?php require_once 'footer.php'; ?>