<?php
include 'baglan.php'; 


if (isset($_POST['sepet_olustur'])) {
    
    $musteri = $_POST['musteri_adi'];

    // SQL Injection önlemi parametreli sorgu kullanarak güvenliği sağlıyoruz
    $sorgu = $db->prepare("INSERT INTO sepet (musteri_adi) VALUES (?)");
    $ekle = $sorgu->execute([$musteri]);

    if ($ekle) {
        // Kayıt başarılıysa bizi listeleme sayfasına yönlendirsin
        header("Location: sepet_listesi.php?durum=basarili");
    } else {
        echo "Bir hata oluştu!";
    }
}
if (isset($_GET['sil'])) {
    $id = $_GET['sil'];
    $sil = $db->prepare("DELETE FROM sepet WHERE id = ?");
    $sonuc = $sil->execute([$id]);

    if ($sonuc) {
        header("Location: sepet_listesi.php?silme=basarili");
    }
}
if (isset($_POST['urun_ekle'])) {
    $sepet_id = $_POST['sepet_id'];
    $urun = $_POST['urun_adi'];
    $adet = $_POST['adet'];
    $fiyat = $_POST['fiyat'];

    $sorgu = $db->prepare("INSERT INTO sepet_urun (sepet_id, urun_adi, adet, fiyat) VALUES (?, ?, ?, ?)");
    $ekle = $sorgu->execute([$sepet_id, $urun, $adet, $fiyat]);

    if ($ekle) {
        header("Location: sepet_detay.php?id=" . $sepet_id);
    }
}
?>