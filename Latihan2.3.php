<?php

class Belanja {
    public $namaPembeli; //proprti wir
    public  $namaBarang;
    public  $hargaBarang;
    public  $jumlahBarang;
    public  $totalBayar;
    public  $diskon;
    public  $pajak=0.02;

    public function __construct($namaPembeli, $namaBarang, $hargaBarang, $jumlahBarang, $diskon) {
        $this->namaPembeli=$namaPembeli;
        $this->namaBarang=$namaBarang;
        $this->hargaBarang=$hargaBarang;
        $this->jumlahBarang=$jumlahBarang;
        $this->diskon=$diskon;
        $this->diskon=0.1;
    }


    public function totalHarga() {
        $subtotal = $this->hargaBarang * $this->jumlahBarang;
        return $subtotal;
    }


}

$belanja1 = new Belanja("miftah", "sampo", 9000, 2, 0.1); //var_dump($belanja1);

echo "<pre>";
echo "nama pembeli: " . $belanja1->namaPembeli . "\n";
echo "subtotal harga: RP. " . $belanja1->totalHarga() . "\n";
echo "diskon: RP. " . ($belanja1->totalHarga() * $belanja1->diskon) . "\n";
echo "pajak: RP. " . ($belanja1->totalHarga() * $belanja1->pajak) . "\n";
echo "total bayar: RP. " . ($belanja1->totalHarga() - ($belanja1->totalHarga() * $belanja1->diskon) + ($belanja1->totalHarga() * $belanja1->pajak)) . "\n";
echo "</pre>";