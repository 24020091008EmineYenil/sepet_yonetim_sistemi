<?php 
// Az önce oluşturduğumuz köprüyü buraya çağırıyoruz
include 'baglan.php'; 
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Sepet Yönetim Sistemi 🌸</title>
    <style>
        /* Tasarım kısmı - Minimalist ve Neşeli */
        body {
            background-color: #FFF0F5; /* Toz pembe çok hafif arka plan */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 20px; /* Yumuşak köşeler */
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            width: 400px;
            text-align: center;
        }
        h2 { color: #DB7093; } /* Koyu pembe başlık */
        input {
            width: 80%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #FFC0CB;
            border-radius: 15px; /* Oval giriş kutusu */
            outline: none;
        }
        button {
            background-color: #FFB6C1; /* Toz pembe buton */
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 25px; /* Tam oval butonlar */
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
        }
        button:hover {
            background-color: #FF69B4; /* Üzerine gelince koyulaşan pembe */
        }
    </style>
</head>
<body>

<div class="container">
    <h2>🌸 Yeni Sepet Oluştur</h2>
    <form action="islem.php" method="POST">
        <input type="text" name="musteri_adi" placeholder="Müşteri adını giriniz..." required>
        <br>
        <button type="submit" name="sepet_olustur">Sepeti Başlat</button>
    </form>
</div>

</body>
</html>