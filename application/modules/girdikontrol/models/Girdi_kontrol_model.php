<?php

class Girdi_kontrol_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();

        $this->tableName = "girdi_kontrol";

    }

    public function listele(){
        $query = $this->db->query(
        'SELECT gk.*, 
         ml.adi as malzeme_adi,
         td.adi as tedarikci_adi, 
         us.user_name as kullanici_adi, 
         son.adi as sonuc_adi 
         FROM girdi_kontrol gk 
         INNER JOIN malzemeler ml ON ml.id = gk.malzeme 
         INNER JOIN tedarikciler td ON td.id = gk.tedarikci 
         INNER JOIN users us ON us.id = gk.kullanici 
         INNER JOIN sonuc_secim son ON son.id = gk.sonuc 
         ');

        return $query->result();


    }
}