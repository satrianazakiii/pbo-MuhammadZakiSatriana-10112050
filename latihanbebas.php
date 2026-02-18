<?php
class kendaraan
{
    var $jumlahRoda;
    var $warna;
    var $bahanBakar; 
    var $harga;
    var $merek;
    var $tahunPembuatan;

    function statusHarga()
    {
        if ($this->harga > 50000000)
            $status = 'Mahal';
        else
            $status = 'Murah';

        return $status;
    }

    function statusBBM()
    {
        if ($this->tahunPembuatan < 2014 &&
            $this->bahanBakar == "pertalite")
        {
            $status = "DAPAT SUBSIDI";
        }
        else
        {
            $status = "TIDAK DAPAT SUBSIDI";
        }

        return $status;
    }

    function hargaBekas()
    {
        $hargaBekas = $this->harga * 0.9;
        return $hargaBekas;
    }
}
?>

<!-- TAMPILAN AWAL -->
<form method="GET">
    <button type="submit" name="kendaraan" value="mio">MIO</button>
    <button type="submit" name="kendaraan" value="avanza">AVANZA</button>
</form>

<?php

if (isset($_GET['kendaraan']))
{
    if ($_GET['kendaraan'] == "mio")
    {
        $objek = new kendaraan();
        $objek->merek = "Yamaha MIO";
        $objek->harga = 10000000;
        $objek->tahunPembuatan = 2010;
        $objek->bahanBakar = "pertalite";
        $objek->warna = "Hitam";
    }
    elseif ($_GET['kendaraan'] == "avanza")
    {
        $objek = new kendaraan();
        $objek->merek = "Toyota Avanza";
        $objek->harga = 100000000;
        $objek->tahunPembuatan = 2000;
        $objek->bahanBakar = "Pertamax";
        $objek->warna = "abu-abu monyet";
    }

    echo "<hr>";
    echo "Merek Kendaraan: " . $objek->merek;
    echo "<br>";
    echo "Nominal Harga: " . $objek->harga;
    echo "<br>";
    echo "Status Harga Kendaraan: " . $objek->statusHarga();
    echo "<br>";
    echo "Status BBM Kendaraan: " . $objek->statusBBM();
    echo "<br>";
    echo "Harga Bekas Kendaraan: " . $objek->hargaBekas();
    echo "<br>";
    echo "Warna Kendaraan: " . $objek->warna;
}
?>
