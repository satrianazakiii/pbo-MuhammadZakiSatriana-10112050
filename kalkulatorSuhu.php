<?php

class kalkulatorSuhu {
    public $celsius=25;
    
    public function keFahrenheit() {
        return ($this->celsius * 9/5) + 32;
    }
    
    public function keKelvin() {
        return $this->celsius + 273.15;
    }


}
$kalkulator1 = new kalkulatorSuhu();

echo "<pre>";
echo "====Kalkulator Suhu====\n";
echo "satuan: celcius (°C)\n";  
echo "-----------------------\n";
echo "SUHU (C)  : " . $kalkulator1->celsius . " °C\n";
echo "FARENHEIT : " . $kalkulator1->keFahrenheit() . " °F\n";
echo "KELVIN    : " . $kalkulator1->keKelvin() . " K\n";
echo "=======================\n";
echo "</pre>"; 
?>
