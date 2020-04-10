<?php

class Final_kontrol_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->tableName = "final_kontrol";
    }
    
    public function listele(){
        $query = $this->db->query(
        'SELECT fk.*,  
        ur.adi as urun_adi, 
        us.user_name as kullanici_adi , 
        son.adi as sonuc_adi 
        FROM final_kontrol fk 
        INNER JOIN urunler ur ON ur.id = fk.urun 
        INNER JOIN users us ON us.id = fk.kullanici 
        INNER JOIN sonuc_secim son ON son.id = fk.sonuc 
        ');

        return $query->result();


    }
}