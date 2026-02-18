<?php
class angsuran
{
    var $besar_pinjaman;
    var $bunga_pokok;
    var $lama_angsuran;
    var $keterlambatan_bayar;  
    var $total_denda;
    var $Total_angsuran;
    var $angsuran_bulanan;
    var $angsuran_bulanIni;
    var $total_dendaRP;
    public function hitungTotalDenda()
    {
        $this->total_denda = $this->keterlambatan_bayar * 0.0015;
        return $this->total_denda;
    }
    public function hitungTotalAngsuran()
    {
        $this->Total_angsuran = $this->besar_pinjaman + ($this->besar_pinjaman * $this->bunga_pokok / 100);
        return $this->Total_angsuran;
    }
    public function angsuranBulanan()
    {
        $this->angsuran_bulanan = ($this->Total_angsuran / $this->lama_angsuran);
        return $this->angsuran_bulanan;
    }
    public function angsuranBulanIni()
    {
        $this->angsuran_bulanIni = $this->angsuran_bulanan + ($this->angsuran_bulanan * $this->keterlambatan_bayar * 0.0015);
        return $this->angsuran_bulanIni;
    }
    public function hitungTotalDendaRP()
    {
    $this->total_dendaRP = $this->total_denda * ($this->besar_pinjaman / $this->lama_angsuran);
    return $this->total_dendaRP;
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $angsuran1 = new angsuran();
    $angsuran1->besar_pinjaman =($_POST['besar_pinjaman']);
    $angsuran1->bunga_pokok =($_POST['bunga_pokok']);
    $angsuran1->lama_angsuran =($_POST['lama_angsuran']);
    $angsuran1->keterlambatan_bayar =($_POST['keterlambatan_bayar']);
    $angsuran1->total_denda = $angsuran1->hitungTotalDenda();
    $angsuran1->Total_angsuran = $angsuran1->hitungTotalAngsuran();
    $angsuran1->total_dendaRP = $angsuran1->hitungTotalDendaRP();
    $angsuran1->angsuran_bulanan = $angsuran1->angsuranBulanan();
    $angsuran_bulan_ini = $angsuran1->angsuranBulanIni();

    echo "<h2>Data Pembayaran</h2>";
    echo "Total Harus Dibayar (Tanpa Denda): Rp. " .$angsuran1->Total_angsuran . "<br>";
    echo "Angsuran Bulanan: Rp. " . $angsuran1->angsuran_bulanan . "<br>";
    echo "Total Denda Bulan Ini: Rp. " . $angsuran1->total_dendaRP . "<br>";
    echo "Angsuran Bulan Ini (termasuk denda): Rp. " . $angsuran_bulan_ini . "<br>";
    
}
?>