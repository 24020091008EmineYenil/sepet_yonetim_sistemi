<?php include 'baglan.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Sepet Listesi 🌸</title>
    <style>
        body { background-color: #FFF0F5; font-family: sans-serif; padding: 50px; }
        .liste-konteynir { background: white; padding: 20px; border-radius: 20px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 15px; text-align: left; border-bottom: 1px solid #FFE4E1; }
        th { color: #DB7093; }
        
        /* Buton Tasarımları */
        .btn-sil { background-color: #FF69B4; color: white; padding: 8px 15px; border-radius: 15px; text-decoration: none; font-size: 13px; margin-left: 5px; }
        .btn-detay { background-color: #DB7093; color: white; padding: 8px 15px; border-radius: 15px; text-decoration: none; font-size: 13px; }
        .btn-ekle { background-color: #FFB6C1; color: white; padding: 10px 20px; border-radius: 20px; text-decoration: none; display: inline-block; margin-bottom: 20px; font-weight: bold; }
        
        .btn-sil:hover, .btn-detay:hover { opacity: 0.8; }
    </style>
</head>
<body>

<div class="liste-konteynir">
    <h2>🌸 Mevcut Sepetler</h2>
    <a href="index.php" class="btn-ekle">+ Yeni Sepet Aç</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Müşteri Adı</th>
            <th>Durum</th>
            <th style="text-align: center;">İşlemler</th>
        </tr>
        <?php
        // Veritabanındaki tüm sepetleri çekiyoruz
        $sorgu = $db->query("SELECT * FROM sepet ORDER BY id DESC");
        while ($satir = $sorgu->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $satir['id'] . "</td>";
            echo "<td>" . $satir['musteri_adi'] . "</td>";
            echo "<td>" . $satir['durum'] . "</td>";
            echo "<td style='text-align: center;'>
                    <a href='sepet_detay.php?id=" . $satir['id'] . "' class='btn-detay'>İçine Git</a>
                    <a href='islem.php?sil=" . $satir['id'] . "' class='btn-sil'>Sil</a>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>

</body>
</html>