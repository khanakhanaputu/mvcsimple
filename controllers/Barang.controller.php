<?php
include_once("models/Model.model.php");
include_once("views/barang.view.php");
class BarangController extends Model
{
    public function index()
    {
        barang($this->getAll("barang"));
        $this->update("barang", "nama_brg", "Tanjay maassabasdfdsfr", "kd_brg", "brg001");
    }
}
