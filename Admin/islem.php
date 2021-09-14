<?php
session_start();
require_once 'baglanti.php';

if (isset($_POST['ayarkaydet'])) {
$kaydet=$baglanti->prepare("UPDATE ayarlar SET 

  ayar_baslik=:ayar_baslik,
  ayar_aciklama=:ayar_aciklama,
  ayar_adres=:ayar_adres,
  ayar_telefon=:ayar_telefon,
  ayar_anahtar=:ayar_anahtar,
  ayar_email=:ayar_email                 
                   



");
$update=$kaydet->execute(array(
   'ayar_baslik'=>htmlspecialchars($_POST['baslik']),
   'ayar_aciklama'=>htmlspecialchars($_POST['aciklama']),
   'ayar_adres'=>htmlspecialchars($_POST['adres']),
   'ayar_telefon'=>htmlspecialchars($_POST['telefon']),
   'ayar_anahtar'=>htmlspecialchars($_POST['anahtar']),
   'ayar_email'=>htmlspecialchars($_POST['email'])
));

if ($update) {
   Header("location:ayarlar.php?sayfa=ayarlar&durum=basarili");
}else {
   Header("location:ayarlar.php?sayfa=ayarlar&durum=basarisiz");
}
}


if (isset($_POST['sosyalmedyakaydet'])) {
    $kaydet=$baglanti->prepare("UPDATE ayarlar SET 

  ayar_facebook=:ayar_facebook,
  ayar_instagram=:ayar_instagram,
  ayar_youtube=:ayar_youtube,
  ayar_twitter=:ayar_twitter
                              


");
    $update=$kaydet->execute(array(
        'ayar_instagram'=>htmlspecialchars($_POST['instagram']),
        'ayar_facebook'=>htmlspecialchars($_POST['facebook']),
        'ayar_youtube'=>htmlspecialchars($_POST['youtube']),
        'ayar_twitter'=>htmlspecialchars($_POST['twitter'])

    ));

    if ($update) {
        Header("location:ayarlar.php?sayfa=sosyalmedya&durum=basarili");
    }else {
        Header("location:ayarlar.php?sayfa=sosyalmedya&durum=basarisiz");
    }
}


if (isset($_POST['hakkimizdakaydet'])) {

    if ($_FILES['hakkimizdaresim'] ['size'] > 0) {

        $uploads_dir = 'Resimler/hakkimizda';
        @$tmp_name = $_FILES['hakkimizdaresim'] ['tmp_name'];
        @$name = $_FILES['hakkimizdaresim'] ['name'];

        $sayi1 = rand(1, 1000000);
        $sayi2 = rand(1, 1000000);
        $sayi3 = rand(1, 1000000);
        $sayilar = $sayi1 . $sayi2 . $sayi3;
        $resimadi = $sayilar . $name;
        @move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");


        $kaydet = $baglanti->prepare("UPDATE hakkimizda SET 

  hakkimizda_baslik=:hakkimizda_baslik,
  hakkimizda_aciklama=:hakkimizda_aciklama,                    
  hakkimizda_resim=:hakkimizda_resim                    
                   



");
        $update = $kaydet->execute(array(
            'hakkimizda_baslik' => ($_POST['hakkimizdabaslik']),
            'hakkimizda_aciklama' => ($_POST['hakkimizdaaciklama']),
            'hakkimizda_resim' => $resimadi
        ));

        if ($update) {
            $eskiresim=$_POST['eskiresim'];
            unlink("Resimler/hakkimizda/$eskiresim");
            Header("location:hakkimizda.php?durum=basarili");
        } else {
            Header("location:hakkimizda.php?durum=basarisiz");
        }
    } else {
        $kaydet = $baglanti->prepare("UPDATE hakkimizda SET 

  hakkimizda_baslik=:hakkimizda_baslik,
  hakkimizda_aciklama=:hakkimizda_aciklama                   
                   



");
        $update = $kaydet->execute(array(
            'hakkimizda_baslik' => ($_POST['hakkimizdabaslik']),
            'hakkimizda_aciklama' => ($_POST['hakkimizdaaciklama'])
        ));

        if ($update) {
            Header("location:hakkimizda.php?durum=basarili");
        } else {
            Header("location:hakkimizda.php?durum=basarisiz");
        }
    }
}



if (isset($_POST['sliderkaydet'])) {

    if ($_FILES['sliderresim'] ['size'] > 0) {

        $uploads_dir = 'Resimler/Slider';
        @$tmp_name = $_FILES['sliderresim'] ['tmp_name'];
        @$name = $_FILES['sliderresim'] ['name'];

        $sayi1 = rand(1, 1000000);
        $sayi2 = rand(1, 1000000);
        $sayi3 = rand(1, 1000000);
        $sayilar = $sayi1 . $sayi2 . $sayi3;
        $resimadi = $sayilar . $name;
        @move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");


        $kaydet = $baglanti->prepare("UPDATE slider SET 

  slider_baslik=:slider_baslik,
  slider_aciklama=:slider_aciklama,                    
  slider_resim=:slider_resim,                    
  slider_button=:slider_button,                   
  slider_link=:slider_link                   
                   



");
        $update = $kaydet->execute(array(
            'slider_baslik' => $_POST['sliderbaslik'],
            'slider_aciklama' => $_POST['slideraciklama'],
            'slider_resim' => $resimadi,
            'slider_button' => $_POST['sliderbutton'],
            'slider_link' => $_POST['sliderlink']
        ));

        if ($update) {
            $eskiresim=$_POST['eskiresim'];
            unlink("Resimler/Slider/$eskiresim");
            Header("location:slider.php?durum=basarili");
        } else {
            Header("location:slider.php?durum=basarisiz");
        }
    } else {
        $kaydet = $baglanti->prepare("UPDATE slider SET 

   slider_baslik=:slider_baslik,
  slider_aciklama=:slider_aciklama,
   slider_button=:slider_button,                   
  slider_link=:slider_link               
                   



");
        $update = $kaydet->execute(array(
            'slider_baslik' => ($_POST['sliderbaslik']),
            'slider_aciklama' => ($_POST['slideraciklama']),
            'slider_button' => ($_POST['sliderbutton']),
            'slider_link' => ($_POST['sliderlink'])
        ));

        if ($update) {
            Header("location:slider.php?durum=basarili");
        } else {
            Header("location:slider.php?durum=basarisiz");
        }
    }
}




if (isset($_POST['ekipkaydet'])) {
    $uploads_dir = 'Resimler/Ekip';
    @$tmp_name = $_FILES['ekipresim'] ['tmp_name'];
    @$name = $_FILES['ekipresim'] ['name'];

    $sayi1 = rand(1, 1000000);
    $sayi2 = rand(1, 1000000);
    $sayi3 = rand(1, 1000000);
    $sayilar = $sayi1 . $sayi2 . $sayi3;
    $resimadi = $sayilar . $name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");


    $kaydet=$baglanti->prepare("INSERT into ekip SET  

 ekip_isim=:ekip_isim,
 ekip_konum=:ekip_konum,
 ekip_sira=:ekip_sira,
 ekip_aciklama=:ekip_aciklama,
 ekip_twitter=:ekip_twitter,
 ekip_instagram=:ekip_instagram,
 ekip_linkedin=:ekip_linkedin,
 ekip_resim=:ekip_resim
                   



");
    $insert=$kaydet->execute(array(
        'ekip_isim'=>htmlspecialchars($_POST['ekipisim']),
        'ekip_konum'=>htmlspecialchars($_POST['ekipkonum']),
        'ekip_sira'=>htmlspecialchars($_POST['ekipsira']),
        'ekip_aciklama'=>$_POST['ekipaciklama'],
        'ekip_twitter'=>htmlspecialchars($_POST['twitter']),
        'ekip_instagram'=>htmlspecialchars($_POST['instagram']),
        'ekip_linkedin'=>htmlspecialchars($_POST['linkedin']),
        'ekip_resim'=>$resimadi
    ));

    if ($insert) {
        Header("location:ekip.php?sayfa=ekip&durum=basarili");
    }else {
        Header("location:ekip.php?sayfa=ekip&durum=basarisiz");
    }
}


if (isset($_POST['ekipduzenle'])) {

    if ($_FILES['ekipresim'] ['size'] > 0) {

        $uploads_dir = 'Resimler/Ekip';
        @$tmp_name = $_FILES['ekipresim'] ['tmp_name'];
        @$name = $_FILES['ekipresim'] ['name'];

        $sayi1 = rand(1, 1000000);
        $sayi2 = rand(1, 1000000);
        $sayi3 = rand(1, 1000000);
        $sayilar = $sayi1 . $sayi2 . $sayi3;
        $resimadi = $sayilar . $name;
        @move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");


        $duzenle = $baglanti->prepare("UPDATE ekip SET 

  ekip_isim=:ekip_isim,
 ekip_konum=:ekip_konum,
 ekip_sira=:ekip_sira,
 ekip_aciklama=:ekip_aciklama,
 ekip_twitter=:ekip_twitter,
 ekip_instagram=:ekip_instagram,
 ekip_linkedin=:ekip_linkedin,
 ekip_resim=:ekip_resim           
                   
where ekip_id={$_POST['id']}


");
        $update = $duzenle->execute(array(
            'ekip_isim'=>htmlspecialchars($_POST['ekipisim']),
            'ekip_konum'=>htmlspecialchars($_POST['ekipkonum']),
            'ekip_sira'=>htmlspecialchars($_POST['ekipsira']),
            'ekip_aciklama'=>$_POST['ekipaciklama'],
            'ekip_twitter'=>htmlspecialchars($_POST['twitter']),
            'ekip_instagram'=>htmlspecialchars($_POST['instagram']),
            'ekip_linkedin'=>htmlspecialchars($_POST['linkedin']),
            'ekip_resim'=>$resimadi
        ));

        if ($update) {
            $eskiresim=$_POST['eskiresim'];
            unlink("Resimler/Ekip/$eskiresim");
            Header("location:ekip.php?durum=basarili");
        } else {
            Header("location:ekip.php?durum=basarisiz");
        }
    } else {
        $duzenle = $baglanti->prepare("UPDATE ekip SET 

   ekip_isim=:ekip_isim,
 ekip_konum=:ekip_konum,
 ekip_sira=:ekip_sira,
 ekip_aciklama=:ekip_aciklama,
 ekip_twitter=:ekip_twitter,
 ekip_instagram=:ekip_instagram,
 ekip_linkedin=:ekip_linkedin           
                   
where ekip_id={$_POST['id']}



");
        $update = $duzenle->execute(array(
            'ekip_isim'=>htmlspecialchars($_POST['ekipisim']),
            'ekip_konum'=>htmlspecialchars($_POST['ekipkonum']),
            'ekip_sira'=>htmlspecialchars($_POST['ekipsira']),
            'ekip_aciklama'=>$_POST['ekipaciklama'],
            'ekip_twitter'=>htmlspecialchars($_POST['twitter']),
            'ekip_instagram'=>htmlspecialchars($_POST['instagram']),
            'ekip_linkedin'=>htmlspecialchars($_POST['linkedin'])
        ));

        if ($update) {
            Header("location:ekip.php?durum=basarili");
        } else {
            Header("location:ekip.php?durum=basarisiz");
        }
    }
}

if (isset($_POST['ekipsil'])) {
    $eskiresim=$_POST['eskiresim'];
    unlink("Resimler/Ekip/$eskiresim");
    $sil=$baglanti->prepare("DELETE FROM ekip where ekip_id=:ekip_id");
    $sil->execute(array(
        'ekip_id'=>$_POST['id']
    ));
    if ($sil) {
        Header('location:ekip.php?durum=basarili');
    }else{
        Header('location:ekip.php?durum=basarisiz');
    }
}





if (isset($_POST['galerikaydet'])) {
    $uploads_dir = 'Resimler/Galeri';
    @$tmp_name = $_FILES['galeriresim'] ['tmp_name'];
    @$name = $_FILES['galeriresim'] ['name'];

    $sayi1 = rand(1, 1000000);
    $sayi2 = rand(1, 1000000);
    $sayi3 = rand(1, 1000000);
    $sayilar = $sayi1 . $sayi2 . $sayi3;
    $resimadi = $sayilar . $name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");


    $kaydet=$baglanti->prepare("INSERT into galeri SET  

 galeri_sira=:galeri_sira,
 galeri_resim=:galeri_resim
                   



");
    $insert=$kaydet->execute(array(

        'galeri_sira'=>htmlspecialchars($_POST['galerisira']),
        'galeri_resim'=>$resimadi
    ));

    if ($insert) {
        Header("location:galeri.php?durum=basarili");
    }else {
        Header("location:galeri.php?durum=basarisiz");
    }
}




if (isset($_POST['galeriduzenle'])) {

    if ($_FILES['galeriresim'] ['size'] > 0) {

        $uploads_dir = 'Resimler/Galeri';
        @$tmp_name = $_FILES['galeriresim'] ['tmp_name'];
        @$name = $_FILES['galeriresim'] ['name'];

        $sayi1 = rand(1, 1000000);
        $sayi2 = rand(1, 1000000);
        $sayi3 = rand(1, 1000000);
        $sayilar = $sayi1 . $sayi2 . $sayi3;
        $resimadi = $sayilar . $name;
        @move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");


        $duzenle = $baglanti->prepare("UPDATE galeri SET 

  galeri_sira=:galeri_sira,
 galeri_resim=:galeri_resim      
                   
where galeri_id={$_POST['id']}


");
        $update = $duzenle->execute(array(
            'galeri_sira'=>htmlspecialchars($_POST['galerisira']),
            'galeri_resim'=>$resimadi
        ));

        if ($update) {
            $eskiresim=$_POST['eskiresim'];
            unlink("Resimler/Galeri/$eskiresim");
            Header("location:galeri.php?durum=basarili");
        } else {
            Header("location:galeri.php?durum=basarisiz");
        }
    } else {
        $duzenle = $baglanti->prepare("UPDATE galeri SET 

          galeri_sira=:galeri_sira
                   
where galeri_id={$_POST['id']}



");
        $update = $duzenle->execute(array(
            'galeri_sira'=>htmlspecialchars($_POST['galerisira'])
        ));

        if ($update) {
            Header("location:galeri.php?durum=basarili");
        } else {
            Header("location:galeri.php?durum=basarisiz");
        }
    }
}


if (isset($_POST['galerisil'])) {
    $eskiresim=$_POST['eskiresim'];
    unlink("Resimler/Galeri/$eskiresim");
    $sil=$baglanti->prepare("DELETE FROM galeri where galeri_id=:galeri_id");
    $sil->execute(array(
        'galeri_id'=>$_POST['id']
    ));
    if ($sil) {
        Header('location:galeri.php?durum=basarili');
    }else{
        Header('location:galeri.php?durum=basarisiz');
    }
}


if (isset($_POST['blogkaydet'])) {
    $uploads_dir = 'Resimler/Blog';
    @$tmp_name = $_FILES['blogresim'] ['tmp_name'];
    @$name = $_FILES['blogresim'] ['name'];

    $sayi1 = rand(1, 1000000);
    $sayi2 = rand(1, 1000000);
    $sayi3 = rand(1, 1000000);
    $sayilar = $sayi1 . $sayi2 . $sayi3;
    $resimadi = $sayilar . $name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");


    $kaydet=$baglanti->prepare("INSERT into blog SET  

    blog_baslik=:blog_baslik,
    blog_aciklama=:blog_aciklama,
    blog_anahtarkelime=:blog_anahtarkelime,
    blog_sira=:blog_sira,
    blog_resim=:blog_resim
                   



");
    $insert=$kaydet->execute(array(
        'blog_baslik'=>htmlspecialchars($_POST['blogbaslik']),
        'blog_anahtarkelime'=>htmlspecialchars($_POST['bloganahtar']),
        'blog_sira'=>htmlspecialchars($_POST['blogsira']),
        'blog_aciklama'=>$_POST['blogaciklama'],
        'blog_resim'=>$resimadi
    ));

    if ($insert) {
        Header("location:blog.php?durum=basarili");
    }else {
        Header("location:blog.php?durum=basarisiz");
    }
}


if (isset($_POST['blogduzenle'])) {

    if ($_FILES['blogresim'] ['size'] > 0) {

        $uploads_dir = 'Resimler/Blog';
        @$tmp_name = $_FILES['blogresim'] ['tmp_name'];
        @$name = $_FILES['blogresim'] ['name'];

        $sayi1 = rand(1, 1000000);
        $sayi2 = rand(1, 1000000);
        $sayi3 = rand(1, 1000000);
        $sayilar = $sayi1 . $sayi2 . $sayi3;
        $resimadi = $sayilar . $name;
        @move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");


        $duzenle = $baglanti->prepare("UPDATE blog SET 

    blog_baslik=:blog_baslik,
    blog_aciklama=:blog_aciklama,
    blog_anahtarkelime=:blog_anahtarkelime,
    blog_sira=:blog_sira,
    blog_resim=:blog_resim
                   
where blog_id={$_POST['id']}


");
        $update = $duzenle->execute(array(
            'blog_baslik'=>htmlspecialchars($_POST['blogbaslik']),
            'blog_anahtarkelime'=>htmlspecialchars($_POST['bloganahtar']),
            'blog_sira'=>htmlspecialchars($_POST['blogsira']),
            'blog_aciklama'=>$_POST['blogaciklama'],
            'blog_resim'=>$resimadi
        ));

        if ($update) {
            $eskiresim=$_POST['eskiresim'];
            unlink("Resimler/Blog/$eskiresim");
            Header("location:blog.php?durum=basarili");
        } else {
            Header("location:blog.php?durum=basarisiz");
        }
    } else {
        $duzenle = $baglanti->prepare("UPDATE blog SET 

    blog_baslik=:blog_baslik,
    blog_aciklama=:blog_aciklama,
    blog_anahtarkelime=:blog_anahtarkelime,
    blog_sira=:blog_sira      
                   

where blog_id={$_POST['id']}



");
        $update = $duzenle->execute(array(
            'blog_baslik'=>htmlspecialchars($_POST['blogbaslik']),
            'blog_anahtarkelime'=>htmlspecialchars($_POST['bloganahtar']),
            'blog_sira'=>htmlspecialchars($_POST['blogsira']),
            'blog_aciklama'=>$_POST['blogaciklama']
        ));

        if ($update) {
            Header("location:blog.php?durum=basarili");
        } else {
            Header("location:blog.php?durum=basarisiz");
        }
    }
}

if (isset($_POST['blogsil'])) {
    $eskiresim=$_POST['eskiresim'];
    unlink("Resimler/Blog/$eskiresim");
    $sil=$baglanti->prepare("DELETE FROM blog where blog_id=:blog_id");
    $sil->execute(array(
        'blog_id'=>$_POST['id']
    ));
    if ($sil) {
        Header('location:blog.php?durum=basarili');
    }else{
        Header('location:blog.php?durum=basarisiz');
    }
}



if (isset($_POST['kategorikaydet'])) {

    $kaydet=$baglanti->prepare("INSERT into kategori SET  

 kategori_baslik=:kategori_baslik,
 kategori_sira=:kategori_sira,
 kategori_durum=:kategori_durum
                   



");
    $insert=$kaydet->execute(array(

        'kategori_baslik'=>htmlspecialchars($_POST['kategoribaslik']),
        'kategori_sira'=>htmlspecialchars($_POST['kategorisira']),
        'kategori_durum'=>htmlspecialchars($_POST['kategoridurum']),

    ));

    if ($insert) {
        Header("location:kategori?durum=basarili");
    }else {
        Header("location:kategori?durum=basarisiz");
    }
}

if (isset($_POST['kategoriduzenle'])) {
$duzenle = $baglanti->prepare("UPDATE kategori SET 

         kategori_baslik=:kategori_baslik,
          kategori_sira=:kategori_sira,
          kategori_durum=:kategori_durum
                   
where kategori_id={$_POST['id']}



");
$update = $duzenle->execute(array(
    'kategori_sira'=>htmlspecialchars($_POST['kategorisira']),
    'kategori_baslik'=>htmlspecialchars($_POST['kategoribaslik']),
    'kategori_durum'=>htmlspecialchars($_POST['kategoridurum'])
));

if ($update) {
    Header("location:kategori?durum=basarili");
} else {
    Header("location:kategori?durum=basarisiz");
}
}

if (isset($_GET['kategorisil'])) {
    $sil=$baglanti->prepare("DELETE FROM kategori where kategori_id=:kategori_id");
    $sil->execute(array(
        'kategori_id'=>$_GET['id']
    ));
    if ($sil) {
        Header('location:kategori?durum=basarili');
    }else{
        Header('location:kategori?durum=basarisiz');
    }
}

if (isset($_POST['icerikkaydet'])) {
    $katid=$_POST['katid'];
    $uploads_dir = 'Resimler/İcerik';
    @$tmp_name = $_FILES['icerikresim'] ['tmp_name'];
    @$name = $_FILES['icerikresim'] ['name'];

    $sayi1 = rand(1, 1000000);
    $sayi2 = rand(1, 1000000);
    $sayi3 = rand(1, 1000000);
    $sayilar = $sayi1 . $sayi2 . $sayi3;
    $resimadi = $sayilar . $name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");


    $kaydet=$baglanti->prepare("INSERT into icerik SET  

 icerik_baslik=:icerik_baslik,
 icerik_sira=:icerik_sira,
 icerik_aciklama=:icerik_aciklama,
 kategori_id=:kategori_id,
 icerik_anahtarkelime=:icerik_anahtarkelime,
 icerik_resim=:icerik_resim
                   



");
    $insert=$kaydet->execute(array(
        'icerik_baslik'=>htmlspecialchars($_POST['icerikbaslik']),
        'icerik_sira'=>htmlspecialchars($_POST['iceriksira']),
        'icerik_aciklama'=>$_POST['icerikaciklama'],
        'kategori_id'=>htmlspecialchars($_POST['katid']),
        'icerik_anahtarkelime'=>htmlspecialchars($_POST['icerikanahtar']),
        'icerik_resim'=>$resimadi
    ));

    if ($insert) {
        Header("location:icerik?katid=$katid&durum=basarili");
    }else {
        Header("location:icerik?katid=$katid&durum=basarisiz");
    }
}


if (isset($_POST['iceriksil'])) {
    $katid=$_POST['katid'];
    $eskiresim=$_POST['eskiresim'];
    unlink("Resimler/İcerik/$eskiresim");
    $sil=$baglanti->prepare("DELETE FROM icerik where icerik_id=:icerik_id");
    $sil->execute(array(
        'icerik_id'=>$_POST['id']
    ));
    if ($sil) {
        Header("location:icerik?katid=$katid&durum=basarili");
    }else{
        Header("location:icerik?katid=$katid&durum=basarisiz");
    }
}



if (isset($_POST['icerikduzenle'])) {

    if ($_FILES['icerikresim'] ['size'] > 0) {
        $katid=$_POST['katid'];
        $uploads_dir = 'Resimler/İcerik';
        @$tmp_name = $_FILES['icerikresim'] ['tmp_name'];
        @$name = $_FILES['icerikresim'] ['name'];

        $sayi1 = rand(1, 1000000);
        $sayi2 = rand(1, 1000000);
        $sayi3 = rand(1, 1000000);
        $sayilar = $sayi1 . $sayi2 . $sayi3;
        $resimadi = $sayilar . $name;
        @move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");


        $duzenle = $baglanti->prepare("UPDATE icerik SET 

  icerik_baslik=:icerik_baslik,
  icerik_aciklama=:icerik_aciklama,
  kategori_id=:kategori_id,
  icerik_sira=:icerik_sira,
  icerik_anahtarkelime=:icerik_anahtarkelime,
  icerik_resim=:icerik_resim                
                   
where icerik_id={$_POST['id']}


");
        $update = $duzenle->execute(array(
            'icerik_baslik'=>htmlspecialchars($_POST['icerikbaslik']),
            'icerik_sira'=>htmlspecialchars($_POST['iceriksira']),
            'kategori_id'=>htmlspecialchars($_POST['katid']),
            'icerik_aciklama'=>$_POST['icerikaciklama'],
            'icerik_anahtarkelime'=>htmlspecialchars($_POST['icerikanahtar']),
            'icerik_resim'=>$resimadi
        ));

        if ($update) {
            $eskiresim=$_POST['eskiresim'];
            unlink("Resimler/İcerik/$eskiresim");
            Header("location:icerik?katid=$katid&durum=basarili");
        } else {
            Header("location:icerik?katid=$katid&durum=basarisiz");
        }
    } else {
        $katid=$_POST['katid'];
        $duzenle = $baglanti->prepare("UPDATE icerik SET 

   icerik_baslik=:icerik_baslik,
  icerik_aciklama=:icerik_aciklama,
  kategori_id=:kategori_id,
  icerik_sira=:icerik_sira,
  icerik_anahtarkelime=:icerik_anahtarkelime        
                   
where icerik_id={$_POST['id']}



");
        $update = $duzenle->execute(array(
            'icerik_baslik'=>htmlspecialchars($_POST['icerikbaslik']),
            'icerik_sira'=>htmlspecialchars($_POST['iceriksira']),
            'kategori_id'=>htmlspecialchars($_POST['katid']),
            'icerik_aciklama'=>$_POST['icerikaciklama'],
            'icerik_anahtarkelime'=>htmlspecialchars($_POST['icerikanahtar'])
        ));

        if ($update) {
            Header("location:icerik?katid=$katid&durum=basarili");
        } else {
            Header("location:icerik?katid=$katid&durum=basarisiz");
        }
    }
}

if (isset($_POST['abone'])) {

    $kaydet=$baglanti->prepare("INSERT into abone SET  

 abone_email=:abone_email
                   



");
    $insert=$kaydet->execute(array(

        'abone_email'=>htmlspecialchars($_POST['email']),


    ));

    if ($insert) {
        Header("location:../iletisim?durum=basarili");
    }else {
        Header("location:../iletisim?durum=basarisiz");
    }
}


if (isset($_POST['blogyorumkaydet'])) {
    $link=$_SERVER['HTTP_REFERER'];

    $kaydet=$baglanti->prepare("INSERT into yorumlar SET  

 yorum_kategori=:yorum_kategori,
 icerik_id=:icerik_id,
 yorum_adsoyad=:yorum_adsoyad,
 yorum_detay=:yorum_detay
 
                   



");
    $insert=$kaydet->execute(array(

        'yorum_kategori'=>htmlspecialchars($_POST['kategori']),
        'icerik_id'=>htmlspecialchars($_POST['id']),
        'yorum_adsoyad'=>htmlspecialchars($_POST['adsoyad']),
        'yorum_detay'=>htmlspecialchars($_POST['detay'])


    ));

    if ($insert) {
        Header("location:$link?durum=basarili");
    }else {
        Header("location:$link?durum=basarisiz");
    }
}

if (isset($_POST['icerikyorumkaydet'])) {
    $link=$_SERVER['HTTP_REFERER'];

    $kaydet=$baglanti->prepare("INSERT into yorumlar SET  

 yorum_kategori=:yorum_kategori,
 icerik_id=:icerik_id,
 yorum_adsoyad=:yorum_adsoyad,
 yorum_detay=:yorum_detay
 
                   



");
    $insert=$kaydet->execute(array(

        'yorum_kategori'=>htmlspecialchars($_POST['kategori']),
        'icerik_id'=>htmlspecialchars($_POST['id']),
        'yorum_adsoyad'=>htmlspecialchars($_POST['adsoyad']),
        'yorum_detay'=>htmlspecialchars($_POST['detay'])


    ));

    if ($insert) {
        Header("location:$link?durum=basarili");
    }else {
        Header("location:$link?durum=basarisiz");
    }
}


if (isset($_POST['girisyap'])) {
$email=htmlspecialchars($_POST['girisemail']);
$sifre=htmlspecialchars($_POST['girissifre']);
$md5=md5($sifre);

    $kullanicisor=$baglanti->prepare("SELECT * FROM kullanici where kullanici_email=:kullanici_email and kullanici_sifre=:kullanici_sifre");
    $kullanicisor->execute(array(
        'kullanici_email'=>$email,
        'kullanici_sifre'=>$md5
    ));
    $var=$kullanicisor->rowCount();

    if ($var=="0") {
        header("location:giris?durum=basarisiz");
    }else {
        $_SESSION['giris']=$email;
        header("location:index?durum=basarili");
    }
}
?>