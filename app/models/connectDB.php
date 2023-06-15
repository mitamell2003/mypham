<?php
require_once(__DIR__ . '/../../configs/config.php');
class connectDB
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;
    public function connect()
    {
        $connect = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if($connect->connect_error){
            die("Connection failed: " . $connect->connect_error);
        }
        return $connect;
    }
}
$gettour = new connectDB();
$sql = "SELECT tour.id, tour.dongia, tour.hinhAnh, tour.giamGia, diaiem.tenDiaDiem, diadiem.moTa, diadanh.tenDiaDanh, diadanh.moTa, diadanh.hinhanh
FROM tour
JOIN diadiem ON tour.idDiaDiemDen = diadiem.id
JOIN diadanh ON tour.idDiaDiemDen = diadanh.id
JOIN lichtrinh ON tour.maLichTrinh = lichtrinh.id;"
?>