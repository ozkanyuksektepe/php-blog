<?php require_once 'header.php';

require_once 'sidebar.php';

$slidersor=$baglanti->prepare("SELECT * FROM slider where slider_id=?");
$slidersor->execute(array(1));
$slidercek=$slidersor->fetch(PDO::FETCH_ASSOC);

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
                   <h3  class="card-title">Slider</h3>
               </div>
               <form action="islem.php" method="POST" enctype="multipart/form-data">
                   <div class="card-body">
                       <div class="form-group">
                           <label for="exampleInputEmail1">Slider Resim</label>
                           <img style="width: 200px;" src="Resimler/Slider/<?php echo $slidercek['slider_resim'] ?>">
                       </div>
                       <input type="hidden" name="eskiresim" value="<?php echo $slidercek['slider_resim'] ?>">
                       <div class="form-group">
                               <label for="exampleInputEmail1">Slider Resim</label>
                           <input name="sliderresim" type="file" class="form-control">
                       </div>
                       <div class="form-group">
                           <label for="exampleInputEmail1">Slider Başlık</label>
                           <input name="sliderbaslik" value="<?php echo $slidercek['slider_baslik'] ?>" type="text" class="form-control"  placeholder="Lütfen Başlığı Giriniz">
                       </div>
                       <div class="form-group">
                           <label for="exampleInputEmail1">Slider Button İsmi</label>
                           <input name="sliderbutton" value="<?php echo $slidercek['slider_button'] ?>" type="text" class="form-control"  placeholder="Lütfen Button İsmini Giriniz">
                       </div>
                       <div class="form-group">
                           <label for="exampleInputEmail1">Slider Button Linki</label>
                           <input name="sliderlink" value="<?php echo $slidercek['slider_link'] ?>" type="text" class="form-control"  placeholder="Lütfen Button Linkini Giriniz">
                       </div>
                       <div class="form-group">
                           <label for="exampleInputEmail1">Slider Açıklama</label>
                           <textarea name="slideraciklama" id="editor1" class="ckeditor"><?php echo $slidercek['slider_aciklama'] ?></textarea>
                       </div>
                   </div>
                   <div class="card-footer">
                       <button name="sliderkaydet" style="float: right" type="submit" class="btn btn-dark">Kaydet</button>
                   </div>
               </form>
           </div>
           </div>
       </div>
      </div>
    </section>
  </div>



<?php require_once 'footer.php'; ?>