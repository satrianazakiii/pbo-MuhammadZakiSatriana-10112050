<?php

class Belanja {
    public $namaPembeli="miftah";
    public $namaBarang="Samppo";
    public $hargaBarang=9000;
    public $jumlahBarang=2;
    public $totalBayar;
    public $diskon=0.1;
    public $pajak=0.02;

    public function totalHarga() {
        $subtotal = $this->hargaBarang * $this->jumlahBarang;
        return $subtotal;
    }


}

$belanja1 = new Belanja();
//var_dump($belanja1);

echo "subtotal harga: RP. " . $belanja1->totalHarga() . "<br>";
echo "diskon: RP. " . ($belanja1->totalHarga() * $belanja1->diskon) . "\n";

?>