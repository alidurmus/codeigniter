<?php

class Final_kontrol_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->tableName = "final_kontrol";
    }
    
    public function listele(){
        $query = $this->db->query('SELECT fk.*, ml.adi as malzeme_adi, td.adi as td_adi FROM final_kontrol fk INNER JOIN malzemeler ml ON ml.id = fk.malzeme INNER JOIN tedarikciler td ON td.id = fk.tedarikci');

        return $query->result();


    }
}