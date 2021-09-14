<?php require_once 'header.php';

require_once 'sidebar.php';

$blogsor=$baglanti->prepare("SELECT * FROM blog order by blog_sira ASC ");
$blogsor->execute(array());



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
                       <div class="card-header">
                           <h3 class="card-title">Blog Yazıları</h3>
                           <a href="ekle.php?sayfa=blog"><button style="float: right" type="submit" class="btn btn-info">Yeni Blog Ekle</button></a>

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
                                   <th>Blog Resim</th>
                                   <th>Blog Başlık</th>
                                   <th>Blog Sıra</th>

                               </tr>
                               </thead>
                               <tbody>
                               <?php
                               while ($blogcek=$blogsor->fetch(PDO::FETCH_ASSOC)) { ?>

                               <tr>
                                   <td><img style="width: 150px" src="Resimler/Blog/<?php echo $blogcek['blog_resim'] ?>"></td>
                                   <td><?php echo $blogcek['blog_baslik'] ?></td>
                                   <td><?php echo $blogcek['blog_sira'] ?></td>
                                   <td><a href="duzenle.php?sayfa=blog&id=<?php echo $blogcek['blog_id'] ?>"><button type="submit" class="btn btn-success">Düzenle</button></a></td>
                                   <td>
                                       <form action="islem.php" method="POST">
                                       <button name="blogsil" type="submit" class="btn btn-danger">Sil</button>
                                           <input name="id" value="<?php echo $blogcek['blog_id'] ?>" type="hidden">
                                           <input name="eskiresim" value="<?php echo $blogcek['blog_resim'] ?>" type="hidden">
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