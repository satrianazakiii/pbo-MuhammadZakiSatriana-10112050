<html>
<head>
    <title> Program Penghitung Besaran Angsuran Hutang</title>
</head>
<body>
    <H2>Masukan Data Yang Dibutuhkan</H2>
   <form action="proses_hitung.php" method="POST">
    Besar Pinjaman :
        <input type="number" name="besar_pinjaman"><br><br>
    Bunga pokok (%):
        <input type="number" name="bunga_pokok"><br><br>
    Lama Angsuran (bulan):
        <input type="number" name="lama_angsuran"><br><br>
    keterlambatan bayar (hari):
        <input type="number" name="keterlambatan_bayar"><br><br>
        <input type="submit" value="Kirim">
    </form>
</body>
</html>
