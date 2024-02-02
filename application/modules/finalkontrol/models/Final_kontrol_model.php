<?php

class Final_kontrol_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->tableName = "final_kontrol";
    }
    
    public function get_limit($where = array(), $limit, $start,$search="") {
        // $this->db->limit($limit, $start);
         //$query = $this->db->where($where)->get($this->tableName);
      /*
         $query = $this->db->query(
            'SELECT fk.*,  
            ur.adi as urun_adi, 
            us.user_name as kullanici_adi , 
            son.adi as sonuc_adi 
            FROM final_kontrol fk 
            INNER JOIN urunler ur ON ur.id = fk.urun 
            INNER JOIN users us ON us.id = fk.kullanici 
            INNER JOIN sonuc_secim son ON son.id = fk.sonuc 
 
             ORDER BY fk.id DESC
             LIMIT '. $limit.' OFFSET '. $start.'
              ');        
        */

        $this->db->select('fk.id,fk.urun,fk.lot,fk.kontrol_no,fk.kutu_no,fk.tarih,   
        ur.adi as urun_adi, 
        us.user_name as kullanici_adi , 
        son.adi as sonuc_adi');    
        $this->db->from('final_kontrol fk');
        $this->db->join('urunler ur', 'ur.id = fk.urun','inner');
        $this->db->join('users us', 'us.id = fk.kullanici','inner');
        $this->db->join('sonuc_secim son', 'son.id = fk.sonuc','inner');
        $this->db->order_by("fk.id ", "DESC");
        $this->db->limit($limit, $start);
        if($search != ''){
            $this->db->like('ur.adi', $search);
            $this->db->or_like('kontrol_no', $search);
            
          }
        $query = $this->db->get();
         return $query->result();
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
		ORDER BY fk.tarih DESC
        LIMIT 20000
		');

        return $query->result();


    }


         // Select total records
  public function getrecordCount($search = '') {
    $this->db->select('count(*) as allcount, fk.*, 
    ur.adi as urun_adi, 
    us.user_name as kullanici_adi , 
    son.adi as sonuc_adi');
    $this->db->from('final_kontrol fk');
    $this->db->join('urunler ur', 'ur.id = fk.urun','inner');
    $this->db->join('users us', 'us.id = fk.kullanici','inner');
    $this->db->join('sonuc_secim son', 'son.id = fk.sonuc','inner');
    if($search != ''){
      $this->db->like('ur.adi', $search);
      $this->db->or_like('kontrol_no', $search);
    }

    $query = $this->db->get();
    $result = $query->result_array();
 
    return $result[0]['allcount'];
  }
}