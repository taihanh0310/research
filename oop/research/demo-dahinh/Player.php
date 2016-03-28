<?php
class Player
{
    private $tenCauThu;
    private $ngaySinh;
    private $soDienThoai;
    private $diaChi;
    private $soAo;
    private $soBanThang;

    /**
     * Player constructor.
     * @param $tenCauThu
     * @param $ngaySinh
     * @param $soDienThoai
     * @param $diaChi
     * @param $soAo
     * @param $soBanThang
     */
    public function __construct($tenCauThu, $ngaySinh, $soDienThoai, $diaChi, $soAo, $soBanThang)
    {
        $this->tenCauThu = $tenCauThu;
        $this->ngaySinh = $ngaySinh;
        $this->soDienThoai = $soDienThoai;
        $this->diaChi = $diaChi;
        $this->soAo = $soAo;
        $this->soBanThang = $soBanThang;
    }

    /**
     * @return mixed
     */
    public function getTenCauThu()
    {
        return $this->tenCauThu;
    }

    /**
     * @param mixed $tenCauThu
     */
    public function setTenCauThu($tenCauThu)
    {
        $this->tenCauThu = $tenCauThu;
    }

    /**
     * @return mixed
     */
    public function getNgaySinh()
    {
        return $this->ngaySinh;
    }

    /**
     * @param mixed $ngaySinh
     */
    public function setNgaySinh($ngaySinh)
    {
        $this->ngaySinh = $ngaySinh;
    }

    /**
     * @return mixed
     */
    public function getSoDienThoai()
    {
        return $this->soDienThoai;
    }

    /**
     * @param mixed $soDienThoai
     */
    public function setSoDienThoai($soDienThoai)
    {
        $this->soDienThoai = $soDienThoai;
    }

    /**
     * @return mixed
     */
    public function getDiaChi()
    {
        return $this->diaChi;
    }

    /**
     * @param mixed $diaChi
     */
    public function setDiaChi($diaChi)
    {
        $this->diaChi = $diaChi;
    }

    /**
     * @return mixed
     */
    public function getSoAo()
    {
        return $this->soAo;
    }

    /**
     * @param mixed $soAo
     */
    public function setSoAo($soAo)
    {
        $this->soAo = $soAo;
    }

    /**
     * @return mixed
     */
    public function getSoBanThang()
    {
        return $this->soBanThang;
    }

    /**
     * @param mixed $soBanThang
     */
    public function setSoBanThang($soBanThang)
    {
        if (isset($soBanThang) && $soBanThang >= 0) {
            $this->soBanThang = $soBanThang;
        }
    }
}

?>