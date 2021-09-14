<?php require_once 'header.php';

require_once 'sidebar.php';

$ekipsor=$baglanti->prepare("SELECT * FROM ekip ");
$ekipsor->execute(array());



?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

       <div class="row">
           <?php
           if (@$_GET['durum']=='basarili') { ?>
               <i style="color: green" >(İşlem Başarılı)</i>
           <?php  } elseif(@$_GET['durum']=='basarisiz') { ?>
               <i style="color: red">(İşlem Başarısız)</i>
           <?php } ?>
               <div class="col-12">
                   <div class="card">
                       <div  class="card-header">
                           <h3  class="card-title">Ekip Üyeleri</h3>
                           <a href="ekle.php?sayfa=ekip"><button style="float: right" type="submit" class="btn btn-info">Yeni Üye Ekle</button></a>

                           <!-- <div class="card-tools">
                               <div class="input-group input-group-sm" style="width: 150px;">
                                   <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                   <div class="input-group-append">
                                       <button type="submit" class="btn btn-default">
                                           <i class="fas fa-search"></i>
                                       </button>
                                   </div>
                               </div>
                           </div>
                       </div>
                       -->
                       <div class="card-body table-responsive p-0">
                           <table class="table table-hover text-nowrap">
                               <thead>
                               <tr>
                                   <th>Ekip Resim</th>
                                   <th>Ekip Sıra</th>
                                   <th>Ekip İsim</th>
                                   <th>Ekip Konum</th>
                                   <th>Ekip Açıklama</th>
                               </tr>
                               </thead>
                               <tbody>
                               <?php
                               while ($ekipcek=$ekipsor->fetch(PDO::FETCH_ASSOC)) { ?>

                               <tr>
                                   <td><img style="width: 150px" src="Resimler/Ekip/<?php echo $ekipcek['ekip_resim'] ?>"></td>
                                   <td><?php echo $ekipcek['ekip_sira'] ?></td>
                                   <td><?php echo $ekipcek['ekip_isim'] ?></td>
                                   <td><span class="tag tag-success"><?php echo $ekipcek['ekip_konum'] ?></span></td>
                                   <td><?php echo $ekipcek['ekip_aciklama'] ?></td>
                                   <td><a href="duzenle.php?sayfa=ekip&id=<?php echo $ekipcek['ekip_id'] ?>"><button type="submit" class="btn btn-success">Düzenle</button></a></td>
                                   <td>
                                       <form action="islem.php" method="POST">
                                       <button name="ekipsil" type="submit" class="btn btn-danger">Sil</button>
                                           <input name="id" value="<?php echo $ekipcek['ekip_id'] ?>" type="hidden">
                                           <input name="eskiresim" value="<?php echo $ekipcek['ekip_resim'] ?>" type="hidden">
                                       </form>
                                   </td>
                               </tr>
                               <?php  } ?>
                               </tbody>
                           </table>
                       </div>
                       <!-- /.card-body -->
                   </div>
                   <!-- /.card -->
               </div>

       </div>
      </div>
    </section>
  </div>
<?php require_once 'footer.php'; ?>