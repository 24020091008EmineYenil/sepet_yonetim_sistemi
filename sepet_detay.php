<?php 
include 'baglan.php'; 

// URL'den gelen ID'yi alıyoruz
if (!isset($_GET['id'])) {
    header("Location: sepet_listesi.php");
    exit;
}

$sepet_id = $_GET['id']; 

// Müşteri adını çekelim
$musteri_sorgu = $db->prepare("SELECT musteri_adi FROM sepet WHERE id = ?");
$musteri_sorgu->execute([$sepet_id]);
$musteri = $musteri_sorgu->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sepet Detayı 🌸</title>
    <style>
        body { background-color: #FFF0F5; font-family: sans-serif; padding: 40px; }
        .detay-konteynir { background: white; padding: 30px; border-radius: 20px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); max-width: 700px; margin: auto; }
        h2 { color: #DB7093; }
        input { padding: 12px; border: 1px solid #FFC0CB; border-radius: 15px; width: 25%; outline: none; }
        button { background-color: #FFB6C1; border: none; padding: 12px 20px; border-radius: 20px; color: white; cursor: pointer; font-weight: bold; }
        button:hover { background-color: #FF69B4; }
        table { width: 100%; border-collapse: collapse; margin-top: 30px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #FFE4E1; }
        th { color: #DB7093; }
        .geri-link { text-decoration: none; color: #DB7093; font-weight: bold; display: block; margin-bottom: 20px; }
    </style>
</head>
<body>

<div class="detay-konteynir">
    <a href="sepet_listesi.php" class="geri-link">← Listeye Dön</a>
    <h2>🛍️ <?php echo htmlspecialchars($musteri['musteri_adi']); ?> kişisinin Sepeti</h2>
    
    <form action="islem.php" method="POST">
        <input type="hidden" name="sepet_id" value="<?php echo $sepet_id; ?>">
        <input type="text" name="urun_adi" placeholder="Ürün Adı" required>
        <input type="number" name="adet" placeholder="Adet" required>
        <input type="text" name="fiyat" placeholder="Fiyat" required>
        <button type="submit" name="urun_ekle">Ekle</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Ürün</th>
                <th>Adet</th>
                <th>Fiyat</th>
                <th>Toplam</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Ürünleri listeleme
            $urunler = $db->prepare("SELECT * FROM sepet_urun WHERE sepet_id = ?");
            $urunler->execute([$sepet_id]);
            
            while($urun = $urunler->fetch(PDO::FETCH_ASSOC)) {
                $toplam = $urun['adet'] * $urun['fiyat'];
                echo "<tr>";
                echo "<td>" . htmlspecialchars($urun['urun_adi']) . "</td>";
                echo "<td>" . $urun['adet'] . "</td>";
                echo "<td>" . number_format($urun['fiyat'], 2) . " TL</td>";
                echo "<td>" . number_format($toplam, 2) . " TL</td>";
                echo "</tr>";
            }

            // Genel toplam hesaplama
            $toplam_sorgu = $db->prepare("SELECT SUM(adet * fiyat) as genel_toplam FROM sepet_urun WHERE sepet_id = ?");
            $toplam_sorgu->execute([$sepet_id]);
            $genel_toplam_verisi = $toplam_sorgu->fetch(PDO::FETCH_ASSOC);
            $genel_toplam = $genel_toplam_verisi['genel_toplam'] ?? 0;
            ?>
            
            <tr style="font-weight: bold; background-color: #FFF0F5;">
                <td colspan="3" style="text-align: right;">Genel Toplam:</td>
                <td><?php echo number_format($genel_toplam, 2); ?> TL</td>
            </tr>
        </tbody>
    </table>
</div>

</body>
</html>