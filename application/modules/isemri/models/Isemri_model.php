<?php

class Isemri_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->tableName = "is_emri";
    }
}