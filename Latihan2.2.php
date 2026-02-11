<?php

class Belanja {
    public $namaKasir;
    public $namaPembeli;
    public  $namaBarang;
    public  $hargaBarang;
    public  $jumlahBarang;
    public  $totalBayar;
    public  $diskon;
    public  $uangDIbayar;
    public  $pajak=0.02;

    public function totalHarga() {
        $subtotal = $this->hargaBarang * $this->jumlahBarang;
        return $subtotal;
    }


}

$belanja1 = new Belanja(); //var_dump($belanja1);
$belanja1->namaKasir="icha";
$belanja1->namaPembeli="miftah";
$belanja1->namaBarang="sampo";
$belanja1->hargaBarang=9000;
$belanja1->jumlahBarang=2;
$belanja1->diskon=0.1;
$belanja1->pajak=0.02;
$belanja1->uangDIbayar=20000;


echo "<pre>";
echo "======== Warung Madura ========\n";
echo "nama kasir    : " . $belanja1->namaKasir . "\n";
echo "nama pembeli  : " . $belanja1->namaPembeli . "\n";
echo "-------------------------------\n";
echo "nama barang   : " . $belanja1->namaBarang . "\n";
echo "-------------------------------\n";
echo "subtotal harga: RP. " . $belanja1->totalHarga() . "\n";
echo "diskon        : RP. " . ($belanja1->totalHarga() * $belanja1->diskon) . "\n";
echo "pajak 2%      : RP. " . ($belanja1->totalHarga() * $belanja1->pajak) . "\n";
echo "-------------------------------\n";
echo "total bayar   : RP. " . ($belanja1->totalHarga() - ($belanja1->totalHarga() * $belanja1->diskon) + ($belanja1->totalHarga() * $belanja1->pajak)) . "\n";
echo "uang di bayar : RP. " . $belanja1->uangDIbayar . "\n";
echo "kembalian     : RP. " . ($belanja1->uangDIbayar - ($belanja1->totalHarga() - ($belanja1->totalHarga() * $belanja1->diskon) + ($belanja1->totalHarga() * $belanja1->pajak))) . "\n";
echo "======== Terima kasih ========\n";
echo "</pre>";



?>