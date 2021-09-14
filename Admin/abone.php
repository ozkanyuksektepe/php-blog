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
                    <h3 class="card-title">Aboneler</h3>

                <a href="ekle?sayfa=kategori"><button style="float: right" class="btn btn-warning btn-sm">Yeni Kategori Ekle</button></a>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th>
                                İd
                            </th>
                            <th>
                                Email
                            </th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                      <?php
                      $abonesor=$baglanti->prepare("SELECT * FROM abone order by abone_id ASC ");
                      $abonesor->execute(array());
                      while ($abonecek=$abonesor->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr>
                            <td>
                                <?php echo $abonecek['abone_id'] ?>
                            </td>
                            <td>
                                <?php echo $abonecek['abone_email'] ?>
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