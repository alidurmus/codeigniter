<?php

class Proses_kontrol_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->tableName = "proses_kontrol";
    }


    public function listele(){
        $query = $this->db->query(
        'SELECT pk.*, 
        ur.adi as urun_adi, 
        us.user_name as kullanici_adi, 
        son.adi as sonuc_adi  
        FROM proses_kontrol pk   
        INNER JOIN urunler ur ON ur.id = pk.urun 
        INNER JOIN users us ON us.id = pk.kullanici 
        INNER JOIN sonuc_secim son ON son.id = pk.sonuc 
        ');
        return $query->result();
    }
}