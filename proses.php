<?php 
class Data {
    protected $ppn;
    private $standard,
            $scotter,
            $dirt,
            $sport;
    public $pelanggan,
           $waktu,
           $jenis;
    public $daftarMember = ['Popuri', 'Ann', 'Karen', 'Elli', 'Mary'];

    function __construct(){
        $this->ppn = 10000;
    }

    public function setHarga($tipe1, $tipe2, $tipe3, $tipe4){
        $this->standard = $tipe1;
        $this->scotter = $tipe2;
        $this->dirt = $tipe3;
        $this->sport = $tipe4;
    }

    public function getHarga(){
        $data['MotorStandar'] = $this->standard;
        $data['Skuter'] = $this->scotter;
        $data['MotorTrail'] = $this->dirt;
        $data['MotorSport'] = $this->sport;
        return $data;
    }
}

class Rental extends Data{
    public function infoMember() {
        $member = in_array($this->pelanggan, $this->daftarMember) ? "Member" : "Non Member";
        return $member;
    }

    public function infoDiskon(){
        $diskon = ($this->infoMember() == "Member") ? "5" : "0";
        return $diskon;
    }

    public function bayar(){
        $dataHarga = $this->getHarga();
        $hargaRental = $this->waktu * $dataHarga[$this->jenis];
        $hargaPPN = $this->ppn;
        $hargaBayar = $hargaRental + $hargaPPN;
        $diskonMember = $hargaBayar * 0.05;
        if($this->infoMember() == "Member") {
            $bayar = $hargaBayar - $diskonMember;
        } else {
            $bayar = $hargaBayar;
        }
        return $bayar;
    }

    public function cetakInfo(){
        echo "<center>";
        echo $this->pelanggan . " berstatus sebagai " . $this->infoMember() . " mendapatkan diskon sebesar " . $this->infoDiskon() . "%" . "<br>";
        echo "Jenis motor yang dirental adalah " . $this->jenis . " selama " . $this->waktu . " hari" . "<br>";
        echo "Harga rental perharinya: Rp. " . number_format($this->getHarga()[$this->jenis], 0, '', '.') . "<br>";
        echo "<br>";
        echo "Besar yang harus dibayar adalah Rp. " . number_format($this->bayar(), 0, '', '.');
        echo "</center>";
    }
}
?>
