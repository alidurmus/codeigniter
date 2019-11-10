<?php

class Proses_kontrol_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->tableName = "proses_kontrol";
    }


    public function listele(){
        $query = $this->db->query('SELECT pk.*, ml.adi as malzeme_adi, td.adi as td_adi FROM proses_kontrol pk INNER JOIN malzemeler ml ON ml.id = pk.malzeme INNER JOIN tedarikciler td ON td.id = pk.tedarikci');

        return $query->result();


    }
}