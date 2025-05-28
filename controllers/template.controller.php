<?php
include_once("models/Model.model.php");
class namaeController extends Model
{
    public function methodsaya()
    {
        $this->getAll("namatableee");
    }
}
