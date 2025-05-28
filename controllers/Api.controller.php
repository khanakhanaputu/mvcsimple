<?php
include_once("models/Model.model.php");
class ApiController extends Model
{
    private $init;
    public function __construct()
    {
        parent::__construct();
    }
    public function getallproduct()
    {
        createPublicAPI($this->getAll("barang"));
    }
    public function barang($value)
    {
        createPublicAPI(value: $this->getById("barang", "kd_brg", $value));
    }
}
