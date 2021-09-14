<?php require_once 'header.php';
require_once 'sidebar.php';

?>



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <?php
            if (@$_GET['durum']=='basarili') { ?>
                <i style="color: green" >(İşlem Başarılı)</i>
            <?php  } elseif(@$_GET['durum']=='basarisiz') { ?>
                <i style="color: red">(İşlem Başarısız)</i>
            <?php } ?>
            <!-- Default box -->
            <div class="card">
                <div  class="card-header">
                    <h3 class="card-title">Kategoriler</h3>

                <a href="ekle?sayfa=kategori"><button style="float: right" class="btn btn-warning btn-sm">Yeni Kategori Ekle</button></a>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th>
                                Sıra
                            </th>
                            <th>
                                Başlık
                            </th>
                            <th>
                                Durum
                            </th>
                            <th></th>

                        </tr>
                        </thead>
                        <tbody>
                      <?php
                      $kategorisor=$baglanti->prepare("SELECT * FROM kategori order by kategori_sira ASC ");
                      $kategorisor->execute(array());
                      while ($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr>
                            <td>
                                <?php echo $kategoricek['kategori_sira'] ?>
                            </td>
                            <td>
                                <a>
                                    <?php echo $kategoricek['kategori_baslik'] ?>
                                </a>
                                <br/>
                                <small>
                                    <?php echo $kategoricek['kategori_zaman'] ?>
                                </small>
                            </td>
                            <td>
                                <?php if ($kategoricek['kategori_durum']=="1") { ?>
                                 <span class="badge badge-success">Aktif</span>
                                <?php } else { ?>
                                    <span class="badge badge-danger">Pasif</span>
                             <?php } ?>


                            </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-primary btn-sm" href="icerik?katid=<?php echo $kategoricek['kategori_id'] ?>">
                                    <i class="fas fa-folder">
                                    </i>
                                    Görüntüle
                                </a>
                                <a class="btn btn-success btn-sm" href="duzenle?sayfa=kategori&id=<?php echo $kategoricek['kategori_id'] ?>">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Düzenle
                                </a>
                                <a class="btn btn-danger btn-sm" href="islem?kategorisil&id=<?php echo $kategoricek['kategori_id'] ?>">
                                    <i class="fas fa-trash">
                                    </i>
                                    Sil
                                </a>
                            </td>
                        </tr>
                          <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php require_once 'footer.php';?>