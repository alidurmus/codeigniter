<?php

class Girdi_kontrol_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();

        $this->tableName = "girdi_kontrol";

    }

    public function listele(){
        $query = $this->db->query('SELECT gk.*, ml.adi as malzeme_adi, td.adi as td_adi FROM girdi_kontrol gk INNER JOIN malzemeler ml ON ml.id = gk.malzeme INNER JOIN tedarikciler td ON td.id = gk.tedarikci');

        return $query->result();


    }
}