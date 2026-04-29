<?php
$host = "localhost";
$vt_adi = "sepetdb";
$kullanici = "root";
$sifre = "";

try {
    $db = new PDO("mysql:host=$host;dbname=$vt_adi;charset=utf8", $kullanici, $sifre);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Bağlantı başarılı olursa burası çalışır
} catch (PDOException $hata) {
    echo "Bağlantı kurulamadı: " . $hata->getMessage();
}
?>