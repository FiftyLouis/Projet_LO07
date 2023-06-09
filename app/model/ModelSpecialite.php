<?php
require_once 'Model.php';

class ModelSpecialite{
    private $id, $label;

    public function __construct($id = NULL, $label = NULL)
    {
        if(!is_null($id)){
            $this->$id = $id;
            $this->$label = $label;
        }
    }
}
?>