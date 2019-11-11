<?php

class Final_kontrol_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->tableName = "final_kontrol";
    }
    
    public function listele(){
        $query = $this->db->query('SELECT fk.*, ml.adi as urun_adi FROM final_kontrol fk INNER JOIN urunler ml ON ml.id = fk.urun');

        return $query->result();


    }
}